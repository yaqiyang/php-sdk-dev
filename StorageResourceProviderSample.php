<?php
    // some important settings
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    date_default_timezone_set('America/Los_Angeles');

    require_once 'vendor/autoload.php';
    use MicrosoftAzure\StorageResourceProvider\StorageResourceProviderProxy;
    use MicrosoftAzure\Common\ServiceException;

    /** To use the Storage Resource Provider APIs,
     * 1. must have a valid tenant at Azure Active Directory(https://azure.microsoft.com/en-us/documentation/articles/resource-group-create-service-principal-portal/)
     * 2. must have an application set up at Azure Active Directory and get its client id and client secret
     * 3. must have an existing Resource Group and have permissions granted to the application above
     * For detailed instructions, go to https://azure.microsoft.com/en-us/documentation/articles/resource-group-create-service-principal-portal/
     */
    $tenant_id = '<your organizations tenant id at Azure Active Director>';
    $client_id = '<your client id for Storage Resoure Provider applicaton at Azure Active Directory>';
    $client_secret = '<your client secret for Storage Resoure Provider applicaton at Azure Active Directory>';
    $subscriptionId = '<your subscription id>';

    // info about the storage account
    $resourceGroup = '<your existing resource group name>'; // this group should have been created already
    $accountName = '<your new storage account nanme>'; // the storage account to create or modify. don't use existing accounts

    // comment this line if you don't want to read the settings from a file
    include_once '../testsrc/srpconfig.php'; // the above settings for the test account

    // now we will check if the storage account exists or not. If not, create it.
    $srp = new StorageResourceProviderProxy($tenant_id,  $client_id, $client_secret);

    if (!$srp->checkNameAvailability($subscriptionId, $accountName))
    {
        echo "Storage Account $accountName already exists.\n";
        $status = 0;
        echo 'Deleting...';
        do
        {
            try
            {
                $status = $srp->DeleteStorageAccount($subscriptionId, $resourceGroup, $accountName);
            }
            catch (ServiceException $e)
            {
                $status = $e->getCode();
            }

            echo '.';

            if ($status == 200)
            {
                break;
            }

            sleep(5);
        }
        while ($status != 200);

        echo "\nStorage Account $accountName deleted.\n";
    }
    else
    {
        echo "Creating Storage Account $accountName ...";
        $result = $srp->CreateStorageAccount($subscriptionId, $resourceGroup, $accountName);

        if (is_array($result)) // async operaton
        {
            $status = 202; // accepted
            do
            {
                sleep(5);
                $status = $srp->pollAsyncStorageOperation($result[0], $result[1]);
                echo '.';
            }
            while ($status == 202);

            echo "\nStorage Account $accountName has been successfully created.\n";
        }
        else
        {
             echo "Storage Account $accountName already created.\n";
        }
    }




?>

<?php
    // some important settings
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    date_default_timezone_set('America/Los_Angeles');

    require_once 'vendor/autoload.php';
    use MicrosoftAzure\Common\ServicesBuilder;
    use MicrosoftAzure\Common\ServiceException;

    /** To use the Storage Resource Provider APIs,
     * 1. must have a valid tenant at Azure Active Directory(https://azure.microsoft.com/en-us/documentation/articles/resource-group-create-service-principal-portal/)
     * 2. must have an application set up at Azure Active Directory and get its client id and client secret
     * 3. must have an existing Resource Group and have permissions granted to the application above
     * For detailed instructions, go to https://azure.microsoft.com/en-us/documentation/articles/resource-group-create-service-principal-portal/
     */
    $tenant_id = '<your organizations tenant id at Azure Active Director>';
    $client_id = '<your client id for your applicaton at Azure Active Directory>';
    $client_secret = '<your client secret for your applicaton at Azure Active Directory>';
    $subscriptionId = '<your subscription id>';
    $resourceGroup = '<your existing resource group name>';
    $accountName = '<your new storage account nanme>';

    // or, read the settings from a file
    $config = 'privatesettings.php';
    if (file_exists($config))
    {
        include_once $config;
    }

    $srp = ServicesBuilder::getInstance()->createStorageResourceProviderService($tenant_id, $client_id, $client_secret);

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

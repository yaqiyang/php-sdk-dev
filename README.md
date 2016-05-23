# Microsoft Azure SDK for PHP - Storage Resource Provider

In the sample PHP SDK code, I have the following calls implemented from https://msdn.microsoft.com/en-us/library/azure/mt163683.aspx,

* Create Storage Account
* Poll Async Storage Operation
* Check Storage Account Name Availability
* Delete Storage Account.

## To run the tests in [root]/StorageResourceProviderSample.php, you must have the following prerequisites,

* must have a valid tenant at Azure Active Directory(https://azure.microsoft.com/en-us/documentation/articles/resource-group-create-service-principal-portal/)
* must have an application set up at Azure Active Directory and get its client id and client secret
* must have an existing Resource Group and have permissions granted to the application above

For detailed instructions, go to https://azure.microsoft.com/en-us/documentation/articles/resource-group-create-service-principal-portal/

Once you have set up the above settings, open StorageResourceProviderSample.php, and modify the following,
```
    $tenant_id = '<your organizations tenant id at Azure Active Director>';
    $client_id = '<your client id for Storage Resoure Provider applicaton at Azure Active Directory>';
    $client_secret = '<your client secret for Storage Resoure Provider applicaton at Azure Active Directory>';
    $subscriptionId = '<your subscription id>';

    // info about the storage account
    $resourceGroup = '<your existing resource group name>'; // this group should have been created already
    $accountName = '<your new storage account nanme>'; // the storage account to create or modify. don't use existing accounts

    // uncomment this line if you want to read the settings from a file
    //include_once '../testsrc/srpconfig.php'; // the above settings for the test account
```

## Then do the following,
* Go to the root folder of the project
* php composer.phar Install    -- this will install all dependencies
* php  StorageResourcePrivderSample.php  -- this will run the tests for Storage Resource Provider


## In the tests,
* It will check if the storage account $accountName exists
* If $accountName exists, it will be deleted
* If $accountName does not exists, it will be created.



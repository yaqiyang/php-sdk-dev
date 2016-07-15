<?php

/**
 * These are code samples for Role Based Authorization at https://azure.microsoft.com/en-us/documentation/articles/role-based-access-control-manage-access-rest/
 */

    // some important settings
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    date_default_timezone_set('America/Los_Angeles');

    require_once __DIR__ .'/../vendor/autoload.php';
    use MicrosoftAzure\Common\Internal\Authentication\OAuthSettings;
    use MicrosoftAzure\Common\Internal\ServiceException;
    use MicrosoftAzure\Common\ServicesBuilder;
    use  MicrosoftAzure\Authorization\AuthorizationManagementClient;

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
    $config =  __DIR__ . '/privatesettings.php';
    if (file_exists($config))
    {
        include_once $config;
    }

    $oauthSettings = new OAuthSettings($tenant_id, $client_id, $client_secret);
    $client = new AuthorizationManagementClient($oauthSettings);
    $client->setSubscriptionId($subscriptionId);
    $client->setLongRunningOperationRetryTimeout(600);

    $result = $client->getClassicAdministrators()->listOperation('2015-06-01');
    echo "\ngetClassicAdministrators()->listOperation:\n";
    var_dump($result);

    $filter = []; // to get for all principals
    //$filter = ['principalId' => "principalId eq '7884d32f-a959-4037-9053-b0b7875d0030'"];
    $result = $client->getRoleAssignments()->listForResourceGroup($resourceGroup, $filter);
    echo "\ngetRoleAssignments()->listForResourceGroup:\n";
    var_dump($result);

?>

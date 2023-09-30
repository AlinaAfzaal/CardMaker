<?php
require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
use Kreait\Firebase\Auth\CustomToken\CustomTokenApiClient;
use Kreait\Firebase\ServiceAccount;
use Firebase\Auth\Token\Exception\InvalidToken;
use Firebase\Auth\Token\Verifier;
use Kreait\Firebase\Auth\SignIn\TokenVerifier;
use Google\Cloud\Storage\StorageClient;
use Kreait\Firebase\Auth\TokenGenerator;


$factory = (new Factory)
     ->withServiceAccount(__DIR__. '/fypdbb-firebase-adminsdk-ohgij-e4c1de1f96.json')
     ->withDatabaseUri('https://fypdbb-default-rtdb.firebaseio.com/');

$database = $factory->createDatabase();

$auth = $factory->createAuth();
// $generator = new TokenGenerator($auth->getApiClient());

// $authClient = new CustomTokenApiClient($auth->getApiClient());
// $storage = $factory->createStorage(); 

// $serviceAccount = ServiceAccount::fromJsonFile(__DIR__. '/cardmakerdb-4d669-firebase-adminsdk-ezgy7-5e80362bf3.json'); 
// $factory = (new Factory())
//     ->withServiceAccount($serviceAccount)
//     ->withDatabaseUri('https://cardmakerdb-4d669-default-rtdb.firebaseio.com/')
//     ->create();

// $database = $firebase->getDatabase(); 



// $projectId = 'fypdbb';
// $bucketName = 'gs://fypdbb.appspot.com';
// $storage = new StorageClient([
//     'projectId' => $projectId,
// ]);
// $bucket = $storage->bucket($bucketName);



$storage = $factory->createStorage();
$storageClient = $storage->getStorageClient();
$bucket = $storage->getBucket();

?>

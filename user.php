#!/usr/local/bin/php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use const Grpc\STATUS_OK;
use Protobuf\Mypackage\UserServiceClient;
use Protobuf\Mypackage\UserRequest;
use Grpc\ChannelCredentials;

$client = new UserServiceClient('0.0.0.0:8001', [
    'credentials' => ChannelCredentials::createInsecure(),
]);

if (!isset($argv[1])) {
    die("Please specify the user id\n");
}
$userId = $argv[1];

$request = new UserRequest();
$request->setId($userId);

/** @var User $response */
list($response, $status) = $client->getUser($request)->wait();

if ($status->code !== Grpc\STATUS_OK) {
    echo "ERROR: " . $status->code . ", " . $status->details . PHP_EOL;
    exit(1);
}
print $response->serializeToJsonString()."\n";
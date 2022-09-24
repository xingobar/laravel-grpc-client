<?php

namespace App\Http\Controllers;

use Grpc\ChannelCredentials;
use Grpc\Status;
use Illuminate\Http\Request;
use Protobuf\Mypackage\UserRequest;
use Protobuf\Mypackage\UserServiceClient;

class UsersController extends Controller
{
    public function show(Request $request, int $userId)
    {
        $client = new UserServiceClient('0.0.0.0:8001', [
            'credentials' => ChannelCredentials::createInsecure(),
        ]);

        $userRequest = new UserRequest();
        $userRequest->setId(intval($userId));

        list($response, $status ) = $client->getUser($userRequest)->wait();
        if ($status->code !== \Grpc\STATUS_OK) {
            return response()->json([
                'code' => $status->code,
                'message' => $status->details,
            ]);
        }

        return response()->json(json_decode($response->serializeToJsonString()));
    }

    public function index(Request $request)
    {
        $client = new UserServiceClient('0.0.0.0:8001', [
            'credentials' => ChannelCredentials::createInsecure(),
        ]);

        $userRequest = new UserRequest();
        $userRequest->setId(intval(1));

        list($users, $status) = $client->getUsers($userRequest)->wait();

        if ($status->code !== \Grpc\STATUS_OK) {
            return response()->json($status->details);
        }

        return $users->serializeToJsonString();
    }
}

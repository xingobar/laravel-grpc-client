<?php

namespace App\Http\Controllers;

use Grpc\ChannelCredentials;
use Illuminate\Http\Request;
use Protobuf\Greet\GreetRequest;
use Protobuf\Greet\GreetServiceClient;

class GreetsController extends Controller
{
    public function index(Request $request)
    {
        $client = new GreetServiceClient('0.0.0.0:8001', [
            'credentials' => ChannelCredentials::createInsecure(),
        ]);

        $greetRequest = new GreetRequest();

        list($response, $status ) = $client->greet($greetRequest)->wait();

        if ($status->code !== \Grpc\STATUS_OK) {
            return response()->json([
                'code' => $status->code,
                'message' => $status->details,
            ]);
        }

        return $response->serializeToJsonString();
    }
}

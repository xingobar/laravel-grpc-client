<?php

namespace App\Http\Controllers;

use Google\Protobuf\GPBEmpty;
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

        list($response, $status ) = $client->greet(new GPBEmpty())->wait();

        if ($status->code !== \Grpc\STATUS_OK) {
            return response()->json([
                'code' => $status->code,
                'message' => $status->details,
            ]);
        }

        return $response->serializeToJsonString();
    }
}

<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Protobuf\Greet;

/**
 */
class GreetServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Protobuf\Greet\GreetRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function greet(\Protobuf\Greet\GreetRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/protobuf.greet.GreetService/greet',
        $argument,
        ['\Protobuf\Greet\GreetResponse', 'decode'],
        $metadata, $options);
    }

}

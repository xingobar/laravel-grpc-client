<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Mypackage;

/**
 */
class UserServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Mypackage\UserRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function getUser(\Mypackage\UserRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mypackage.UserService/getUser',
        $argument,
        ['\Mypackage\User', 'decode'],
        $metadata, $options);
    }

}

<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Protobuf\Mypackage;

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
     * @param \Protobuf\Mypackage\UserRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function getUser(\Protobuf\Mypackage\UserRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/protobuf.mypackage.UserService/getUser',
        $argument,
        ['\Protobuf\Mypackage\User', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Protobuf\Mypackage\UserRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function getUsers(\Protobuf\Mypackage\UserRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/protobuf.mypackage.UserService/getUsers',
        $argument,
        ['\Protobuf\Mypackage\UsersResponse', 'decode'],
        $metadata, $options);
    }

}

<?php

namespace Dawehner\Bluehornet;

class Authentication
{
    public $api_key;

    public $shared_secret;

    public $response_type;

    public $no_halt;

    /**
     * Creates a new Authentication instance.
     * @param $api_key
     * @param $shared_secret
     * @param $response_type
     * @param $no_halt
     */
    public function __construct($api_key, $shared_secret, $response_type, $no_halt = '0')
    {
        $this->api_key = $api_key;
        $this->shared_secret = $shared_secret;
        $this->response_type = $response_type;
        $this->no_halt = $no_halt;
    }

    public function validate()
    {
        if (!in_array($this->response_type, ['xml', 'php'])) {
            return false;
        }

        return true;
    }

    public function toArray()
    {
        return [
            'api_key' => $this->api_key,
            'shared_secret' => $this->shared_secret,
            'response_type' => $this->response_type,
            'no_halt' => $this->no_halt,
        ];
    }

}

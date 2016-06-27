<?php

namespace Dawehner\Bluehornet;

use Dawehner\Bluehornet\Methods\MethodBase;

class Request
{
    
    protected $authentication;

    protected $data;

    public function setAuthentication(Authentication $authentication)
    {
        $this->authentication = $authentication;
        return $this;
    }

    public function addMethodCall(MethodBase $method)
    {
        $this->data['methodCall'] = $method;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthentication()
    {
        return $this->authentication;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

}

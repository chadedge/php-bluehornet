<?php

namespace Dawehner\Bluehornet;

use Psr\Http\Message\ResponseInterface;

class Response
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    protected $httpResponse;

    /**
     * @var \Dawehner\Bluehornet\MethodResponses\ResponseBase
     */
    protected $methodResponse;

    /**
     * Creates a new Response instance.
     *
     * @param \Psr\Http\Message\ResponseInterface $httpResponse
     * @param $methodResponse
     */
    public function __construct(ResponseInterface $httpResponse, $methodResponse)
    {
        $this->httpResponse = $httpResponse;
        $this->methodResponse = $methodResponse;
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function getHttpResponse()
    {
        return $this->httpResponse;
    }

    /**
     * @return \Dawehner\Bluehornet\MethodResponses\ResponseBase
     */
    public function getMethodResponse()
    {
        return $this->methodResponse;
    }
}

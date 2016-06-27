<?php

namespace Dawehner\Bluehornet\MethodResponses;

class LegacyManySubscribe
{
    protected $status;

    protected $message;

    /**
     * Creates a new LegacyManySubscribe instance.
     * @param $status
     * @param $message
     */
    public function __construct($status, $message)
    {
        $this->status = $status;
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

}

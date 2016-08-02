<?php

namespace Dawehner\Bluehornet\MethodResponses;

class LegacyManageSubscriber extends ResponseBase
{
    protected $status;

    protected $message;

    /**
     * Creates a new LegacyManageSubscriber instance.
     *
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

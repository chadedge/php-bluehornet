<?php

namespace Dawehner\Bluehornet\MethodRequests;

/**
 * Provides a request containing just the message key.
 *
 * This request has to be sent in order to retrieve the actual result of some
 * requests.
 */
class Message extends MethodBase
{
    /**
     * The messsage key.
     *
     * @var string
     */
    protected $messageKey;

    /**
     * Creates a new Message instance.
     * @param string $messageKey
     */
    public function __construct($messageKey, $methodName)
    {
        $this->messageKey = $messageKey;
        $this->methodName = $methodName;
    }

    public static function create($messageKey, $methodName)
    {
        return new static($messageKey, $methodName);
    }

    /**
     * @return string
     */
    public function getMessageKey()
    {
        return $this->messageKey;
    }

}

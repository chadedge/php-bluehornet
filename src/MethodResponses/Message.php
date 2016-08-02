<?php

namespace Dawehner\Bluehornet\MethodResponses;

class Message extends ResponseBase
{
    /**
     * @var string
     */
    protected $message;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $key;

    /**
     * Creates a new Message instance.
     *
     * @param string $message
     * @param int    $message_id
     * @param string $message_key
     */
    public function __construct($message, $message_id, $message_key)
    {
        $this->message = $message;
        $this->id = $message_id;
        $this->key = $message_key;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }
}

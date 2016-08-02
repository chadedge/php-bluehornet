<?php

namespace Dawehner\Bluehornet\MethodResponses;

/**
 * Wraps the response to a 'legacy.send_campaign' response.
 */
class LegacySendCampaign
{
    /**
     * A code indicating either a success (‘1’) or a failure (‘2’) to send the
     * message.
     *
     * @var int
     */
    protected $message;

    /**
     * This element will only be included in the response message when the POST
     * is successful. The value is set to ‘1’.
     *
     * @var int|null
     */
    protected $sent;

    /**
     * This element will only be included in the response message when the POST
     * fails. This field will include the human-readable reason for the failure.
     *
     * @var string
     */
    protected $reason;

    /**
     * Creates a new LegacySendCampaign instance.
     *
     * @param int $message
     * @param int $sent
     * @param string $reason
     */
    public function __construct($message, $sent = null, $reason = '')
    {
        $this->message = $message;
        $this->sent = $sent;
        $this->reason = $reason;
    }

    /**
     * @return int
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return int
     */
    public function getSent()
    {
        return $this->sent;
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }
}

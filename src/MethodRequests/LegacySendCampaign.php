<?php

namespace Dawehner\Bluehornet\MethodRequests;

class LegacySendCampaign extends MethodBase
{
    /**
     * {@inheritdoc}
     */
    protected $methodName = 'legacy.send_campaign';

    /**
     * A comma delimited list of the ID numbers of the static segments that are
     * to receive this message. To view a list of static segments and their
     * corresponding ID numbers, log in to eMS Enterprise and navigate to
     * Administration > Configure Settings > Account and Segment IDs. Scroll
     * down on the screen to the Segments section to find the static segment
     * name and its corresponding segment ID.
     *
     * @var string
     */
    protected $grp;

    /**
     * A comma delimited list of the ID numbers of the dynamic segments that are
     * to receive this message. To view a list of dynamic segments and their
     * corresponding ID numbers, log in to eMS Enterprise and navigate to
     * Administration > Configure Settings > Account and Segment IDs. Scroll
     * down on the screen to the Segments section to find the dynamic segment
     * name and its corresponding segment ID.
     *
     * @var string
     */
    protected $sm;

    /**
     * A comma delimited list of the ID numbers of the dynamic segments that are
     * to be excluded from this message. To view a list of dynamic segments and
     * their corresponding ID numbers, log in to eMS Enterprise and navigate to
     * Administration > Configure Settings > Account and Segment IDs. Scroll
     * down on the screen to the Segments section to find the dynamic segment
     * name and its corresponding segment ID.
     *
     * @var string
     */
    protected $sm_exclude;

    /**
     * The HTML content for the message
     *
     * @var string
     */
    protected $rich_mbody;

    /**
     * The plain text content for the message
     *
     * @var string
     */
    protected $text_mbody;

    /**
     * Set to ‘Y’ to restrict sending of the message only via this API method.
     *
     * @var string
     */
    protected $send;

    /**
     * The email address where replies should be sent.
     *
     * @var string
     */
    protected $reply_email;

    /**
     * The email address where the email should appear to come.
     *
     * @var string
     */
    protected $from_email;

    /**
     * The “friendly from name” visible to the subscriber
     *
     * @var string
     */
    protected $fromdesc;

    /**
     * The subject of the email
     *
     * @var string
     */
    protected $msubject;

    /**
     * Set this element to ‘Y’ if you want to schedule the message to be sent at
     * a later date and time. Otherwise, the message will be sent immediately.
     *
     * @var string
     */
    protected $timed_release;

    /**
     * The date when the message is to be sent in YYYY-MM-DD format
     *
     * @var string
     */
    protected $date;

    /**
     * The hour of the day in which to send the message (24 hour clock as an
     * integer). All send times are in US Pacific Time Zone.
     *
     * @var integer
     */
    protected $hour;

    /**
     * A name that will be used when first name and last name personalization is
     * used and a first name or last name does not exist for a given individual.
     *
     * @var string
     */
    protected $substitude_name;

    /**
     * A text field for customer’s internal billing information
     *
     * @var string
     */
    protected $bill_codes;

    /**
     * A text field for notes regarding the message up to a maximum of 128
     * characters.
     *
     * @var string
     */
    protected $message_notes;

    /**
     * A campaign ID internal to the system to make this message part of a
     * larger campaign
     *
     * @var int
     */
    protected $campaign_id;

    /**
     * Set this element to ‘1’ if you want the system to track all links within
     * the message
     *
     * @var int
     */
    protected $track_links;

    /**
     * A comma-delimited list of static segment IDs that indicate static
     * segments you wish to explicitly exclude from the mailing. To view a list
     * of static segments and their corresponding ID numbers, log in to the
     * application and navigate to Administration > Configure Settings > Account
     * and Segment IDs. Scroll down on the screen to the Segments section to
     * find the static segment name and its corresponding segment ID.
     *
     * @var string
     */
    protected $grp_exclude;

    /**
     * Set this element to ‘1’ if you want the message to use the default footer
     * associated with the primary user account. The default footer can be set
     * in the UI under the Message Footers section by selecting ‘Set as
     * Default’.
     *
     * @var string
     */
    protected $use_default_footer;

    /**
     * This parameter is used to specify a specific IP address binding to be
     * used for a message. Contact your Account Manager to find out which
     * bindings are available for you to use.
     *
     * @var string
     */
    protected $binding;

    /**
     * Allows specification of the message send rate, using the same send values
     * available in EMS. (Requires throttle rate feature enabled for EMS
     * account.)
     *
     * @var int
     */
    protected $throttle_rate;

    /**
     * Allows specification of a Message Name
     *
     * @var string
     */
    protected $message_name;

    /**
     * This parameter can be used to specify available account footers by footer
     * ID for inclusion in the message. (Not applied if use_default_footer is
     * called).
     *
     * @var int
     */
    protected $footer_id;

    /**
     * Requests an Inbox Monitor report. Set this element to ‘1’ to request
     * Inbox Monitor report for the specified campaign send.
     *
     * @var bool
     */
    protected $inbox_monitor;

    /**
     * @param string $grp
     * @return LegacySendCampaign
     */
    public function setGrp($grp)
    {
        $this->grp = $grp;
        return $this;
    }

    /**
     * @param string $sm
     * @return LegacySendCampaign
     */
    public function setSm($sm)
    {
        $this->sm = $sm;
        return $this;
    }

    /**
     * @param string $sm_exclude
     * @return LegacySendCampaign
     */
    public function setSmExclude($sm_exclude)
    {
        $this->sm_exclude = $sm_exclude;
        return $this;
    }

    /**
     * @param string $rich_mbody
     * @return LegacySendCampaign
     */
    public function setRichMbody($rich_mbody)
    {
        $this->rich_mbody = $rich_mbody;
        return $this;
    }

    /**
     * @param string $text_mbody
     * @return LegacySendCampaign
     */
    public function setTextMbody($text_mbody)
    {
        $this->text_mbody = $text_mbody;
        return $this;
    }

    /**
     * @param string $send
     * @return LegacySendCampaign
     */
    public function setSend($send)
    {
        $this->send = $send;
        return $this;
    }

    /**
     * @param string $reply_email
     * @return LegacySendCampaign
     */
    public function setReplyEmail($reply_email)
    {
        $this->reply_email = $reply_email;
        return $this;
    }

    /**
     * @param string $from_email
     * @return LegacySendCampaign
     */
    public function setFromEmail($from_email)
    {
        $this->from_email = $from_email;
        return $this;
    }

    /**
     * @param string $fromdesc
     * @return LegacySendCampaign
     */
    public function setFromdesc($fromdesc)
    {
        $this->fromdesc = $fromdesc;
        return $this;
    }

    /**
     * @param string $msubject
     * @return LegacySendCampaign
     */
    public function setMsubject($msubject)
    {
        $this->msubject = $msubject;
        return $this;
    }

    /**
     * @param string $timed_release
     * @return LegacySendCampaign
     */
    public function setTimedRelease($timed_release)
    {
        $this->timed_release = $timed_release;
        return $this;
    }

    /**
     * @param string $date
     * @return LegacySendCampaign
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @param int $hour
     * @return LegacySendCampaign
     */
    public function setHour($hour)
    {
        $this->hour = $hour;
        return $this;
    }

    /**
     * @param string $substitude_name
     * @return LegacySendCampaign
     */
    public function setSubstitudeName($substitude_name)
    {
        $this->substitude_name = $substitude_name;
        return $this;
    }

    /**
     * @param string $bill_codes
     * @return LegacySendCampaign
     */
    public function setBillCodes($bill_codes)
    {
        $this->bill_codes = $bill_codes;
        return $this;
    }

    /**
     * @param string $message_notes
     * @return LegacySendCampaign
     */
    public function setMessageNotes($message_notes)
    {
        $this->message_notes = $message_notes;
        return $this;
    }

    /**
     * @param int $campaign_id
     * @return LegacySendCampaign
     */
    public function setCampaignId($campaign_id)
    {
        $this->campaign_id = $campaign_id;
        return $this;
    }

    /**
     * @param int $track_links
     * @return LegacySendCampaign
     */
    public function setTrackLinks($track_links)
    {
        $this->track_links = $track_links;
        return $this;
    }

    /**
     * @param string $grp_exclude
     * @return LegacySendCampaign
     */
    public function setGrpExclude($grp_exclude)
    {
        $this->grp_exclude = $grp_exclude;
        return $this;
    }

    /**
     * @param string $use_default_footer
     * @return LegacySendCampaign
     */
    public function setUseDefaultFooter($use_default_footer)
    {
        $this->use_default_footer = $use_default_footer;
        return $this;
    }

    /**
     * @param string $binding
     * @return LegacySendCampaign
     */
    public function setBinding($binding)
    {
        $this->binding = $binding;
        return $this;
    }

    /**
     * @param int $throttle_rate
     * @return LegacySendCampaign
     */
    public function setThrottleRate($throttle_rate)
    {
        $this->throttle_rate = $throttle_rate;
        return $this;
    }

    /**
     * @param string $message_name
     * @return LegacySendCampaign
     */
    public function setMessageName($message_name)
    {
        $this->message_name = $message_name;
        return $this;
    }

    /**
     * @param int $footer_id
     * @return LegacySendCampaign
     */
    public function setFooterId($footer_id)
    {
        $this->footer_id = $footer_id;
        return $this;
    }

    /**
     * @param boolean $inbox_monitor
     * @return LegacySendCampaign
     */
    public function setInboxMonitor($inbox_monitor)
    {
        $this->inbox_monitor = $inbox_monitor;
        return $this;
    }

    /**
     * @return string
     */
    public function getGrp()
    {
        return $this->grp;
    }

    /**
     * @return string
     */
    public function getSm()
    {
        return $this->sm;
    }

    /**
     * @return string
     */
    public function getSmExclude()
    {
        return $this->sm_exclude;
    }

    /**
     * @return string
     */
    public function getRichMbody()
    {
        return $this->rich_mbody;
    }

    /**
     * @return string
     */
    public function getTextMbody()
    {
        return $this->text_mbody;
    }

    /**
     * @return string
     */
    public function getSend()
    {
        return $this->send;
    }

    /**
     * @return string
     */
    public function getReplyEmail()
    {
        return $this->reply_email;
    }

    /**
     * @return string
     */
    public function getFromEmail()
    {
        return $this->from_email;
    }

    /**
     * @return string
     */
    public function getFromdesc()
    {
        return $this->fromdesc;
    }

    /**
     * @return string
     */
    public function getMsubject()
    {
        return $this->msubject;
    }

    /**
     * @return string
     */
    public function getTimedRelease()
    {
        return $this->timed_release;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return int
     */
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * @return string
     */
    public function getSubstitudeName()
    {
        return $this->substitude_name;
    }

    /**
     * @return string
     */
    public function getBillCodes()
    {
        return $this->bill_codes;
    }

    /**
     * @return string
     */
    public function getMessageNotes()
    {
        return $this->message_notes;
    }

    /**
     * @return int
     */
    public function getCampaignId()
    {
        return $this->campaign_id;
    }

    /**
     * @return int
     */
    public function getTrackLinks()
    {
        return $this->track_links;
    }

    /**
     * @return string
     */
    public function getGrpExclude()
    {
        return $this->grp_exclude;
    }

    /**
     * @return string
     */
    public function getUseDefaultFooter()
    {
        return $this->use_default_footer;
    }

    /**
     * @return string
     */
    public function getBinding()
    {
        return $this->binding;
    }

    /**
     * @return int
     */
    public function getThrottleRate()
    {
        return $this->throttle_rate;
    }

    /**
     * @return string
     */
    public function getMessageName()
    {
        return $this->message_name;
    }

    /**
     * @return int
     */
    public function getFooterId()
    {
        return $this->footer_id;
    }

    /**
     * @return boolean
     */
    public function isInboxMonitor()
    {
        return $this->inbox_monitor;
    }

}

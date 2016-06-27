<?php

namespace Dawehner\Bluehornet\Methods;

class LegacyManageSubscriber extends MethodBase
{
    protected $email;

    protected $external_id;

    protected $newemail;

    protected $new_external_id;

    protected $firstname;

    protected $lastname;

    protected $address;

    protected $city;

    protected $state;

    protected $postal_code;

    protected $country;

    protected $phone_hm;

    protected $phone_wk;

    protected $fax;

    protected $email_type;

    protected $welcome_trigger;

    protected $doi;

    protected $welcomeletter;

    // custom values.

    protected $grp;

    protected $grpreplace;

    protected $grpremove;

    protected $signup_page;

    protected $subscriber_ip;

    protected $select;

    protected $refer = [];

    protected $name = [];

    protected $personalized_message = [
    ];

    protected $ref;

    protected $fmid;

    protected $remove = 0;

    protected $optout = 0;

    protected $check_optout = 0;

    protected $message_hash;

    protected $channel_source;

    protected $methodName = 'legacy.manage_subscriber';

    /**
     * Creates a new LegacyManageSubscriber instance.
     *
     * @param string $email
     *   The email.
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

}

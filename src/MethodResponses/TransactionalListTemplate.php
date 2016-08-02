<?php

namespace Dawehner\Bluehornet\MethodResponses;

class TransactionalListTemplate extends ResponseBase
{
    /**
     * {@inheritdoc}
     */
    protected $methodName = 'transactional.listTemplates';

    /**
     * @var int
     */
    protected $templateId;

    /**
     * @var string
     */
    protected $fromDescription;

    /**
     * @var string
     */
    protected $fromEmail;

    /**
     * @var string
     */
    protected $replyEmail;

    /**
     * @var string
     */
    protected $subject;

    /**
     * @var string
     */
    protected $messageNotes;

    /**
     * @var string
     */
    protected $billCodes;

    /**
     * @var string
     */
    protected $templateData;

    /**
     * @var string
     */
    protected $html;

    /**
     * @var string
     */
    protected $plain;

    /**
     * @var string
     */
    protected $binding;

    /**
     * @return int
     */
    public function getTemplateId()
    {
        return $this->templateId;
    }

    /**
     * @param int $templateId
     * @return $this
     */
    public function setTemplateId($templateId)
    {
        $this->templateId = $templateId;
        return $this;
    }

    /**
     * @return string
     */
    public function getFromDescription()
    {
        return $this->fromDescription;
    }

    /**
     * @param string $fromDescription
     * @return $this
     */
    public function setFromDescription($fromDescription)
    {
        $this->fromDescription = $fromDescription;
        return $this;
    }

    /**
     * @return string
     */
    public function getFromEmail()
    {
        return $this->fromEmail;
    }

    /**
     * @param string $fromEmail
     * @return $this
     */
    public function setFromEmail($fromEmail)
    {
        $this->fromEmail = $fromEmail;
        return $this;
    }

    /**
     * @return string
     */
    public function getReplyEmail()
    {
        return $this->replyEmail;
    }

    /**
     * @param string $replyEmail
     * @return $this
     */
    public function setReplyEmail($replyEmail)
    {
        $this->replyEmail = $replyEmail;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessageNotes()
    {
        return $this->messageNotes;
    }

    /**
     * @param string $messageNotes
     * @return $this
     */
    public function setMessageNotes($messageNotes)
    {
        $this->messageNotes = $messageNotes;
        return $this;
    }

    /**
     * @return string
     */
    public function getBillCodes()
    {
        return $this->billCodes;
    }

    /**
     * @param string $billCodes
     * @return $this
     */
    public function setBillCodes($billCodes)
    {
        $this->billCodes = $billCodes;
        return $this;
    }

    /**
     * @return string
     */
    public function getTemplateData()
    {
        return $this->templateData;
    }

    /**
     * @param string $templateData
     * @return $this
     */
    public function setTemplateData($templateData)
    {
        $this->templateData = $templateData;
        return $this;
    }

    /**
     * @return string
     */
    public function getHtml()
    {
        return $this->templateData['html'];
    }

    /**
     * @param string $html
     * @return $this
     */
    public function setHtml($html)
    {
        $this->templateData['html'] = $html;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlain()
    {
        return $this->templateData['plain'];
    }

    /**
     * @param string $plain
     * @return $this
     */
    public function setPlain($plain)
    {
        $this->templateData['plain'] = $plain;
        return $this;
    }

    /**
     * @return string
     */
    public function getBinding()
    {
        return $this->binding;
    }

    /**
     * @param string $binding
     * @return $this
     */
    public function setBinding($binding)
    {
        $this->binding = $binding;
        return $this;
    }


}

<?php

namespace Renderforest\Support;

/**
 * Class SupportTicket
 * @package Renderforest\Support
 */
class SupportTicket
{
    const KEY_MAIL_TYPE = 'mailType';
    const KEY_SUBJECT = 'subject';
    const KEY_MESSAGE = 'message';

    const MAIL_TYPE_SALES = 'Sales';
    const MAIL_TYPE_REPORT_A_BUG = 'Report a bug';
    const MAIL_TYPE_EDITING_PROCESS = 'Editing process';
    const MAIL_TYPE_CREATIVE_TEAM = 'Creative team';
    const MAIL_TYPE_OTHER = 'Other';

    const MAIL_TYPES = [
        self::MAIL_TYPE_SALES,
        self::MAIL_TYPE_REPORT_A_BUG,
        self::MAIL_TYPE_EDITING_PROCESS,
        self::MAIL_TYPE_CREATIVE_TEAM,
        self::MAIL_TYPE_OTHER,
    ];

    /** @var string */
    protected $mailType;

    /**
     * @todo make subject not required
     * @var string
     */
    protected $subject;

    /** @var string */
    protected $message;

    /**
     * @return string
     */
    public function getMailType(): string
    {
        return $this->mailType;
    }

    /**
     * @param string $mailType
     * @return SupportTicket
     * @throws \Exception
     */
    public function setMailType(string $mailType): SupportTicket
    {
        if (false === in_array($mailType, self::MAIL_TYPES)) {
            throw new \Exception(
                sprintf(
                    'Invalid mail type `%s`, should be one of [%s]',
                    $mailType,
                    implode(', ', self::MAIL_TYPES)
                )
            );
        }

        $this->mailType = $mailType;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     * @return SupportTicket
     */
    public function setSubject(string $subject): SupportTicket
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return SupportTicket
     */
    public function setMessage(string $message): SupportTicket
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [
            self::KEY_MAIL_TYPE => $this->getMailType(),
            self::KEY_SUBJECT => $this->getSubject(),
        ];

        if (false === is_null($this->getMessage())) {
            $arrayCopy[self::KEY_MESSAGE] = $this->getMessage();
        }

        return $arrayCopy;
    }

    /**
     * @return string
     */
    public function getJson(): string
    {
        $arrayCopy = $this->getArrayCopy();

        $json = \GuzzleHttp\json_encode($arrayCopy);

        return $json;
    }
}

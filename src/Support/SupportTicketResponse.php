<?php

namespace Renderforest\Support;

use Renderforest\Base\EntityBase;

/**
 * Class SupportTicketResponse
 * @package Renderforest\Support
 */
class SupportTicketResponse extends EntityBase
{
    /**
     *  Example JSON
     *  {
     *      "ticketId": 12614,
     *      "messageId": "<ef06ec88-38a9-237c-7f71-24555bb800de@renderforest.com>"
     *  }
     */

    const KEY_TICKET_ID = 'ticketId';
    const KEY_MESSAGE_ID = 'messageId';

    const REQUIRED_KEYS = [
        self::KEY_TICKET_ID,
        self::KEY_MESSAGE_ID,
    ];

    /** @var int */
    protected $ticketId;

    /** @var string */
    protected $messageId;

    /**
     * @return int
     */
    public function getTicketId(): int
    {
        return $this->ticketId;
    }

    /**
     * @param int $ticketId
     */
    private function setTicketId(int $ticketId)
    {
        $this->ticketId = $ticketId;
    }

    /**
     * @return string
     */
    public function getMessageId(): string
    {
        return $this->messageId;
    }

    /**
     * @param string $messageId
     */
    private function setMessageId(string $messageId)
    {
        $this->messageId = $messageId;
    }

    /**
     * @param string $supportTicketResponseJson
     */
    public function exchangeJson(string $supportTicketResponseJson)
    {
        $supportTicketResponseDataArray = json_decode($supportTicketResponseJson, true);

        $supportTicketResponseDataArray = $supportTicketResponseDataArray['data'];

        $this->exchangeArray($supportTicketResponseDataArray);
    }

    /**
     * @param array $supportDataArray
     */
    public function exchangeArray(array $supportDataArray)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $supportDataArray)) {
                // @todo throw exception if required key is missing from data
            }
        }

        $supportTickedId = $supportDataArray[self::KEY_TICKET_ID];
        $supportMessageId = $supportDataArray[self::KEY_MESSAGE_ID];

        $this->setMessageId($supportMessageId);
        $this->setTicketId($supportTickedId);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            self::KEY_TICKET_ID => $this->getTicketId(),
            self::KEY_MESSAGE_ID => $this->getMessageId(),
        ];
    }
}

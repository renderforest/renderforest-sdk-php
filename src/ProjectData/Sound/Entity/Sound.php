<?php

namespace Renderforest\ProjectData\Sound\Entity;

use Renderforest\Base\EntityBase;

/**
 * Class Sound
 * @package Renderforest\ProjectData\Sound\Entity
 */
class Sound extends EntityBase
{
    /**
     * Example JSON
     *  {
     *      "id": 646692,
     *      "duration": 12,
     *      "fileSize": 198658,
     *      "path": "https://example.com/user_1469277/ba63c175-3bdc-4e47-a357-7fb7d08f508b.mp3",
     *      "title": "sound sample.mp3",
     *      "userId": 1469277,
     *      "voiceOver": false
     *  }
     */

    const KEY_ID = 'id';
    const KEY_DURATION = 'duration';
    const KEY_FILE_SIZE = 'fileSize';
    const KEY_PATH = 'path';
    const KEY_TITLE = 'title';
    const KEY_USER_ID = 'userId';
    const KEY_VOICE_OVER = 'voiceOver';

    /** @var int */
    protected $id;

    /** @var int */
    protected $duration;

    /** @var int */
    protected $fileSize;

    /** @var string */
    protected $path;

    /** @var string */
    protected $title;

    /** @var int */
    protected $userId;

    /** @var bool */
    protected $voiceOver;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    private function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     */
    private function setDuration(int $duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return int
     */
    public function getFileSize(): int
    {
        return $this->fileSize;
    }

    /**
     * @param int $fileSize
     */
    private function setFileSize(int $fileSize)
    {
        $this->fileSize = $fileSize;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    private function setPath(string $path)
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    private function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    private function setUserId(int $userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return bool
     */
    public function isVoiceOver(): bool
    {
        return $this->voiceOver;
    }

    /**
     * @param bool $voiceOver
     */
    private function setVoiceOver(bool $voiceOver)
    {
        $this->voiceOver = $voiceOver;
    }

    /**
     * @param array $soundArrayData
     */
    public function exchangeArray(array $soundArrayData)
    {
        if (false === array_key_exists(self::KEY_ID, $soundArrayData)) {
            // throw exception
        }

        if (false === array_key_exists(self::KEY_DURATION, $soundArrayData)) {
            // throw exception
        }

        if (false === array_key_exists(self::KEY_FILE_SIZE, $soundArrayData)) {
            // throw exception
        }

        if (false === array_key_exists(self::KEY_PATH, $soundArrayData)) {
            // throw exception
        }

        if (false === array_key_exists(self::KEY_TITLE, $soundArrayData)) {
            // throw exception
        }

        if (false === array_key_exists(self::KEY_USER_ID, $soundArrayData)) {
            // throw exception
        }

        if (false === array_key_exists(self::KEY_VOICE_OVER, $soundArrayData)) {
            // throw exception
        }

        $soundId = $soundArrayData[self::KEY_ID];
        $soundDuration = $soundArrayData[self::KEY_DURATION];
        $soundFileSize = $soundArrayData[self::KEY_FILE_SIZE];
        $soundPath = $soundArrayData[self::KEY_PATH];
        $soundTitle = $soundArrayData[self::KEY_TITLE];
        $soundUserId = $soundArrayData[self::KEY_USER_ID];
        $soundVoiceOver = $soundArrayData[self::KEY_VOICE_OVER];

        $this->setId($soundId);
        $this->setDuration($soundDuration);
        $this->setFileSize($soundFileSize);
        $this->setPath($soundPath);
        $this->setTitle($soundTitle);
        $this->setUserId($soundUserId);
        $this->setVoiceOver($soundVoiceOver);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            self::KEY_ID => $this->getId(),
            self::KEY_DURATION => $this->getDuration(),
            self::KEY_FILE_SIZE => $this->getFileSize(),
            self::KEY_PATH => $this->getPath(),
            self::KEY_TITLE => $this->getTitle(),
            self::KEY_USER_ID => $this->getUserId(),
            self::KEY_VOICE_OVER => $this->isVoiceOver(),
        ];
    }
}

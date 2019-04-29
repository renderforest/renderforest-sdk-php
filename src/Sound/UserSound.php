<?php

namespace Renderforest\Sound;

use Renderforest\Base\EntityBase;

/**
 * Class UserSound
 * @package Renderforest\Sound
 */
class UserSound extends EntityBase
{
    /**
     *  Example JSON
     *  {
     *      "id": 1990547,
     *      "duration": 208,
     *      "fileSize": 4686485,
     *      "path": "https:\/\/usersounds.rfstat.com\/user_2608853\/d1d4b898-39b5-4e79-b317-baff8a0e67d4.mp3",
     *      "title": "kanye_west_ft._jamie_foxx_-_gold_digger_radio_edit_(zaycev.net).mp3",
     *      "userId": 2608853,
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

    const REQUIRED_KEYS = [
        self::KEY_ID,
        self::KEY_DURATION,
        self::KEY_FILE_SIZE,
        self::KEY_PATH,
        self::KEY_TITLE,
        self::KEY_USER_ID,
        self::KEY_VOICE_OVER,
    ];

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
     * @param array $userSoundArrayData
     */
    public function exchangeArray(array $userSoundArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $userSoundArrayData)) {
                // throw exception
            }
        }

        $soundId = $userSoundArrayData[self::KEY_ID];
        $soundDuration = $userSoundArrayData[self::KEY_DURATION];
        $soundFileSize = $userSoundArrayData[self::KEY_FILE_SIZE];
        $soundPath = $userSoundArrayData[self::KEY_PATH];
        $soundTitle = $userSoundArrayData[self::KEY_TITLE];
        $soundUserId = $userSoundArrayData[self::KEY_USER_ID];
        $soundVoiceOver = $userSoundArrayData[self::KEY_VOICE_OVER];

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

<?php

namespace Renderforest\Sound;

/**
 * Class UserSound
 * @package Renderforest\Sound
 */
class UserSound extends AbstractSound
{
    /**
     *  Example JSON
     *  {
     *      "id": 1990547,
     *      "duration": 208,
     *      "fileSize": 4686485,
     *      "path": "https://usersounds.rfstat.com/user_2608853/d1d4b898-39b5-4e79-b317-baff8a0e67d4.mp3",
     *      "title": "kanye_west_-_gold_digger_radio_edit.mp3",
     *      "userId": 2608853,
     *      "voiceOver": false
     *  }
     */

    const KEY_FILE_SIZE = 'fileSize';
    const KEY_USER_ID = 'userId';
    const KEY_VOICE_OVER = 'voiceOver';

    const REQUIRED_KEYS = [
        self::KEY_ID,
        self::KEY_FILE_SIZE,
        self::KEY_PATH,
        self::KEY_USER_ID,
    ];

    /** @var int */
    protected $fileSize;

    /** @var int */
    protected $userId;

     /** @var bool */
     protected $voiceOver;

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
     * @param array $sound
     */
    public function set(array $sound)
    {
        $this->setId(1);
        $this->setTitle('1');
        $this->setVoiceOver('1');
        $this->setUserId($sound[self::KEY_USER_ID]);
        $this->setPath($sound[self::KEY_PATH]);
        $this->setDuration($sound[self::KEY_DURATION]);
        $this->setFileSize($sound[self::KEY_FILE_SIZE]);
    }

    /**
     * @param array $userSoundArrayData
     * @throws \Exception
     */
    public function exchangeArray(array $userSoundArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $userSoundArrayData)) {
                throw new \Exception('Missing `' . $requiredKey . '` in user sound array data');
            }
        }

        $soundFileSize = $userSoundArrayData[self::KEY_FILE_SIZE];
        $soundUserId = $userSoundArrayData[self::KEY_USER_ID];
        $soundVoiceOver = $userSoundArrayData[self::KEY_VOICE_OVER];

        $this->setFileSize($soundFileSize);
        $this->setUserId($soundUserId);
        $this->setVoiceOver($soundVoiceOver);

        parent::exchangeArray($userSoundArrayData);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [
            self::KEY_FILE_SIZE => $this->getFileSize(),
            self::KEY_USER_ID => $this->getUserId(),
            self::KEY_VOICE_OVER => $this->isVoiceOver(),
        ];

        $arrayCopy = array_merge($arrayCopy, parent::getArrayCopy());

        return $arrayCopy;
    }
}

<?php

namespace Renderforest\Sound\Collection;

use Renderforest\Base\CollectionBase;
use Renderforest\Sound\Sound;
use Renderforest\Sound\UserSound;

/**
 * Class SoundCollection
 *
 * @package Renderforest\Sound\Collection
 */
class SoundCollection extends CollectionBase
{
    /**
     * @var Sound[]|UserSound[]
     */
    private $sounds;

    /**
     * @var Sound[]|UserSound[]
     */
    private $soundsAssocArray;

    /**
     * SoundCollection constructor.
     */
    public function __construct()
    {
        $this->sounds = [];
        $this->soundsAssocArray = [];
    }

    /**
     * @return Sound[]|UserSound[]
     */
    public function getItems(): array
    {
        return $this->sounds;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->sounds);
    }

    /**
     * @param Sound|UserSound $sound
     * @return SoundCollection
     */
    public function add($sound): SoundCollection
    {
        $this->sounds[] = $sound;
        $this->soundsAssocArray[$sound->getId()] = $sound;

        return $this;
    }

    /**
     * @param string $soundCollectionJson
     */
    public function exchangeJson(string $soundCollectionJson)
    {
        $soundCollectionArrayData = json_decode($soundCollectionJson, true);

        $soundCollectionArrayData = $soundCollectionArrayData['data'];

        $this->exchangeArray($soundCollectionArrayData);
    }

    /**
     * @param array $soundCollectionArrayData
     */
    public function exchangeArray(array $soundCollectionArrayData)
    {
        foreach ($soundCollectionArrayData as $soundArrayData) {
            if (array_key_exists(UserSound::KEY_USER_ID, $soundArrayData)) {
                $userSound = new UserSound();
                $userSound->exchangeArray($soundArrayData);

                $this->add($userSound);
            } else {
                $sound = new Sound();
                $sound->exchangeArray($soundArrayData);

                $this->add($sound);
            }
        }
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [];

        foreach ($this->sounds as $sound) {
            $arrayCopy[] = $sound->getArrayCopy();
        }

        return $arrayCopy;
    }

    /**
     * @param int $soundId
     *
     * @return Sound|UserSound
     */
    public function getSoundById(int $soundId)
    {
        if (false === array_key_exists($soundId, $this->soundsAssocArray)) {
            // throw not found exception
        }

        return $this->soundsAssocArray[$soundId];
    }
}

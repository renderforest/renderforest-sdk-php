<?php

namespace Renderforest\Sound\Collection;

use Renderforest\Base\CollectionBase;
use Renderforest\Sound\AbstractSound;
use Renderforest\Sound\Sound;
use Renderforest\Sound\UserSound;

/**
 * Class SoundCollection
 * @package Renderforest\Sound\Collection
 */
class SoundCollection extends CollectionBase
{
    /**
     * @var AbstractSound[]
     */
    private $sounds;

    /**
     * @var AbstractSound[]
     */
    private $soundsAssocArray;

    /**
     * SoundCollection constructor.
     */
    public function __construct()
    {
        $this->sounds = [];
        $this->soundsAssocArray = [];

        parent::__construct();
    }

    /**
     * @param AbstractSound $sound
     * @return SoundCollection
     */
    public function add(AbstractSound $sound): SoundCollection
    {
        $this->iteratorItems[] = $sound;
        $this->sounds[] = $sound;
        $this->soundsAssocArray[$sound->getId()] = $sound;

        return $this;
    }

    /**
     * @param string $soundCollectionJson
     * @throws \Exception
     */
    public function exchangeJson(string $soundCollectionJson)
    {
        $soundCollectionArrayData = json_decode($soundCollectionJson, true);

        $soundCollectionArrayData = $soundCollectionArrayData['data'];

        $this->exchangeArray($soundCollectionArrayData);
    }

    /**
     * @param array $soundCollectionArrayData
     * @throws \Exception
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
     * @return Sound|UserSound
     * @throws \Exception
     */
    public function getSoundById(int $soundId)
    {
        if (false === array_key_exists($soundId, $this->soundsAssocArray)) {
            throw new \Exception(
                sprintf(
                    'Sound with ID: %d was not found.',
                    $soundId
                )
            );
        }

        return $this->soundsAssocArray[$soundId];
    }
}

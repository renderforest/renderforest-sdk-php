<?php

namespace Renderforest\ProjectData\Sound\Collection;

use Renderforest\ProjectData\Sound\Entity\Sound;
use Zend\Stdlib\ArraySerializableInterface;

/**
 * Class SoundCollection
 * @package Renderforest\Area\Sound\Collection
 */
class SoundCollection implements ArraySerializableInterface
{
    /**
     * @var Sound[]
     */
    private $sounds;

    /**
     * @var Sound[]
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
     * @param Sound $sound
     * @return SoundCollection
     */
    public function add(Sound $sound): SoundCollection
    {
        $this->sounds[] = $sound;
        $this->soundsAssocArray[$sound->getId()] = $sound;

        return $this;
    }

    /**
     * @param array $soundCollectionArrayData
     */
    public function exchangeArray(array $soundCollectionArrayData)
    {
        foreach ($soundCollectionArrayData as $soundArrayData) {
            $sound = new Sound();
            $sound->exchangeArray($soundArrayData);

            $this->add($sound);
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
     * @return Sound
     */
    public function getSoundById(int $soundId): Sound
    {
        if (false === array_key_exists($soundId, $this->soundsAssocArray)) {
            // throw not found exception
        }

        return $this->soundsAssocArray[$soundId];
    }
}

<?php

namespace Renderforest\ProjectData\Sound;

use Renderforest\Sound\AbstractSound;

/**
 * Class ProjectDataSound
 * @package Renderforest\ProjectData\Sound
 */
class ProjectDataSound extends AbstractSound
{
    /**
     *  Example JSON
     *  {
     *      "id": 78,
     *      "lowQuality": "https://static.rfstat.com/mediahosting/file/Sounds/15_Second/693e698b-7773-4780-8603-802453239e38.mp3",
     *      "path": "https://usersounds.rfstat.com/Sounds/15%20Second/Electropiano.mp3",
     *      "title": "Electropiano",
     *      "duration": 15
     *  }
     */

    const KEY_LOW_QUALITY = 'lowQuality';

    const REQUIRED_KEYS = [
        self::KEY_ID,
        self::KEY_DURATION,
        self::KEY_LOW_QUALITY,
        self::KEY_PATH,
        self::KEY_TITLE,
    ];

    /** @var string */
    protected $lowQuality;

    /**
     * @return string
     */
    public function getLowQuality(): string
    {
        return $this->lowQuality;
    }

    /**
     * @param string $lowQuality
     */
    public function setLowQuality(string $lowQuality)
    {
        $this->lowQuality = $lowQuality;
    }

    /**
     * @param array $soundArrayData
     * @throws \Exception
     */
    public function exchangeArray(array $soundArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $soundArrayData)) {
                throw new \Exception('Missing `' . $requiredKey . '` in sound array data');
            }
        }

        $soundLowQuality = $soundArrayData[self::KEY_LOW_QUALITY];
        $this->setLowQuality($soundLowQuality);

        parent::exchangeArray($soundArrayData);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [
            self::KEY_LOW_QUALITY => $this->getLowQuality(),
        ];

        $arrayCopy = array_merge($arrayCopy, parent::getArrayCopy());

        return $arrayCopy;
    }
}

<?php

namespace Renderforest\Sound;

/**
 * Class Sound
 *
 * @package Renderforest\Sound
 */
class Sound extends AbstractSound
{
    /**
     *  Example JSON
     *  {
     *      "id": 1980232,
     *      "duration": 15,
     *      "genre": "cinematic",
     *      "lowQuality": "https://static.rfstat.com/mediahosting/file/Sounds/15_Second/8e42b565-f0cf-42fd-b970-396f1acc00d9.mp3",
     *      "path": "https://static.rfstat.com/mediahosting/file/Sounds/15_Second/6a222c44-fd54-4778-bfef-5c8ae331e773.mp3",
     *      "title": "The infinite space"
     *  }
     */

    const KEY_LOW_QUALITY = 'lowQuality';
    const KEY_GENRE = 'genre';

    const REQUIRED_KEYS = [
        self::KEY_ID,
        self::KEY_DURATION,
        self::KEY_GENRE,
        self::KEY_LOW_QUALITY,
        self::KEY_PATH,
        self::KEY_TITLE,
    ];

    /** @var string */
    protected $lowQuality;

    /** @var string */
    protected $genre;

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
    protected function setLowQuality(string $lowQuality)
    {
        $this->lowQuality = $lowQuality;
    }

    /**
     * @return string
     */
    public function getGenre(): string
    {
        return $this->genre;
    }

    /**
     * @param string $genre
     */
    private function setGenre(string $genre)
    {
        $this->genre = $genre;
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

        $soundGenre = $soundArrayData[self::KEY_GENRE];
        $this->setGenre($soundGenre);

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
            self::KEY_GENRE => $this->getGenre(),
        ];

        $arrayCopy = array_merge($arrayCopy, parent::getArrayCopy());

        return $arrayCopy;
    }
}

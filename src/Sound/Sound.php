<?php

namespace Renderforest\Sound;

use Renderforest\Base\EntityBase;

/**
 * Class Sound
 *
 * @package Renderforest\Sound
 */
class Sound extends EntityBase
{
    /**
     *  Example JSON
     *  {
     *      "id": 1798454,
     *      "duration": 15,
     *      "genre": "funk",
     *      "lowQuality": "https:\/\/static.rfstat.com\/mediahosting\/file\/Sounds\/15_Second\/30203650-d8ba-4ca9-a4f0-087dd641ccb8.mp3",
     *      "path": "https:\/\/static.rfstat.com\/mediahosting\/file\/Sounds\/15_Second\/39168cb1-6d59-4180-ab16-9f9e32981169.mp3",
     *      "title": "May the Fun Be With You"
     *  }
     */

    const KEY_ID = 'id';
    const KEY_DURATION = 'duration';
    const KEY_GENRE = 'genre';
    const KEY_LOW_QUALITY = 'lowQuality';
    const KEY_PATH = 'path';
    const KEY_TITLE = 'title';

    const REQUIRED_KEYS = [
        self::KEY_ID,
        self::KEY_DURATION,
        self::KEY_GENRE,
        self::KEY_LOW_QUALITY,
        self::KEY_PATH,
        self::KEY_TITLE,
    ];

    /** @var int */
    protected $id;

    /** @var int */
    protected $duration;

    /** @var string */
    protected $genre;

    /** @var string */
    protected $path;

    /** @var string */
    protected $lowQuality;

    /** @var string */
    protected $title;

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
    public function getLowQuality(): string
    {
        return $this->lowQuality;
    }

    /**
     * @param string $lowQuality
     */
    private function setLowQuality(string $lowQuality)
    {
        $this->lowQuality = $lowQuality;
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
     * @param array $soundArrayData
     */
    public function exchangeArray(array $soundArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $soundArrayData)) {
                // throw exception
            }
        }

        $soundId = $soundArrayData[self::KEY_ID];
        $soundDuration = $soundArrayData[self::KEY_DURATION];
        $soundGenre = $soundArrayData[self::KEY_GENRE];
        $soundPath = $soundArrayData[self::KEY_PATH];
        $soundLowQuality = $soundArrayData[self::KEY_LOW_QUALITY];
        $soundTitle = $soundArrayData[self::KEY_TITLE];

        $this->setId($soundId);
        $this->setDuration($soundDuration);
        $this->setGenre($soundGenre);
        $this->setPath($soundPath);
        $this->setLowQuality($soundLowQuality);
        $this->setTitle($soundTitle);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            self::KEY_ID => $this->getId(),
            self::KEY_DURATION => $this->getDuration(),
            self::KEY_GENRE => $this->getGenre(),
            self::KEY_PATH => $this->getPath(),
            self::KEY_LOW_QUALITY => $this->getLowQuality(),
            self::KEY_TITLE => $this->getTitle(),
        ];
    }
}

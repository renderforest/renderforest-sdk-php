<?php

namespace Renderforest\Sound;

use Renderforest\Base\EntityBase;

/**
 * Class AbstractSound
 * @package Renderforest\Sound
 */
abstract class AbstractSound extends EntityBase
{
    const KEY_ID = 'id';
    const KEY_DURATION = 'duration';
    const KEY_PATH = 'path';
    const KEY_TITLE = 'title';

    /** @var int */
    protected $id;

    /** @var int */
    protected $duration;

    /** @var string */
    protected $path;

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
    protected function setId(int $id)
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
    protected function setDuration(int $duration)
    {
        $this->duration = $duration;
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
    protected function setPath(string $path)
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
    protected function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @param array $soundArrayData
     */
    public function exchangeArray(array $soundArrayData)
    {
        $soundId = $soundArrayData[self::KEY_ID];
        $soundDuration = $soundArrayData[self::KEY_DURATION];
        $soundPath = $soundArrayData[self::KEY_PATH];
        $soundTitle = $soundArrayData[self::KEY_TITLE];

        $this->setId($soundId);
        $this->setDuration($soundDuration);
        $this->setPath($soundPath);
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
            self::KEY_PATH => $this->getPath(),
            self::KEY_TITLE => $this->getTitle(),
        ];
    }
}

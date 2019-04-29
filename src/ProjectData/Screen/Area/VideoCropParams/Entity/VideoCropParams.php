<?php

namespace Renderforest\ProjectData\Screen\Area\VideoCropParams\Entity;

use Renderforest\Base\EntityBase;

/**
 * Class VideoCropParams
 *
 * @package Renderforest\ProjectData\Screen\Area\VideoCropParams\Entity
 */
class VideoCropParams extends EntityBase
{
    const KEY_DURATION = 'duration';
    const KEY_TRIMS = 'trims';
    const KEY_MIME = 'mime';
    const KEY_THUMBNAIL = 'thumbnail';
    const KEY_THUMBNAIL_VIDEO = 'thumbnailVideo';
    const KEY_VOLUME = 'volume';

    const REQUIRED_KEYS = [
        self::KEY_DURATION,
        self::KEY_TRIMS,
        self::KEY_MIME,
        self::KEY_THUMBNAIL,
        self::KEY_THUMBNAIL_VIDEO,
        self::KEY_VOLUME,
    ];

    /** @var int */
    protected $duration;

    /** @var int[] */
    protected $trims;

    /** @var string */
    protected $mime;

    /** @var string */
    protected $thumbnail;

    /** @var string */
    protected $thumbnailVideo;

    /** @var array */
    protected $volume;

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
    public function setDuration(int $duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return int[]
     */
    public function getTrims(): array
    {
        return $this->trims;
    }

    /**
     * @param int[] $trims
     */
    public function setTrims(array $trims)
    {
        $this->trims = $trims;
    }

    /**
     * @return string
     */
    public function getMime(): string
    {
        return $this->mime;
    }

    /**
     * @param string $mime
     */
    public function setMime(string $mime)
    {
        $this->mime = $mime;
    }

    /**
     * @return string
     */
    public function getThumbnail(): string
    {
        return $this->thumbnail;
    }

    /**
     * @param string $thumbnail
     */
    public function setThumbnail(string $thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @return string
     */
    public function getThumbnailVideo(): string
    {
        return $this->thumbnailVideo;
    }

    /**
     * @param string $thumbnailVideo
     */
    public function setThumbnailVideo(string $thumbnailVideo)
    {
        $this->thumbnailVideo = $thumbnailVideo;
    }

    /**
     * @return array
     */
    public function getVolume(): array
    {
        return $this->volume;
    }

    /**
     * @param array $volume
     */
    public function setVolume(array $volume)
    {
        $this->volume = $volume;
    }

    /**
     * @param array $videoCropParamArrayData
     */
    public function exchangeArray(array $videoCropParamArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $videoCropParamArrayData)) {
                // throw exception
            }
        }

        $this->setDuration($videoCropParamArrayData[self::KEY_DURATION]);
        $this->setTrims($videoCropParamArrayData[self::KEY_TRIMS]);
        $this->setMime($videoCropParamArrayData[self::KEY_MIME]);
        $this->setThumbnail($videoCropParamArrayData[self::KEY_THUMBNAIL]);
        $this->setThumbnailVideo($videoCropParamArrayData[self::KEY_THUMBNAIL_VIDEO]);
        $this->setVolume($videoCropParamArrayData[self::KEY_VOLUME]);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            self::KEY_DURATION => $this->getDuration(),
            self::KEY_TRIMS => $this->getTrims(),
            self::KEY_MIME => $this->getMime(),
            self::KEY_THUMBNAIL => $this->getThumbnail(),
            self::KEY_THUMBNAIL_VIDEO => $this->getThumbnail(),
            self::KEY_VOLUME => $this->getThumbnailVideo(),
        ];
    }
}

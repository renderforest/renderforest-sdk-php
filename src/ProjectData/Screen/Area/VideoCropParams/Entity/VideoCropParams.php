<?php

namespace Renderforest\ProjectData\Screen\Area\VideoCropParams\Entity;

use Renderforest\Base\EntityBase;

/**
 * Class VideoCropParams
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

    /** @var VideoCropParamsVolume */
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
     * @return VideoCropParams
     */
    public function setDuration(int $duration): VideoCropParams
    {
        $this->duration = $duration;

        return $this;
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
     * @return VideoCropParams
     */
    public function setTrims(array $trims): VideoCropParams
    {
        $this->trims = $trims;

        return $this;
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
     * @return VideoCropParams
     */
    public function setMime(string $mime): VideoCropParams
    {
        $this->mime = $mime;

        return $this;
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
     * @return VideoCropParams
     */
    public function setThumbnail(string $thumbnail): VideoCropParams
    {
        $this->thumbnail = $thumbnail;

        return $this;
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
     * @return VideoCropParams
     */
    public function setThumbnailVideo(string $thumbnailVideo): VideoCropParams
    {
        $this->thumbnailVideo = $thumbnailVideo;

        return $this;
    }

    /**
     * @return VideoCropParamsVolume
     */
    public function getVolume(): VideoCropParamsVolume
    {
        return $this->volume;
    }

    /**
     * @param VideoCropParamsVolume $volume
     * @return VideoCropParams
     */
    public function setVolume(VideoCropParamsVolume $volume): VideoCropParams
    {
        $this->volume = $volume;

        return $this;
    }

    /**
     * @param array $videoCropParamsArrayData
     * @throws \Exception
     */
    public function exchangeArray(array $videoCropParamsArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $videoCropParamsArrayData)) {
                throw new \Exception('Missing `' . $requiredKey . '` in video crop params array data');
            }
        }

        $this->setDuration($videoCropParamsArrayData[self::KEY_DURATION]);
        $this->setTrims($videoCropParamsArrayData[self::KEY_TRIMS]);
        $this->setMime($videoCropParamsArrayData[self::KEY_MIME]);
        $this->setThumbnail($videoCropParamsArrayData[self::KEY_THUMBNAIL]);
        $this->setThumbnailVideo($videoCropParamsArrayData[self::KEY_THUMBNAIL_VIDEO]);

        $videoCropParamsVolumeArrayData = $videoCropParamsArrayData[self::KEY_VOLUME];
        $videoCropParamsVolume = new VideoCropParamsVolume();
        $videoCropParamsVolume->exchangeArray($videoCropParamsVolumeArrayData);
        $this->setVolume($videoCropParamsVolume);
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
            self::KEY_THUMBNAIL_VIDEO => $this->getThumbnailVideo(),
            self::KEY_VOLUME => $this->getVolume()->getArrayCopy(),
        ];
    }
}

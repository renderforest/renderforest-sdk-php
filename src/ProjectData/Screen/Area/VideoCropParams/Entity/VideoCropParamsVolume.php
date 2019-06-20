<?php

namespace Renderforest\ProjectData\Screen\Area\VideoCropParams\Entity;

use Renderforest\Base\EntityBase;

/**
 * Class VideoCropParamsVolume
 * @package Renderforest\ProjectData\Screen\Area\VideoCropParams\Entity
 */
class VideoCropParamsVolume extends EntityBase
{
    const KEY_MUSIC = 'music';
    const KEY_VIDEO = 'video';

    const REQUIRED_KEYS = [
        self::KEY_MUSIC,
        self::KEY_VIDEO,
    ];

    /** @var int */
    protected $music;

    /** @var int */
    protected $video;

    /**
     * @return int
     */
    public function getMusic(): int
    {
        return $this->music;
    }

    /**
     * @param int $music
     * @return VideoCropParamsVolume
     */
    public function setMusic(int $music): VideoCropParamsVolume
    {
        $this->music = $music;

        return $this;
    }

    /**
     * @return int
     */
    public function getVideo(): int
    {
        return $this->video;
    }

    /**
     * @param int $video
     * @return VideoCropParamsVolume
     */
    public function setVideo(int $video): VideoCropParamsVolume
    {
        $this->video = $video;

        return $this;
    }

    /**
     * @param array $videoCropParamsVolumeArrayData
     * @throws \Exception
     */
    public function exchangeArray(array $videoCropParamsVolumeArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $videoCropParamsVolumeArrayData)) {
                throw new \Exception('Missing `' . $requiredKey . '` in video crop params volume array data');
            }
        }

        $videoCropParamsVolumeMusic = $videoCropParamsVolumeArrayData[self::KEY_MUSIC];
        $videoCropParamsVolumeVideo = $videoCropParamsVolumeArrayData[self::KEY_VIDEO];

        $this->setMusic($videoCropParamsVolumeMusic);
        $this->setVideo($videoCropParamsVolumeVideo);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [
            self::KEY_MUSIC => $this->getMusic(),
            self::KEY_VIDEO => $this->getVideo(),
        ];

        return $arrayCopy;
    }
}

<?php

namespace Renderforest\ProjectData\Screen\Area\Entity;

use Renderforest\ProjectData\Screen\Area\VideoCropParams\Entity\VideoCropParams;

/**
 * Class VideoArea
 * @package Renderforest\ProjectData\Screen\Area\Entity
 */
class VideoArea extends AbstractArea
{
    const KEY_ORIGINAL_HEIGHT = 'originalHeight';
    const KEY_ORIGINAL_WIDTH = 'originalWidth';
    const KEY_MIME_TYPE = 'mimeType';
    const KEY_FILE_NAME = 'fileName';
    const KEY_FILE_TYPE = 'fileType';
    const KEY_VIDEO_CROP_PARAMS = 'videoCropParams';

    const REQUIRED_KEYS = [
        self::KEY_ID,
        self::KEY_CORDS,
        self::KEY_HEIGHT,
        self::KEY_WIDTH,
        self::KEY_ORDER,
        self::KEY_WORD_COUNT,
        self::KEY_TITLE,
        self::KEY_VALUE,
        self::KEY_ORIGINAL_HEIGHT,
        self::KEY_ORIGINAL_WIDTH,
    ];

    /** @var int */
    protected $originalHeight;

    /** @var int */
    protected $originalWidth;

    /** @var string|null */
    protected $mimeType;

    /** @var string|null */
    protected $fileName;

    /** @var string|null */
    protected $fileType;

    /** @var VideoCropParams|null */
    protected $videoCropParams;

    /**
     * VideoArea constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct(self::AREA_TYPE_VIDEO);
    }

    /**
     * @return int
     */
    public function getOriginalHeight(): int
    {
        return $this->originalHeight;
    }

    /**
     * @param int $originalHeight
     * @return VideoArea
     */
    public function setOriginalHeight(int $originalHeight): VideoArea
    {
        $this->originalHeight = $originalHeight;

        return $this;
    }

    /**
     * @return int
     */
    public function getOriginalWidth(): int
    {
        return $this->originalWidth;
    }

    /**
     * @param int $originalWidth
     * @return VideoArea
     */
    public function setOriginalWidth(int $originalWidth): VideoArea
    {
        $this->originalWidth = $originalWidth;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * @param string|null $mimeType
     * @return VideoArea
     */
    public function setMimeType($mimeType): VideoArea
    {
        $this->mimeType = $mimeType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param string|null $fileName
     * @return VideoArea
     */
    public function setFileName($fileName): VideoArea
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFileType()
    {
        return $this->fileType;
    }

    /**
     * @param string|null $fileType
     * @return VideoArea
     */
    public function setFileType($fileType): VideoArea
    {
        $this->fileType = $fileType;

        return $this;
    }

    /**
     * @return VideoCropParams|null
     */
    public function getVideoCropParams()
    {
        return $this->videoCropParams;
    }

    /**
     * @param VideoCropParams|null $videoCropParams
     * @return VideoArea
     */
    public function setVideoCropParams($videoCropParams): VideoArea
    {
        $this->videoCropParams = $videoCropParams;

        return $this;
    }

    /**
     * @param array $videoAreaArrayData
     * @throws \Exception
     */
    public function exchangeArray(array $videoAreaArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $videoAreaArrayData)) {
                throw new \Exception('Missing `' . $requiredKey . '` in video area array data');
            }
        }

        $originalHeight = $videoAreaArrayData[self::KEY_ORIGINAL_HEIGHT];
        $this->setOriginalHeight($originalHeight);

        $originalWidth = $videoAreaArrayData[self::KEY_ORIGINAL_WIDTH];
        $this->setOriginalWidth($originalWidth);

        if (array_key_exists(self::KEY_MIME_TYPE, $videoAreaArrayData)) {
            $mimeType = $videoAreaArrayData[self::KEY_MIME_TYPE];
            $this->setMimeType($mimeType);
        }

        if (array_key_exists(self::KEY_FILE_TYPE, $videoAreaArrayData)) {
            $fileType = $videoAreaArrayData[self::KEY_FILE_TYPE];
            $this->setFileType($fileType);
        }

        if (array_key_exists(self::KEY_FILE_NAME, $videoAreaArrayData)) {
            $fileName = $videoAreaArrayData[self::KEY_FILE_NAME];
            $this->setFileName($fileName);
        }

        if (array_key_exists(self::KEY_VIDEO_CROP_PARAMS, $videoAreaArrayData)) {
            $videoCropParamsData = $videoAreaArrayData[self::KEY_VIDEO_CROP_PARAMS];

            if (false === is_null($videoCropParamsData)) {
                $videoCropParams = new VideoCropParams();
                $videoCropParams->exchangeArray($videoCropParamsData);
                $this->setVideoCropParams($videoCropParams);
            }
        }

        parent::exchangeArray($videoAreaArrayData);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [
            self::KEY_TYPE => self::AREA_TYPE_VIDEO,
            self::KEY_ORIGINAL_HEIGHT => $this->getOriginalHeight(),
            self::KEY_ORIGINAL_WIDTH => $this->getOriginalWidth(),
        ];

        if (false === is_null($this->getMimeType())) {
            $arrayCopy[self::KEY_MIME_TYPE] = $this->getMimeType();
        }

        if (false === is_null($this->getFileType())) {
            $arrayCopy[self::KEY_FILE_TYPE] = $this->getFileType();
        }

        if (false === is_null($this->getFileName())) {
            $arrayCopy[self::KEY_FILE_NAME] = $this->getFileName();
        }

        if (false === is_null($this->getVideoCropParams())) {
            $arrayCopy[self::KEY_VIDEO_CROP_PARAMS] = $this->getVideoCropParams()->getArrayCopy();
        }

        $arrayCopy = array_merge($arrayCopy, parent::getArrayCopy());

        return $arrayCopy;
    }
}

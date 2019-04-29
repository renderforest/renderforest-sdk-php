<?php

namespace Renderforest\ProjectData\Screen\Area\Entity;

use Renderforest\ProjectData\Screen\Area\VideoCropParams\Entity\VideoCropParams;

/**
 * Class VideoArea
 *
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
        self::KEY_MIME_TYPE,
        self::KEY_FILE_NAME,
        self::KEY_FILE_TYPE,
        self::KEY_VIDEO_CROP_PARAMS,
    ];

    /** @var int */
    protected $originalHeight;

    /** @var int */
    protected $originalWidth;

    /** @var string */
    protected $mimeType;

    /** @var string */
    protected $fileName;

    /** @var string */
    protected $fileType;

    /** @var VideoCropParams */
    protected $videoCropParams;

    /**
     * VideoArea constructor.
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
     */
    public function setOriginalHeight(int $originalHeight)
    {
        $this->originalHeight = $originalHeight;
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
     */
    public function setOriginalWidth(int $originalWidth)
    {
        $this->originalWidth = $originalWidth;
    }

    /**
     * @return string
     */
    public function getMimeType(): string
    {
        return $this->mimeType;
    }

    /**
     * @param string $mimeType
     */
    public function setMimeType(string $mimeType)
    {
        $this->mimeType = $mimeType;
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     */
    public function setFileName(string $fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @return string
     */
    public function getFileType(): string
    {
        return $this->fileType;
    }

    /**
     * @param string $fileType
     */
    public function setFileType(string $fileType)
    {
        $this->fileType = $fileType;
    }

    /**
     * @return VideoCropParams
     */
    public function getVideoCropParams(): VideoCropParams
    {
        return $this->videoCropParams;
    }

    /**
     * @param VideoCropParams $videoCropParams
     */
    public function setVideoCropParams(VideoCropParams $videoCropParams)
    {
        $this->videoCropParams = $videoCropParams;
    }

    /**
     * @param array $imageAreaArrayData
     */
    public function exchangeArray(array $imageAreaArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $imageAreaArrayData)) {
                // throw exception
            }
        }

        $areaId = $imageAreaArrayData[self::KEY_ID];
        $areaCoords = $imageAreaArrayData[self::KEY_CORDS];
        $areaHeight = $imageAreaArrayData[self::KEY_HEIGHT];
        $areaWidth = $imageAreaArrayData[self::KEY_WIDTH];
        $areaOrder = $imageAreaArrayData[self::KEY_ORDER];
        $areaWordCount = $imageAreaArrayData[self::KEY_WORD_COUNT];
        $areaTitle = $imageAreaArrayData[self::KEY_TITLE];
        $areaValue = $imageAreaArrayData[self::KEY_VALUE];
        $originalHeight = $imageAreaArrayData[self::KEY_ORIGINAL_HEIGHT];
        $originalWidth = $imageAreaArrayData[self::KEY_ORIGINAL_WIDTH];
        $mimeType = $imageAreaArrayData[self::KEY_MIME_TYPE];
        $fileName = $imageAreaArrayData[self::KEY_FILE_NAME];
        $fileType = $imageAreaArrayData[self::KEY_FILE_TYPE];

        $videoCropParamsData = $imageAreaArrayData[self::KEY_VIDEO_CROP_PARAMS];
        $videoCropParams = new VideoCropParams();
        $videoCropParams->exchangeArray($videoCropParamsData);

        $this->setId($areaId);
        $this->setCords($areaCoords);
        $this->setHeight($areaHeight);
        $this->setWidth($areaWidth);
        $this->setOrder($areaOrder);
        $this->setWordCount($areaWordCount);
        $this->setTitle($areaTitle);
        $this->setValue($areaValue);
        $this->setOriginalHeight($originalHeight);
        $this->setOriginalWidth($originalWidth);
        $this->setMimeType($mimeType);
        $this->setFileName($fileName);
        $this->setFileType($fileType);
        $this->setVideoCropParams($videoCropParams);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            self::KEY_ID => $this->getId(),
            self::KEY_TYPE => self::AREA_TYPE_TEXT,
            self::KEY_CORDS => $this->getCords(),
            self::KEY_HEIGHT => $this->getHeight(),
            self::KEY_WIDTH => $this->getWidth(),
            self::KEY_ORDER => $this->getOrder(),
            self::KEY_WORD_COUNT => $this->getWordCount(),
            self::KEY_TITLE => $this->getTitle(),
            self::KEY_VALUE => $this->getValue(),
            self::KEY_ORIGINAL_HEIGHT => $this->getOriginalHeight(),
            self::KEY_ORIGINAL_WIDTH => $this->getOriginalWidth(),
            self::KEY_MIME_TYPE => $this->getMimeType(),
            self::KEY_FILE_NAME => $this->getFileName(),
            self::KEY_FILE_TYPE => $this->getFileType(),
            self::KEY_VIDEO_CROP_PARAMS => $this->getVideoCropParams()->getArrayCopy(),
        ];
    }
}

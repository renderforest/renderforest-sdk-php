<?php

namespace Renderforest\ProjectData\Screen\Area\Entity;

use Renderforest\ProjectData\Screen\Area\ImageCropParams\Entity\ImageCropParams;

/**
 * Class ImageArea
 * @package Renderforest\ProjectData\Screen\Area\Entity
 */
class ImageArea extends AbstractArea
{
    const KEY_COLOR_FILTERS = 'colorFilters';
    const KEY_ORIGINAL_HEIGHT = 'originalHeight';
    const KEY_ORIGINAL_WIDTH = 'originalWidth';
    const KEY_MIME_TYPE = 'mimeType';
    const KEY_FILE_NAME = 'fileName';
    const KEY_WEBP_PATH = 'webpPath';
    const KEY_FILE_TYPE = 'fileType';
    const KEY_THUMBNAIL_PATH = 'thumbnailPath';
    const KEY_IMAGE_CROP_PARAMS = 'imageCropParams';

    const REQUIRED_KEYS = [
        self::KEY_ID,
        self::KEY_COLOR_FILTERS,
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

    protected $type = self::AREA_TYPE_IMAGE;

    /** @var int */
    protected $originalHeight;

    /** @var int */
    protected $originalWidth;

    /** @var string|null */
    protected $mimeType;

    /** @var string|null */
    protected $fileName;

    /** @var string|null */
    protected $webpPath;

    /** @var string|null */
    protected $fileType;

    /** @var string|null */
    protected $thumbnailPath;

    /** @var ImageCropParams|null */
    protected $imageCropParams;

    /** @var ImageColorFilters|null */
    protected $colorFilters;

    /**
     * ImageArea constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct(self::AREA_TYPE_IMAGE);
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
     * @return ImageArea
     */
    public function setOriginalHeight(int $originalHeight): ImageArea
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
     * @return ImageArea
     */
    public function setOriginalWidth(int $originalWidth): ImageArea
    {
        $this->originalWidth = $originalWidth;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return ImageArea
     */
    public function setType(string $type): ImageArea
    {
        $this->type = $type;

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
     * @return ImageArea
     */
    public function setMimeType($mimeType): ImageArea
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
     * @return ImageArea
     */
    public function setFileName($fileName): ImageArea
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getWebpPath()
    {
        return $this->webpPath;
    }

    /**
     * @param string|null $webpPath
     * @return ImageArea
     */
    public function setWebpPath($webpPath): ImageArea
    {
        $this->webpPath = $webpPath;

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
     * @return ImageArea
     */
    public function setFileType($fileType): ImageArea
    {
        $this->fileType = $fileType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getThumbnailPath()
    {
        return $this->thumbnailPath;
    }

    /**
     * @param string|null $thumbnailPath
     * @return ImageArea
     */
    public function setThumbnailPath($thumbnailPath): ImageArea
    {
        $this->thumbnailPath = $thumbnailPath;

        return $this;
    }

    /**
     * @return ImageCropParams|null
     */
    public function getImageCropParams()
    {
        return $this->imageCropParams;
    }

    /**
     * @param ImageCropParams|null $imageCropParams
     * @return ImageArea
     */
    public function setImageCropParams($imageCropParams): ImageArea
    {
        $this->imageCropParams = $imageCropParams;

        return $this;
    }

    /**
     * @return ImageColorFilters|null
     */
    public function getColorFilters(): ?ImageColorFilters
    {
        return $this->colorFilters;
    }

    /**
     * @param ImageColorFilters|null $colorFilters
     * @return ImageArea
     */
    public function setColorFilters(?ImageColorFilters $colorFilters): ImageArea
    {
        $this->colorFilters = $colorFilters;

        return $this;
    }

    /**
     * @param array $imageAreaArrayData
     * @throws \Exception
     */
    public function exchangeArray(array $imageAreaArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $imageAreaArrayData)) {
                throw new \Exception('Missing `' . $requiredKey . '` in image area array data');
            }
        }

        $originalHeight = $imageAreaArrayData[self::KEY_ORIGINAL_HEIGHT];
        $this->setOriginalHeight($originalHeight);

        $originalWidth = $imageAreaArrayData[self::KEY_ORIGINAL_WIDTH];
        $this->setOriginalWidth($originalWidth);

        if (array_key_exists(self::KEY_MIME_TYPE, $imageAreaArrayData)) {
            $mimeType = $imageAreaArrayData[self::KEY_MIME_TYPE];
            $this->setMimeType($mimeType);
        }

        if (array_key_exists(self::KEY_FILE_TYPE, $imageAreaArrayData)) {
            $fileType = $imageAreaArrayData[self::KEY_FILE_TYPE];
            $this->setFileType($fileType);
        }

        if (array_key_exists(self::KEY_FILE_NAME, $imageAreaArrayData)) {
            $fileName = $imageAreaArrayData[self::KEY_FILE_NAME];
            $this->setFileName($fileName);
        }

        if (array_key_exists(self::KEY_WEBP_PATH, $imageAreaArrayData)) {
            $webpPath = $imageAreaArrayData[self::KEY_WEBP_PATH];
            $this->setWebpPath($webpPath);
        }

        if (array_key_exists(self::KEY_THUMBNAIL_PATH, $imageAreaArrayData)) {
            $thumbnailPath = $imageAreaArrayData[self::KEY_THUMBNAIL_PATH];
            $this->setThumbnailPath($thumbnailPath);
        }

        if (array_key_exists(self::KEY_IMAGE_CROP_PARAMS, $imageAreaArrayData)) {
            $imageCropParamsData = $imageAreaArrayData[self::KEY_IMAGE_CROP_PARAMS];

            if (false === is_null($imageCropParamsData)) {
                $imageCropParams = new ImageCropParams();
                $imageCropParams->exchangeArray($imageCropParamsData);
                $this->setImageCropParams($imageCropParams);
            }
        }

        if (array_key_exists(self::KEY_COLOR_FILTERS, $imageAreaArrayData)) {
            $colorFiltersData = $imageAreaArrayData[self::KEY_COLOR_FILTERS];

            if (false === is_null($colorFiltersData)) {
                $imageColorFilters = new ImageColorFilters();
                $imageColorFilters->exchangeArray($colorFiltersData);
                $this->setColorFilters($imageColorFilters);
            }
        }

        parent::exchangeArray($imageAreaArrayData);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [
            self::KEY_TYPE => self::AREA_TYPE_IMAGE,
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

        if (false === is_null($this->getWebpPath())) {
            $arrayCopy[self::KEY_WEBP_PATH] = $this->getWebpPath();
        }

        if (false === is_null($this->getThumbnailPath())) {
            $arrayCopy[self::KEY_THUMBNAIL_PATH] = $this->getThumbnailPath();
        }

        if (false === is_null($this->getImageCropParams())) {
            $arrayCopy[self::KEY_IMAGE_CROP_PARAMS] = $this->getImageCropParams()->getArrayCopy();
        }

        if (false === is_null($this->getColorFilters())) {
            $arrayCopy[self::KEY_COLOR_FILTERS] = $this->getColorFilters()->getArrayCopy();
        }

        $arrayCopy = array_merge($arrayCopy, parent::getArrayCopy());

        return $arrayCopy;
    }
}

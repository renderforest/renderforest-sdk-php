<?php

namespace Renderforest\ProjectData\Screen\Area\Entity;

use Renderforest\ProjectData\Screen\Area\ImageCropParams\Entity\ImageCropParams;

/**
 * Class ImageArea
 *
 * @package Renderforest\ProjectData\Screen\Area\Entity
 */
class ImageArea extends AbstractArea
{
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
        self::KEY_WEBP_PATH,
        self::KEY_FILE_TYPE,
        self::KEY_THUMBNAIL_PATH,
        self::KEY_IMAGE_CROP_PARAMS,
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

    /**
     * ImageArea constructor.
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
     * @return string|null
     */
    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }

    /**
     * @param string|null $mimeType
     */
    public function setMimeType(?string $mimeType)
    {
        $this->mimeType = $mimeType;
    }

    /**
     * @return string|null
     */
    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    /**
     * @param string|null $fileName
     */
    public function setFileName(?string $fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @return string|null
     */
    public function getWebpPath(): ?string
    {
        return $this->webpPath;
    }

    /**
     * @param string|null $webpPath
     */
    public function setWebpPath(?string $webpPath)
    {
        $this->webpPath = $webpPath;
    }

    /**
     * @return string|null
     */
    public function getFileType(): ?string
    {
        return $this->fileType;
    }

    /**
     * @param string|null $fileType
     */
    public function setFileType(?string $fileType)
    {
        $this->fileType = $fileType;
    }

    /**
     * @return string|null
     */
    public function getThumbnailPath(): ?string
    {
        return $this->thumbnailPath;
    }

    /**
     * @param string|null $thumbnailPath
     */
    public function setThumbnailPath(?string $thumbnailPath)
    {
        $this->thumbnailPath = $thumbnailPath;
    }

    /**
     * @return ImageCropParams|null
     */
    public function getImageCropParams(): ?ImageCropParams
    {
        return $this->imageCropParams;
    }

    /**
     * @param ImageCropParams|null $imageCropParams
     */
    public function setImageCropParams(?ImageCropParams $imageCropParams)
    {
        $this->imageCropParams = $imageCropParams;
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

//        echo '<pre>';
//        var_dump($imageAreaArrayData);
//        echo '</pre>';
//        die;

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

        if (array_key_exists(self::KEY_MIME_TYPE, $imageAreaArrayData)) {
            $mimeType = $imageAreaArrayData[self::KEY_MIME_TYPE];

            if (false === is_null($mimeType)) {
                $this->setMimeType($mimeType);
            }
        }

        if (array_key_exists(self::KEY_FILE_NAME, $imageAreaArrayData)) {
            $fileName = $imageAreaArrayData[self::KEY_FILE_NAME];

            if (false === is_null($fileName)) {
                $this->setFileName($fileName);
            }
        }

        if (array_key_exists(self::KEY_WEBP_PATH, $imageAreaArrayData)) {
            $webpPath = $imageAreaArrayData[self::KEY_WEBP_PATH];

            if (false === is_null($webpPath)) {
                $this->setWebpPath($webpPath);
            }
        }

        if (array_key_exists(self::KEY_FILE_TYPE, $imageAreaArrayData)) {
            $fileType = $imageAreaArrayData[self::KEY_FILE_TYPE];

            if (false === is_null($fileType)) {
                $this->setFileType($fileType);
            }
        }

        if (array_key_exists(self::KEY_THUMBNAIL_PATH, $imageAreaArrayData)) {
            $thumbnailPath = $imageAreaArrayData[self::KEY_THUMBNAIL_PATH];

            if (false === is_null($thumbnailPath)) {
                $this->setThumbnailPath($thumbnailPath);
            }
        }

        if (array_key_exists(self::KEY_IMAGE_CROP_PARAMS, $imageAreaArrayData)) {
            $imageCropParamsData = $imageAreaArrayData[self::KEY_IMAGE_CROP_PARAMS];
            if (false === is_null($imageCropParamsData)) {
                $imageCropParams = new ImageCropParams();
                $imageCropParams->exchangeArray($imageCropParamsData);
                $this->setImageCropParams($imageCropParams);
            }
        }
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [
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
            self::KEY_WEBP_PATH => $this->getWebpPath(),
            self::KEY_THUMBNAIL_PATH => $this->getThumbnailPath(),
        ];

        if (is_null($this->getImageCropParams())) {
            $arrayCopy[self::KEY_IMAGE_CROP_PARAMS] = null;
        } else {
            $arrayCopy[self::KEY_IMAGE_CROP_PARAMS] = $this->getImageCropParams()->getArrayCopy();
        }

        return $arrayCopy;
    }
}

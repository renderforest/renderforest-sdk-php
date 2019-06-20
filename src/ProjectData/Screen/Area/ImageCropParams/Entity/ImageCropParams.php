<?php

namespace Renderforest\ProjectData\Screen\Area\ImageCropParams\Entity;

use Renderforest\Base\EntityBase;

/**
 * Class ImageCropParams
 * @package Renderforest\ProjectData\Screen\Area\ImageCropParams\Entity
 */
class ImageCropParams extends EntityBase
{
    const KEY_TRANSFORM = 'transform';
    const KEY_TOP = 'top';
    const KEY_LEFT = 'left';
    const KEY_WIDTH = 'width';
    const KEY_HEIGHT = 'height';

    const REQUIRED_KEYS = [
        self::KEY_TRANSFORM,
        self::KEY_TOP,
        self::KEY_LEFT,
        self::KEY_WIDTH,
        self::KEY_HEIGHT,
    ];

    /** @var int */
    protected $transform;

    /** @var int */
    protected $top;

    /** @var int */
    protected $left;

    /** @var int */
    protected $width;

    /** @var int */
    protected $height;

    /**
     * @return int
     */
    public function getTransform(): int
    {
        return $this->transform;
    }

    /**
     * @param int $transform
     * @return ImageCropParams
     */
    public function setTransform(int $transform): ImageCropParams
    {
        $this->transform = $transform;

        return $this;
    }

    /**
     * @return int
     */
    public function getTop(): int
    {
        return $this->top;
    }

    /**
     * @param int $top
     * @return ImageCropParams
     */
    public function setTop(int $top): ImageCropParams
    {
        $this->top = $top;

        return $this;
    }

    /**
     * @return int
     */
    public function getLeft(): int
    {
        return $this->left;
    }

    /**
     * @param int $left
     * @return ImageCropParams
     */
    public function setLeft(int $left): ImageCropParams
    {
        $this->left = $left;

        return $this;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return ImageCropParams
     */
    public function setWidth(int $width): ImageCropParams
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return ImageCropParams
     */
    public function setHeight(int $height): ImageCropParams
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @param array $imageCropParamsArrayData
     * @throws \Exception
     */
    public function exchangeArray(array $imageCropParamsArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $imageCropParamsArrayData)) {
                throw new \Exception('Missing `' . $requiredKey . '` in image crop params array data');
            }
        }

        $this->setTransform($imageCropParamsArrayData[self::KEY_TRANSFORM]);
        $this->setTop($imageCropParamsArrayData[self::KEY_TOP]);
        $this->setLeft($imageCropParamsArrayData[self::KEY_LEFT]);
        $this->setWidth($imageCropParamsArrayData[self::KEY_WIDTH]);
        $this->setHeight($imageCropParamsArrayData[self::KEY_HEIGHT]);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            self::KEY_TRANSFORM => $this->getTransform(),
            self::KEY_HEIGHT => $this->getHeight(),
            self::KEY_WIDTH => $this->getWidth(),
            self::KEY_TOP => $this->getTop(),
            self::KEY_LEFT => $this->getLeft(),
        ];
    }
}

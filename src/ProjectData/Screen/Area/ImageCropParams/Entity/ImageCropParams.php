<?php

namespace Renderforest\ProjectData\Screen\Area\ImageCropParams\Entity;

use Renderforest\Base\EntityBase;

/**
 * Class ImageCropParams
 *
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
     */
    public function setTransform(int $transform)
    {
        $this->transform = $transform;
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
     */
    public function setTop(int $top)
    {
        $this->top = $top;
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
     */
    public function setLeft(int $left)
    {
        $this->left = $left;
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
     */
    public function setWidth(int $width)
    {
        $this->width = $width;
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
     */
    public function setHeight(int $height)
    {
        $this->height = $height;
    }

    /**
     * @param array $imageCropParamArrayData
     */
    public function exchangeArray(array $imageCropParamArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $imageCropParamArrayData)) {
                // throw exception
            }
        }

        $this->setTransform($imageCropParamArrayData[self::KEY_TRANSFORM]);
        $this->setTop($imageCropParamArrayData[self::KEY_TOP]);
        $this->setLeft($imageCropParamArrayData[self::KEY_LEFT]);
        $this->setWidth($imageCropParamArrayData[self::KEY_WIDTH]);
        $this->setHeight($imageCropParamArrayData[self::KEY_HEIGHT]);
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

<?php

namespace Renderforest\ProjectData\Screen\Area\Entity;

use Renderforest\Base\EntityBase;

/**
 * Class ImageColorFilters
 * @package Renderforest\ProjectData\Screen\Area\Entity
 */
class ImageColorFilters extends EntityBase
{
    const KEY_BRIGHTNESS = 'brightness';
    const KEY_CONTRAST = 'contrast';
    const KEY_GRAYSCALE = 'grayscale';
    const KEY_HUEROTATE = 'huerotate';
    const KEY_SATURATE = 'saturate';
    const KEY_SEPIA = 'sepia';

    const REQUIRED_KEYS = [
        self::KEY_BRIGHTNESS,
        self::KEY_CONTRAST,
        self::KEY_GRAYSCALE,
        self::KEY_HUEROTATE,
        self::KEY_SATURATE,
        self::KEY_SEPIA,
    ];

    /** @var float */
    protected $brightness;

    /** @var float */
    protected $contrast;

    /** @var float */
    protected $grayscale;

    /** @var float */
    protected $huerotate;

    /** @var float */
    protected $saturate;

    /** @var float */
    protected $sepia;

    /**
     * @return float
     */
    public function getBrightness(): float
    {
        return $this->brightness;
    }

    /**
     * @param float $brightness
     * @return ImageColorFilters
     */
    public function setBrightness(float $brightness): ImageColorFilters
    {
        $this->brightness = $brightness;

        return $this;
    }

    /**
     * @return float
     */
    public function getContrast(): float
    {
        return $this->contrast;
    }

    /**
     * @param float $contrast
     * @return ImageColorFilters
     */
    public function setContrast(float $contrast): ImageColorFilters
    {
        $this->contrast = $contrast;

        return $this;
    }

    /**
     * @return float
     */
    public function getGrayscale(): float
    {
        return $this->grayscale;
    }

    /**
     * @param float $grayscale
     * @return ImageColorFilters
     */
    public function setGrayscale(float $grayscale): ImageColorFilters
    {
        $this->grayscale = $grayscale;

        return $this;
    }

    /**
     * @return float
     */
    public function getHuerotate(): float
    {
        return $this->huerotate;
    }

    /**
     * @param float $huerotate
     * @return ImageColorFilters
     */
    public function setHuerotate(float $huerotate): ImageColorFilters
    {
        $this->huerotate = $huerotate;

        return $this;
    }

    /**
     * @return float
     */
    public function getSaturate(): float
    {
        return $this->saturate;
    }

    /**
     * @param float $saturate
     * @return ImageColorFilters
     */
    public function setSaturate(float $saturate): ImageColorFilters
    {
        $this->saturate = $saturate;

        return $this;
    }

    /**
     * @return float
     */
    public function getSepia(): float
    {
        return $this->sepia;
    }

    /**
     * @param float $sepia
     * @return ImageColorFilters
     */
    public function setSepia(float $sepia): ImageColorFilters
    {
        $this->sepia = $sepia;

        return $this;
    }

    /**
     * @param array $imageColorFiltersArrayData
     * @throws \Exception
     */
    public function exchangeArray(array $imageColorFiltersArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $imageColorFiltersArrayData)) {
                throw new \Exception('Missing `' . $requiredKey . '` in image color filters array data');
            }
        }

        $imageColorFiltersBrightness = $imageColorFiltersArrayData[self::KEY_BRIGHTNESS];
        $imageColorFiltersContrast = $imageColorFiltersArrayData[self::KEY_CONTRAST];
        $imageColorFiltersGrayscale = $imageColorFiltersArrayData[self::KEY_GRAYSCALE];
        $imageColorFiltersHuerotate = $imageColorFiltersArrayData[self::KEY_HUEROTATE];
        $imageColorFiltersSaturate = $imageColorFiltersArrayData[self::KEY_SATURATE];
        $imageColorFiltersSepia = $imageColorFiltersArrayData[self::KEY_SEPIA];

        $this->setBrightness($imageColorFiltersBrightness);
        $this->setContrast($imageColorFiltersContrast);
        $this->setGrayscale($imageColorFiltersGrayscale);
        $this->setHuerotate($imageColorFiltersHuerotate);
        $this->setSaturate($imageColorFiltersSaturate);
        $this->setSepia($imageColorFiltersSepia);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            self::KEY_BRIGHTNESS => $this->getBrightness(),
            self::KEY_CONTRAST => $this->getContrast(),
            self::KEY_GRAYSCALE => $this->getGrayscale(),
            self::KEY_HUEROTATE => $this->getHuerotate(),
            self::KEY_SATURATE => $this->getSaturate(),
            self::KEY_SEPIA => $this->getSepia(),
        ];
    }
}

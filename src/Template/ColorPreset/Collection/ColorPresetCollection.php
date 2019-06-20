<?php

namespace Renderforest\Template\ColorPreset\Collection;

use Renderforest\Base\CollectionBase;
use Renderforest\Template\ColorPreset\ColorPreset;

/**
 * Class ColorPresetCollection
 * @package Renderforest\Template\ColorPreset\Collection
 */
class ColorPresetCollection extends CollectionBase
{
    /**
     * @var ColorPreset[]
     */
    private $colorPresets;

    /**
     * ColorPresetCollection constructor.
     */
    public function __construct()
    {
        $this->colorPresets = [];

        parent::__construct();
    }

    /**
     * @param ColorPreset $colorPreset
     * @return ColorPresetCollection
     */
    private function add(ColorPreset $colorPreset): ColorPresetCollection
    {
        $this->iteratorItems[] = $colorPreset;
        $this->colorPresets[] = $colorPreset;

        return $this;
    }

    /**
     * @param string $colorPresetCollectionJson
     */
    public function exchangeJson(string $colorPresetCollectionJson)
    {
        $colorPresetCollectionArrayData = json_decode($colorPresetCollectionJson, true);

        $colorPresetCollectionArrayData = $colorPresetCollectionArrayData['data'];

        $this->exchangeArray($colorPresetCollectionArrayData);
    }

    /**
     * @param array $colorPresetCollectionArrayData
     */
    public function exchangeArray(array $colorPresetCollectionArrayData)
    {
        foreach ($colorPresetCollectionArrayData as $colorPresetArrayData) {
            $colorPreset = new ColorPreset();
            $colorPreset->exchangeArray($colorPresetArrayData);

            $this->add($colorPreset);
        }
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [];

        foreach ($this->colorPresets as $colorPreset) {
            $arrayCopy[] = $colorPreset->getArrayCopy();
        }

        return $arrayCopy;
    }
}

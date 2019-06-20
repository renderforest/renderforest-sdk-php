<?php

namespace Renderforest\Template\ColorPreset;

use Renderforest\Base\EntityBase;

/**
 * Class ColorPreset
 * @package Renderforest\Template\ColorPreset
 */
class ColorPreset extends EntityBase
{
    /**
     *  Example JSON
     *  [
     *      "#e8fbff",
     *      "#ffffff",
     *      "#34495e",
     *      "#a2c4d0",
     *      "#eaa035",
     *      "#14a98b",
     *      "#cb4624",
     *      "#f6ad44",
     *      "#2d85ab",
     *      "#ac2f51"
     *  ]
     */

    /** @var array */
    protected $colorHexCodes;

    /**
     * @return array
     */
    public function getColorHexCodes(): array
    {
        return $this->colorHexCodes;
    }

    /**
     * @param array $colorPresetArrayData
     */
    public function exchangeArray(array $colorPresetArrayData)
    {
        $this->colorHexCodes = $colorPresetArrayData;
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [];
    }
}

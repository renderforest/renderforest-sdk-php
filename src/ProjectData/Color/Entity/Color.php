<?php

namespace Renderforest\ProjectData\Color\Entity;

use Renderforest\Base\EntityBase;

/**
 * Class Color
 * @package Renderforest\Color\Entity
 */
class Color extends EntityBase
{
    const KEY_HEX_CODE = 'hexCode';

    /** @var string */
    protected $hexCode;

    /**
     * @return string
     */
    public function getHexCode(): string
    {
        return $this->hexCode;
    }

    /**
     * @param string $hexCode
     */
    public function setHexCode(string $hexCode)
    {
        /**
         * @todo validate HEX code
         */

        $this->hexCode = $hexCode;
    }

    /**
     * @param array $colorArrayData
     */
    public function exchangeArray(array $colorArrayData)
    {
        if (false === array_key_exists(self::KEY_HEX_CODE, $colorArrayData)) {
            // throw exception
        }

        $colorHexCode = $colorArrayData[self::KEY_HEX_CODE];

        $this->setHexCode($colorHexCode);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            self::KEY_HEX_CODE => $this->getHexCode(),
        ];
    }
}

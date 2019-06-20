<?php

namespace Renderforest\Template\GenericData;

use Renderforest\Base\EntityBase;

/**
 * Class GenericData
 * @package Renderforest\Template\GenericData
 */
class GenericData extends EntityBase
{
    /**
     *  Example JSON
     *  {
     *      "image": "https://example.com/media/Screens_2016/3rd_gen_2016/Explainer-Video-Toolkit-3gen/theme_select/Texture-.gif",
     *      "name": "Texture",
     *      "value": "2"
     *  }
     */

    const KEY_IMAGE = 'image';
    const KEY_NAME = 'name';
    const KEY_VALUE = 'value';

    const REQUIRED_KEYS = [
        self::KEY_IMAGE,
        self::KEY_NAME,
        self::KEY_VALUE,
    ];

    /** @var string */
    protected $image;

    /** @var string */
    protected $name;

    /** @var string */
    protected $value;

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    private function setImage(string $image)
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    private function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    private function setValue(string $value)
    {
        $this->value = $value;
    }

    /**
     * @param array $genericDataArrayData
     */
    public function exchangeArray(array $genericDataArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $genericDataArrayData)) {
                // throw exception
            }
        }

        $genericDataImage = $genericDataArrayData[self::KEY_IMAGE];
        $genericDataName = $genericDataArrayData[self::KEY_NAME];
        $genericDataValue = $genericDataArrayData[self::KEY_VALUE];

        $this->setImage($genericDataImage);
        $this->setName($genericDataName);
        $this->setValue($genericDataValue);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            self::KEY_IMAGE => $this->getImage(),
            self::KEY_NAME => $this->getName(),
            self::KEY_VALUE => $this->getValue(),
        ];
    }
}

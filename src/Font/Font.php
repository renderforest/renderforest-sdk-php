<?php

namespace Renderforest\Font;

use Renderforest\Base\EntityBase;

/**
 * Class Font
 * @package Renderforest\Font
 */
class Font extends EntityBase
{
    /**
     *  Example JSON
     *  {
     *      "id":424,
     *      "characterSize":20,
     *      "fontType":0,
     *      "isDefault":false,
     *      "postscriptName":"BreeSerif-Regular",
     *      "name":"BreeSerif-Regular",
     *      "variants":[
     *          "Regular"
     *      ]
     *  }
     */

    const KEY_ID = 'id';
    const KEY_CHARACTER_SIZE = 'characterSize';
    const KEY_POSTSCRIPT_NAME = 'postscriptName';
    const KEY_NAME = 'name';

    const REQUIRED_KEYS = [
        self::KEY_ID,
        self::KEY_CHARACTER_SIZE,
        self::KEY_POSTSCRIPT_NAME,
    ];

    /** @var int */
    protected $id;

    /** @var int */
    protected $characterSize;

    /** @var string */
    protected $postscriptName;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    private function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getCharacterSize(): int
    {
        return $this->characterSize;
    }

    /**
     * @param int $characterSize
     */
    private function setCharacterSize(int $characterSize)
    {
        $this->characterSize = $characterSize;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->postscriptName;
    }

    /**
     * @param string $name
     */
    private function setName(string $name)
    {
        $this->postscriptName = $name;
    }

    /**
     * @param array $fontArrayData
     */
    public function exchangeArray(array $fontArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $fontArrayData)) {
                // throw exception
            }
        }

        $fontId = $fontArrayData[self::KEY_ID];
        $fontCharacterSize = $fontArrayData[self::KEY_CHARACTER_SIZE];
        $fontPostscriptName = $fontArrayData[self::KEY_POSTSCRIPT_NAME];

        $this->setId($fontId);
        $this->setCharacterSize($fontCharacterSize);
        $this->setName($fontPostscriptName);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            self::KEY_ID => $this->getId(),
            self::KEY_CHARACTER_SIZE => $this->getCharacterSize(),
            self::KEY_NAME => $this->getName(),
        ];
    }
}

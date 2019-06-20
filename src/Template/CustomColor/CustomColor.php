<?php

namespace Renderforest\Template\CustomColor;

use Renderforest\Base\EntityBase;

/**
 * Class CustomColor
 * @package Renderforest\Template\CustomColor
 */
class CustomColor extends EntityBase
{
    /**
     *  Example JSON
     *  {
     *      "id": 80,
     *      "hexCode": "F1FBFF",
     *      "index": 0,
     *      "description": "Background Color",
     *      "title": "Explainer Video Toolkit Color 1"
     *  }
     */

    const KEY_ID = 'id';
    const KEY_HEX_CODE = 'hexCode';
    const KEY_INDEX = 'index';
    const KEY_DESCRIPTION = 'description';
    const KEY_TITLE = 'title';

    const REQUIRED_KEYS = [
        self::KEY_ID,
        self::KEY_HEX_CODE,
        self::KEY_INDEX,
        self::KEY_DESCRIPTION,
        self::KEY_TITLE,
    ];

    /** @var int */
    protected $id;

    /** @var string */
    protected $hexCode;

    /** @var int */
    protected $index;

    /** @var string */
    protected $description;

    /** @var string */
    protected $title;

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
     * @return string
     */
    public function getHexCode(): string
    {
        return $this->hexCode;
    }

    /**
     * @param string $hexCode
     */
    private function setHexCode(string $hexCode)
    {
        $this->hexCode = $hexCode;
    }

    /**
     * @return int
     */
    public function getIndex(): int
    {
        return $this->index;
    }

    /**
     * @param int $index
     */
    private function setIndex(int $index)
    {
        $this->index = $index;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    private function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    private function setTitle(string $title)
    {
        $this->title = $title;
    }


    /**
     * @param array $customColorArrayData
     */
    public function exchangeArray(array $customColorArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $customColorArrayData)) {
                // throw exception
            }
        }

        $customColorId = $customColorArrayData[self::KEY_ID];
        $customColorHexCode = $customColorArrayData[self::KEY_HEX_CODE];
        $customColorIndex = $customColorArrayData[self::KEY_INDEX];
        $customColorDescription = $customColorArrayData[self::KEY_DESCRIPTION];
        $customColorTitle = $customColorArrayData[self::KEY_TITLE];

        $this->setId($customColorId);
        $this->setHexCode($customColorHexCode);
        $this->setIndex($customColorIndex);
        $this->setDescription($customColorDescription);
        $this->setTitle($customColorTitle);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            self::KEY_ID => $this->getId(),
            self::KEY_HEX_CODE => $this->getHexCode(),
            self::KEY_INDEX => $this->getIndex(),
            self::KEY_DESCRIPTION => $this->getDescription(),
            self::KEY_TITLE => $this->getTitle(),
        ];
    }
}

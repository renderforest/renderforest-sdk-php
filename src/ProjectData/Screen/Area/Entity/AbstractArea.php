<?php

namespace Renderforest\ProjectData\Screen\Area\Entity;

use Renderforest\Base\EntityBase;

/**
 * Class AbstractArea
 * @package Renderforest\ProjectData\Screen\Area\Entity
 */
abstract class AbstractArea extends EntityBase
{
    const AREA_TYPE_TEXT = 'text';
    const AREA_TYPE_IMAGE = 'image';
    const AREA_TYPE_VIDEO = 'video';

    const AREA_TYPES = [
        self::AREA_TYPE_TEXT,
        self::AREA_TYPE_IMAGE,
        self::AREA_TYPE_VIDEO,
    ];

    const KEY_ID = 'id';
    const KEY_TYPE = 'type';
    const KEY_CORDS = 'cords';
    const KEY_HEIGHT = 'height';
    const KEY_WIDTH = 'width';
    const KEY_ORDER = 'order';
    const KEY_WORD_COUNT = 'wordCount';
    const KEY_TITLE = 'title';
    const KEY_VALUE = 'value';

    /** @var int */
    protected $id;

    /**
     * Area type, should be one of `AREA_TYPES`
     *
     * @var string
     */
    protected $type;

    /** @var int[] */
    protected $cords;

    /** @var int */
    protected $height;

    /** @var int */
    protected $width;

    /** @var int */
    protected $order;

    /** @var string */
    protected $title;

    /** @var string */
    protected $value;

    /** @var int */
    protected $wordCount;

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
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int[]
     */
    public function getCords(): array
    {
        return $this->cords;
    }

    /**
     * @param int[] $cords
     */
    public function setCords(array $cords)
    {
        $this->cords = $cords;
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
     *
     * @return AbstractArea
     */
    public function setHeight(int $height): AbstractArea
    {
        $this->height = $height;

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
     *
     * @return AbstractArea
     */
    public function setWidth(int $width): AbstractArea
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @param int $order
     *
     * @return AbstractArea
     */
    public function setOrder(int $order): AbstractArea
    {
        $this->order = $order;

        return $this;
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
    public function setTitle(string $title)
    {
        $this->title = $title;
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
    public function setValue(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getWordCount(): int
    {
        return $this->wordCount;
    }

    /**
     * @param int $wordCount
     */
    public function setWordCount(int $wordCount)
    {
        $this->wordCount = $wordCount;
    }

    /**
     * AbstractArea constructor.
     * @param string $type
     */
    public function __construct(string $type)
    {
        if (false === in_array($type, self::AREA_TYPES)) {
            // throw invalid argument exception
        }

        $this->type = $type;
    }

    public function exchangeArray(array $abstractAreaArrayData)
    {
        if (false === array_key_exists(self::KEY_ID, $abstractAreaArrayData)) {
            // throw exception
        }

        $areaId = $abstractAreaArrayData[self::KEY_ID];

        $this->setId($areaId);
    }

    public function getArrayCopy()
    {
        return [
            self::KEY_ID => $this->getId(),
            self::KEY_TYPE => $this->getType(),
        ];
    }
}

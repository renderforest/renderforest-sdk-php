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
     * @return $this
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
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
     * @return $this
     */
    private function setCords(array $cords)
    {
        $this->cords = $cords;

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
     * @return $this
     */
    private function setHeight(int $height)
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
     * @return $this
     */
    private function setWidth(int $width)
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
     * @return $this
     */
    private function setOrder(int $order)
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
     * @return $this
     */
    private function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
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
     * @return $this
     */
    public function setValue(string $value)
    {
        $this->value = $value;

        return $this;
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
     * @return $this
     */
    private function setWordCount(int $wordCount)
    {
        $this->wordCount = $wordCount;

        return $this;
    }

    /**
     * AbstractArea constructor.
     * @param string $areaType
     * @throws \Exception
     */
    public function __construct(string $areaType)
    {
        if (false === in_array($areaType, self::AREA_TYPES)) {
            throw new \Exception(
                sprintf(
                    'Invalid area type `%s`, should be one of [%s]',
                    $areaType,
                    implode(', ', self::AREA_TYPES)
                )
            );
        }

        $this->type = $areaType;
    }

    /**
     * @param array $abstractAreaArrayData
     */
    public function exchangeArray(array $abstractAreaArrayData)
    {
        $areaId = $abstractAreaArrayData[self::KEY_ID];
        $areaCoords = $abstractAreaArrayData[self::KEY_CORDS];
        $areaHeight = $abstractAreaArrayData[self::KEY_HEIGHT];
        $areaWidth = $abstractAreaArrayData[self::KEY_WIDTH];
        $areaOrder = $abstractAreaArrayData[self::KEY_ORDER];
        $areaWordCount = $abstractAreaArrayData[self::KEY_WORD_COUNT];
        $areaTitle = $abstractAreaArrayData[self::KEY_TITLE];
        $areaValue = $abstractAreaArrayData[self::KEY_VALUE];

        $this->setId($areaId);
        $this->setCords($areaCoords);
        $this->setHeight($areaHeight);
        $this->setWidth($areaWidth);
        $this->setOrder($areaOrder);
        $this->setWordCount($areaWordCount);
        $this->setTitle($areaTitle);
        $this->setValue($areaValue);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [
            self::KEY_ID => $this->getId(),
            self::KEY_CORDS => $this->getCords(),
            self::KEY_HEIGHT => $this->getHeight(),
            self::KEY_WIDTH => $this->getWidth(),
            self::KEY_ORDER => $this->getOrder(),
            self::KEY_WORD_COUNT => $this->getWordCount(),
            self::KEY_VALUE => $this->getValue(),
        ];

        if (false === is_null($this->getTitle())) {
            $arrayCopy[self::KEY_TITLE] = $this->getTitle();
        }

        return $arrayCopy;
    }
}

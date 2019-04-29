<?php

namespace Renderforest\ProjectData\Screen\Area\Entity;

/**
 * Class TextArea
 * @package Renderforest\ProjectData\Screen\Area\Entity
 */
class TextArea extends AbstractArea
{
    const KEY_REMOVED = 'removed';

    const REQUIRED_KEYS = [
        self::KEY_ID,
        self::KEY_CORDS,
        self::KEY_HEIGHT,
        self::KEY_WIDTH,
        self::KEY_ORDER,
        self::KEY_WORD_COUNT,
        self::KEY_TITLE,
        self::KEY_VALUE,
        self::KEY_REMOVED,
    ];

    /** @var string */
    protected $type = self::AREA_TYPE_TEXT;

    /** @var bool */
    protected $removed;

    /**
     * TextArea constructor.
     */
    public function __construct()
    {
        parent::__construct(self::AREA_TYPE_TEXT);
    }

    /**
     * @return bool
     */
    public function isRemoved(): bool
    {
        return $this->removed;
    }

    /**
     * @param bool $removed
     */
    public function setRemoved(bool $removed)
    {
        $this->removed = $removed;
    }

    /**
     * @param array $textAreaArrayData
     */
    public function exchangeArray(array $textAreaArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $textAreaArrayData)) {
                // throw exception
            }
        }

        $areaId = $textAreaArrayData[self::KEY_ID];
        $areaCoords = $textAreaArrayData[self::KEY_CORDS];
        $areaHeight = $textAreaArrayData[self::KEY_HEIGHT];
        $areaWidth = $textAreaArrayData[self::KEY_WIDTH];
        $areaOrder = $textAreaArrayData[self::KEY_ORDER];
        $areaWordCount = $textAreaArrayData[self::KEY_WORD_COUNT];
        $areaTitle = $textAreaArrayData[self::KEY_TITLE];
        $areaValue = $textAreaArrayData[self::KEY_VALUE];
        $areaRemoved = $textAreaArrayData[self::KEY_REMOVED];

        $this->setId($areaId);
        $this->setCords($areaCoords);
        $this->setHeight($areaHeight);
        $this->setWidth($areaWidth);
        $this->setOrder($areaOrder);
        $this->setWordCount($areaWordCount);
        $this->setTitle($areaTitle);
        $this->setValue($areaValue);
        $this->setRemoved($areaRemoved);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            self::KEY_ID => $this->getId(),
            self::KEY_TYPE => self::AREA_TYPE_TEXT,
            self::KEY_CORDS => $this->getCords(),
            self::KEY_HEIGHT => $this->getHeight(),
            self::KEY_WIDTH => $this->getWidth(),
            self::KEY_ORDER => $this->getOrder(),
            self::KEY_WORD_COUNT => $this->getWordCount(),
            self::KEY_TITLE => $this->getTitle(),
            self::KEY_VALUE => $this->getValue(),
            self::KEY_REMOVED => $this->isRemoved(),
        ];
    }
}

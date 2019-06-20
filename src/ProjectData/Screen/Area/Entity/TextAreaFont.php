<?php

namespace Renderforest\ProjectData\Screen\Area\Entity;

use Renderforest\Base\EntityBase;

/**
 * Class TextAreaFont
 * @package Renderforest\ProjectData\Screen\Area\Entity
 */
class TextAreaFont extends EntityBase
{
    const KEY_SCALE = 'scale';
    const KEY_TYPE = 'type';

    const REQUIRED_KEYS = [
        self::KEY_SCALE,
        self::KEY_TYPE,
    ];

    /** @var int */
    protected $scale;

    /** @var int */
    protected $type;

    /**
     * @return int
     */
    public function getScale(): int
    {
        return $this->scale;
    }

    /**
     * @todo scale should be between 80 and 120, add validation
     *
     * @param int $scale
     * @return TextAreaFont
     */
    public function setScale(int $scale): TextAreaFont
    {
        $this->scale = $scale;

        return $this;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     * @return TextAreaFont
     */
    public function setType(int $type): TextAreaFont
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param array $textAreaFontArrayData
     * @throws \Exception
     */
    public function exchangeArray(array $textAreaFontArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $textAreaFontArrayData)) {
                throw new \Exception('Missing `' . $requiredKey . '` in text area font array data');
            }
        }

        $textAreaFontScale = $textAreaFontArrayData[self::KEY_SCALE];
        $textAreaFontType = $textAreaFontArrayData[self::KEY_TYPE];

        $this->setScale($textAreaFontScale);
        $this->setType($textAreaFontType);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [
            self::KEY_SCALE => $this->getScale(),
            self::KEY_TYPE => $this->getType(),
        ];

        return $arrayCopy;
    }
}

<?php

namespace Renderforest\ProjectData\Screen\Area\Entity;

/**
 * Class TextArea
 * @package Renderforest\ProjectData\Screen\Area\Entity
 */
class TextArea extends AbstractArea
{
    const KEY_REMOVED = 'removed';
    const KEY_FONT = 'font';

    const REQUIRED_KEYS = [
        self::KEY_ID,
        self::KEY_CORDS,
        self::KEY_HEIGHT,
        self::KEY_WIDTH,
        self::KEY_ORDER,
        self::KEY_WORD_COUNT,
        self::KEY_TITLE,
        self::KEY_VALUE,
    ];

    /** @var string */
    protected $type = self::AREA_TYPE_TEXT;

    /** @var int|null */
    protected $originalHeight;

    /** @var int|null */
    protected $originalWidth;

    /** @var bool|null */
    protected $removed;

    /** @var TextAreaFont|null */
    protected $font;

    /**
     * @param int $scale
     * @return TextArea
     * @throws \Exception
     */
    public function setTextScale(int $scale): TextArea
    {
        if ($scale < 80 || $scale > 120) {
            throw new \Exception('The text scale value must be between 80 and 120.');
        }

        if (is_null($this->getFont())) {
            $font = new TextAreaFont();
            // @todo this is strange, if there is no font it is unclear if it's allowed to set scale
            // @todo and because font type is required, setting it 0
            $font->setType(0);

            $this->setFont($font);
        }
        $this->getFont()->setScale($scale);

        return $this;
    }

    /**
     * TextArea constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct(self::AREA_TYPE_TEXT);
    }

    /**
     * @return bool|null
     */
    public function getRemoved()
    {
        return $this->removed;
    }

    /**
     * @param bool|null $removed
     * @return $this
     */
    public function setRemoved($removed)
    {
        $this->removed = $removed;

        return $this;
    }

    /**
     * @return TextAreaFont|null
     */
    public function getFont()
    {
        return $this->font;
    }

    /**
     * @param TextAreaFont|null $font
     * @return TextArea
     */
    private function setFont($font): TextArea
    {
        $this->font = $font;

        return $this;
    }

    /**
     * @return int
     */
    public function getOriginalHeight(): ?int
    {
        return $this->originalHeight;
    }

    /**
     * @param ?int $originalHeight
     * @return TextArea
     */
    public function setOriginalHeight(?int $originalHeight): TextArea
    {
        $this->originalHeight = $originalHeight;

        return $this;
    }

    /**
     * @return int
     */
    public function getOriginalWidth(): ?int
    {
        return $this->originalWidth;
    }

    /**
     * @param ?int $originalWidth
     * @return TextArea
     */
    public function setOriginalWidth(?int $originalWidth): TextArea
    {
        $this->originalWidth = $originalWidth;

        return $this;
    }

    /**
     * @param array $textAreaArrayData
     * @throws \Exception
     */
    public function exchangeArray(array $textAreaArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $textAreaArrayData)) {
                throw new \Exception('Missing `' . $requiredKey . '` in text area array data');
            }
        }

        if (array_key_exists(self::KEY_ORIGINAL_HEIGHT, $textAreaArrayData)) {
            $this->setOriginalHeight($textAreaArrayData[self::KEY_ORIGINAL_HEIGHT]);
        }

        if (array_key_exists(self::KEY_ORIGINAL_WIDTH, $textAreaArrayData)) {
            $this->setOriginalWidth($textAreaArrayData[self::KEY_ORIGINAL_WIDTH]);
        }

        if (array_key_exists(self::KEY_REMOVED, $textAreaArrayData)) {
            $this->setRemoved($textAreaArrayData[self::KEY_REMOVED]);
        }

        if (array_key_exists(self::KEY_FONT, $textAreaArrayData)) {
            $textAreaFontArrayData = $textAreaArrayData[self::KEY_FONT];
            $textAreaFont = new TextAreaFont();
            $textAreaFont->exchangeArray($textAreaFontArrayData);

            $this->setFont($textAreaFont);
        }

        parent::exchangeArray($textAreaArrayData);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [
            self::KEY_TYPE => self::AREA_TYPE_TEXT,
        ];

        if (false === is_null($this->getOriginalHeight())) {
            $arrayCopy[self::KEY_ORIGINAL_HEIGHT] = $this->getOriginalHeight();
        }

        if (false === is_null($this->getOriginalWidth())) {
            $arrayCopy[self::KEY_ORIGINAL_WIDTH] = $this->getOriginalWidth();
        }

        if (false === is_null($this->getRemoved())) {
            $arrayCopy[self::KEY_REMOVED] = $this->getRemoved();
        }

        if (false === is_null($this->getFont())) {
            $arrayCopy[self::KEY_FONT] = $this->getFont()->getArrayCopy();
        }

        $arrayCopy = array_merge($arrayCopy, parent::getArrayCopy());

        return $arrayCopy;
    }
}

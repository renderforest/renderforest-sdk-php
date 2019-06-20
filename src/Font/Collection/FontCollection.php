<?php

namespace Renderforest\Font\Collection;

use Renderforest\Base\CollectionBase;
use Renderforest\Font\Font;

/**
 * Class FontCollection
 * @package Renderforest\Font\Collection
 */
class FontCollection extends CollectionBase
{
    /**
     * @var Font[]
     */
    private $fonts;

    /**
     * @var Font[]
     */
    private $fontsAssocArray;

    /**
     * FontCollection constructor.
     */
    public function __construct()
    {
        $this->fonts = [];
        $this->fontsAssocArray = [];

        parent::__construct();
    }

    /**
     * @param Font $font
     * @return FontCollection
     */
    public function add(Font $font): FontCollection
    {
        $this->iteratorItems[] = $font;
        $this->fonts[] = $font;
        $this->fontsAssocArray[$font->getId()] = $font;

        return $this;
    }

    /**
     * @param string $fontCollectionJson
     */
    public function exchangeJson(string $fontCollectionJson)
    {
        $fontCollectionArrayData = json_decode($fontCollectionJson, true);

        $fontCollectionArrayData = $fontCollectionArrayData['data'];

        $this->exchangeArray($fontCollectionArrayData);
    }

    /**
     * @param array $fontCollectionArrayData
     */
    public function exchangeArray(array $fontCollectionArrayData)
    {
        foreach ($fontCollectionArrayData as $fontArrayData) {
            $font = new Font();
            $font->exchangeArray($fontArrayData);

            $this->add($font);
        }
    }

    /**
     * @return array|void
     * @throws \Exception
     */
    public function getArrayCopy()
    {
        throw new \Exception('Not Implemented');
    }

    /**
     * @param int $fontId
     * @return Font
     * @throws \Exception
     */
    public function getFontById(int $fontId): Font
    {
        if (false === array_key_exists($fontId, $this->fontsAssocArray)) {
            throw new \Exception(
                sprintf(
                    'Font with ID: %d was not found.',
                    $fontId
                )
            );
        }

        return $this->fontsAssocArray[$fontId];
    }
}

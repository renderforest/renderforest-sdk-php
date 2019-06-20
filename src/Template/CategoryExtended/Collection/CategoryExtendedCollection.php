<?php

namespace Renderforest\Template\CategoryExtended\Collection;

use Renderforest\Base\CollectionBase;
use Renderforest\Template\CategoryExtended\CategoryExtended;

/**
 * Class CategoryExtendedCollection
 * @package Renderforest\Template\CategoryExtended\Collection
 */
class CategoryExtendedCollection extends CollectionBase
{
    /**
     * @var CategoryExtended[]
     */
    private $categories;

    /**
     * @var CategoryExtended[]
     */
    private $categoriesAssocArray;

    /**
     * CategoryCollection constructor.
     */
    public function __construct()
    {
        $this->categories = [];
        $this->categoriesAssocArray = [];

        parent::__construct();
    }

    /**
     * @param CategoryExtended $categoryExtended
     * @return CategoryExtendedCollection
     */
    private function add(CategoryExtended $categoryExtended): CategoryExtendedCollection
    {
        $this->iteratorItems[] = $categoryExtended;
        $this->categories[] = $categoryExtended;

        return $this;
    }

    /**
     * @param string $categoryCollectionJson
     */
    public function exchangeJson(string $categoryCollectionJson)
    {
        $categoryCollectionArrayData = json_decode($categoryCollectionJson, true);

        $categoryCollectionArrayData = $categoryCollectionArrayData['data'];

        $this->exchangeArray($categoryCollectionArrayData);
    }

    /**
     * @param array $categoryCollectionArrayData
     */
    public function exchangeArray(array $categoryCollectionArrayData)
    {
        foreach ($categoryCollectionArrayData as $categoryArrayData) {
            $categoryExtended = new CategoryExtended();
            $categoryExtended->exchangeArray($categoryArrayData);

            $this->add($categoryExtended);
        }
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [];

        foreach ($this->categories as $category) {
            $arrayCopy[] = $category->getArrayCopy();
        }

        return $arrayCopy;
    }
}

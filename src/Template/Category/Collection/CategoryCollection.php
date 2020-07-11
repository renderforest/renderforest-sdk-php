<?php

namespace Renderforest\Template\Category\Collection;

use Exception;
use Renderforest\Base\CollectionBase;
use Renderforest\Template\Category\Category;

/**
 * Class CategoryCollection
 * @package Renderforest\Template\Category\Collection
 */
class CategoryCollection extends CollectionBase
{
    /**
     * @var Category[]
     */
    private $categories;

    /**
     * @var Category[]
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
     * @param Category $category
     * @return CategoryCollection
     */
    private function add(Category $category): CategoryCollection
    {
        $this->iteratorItems[] = $category;
        $this->categories[] = $category;
        $this->categoriesAssocArray[$category->getId()] = $category;

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
            $category = new Category();
            $category->exchangeArray($categoryArrayData);

            $this->add($category);
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

    /**
     * @param int $categoryId
     * @return Category
     * @throws Exception
     */
    public function getCategoryById(int $categoryId): Category
    {
        if (false === array_key_exists($categoryId, $this->categoriesAssocArray)) {
            throw new \Exception(
                sprintf(
                    'Category with ID: %d was not found.',
                    $categoryId
                )
            );
        }

        return $this->categoriesAssocArray[$categoryId];
    }
}

<?php

namespace Renderforest\Template\Category\SubCategory\Collection;

use Renderforest\Base\CollectionBase;
use Renderforest\Template\Category\Category;
use Renderforest\Template\Category\SubCategory\SubCategory;

/**
 * Class SubCategoryCollection
 * @package Renderforest\Template\Category\SubCategory\Collection
 */
class SubCategoryCollection extends CollectionBase
{
    /**
     * @var SubCategory[]
     */
    private $subCategories;

    /**
     * @var SubCategory[]
     */
    private $subCategoriesAssocArray;

    /**
     * SubCategoryCollection constructor.
     */
    public function __construct()
    {
        $this->subCategories = [];
        $this->subCategoriesAssocArray = [];

        parent::__construct();
    }

    /**
     * @param Category $subCategory
     * @return SubCategoryCollection
     */
    private function add(Category $subCategory): SubCategoryCollection
    {
        $this->iteratorItems[] = $subCategory;
        $this->subCategories[] = $subCategory;
        $this->subCategoriesAssocArray[$subCategory->getId()] = $subCategory;

        return $this;
    }

    /**
     * @param string $subCategoryCollectionJson
     */
    public function exchangeJson(string $subCategoryCollectionJson)
    {
        $subCategoryCollectionArrayData = json_decode($subCategoryCollectionJson, true);

        $subCategoryCollectionArrayData = $subCategoryCollectionArrayData['data'];

        $this->exchangeArray($subCategoryCollectionArrayData);
    }

    /**
     * @param array $subCategoryCollectionArrayData
     */
    public function exchangeArray(array $subCategoryCollectionArrayData)
    {
        foreach ($subCategoryCollectionArrayData as $subCategoryArrayData) {
            $subCategory = new Category();
            $subCategory->exchangeArray($subCategoryArrayData);

            $this->add($subCategory);
        }
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [];

        foreach ($this->subCategories as $subCategory) {
            $arrayCopy[] = $subCategory->getArrayCopy();
        }

        return $arrayCopy;
    }

    /**
     * @param int $subCategoryId
     * @return SubCategory
     * @throws \Exception
     */
    public function getSubCategoryById(int $subCategoryId): SubCategory
    {
        if (false === array_key_exists($subCategoryId, $this->subCategoriesAssocArray)) {
            throw new \Exception(
                sprintf(
                    'Sub Category with ID: %d was not found.',
                    $subCategoryId
                )
            );
        }

        return $this->subCategoriesAssocArray[$subCategoryId];
    }
}

<?php

namespace Renderforest\Template\Category;

use Renderforest\Base\EntityBase;
use Renderforest\Template\Category\SubCategory\Collection\SubCategoryCollection;

/**
 * Class Category
 * @package Renderforest\Template\Category
 */
class Category extends EntityBase
{
    /**
     *  Example JSON
     *  {
     *      "id": 3,
     *      "title": "Promotional",
     *      "parentId": 1,
     *      "subcategories": [
     *          {
     *              "id": 8,
     *              "title": "Mobile App Promotion",
     *              "parentId": 3
     *          },
     *          {
     *              "id": 47,
     *              "title": "Video Editing",
     *              "parentId": 3
     *          }
     *      ]
     *  }
     */

    const KEY_ID = 'id';
    const KEY_TITLE = 'title';
    const KEY_PARENT_ID = 'parentId';
    const KEY_SUB_CATEGORIES = 'subcategories';

    const REQUIRED_KEYS = [
        self::KEY_ID,
        self::KEY_TITLE,
        self::KEY_PARENT_ID,
        self::KEY_SUB_CATEGORIES,
    ];

    /** @var int */
    protected $id;

    /** @var string */
    protected $title;

    /** @var int */
    protected $parentId;

    /** @var SubCategoryCollection */
    protected $subCategoriesCollection;

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
     * @return int
     */
    public function getParentId(): int
    {
        return $this->parentId;
    }

    /**
     * @param int $parentId
     */
    private function setParentId(int $parentId)
    {
        $this->parentId = $parentId;
    }

    /**
     * @return SubCategoryCollection
     */
    public function getSubCategoriesCollection(): SubCategoryCollection
    {
        return $this->subCategoriesCollection;
    }

    /**
     * @param SubCategoryCollection $subCategoriesCollection
     */
    private function setSubCategoriesCollection(SubCategoryCollection $subCategoriesCollection)
    {
        $this->subCategoriesCollection = $subCategoriesCollection;
    }

    /**
     * @param array $categoryArrayData
     */
    public function exchangeArray(array $categoryArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $categoryArrayData)) {
                // throw exception
            }
        }

        $categoryId = $categoryArrayData[self::KEY_ID];
        $categoryTitle = $categoryArrayData[self::KEY_TITLE];
        $categoryParentId = $categoryArrayData[self::KEY_PARENT_ID];

        $this->setId($categoryId);
        $this->setTitle($categoryTitle);
        $this->setParentId($categoryParentId);

        if (array_key_exists(self::KEY_SUB_CATEGORIES, $categoryArrayData)) {
            $categorySubCategoriesArrayData = $categoryArrayData[self::KEY_SUB_CATEGORIES];

            $subCategoryCollection = new SubCategoryCollection();
            $subCategoryCollection->exchangeArray($categorySubCategoriesArrayData);

            $this->setSubCategoriesCollection($subCategoryCollection);
        }
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [
            self::KEY_ID => $this->getId(),
            self::KEY_TITLE => $this->getTitle(),
            self::KEY_PARENT_ID => $this->getParentId(),
        ];

        if (false === is_null($this > $this->getSubCategoriesCollection())) {
            $arrayCopy[self::KEY_SUB_CATEGORIES] = $this->getSubCategoriesCollection()->getArrayCopy();
        }

        return $arrayCopy;
    }
}

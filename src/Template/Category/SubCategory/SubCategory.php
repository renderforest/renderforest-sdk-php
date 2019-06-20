<?php

namespace Renderforest\Template\Category\SubCategory;

use Renderforest\Base\EntityBase;

/**
 * Class SubCategory
 * @package Renderforest\Template\Category\SubCategory
 */
class SubCategory extends EntityBase
{
    /**
     *  Example JSON
     *  {
     *      "id": 8,
     *      "title": "Mobile App Promotion",
     *      "parentId": 3
     *  }
     */

    const KEY_ID = 'id';
    const KEY_TITLE = 'title';
    const KEY_PARENT_ID = 'parentId';

    const REQUIRED_KEYS = [
        self::KEY_ID,
        self::KEY_TITLE,
        self::KEY_PARENT_ID,
    ];

    /** @var int */
    protected $id;

    /** @var string */
    protected $title;

    /** @var int */
    protected $parentId;

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
     * @param array $subCategoryArrayData
     */
    public function exchangeArray(array $subCategoryArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $subCategoryArrayData)) {
                // throw exception
            }
        }

        $subCategoryId = $subCategoryArrayData[self::KEY_ID];
        $subCategoryTitle = $subCategoryArrayData[self::KEY_TITLE];
        $subCategoryParentId = $subCategoryArrayData[self::KEY_PARENT_ID];

        $this->setId($subCategoryId);
        $this->setTitle($subCategoryTitle);
        $this->setParentId($subCategoryParentId);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            self::KEY_ID => $this->getId(),
            self::KEY_TITLE => $this->getTitle(),
            self::KEY_PARENT_ID => $this->getParentId(),
        ];
    }
}

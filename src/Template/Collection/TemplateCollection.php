<?php

namespace Renderforest\Template\Collection;

use Renderforest\Template\Template;
use Zend\Stdlib\ArraySerializableInterface;

/**
 * Class TemplateCollection
 *
 * @package Renderforest\Template\Collection
 */
class TemplateCollection implements ArraySerializableInterface
{
    /**
     * @var Template[]
     */
    private $templates;

    /**
     * @var Template[]
     */
    private $templatesAssocArray;

    /**
     * TemplateCollection constructor.
     */
    public function __construct()
    {
        $this->templates = [];
        $this->templatesAssocArray = [];
    }

    /**
     * @return Template[]
     */
    public function getItems(): array
    {
        return $this->templates;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->templates);
    }

    /**
     * @param Template $template
     *
     * @return TemplateCollection
     */
    public function add(Template $template): TemplateCollection
    {
        $this->templates[] = $template;
        $this->templatesAssocArray[$template->getId()] = $template;

        return $this;
    }

    /**
     * @param string $templateCollectionJson
     */
    public function exchangeJson(string $templateCollectionJson)
    {
        $templateCollectionArrayData = json_decode($templateCollectionJson, true);

        $templateCollectionArrayData = $templateCollectionArrayData['data'];

        $this->exchangeArray($templateCollectionArrayData);
    }

    /**
     * @param array $templateCollectionArrayData
     */
    public function exchangeArray(array $templateCollectionArrayData)
    {
        foreach ($templateCollectionArrayData as $templateArrayData) {
            $template = new Template();
            $template->exchangeArray($templateArrayData);

            $this->add($template);
        }
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [];

        foreach ($this->templates as $template) {
            $arrayCopy[] = $template->getArrayCopy();
        }

        return $arrayCopy;
    }

    /**
     * @param int $templateId
     *
     * @return Template
     */
    public function getTemplateById(int $templateId): Template
    {
        if (false === array_key_exists($templateId, $this->templatesAssocArray)) {
            // throw not found exception
        }

        return $this->templatesAssocArray[$templateId];
    }
}

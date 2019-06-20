<?php

namespace Renderforest\Template\Collection;

use Renderforest\Base\CollectionBase;
use Renderforest\Template\Template;

/**
 * Class TemplateCollection
 * @package Renderforest\Template\Collection
 */
class TemplateCollection extends CollectionBase
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

        parent::__construct();
    }

    /**
     * @param Template $template
     * @return TemplateCollection
     */
    private function add(Template $template): TemplateCollection
    {
        $this->iteratorItems[] = $template;
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
     * @return Template
     * @throws \Exception
     */
    public function getTemplateById(int $templateId): Template
    {
        if (false === array_key_exists($templateId, $this->templatesAssocArray)) {
            throw new \Exception(
                sprintf(
                    'Template with ID: %d was not found.',
                    $templateId
                )
            );
        }

        return $this->templatesAssocArray[$templateId];
    }
}

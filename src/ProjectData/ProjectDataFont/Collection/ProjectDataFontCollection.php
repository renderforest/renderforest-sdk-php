<?php

namespace Renderforest\ProjectData\ProjectDataFont\Collection;

use Renderforest\Base\CollectionBase;
use Renderforest\ProjectData\ProjectDataFont\ProjectDataFont;
use Renderforest\ProjectData\Screen\Entity\Screen;

/**
 * Class ProjectDataFontCollection
 * @package Renderforest\ProjectData\ProjectDataFont\Collection
 */
class ProjectDataFontCollection extends CollectionBase
{
    /**
     * @var ProjectDataFont[]
     */
    private $fonts;

    /**
     * @var ProjectDataFont[]
     */
    private $fontsAssocArray;

    /**
     * ProjectDataFontCollection constructor.
     */
    public function __construct()
    {
        $this->fonts = [];
        $this->fontsAssocArray = [];

        parent::__construct();
    }

    /**
     * @return ProjectDataFontCollection
     */
    public function reset(): ProjectDataFontCollection
    {
        $this->fonts = [];
        $this->fontsAssocArray = [];
        $this->iteratorItems = [];

        return $this;
    }

    /**
     * @param string $order
     * @param ProjectDataFont $font
     * @return ProjectDataFontCollection
     */
    private function add(string $order, ProjectDataFont $font): ProjectDataFontCollection
    {
        $this->iteratorItems[] = $font;
        $this->fonts[] = $font;
        $this->fontsAssocArray[$order] = $font;

        return $this;
    }

    /**
     * @param array $projectDataFontCollectionArrayData
     * @throws \Exception
     */
    public function exchangeArray(array $projectDataFontCollectionArrayData)
    {
        foreach ($projectDataFontCollectionArrayData as $order => $projectDataFontArrayData) {
            $projectDataFont = new ProjectDataFont();
            $projectDataFont->exchangeArray($projectDataFontArrayData);

            $this->add($order, $projectDataFont);
        }
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [];

        foreach ($this->fontsAssocArray as $order => $font) {
            $arrayCopy[$order] = $font->getArrayCopy();
        }

        return $arrayCopy;
    }

    /**
     * @param ProjectDataFont $font
     * @return ProjectDataFontCollection
     */
    public function setPrimaryFont(ProjectDataFont $font): ProjectDataFontCollection
    {
        $this->iteratorItems[] = $font;
        $this->fonts[] = $font;
        $this->fontsAssocArray['0'] = $font;

        return $this;
    }

    /**
     * @param ProjectDataFont $font
     * @return ProjectDataFontCollection
     */
    public function setSecondaryFont(ProjectDataFont $font): ProjectDataFontCollection
    {
        $this->iteratorItems[] = $font;
        $this->fonts[] = $font;
        $this->fontsAssocArray['1'] = $font;

        return $this;
    }

    /**
     * @return ProjectDataFont
     * @throws \Exception
     */
    public function getPrimaryFont(): ProjectDataFont
    {
        if (false === array_key_exists('0', $this->fontsAssocArray)) {
            throw new \Exception('Primary font was not found.');
        }

        return $this->fontsAssocArray['0'];
    }

    /**
     * @return ProjectDataFont
     * @throws \Exception
     */
    public function getSecondaryFont(): ProjectDataFont
    {
        if (false === array_key_exists('1', $this->fontsAssocArray)) {
            throw new \Exception('Secondary font was not found.');
        }

        return $this->fontsAssocArray['1'];
    }
}

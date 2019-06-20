<?php

namespace Renderforest\Template;

use Renderforest\Base\EntityBase;
use Renderforest\Template\CategoryExtended\Collection\CategoryExtendedCollection;

/**
 * Class TemplateExtended
 * @package Renderforest\Template
 */
class TemplateExtended extends EntityBase
{
    /**
     *  Example JSON
     *  {
     *      "id": 701,
     *      "description": "Get rid of the boring content and inspiration killers. Amaze your audience and create a fascinating video with the help of our super functional Explainer Video Toolkit. More than 400 interactive scenes, including characters, various items, kinetic typography, video and photo holders and more. It's the largest directory of astonishing animations from various fields, breathtaking music library and up to 30 minutes successful project initiative.",
     *      "duration": 0,
     *      "rendCount": 96940,
     *      "thumbnail": "https://example.com/media/Screens_2016/3rd_gen_2016/Explainer-Video-Toolkit-3gen/Screen/tumb400.jpg",
     *      "title": "Explainer Video Toolkit",
     *      "videoUrl": "//player.vimeo.com/video/190349594",
     *      "video": true,
     *  }
     */



    const KEY_ID = 'id';
    const KEY_DESCRIPTION = 'description';
    const KEY_DURATION = 'duration';
    const KEY_REND_COUNT = 'rendCount';
    const KEY_THUMBNAIL = 'thumbnail';
    const KEY_TITLE = 'title';
    const KEY_VIDEO_URL = 'videoUrl';
    const KEY_VIDEO = 'video';
    const KEY_CATEGORIES = 'categories';

    const REQUIRED_KEYS = [
        self::KEY_ID,
        self::KEY_DESCRIPTION,
        self::KEY_DURATION,
        self::KEY_REND_COUNT,
        self::KEY_THUMBNAIL,
        self::KEY_TITLE,
        self::KEY_VIDEO_URL,
        self::KEY_VIDEO,
        self::KEY_CATEGORIES,
    ];

    /** @var int */
    protected $id;

    /** @var string */
    protected $description;

    /** @var int */
    protected $duration;

    /** @var int */
    protected $rendCount;

    /** @var string */
    protected $thumbnail;

    /** @var string */
    protected $title;

    /** @var string */
    protected $videoUrl;

    /** @var bool */
    protected $video;

    /** @var CategoryExtendedCollection */
    protected $categories;

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
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    private function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     */
    private function setDuration(int $duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return int
     */
    public function getRendCount(): int
    {
        return $this->rendCount;
    }

    /**
     * @param int $rendCount
     */
    private function setRendCount(int $rendCount)
    {
        $this->rendCount = $rendCount;
    }

    /**
     * @return string
     */
    public function getThumbnail(): string
    {
        return $this->thumbnail;
    }

    /**
     * @param string $thumbnail
     */
    private function setThumbnail(string $thumbnail)
    {
        $this->thumbnail = $thumbnail;
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
     * @return string
     */
    public function getVideoUrl(): string
    {
        return $this->videoUrl;
    }

    /**
     * @param string $videoUrl
     */
    private function setVideoUrl(string $videoUrl)
    {
        $this->videoUrl = $videoUrl;
    }

    /**
     * @return bool
     */
    public function isVideo(): bool
    {
        return $this->video;
    }

    /**
     * @param bool $video
     */
    private function setVideo(bool $video)
    {
        $this->video = $video;
    }

    /**
     * @return CategoryExtendedCollection
     */
    public function getCategories(): CategoryExtendedCollection
    {
        return $this->categories;
    }

    /**
     * @param CategoryExtendedCollection $categories
     */
    private function setCategories(CategoryExtendedCollection $categories)
    {
        $this->categories = $categories;
    }

    /**
     * @param string $templateJson
     */
    public function exchangeJson(string $templateJson)
    {
        $templateArray = json_decode($templateJson, true);

        $templateArray = $templateArray['data'];

        $this->exchangeArray($templateArray);
    }

    /**
     * @param array $templateArrayData
     */
    public function exchangeArray(array $templateArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $templateArrayData)) {
                // throw exceptions
            }
        }

        $templateId = $templateArrayData[self::KEY_ID];
        $templateDescription = $templateArrayData[self::KEY_DESCRIPTION];
        $templateDuration = $templateArrayData[self::KEY_DURATION];
        $templateRendCount = $templateArrayData[self::KEY_REND_COUNT];
        $templateThumbnail = $templateArrayData[self::KEY_THUMBNAIL];
        $templateTitle = $templateArrayData[self::KEY_TITLE];
        $templateVideo = $templateArrayData[self::KEY_VIDEO];
        $templateVideoUrl = $templateArrayData[self::KEY_VIDEO_URL];

        $this->setId($templateId);
        $this->setDescription($templateDescription);
        $this->setDuration($templateDuration);
        $this->setRendCount($templateRendCount);
        $this->setThumbnail($templateThumbnail);
        $this->setTitle($templateTitle);
        $this->setVideo($templateVideo);
        $this->setVideoUrl($templateVideoUrl);

        $categoriesArrayData = $templateArrayData[self::KEY_CATEGORIES];

        $categoryCollection = new CategoryExtendedCollection();
        $categoryCollection->exchangeArray($categoriesArrayData);

        $this->setCategories($categoryCollection);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            self::KEY_ID => $this->getId(),
            self::KEY_DESCRIPTION => $this->getDescription(),
            self::KEY_DURATION => $this->getDuration(),
            self::KEY_REND_COUNT => $this->getRendCount(),
            self::KEY_THUMBNAIL => $this->getThumbnail(),
            self::KEY_TITLE => $this->getTitle(),
            self::KEY_VIDEO => $this->isVideo(),
            self::KEY_VIDEO_URL => $this->getVideoUrl(),
        ];
    }
}

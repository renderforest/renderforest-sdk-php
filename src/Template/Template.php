<?php

namespace Renderforest\Template;

use Renderforest\Base\EntityBase;

/**
 * Class Template
 * @package Renderforest\Template
 */
class Template extends EntityBase
{
    /**
     *  Example JSON
     *  {
     *      "id": 912,
     *      "description": "Have you ever looked for a template that have enough elements and functionality to deliver your message? Well, welcome to the big family of icons. This is a huge pack of 2000+animated icons in more than 30 different categories. With business, marketing, finance and promotional icons the pack is perfect for advertisement, software, websites, apps, corporate, company projects, personal videos and a lot more. Browse through the well-organized library to build the story you wish. Come away with a unique project today! It’s free!",
     *      "thumbnail": "https://example.com/media/Screens_2017/4_gen_2017/Ultimate-Icon-Animation-Pack/249c8f83-3f4a-4474-ade0-490bb5ca0d5a.jpg",
     *      "title": "Ultimate Icon Animation Pack",
     *      "videoUrl": "//player.vimeo.com/video/248458512",
     *      "video": true
     *  }
     */

    const KEY_ID = 'id';
    const KEY_DESCRIPTION = 'description';
    const KEY_THUMBNAIL = 'thumbnail';
    const KEY_TITLE = 'title';
    const KEY_VIDEO_URL = 'videoUrl';
    const KEY_VIDEO = 'video';

    const REQUIRED_KEYS = [
        self::KEY_ID,
        self::KEY_DESCRIPTION,
        self::KEY_THUMBNAIL,
        self::KEY_TITLE,
        self::KEY_VIDEO_URL,
        self::KEY_VIDEO,
    ];

    /** @var int */
    protected $id;

    /** @var string */
    protected $description;

    /** @var string */
    protected $thumbnail;

    /** @var string */
    protected $title;

    /** @var string */
    protected $videoUrl;

    /** @var bool */
    protected $video;

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
        $templateThumbnail = $templateArrayData[self::KEY_THUMBNAIL];
        $templateTitle = $templateArrayData[self::KEY_TITLE];
        $templateVideo = $templateArrayData[self::KEY_VIDEO];
        $templateVideoUrl = $templateArrayData[self::KEY_VIDEO_URL];

        $this->setId($templateId);
        $this->setDescription($templateDescription);
        $this->setThumbnail($templateThumbnail);
        $this->setTitle($templateTitle);
        $this->setVideo($templateVideo);
        $this->setVideoUrl($templateVideoUrl);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            self::KEY_ID => $this->getId(),
            self::KEY_DESCRIPTION => $this->getDescription(),
            self::KEY_THUMBNAIL => $this->getThumbnail(),
            self::KEY_TITLE => $this->getTitle(),
            self::KEY_VIDEO => $this->isVideo(),
            self::KEY_VIDEO_URL => $this->getVideoUrl(),
        ];
    }
}

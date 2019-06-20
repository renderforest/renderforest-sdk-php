<?php

namespace Renderforest\Template\TemplatePreset;

use Renderforest\Base\EntityBase;

/**
 * Class TemplatePreset
 * @package Renderforest\Template\TemplatePreset
 */
class TemplatePreset extends EntityBase
{
    /**
     *  Example JSON
     *  {
     *      "id": 55,
     *      "templateId": 701,
     *      "projectId": 1518012,
     *      "description": "Get rid of the boring content and inspiration killers. Create your Social media promotion video with one click. Adjust, amend the preset in accordance with your needs and company's profile. ",
     *      "order": 700,
     *      "public": true,
     *      "thumbnail": "https://static.rfstat.com/media/Thumbnails/Presets/2017/explainer-video-toolkit/b85890da-7749-44ed-b109-0f475b143ad7.png",
     *      "title": "Social media promotion video",
     *      "videoUrl": "//player.vimeo.com/video/215435347",
     *      "createdAt": "2017-05-01T18:52:25.475Z",
     *      "updatedAt": "2017-10-09T07:39:00.628Z"
     *  }
     */

    const KEY_ID = 'id';
    const KEY_TEMPLATE_ID = 'templateId';
    const KEY_PROJECT_ID = 'projectId';
    const KEY_DESCRIPTION = 'description';
    const KEY_ORDER = 'order';
    const KEY_PUBLIC = 'public';
    const KEY_THUMBNAIL = 'thumbnail';
    const KEY_TITLE = 'title';
    const KEY_VIDEO_URL = 'videoUrl';
    const KEY_CREATED_AT = 'createdAt';
    const KEY_UPDATED_AT = 'updatedAt';

    const REQUIRED_KEYS = [
        self::KEY_ID,
        self::KEY_TEMPLATE_ID,
        self::KEY_PROJECT_ID,
        self::KEY_DESCRIPTION,
        self::KEY_ORDER,
        self::KEY_PUBLIC,
        self::KEY_THUMBNAIL,
        self::KEY_TITLE,
        self::KEY_VIDEO_URL,
        self::KEY_CREATED_AT,
        self::KEY_UPDATED_AT,
    ];

    /** @var int */
    protected $id;

    /** @var int */
    protected $templateId;

    /** @var int */
    protected $projectId;

    /** @var string */
    protected $description;

    /** @var int */
    protected $order;

    /** @var bool */
    protected $public;

    /** @var string */
    protected $thumbnail;

    /** @var string */
    protected $title;

    /** @var string */
    protected $videoUrl;

    /** @var string */
    protected $createdAt;

    /** @var string */
    protected $updatedAt;

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
     * @return int
     */
    public function getTemplateId(): int
    {
        return $this->templateId;
    }

    /**
     * @param int $templateId
     */
    private function setTemplateId(int $templateId)
    {
        $this->templateId = $templateId;
    }

    /**
     * @return int
     */
    public function getProjectId(): int
    {
        return $this->projectId;
    }

    /**
     * @param int $projectId
     */
    private function setProjectId(int $projectId)
    {
        $this->projectId = $projectId;
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
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @param int $order
     */
    private function setOrder(int $order)
    {
        $this->order = $order;
    }

    /**
     * @return bool
     */
    public function isPublic(): bool
    {
        return $this->public;
    }

    /**
     * @param bool $public
     */
    private function setPublic(bool $public)
    {
        $this->public = $public;
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
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     */
    private function setCreatedAt(string $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    /**
     * @param string $updatedAt
     */
    private function setUpdatedAt(string $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }


    /**
     * @param array $templatePresetArrayData
     */
    public function exchangeArray(array $templatePresetArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $templatePresetArrayData)) {
                // throw exception
            }
        }

        $templatePresetId = $templatePresetArrayData[self::KEY_ID];
        $templatePresetTemplateId = $templatePresetArrayData[self::KEY_TEMPLATE_ID];
        $templatePresetProjectId = $templatePresetArrayData[self::KEY_PROJECT_ID];
        $templatePresetDescription = $templatePresetArrayData[self::KEY_DESCRIPTION];
        $templatePresetOrder = $templatePresetArrayData[self::KEY_ORDER];
        $templatePresetPublic = $templatePresetArrayData[self::KEY_PUBLIC];
        $templatePresetThumbnail = $templatePresetArrayData[self::KEY_THUMBNAIL];
        $templatePresetTitle = $templatePresetArrayData[self::KEY_TITLE];
        $templatePresetVideoUrl = $templatePresetArrayData[self::KEY_VIDEO_URL];
        $templatePresetCreatedAt = $templatePresetArrayData[self::KEY_CREATED_AT];
        $templatePresetUpdatedAt = $templatePresetArrayData[self::KEY_UPDATED_AT];

        $this->setId($templatePresetId);
        $this->setTemplateId($templatePresetTemplateId);
        $this->setProjectId($templatePresetProjectId);
        $this->setDescription($templatePresetDescription);
        $this->setOrder($templatePresetOrder);
        $this->setPublic($templatePresetPublic);
        $this->setThumbnail($templatePresetThumbnail);
        $this->setTitle($templatePresetTitle);
        $this->setVideoUrl($templatePresetVideoUrl);
        $this->setCreatedAt($templatePresetCreatedAt);
        $this->setUpdatedAt($templatePresetUpdatedAt);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            self::KEY_ID => $this->getId(),
            self::KEY_TEMPLATE_ID => $this->getTemplateId(),
            self::KEY_PROJECT_ID => $this->getProjectId(),
            self::KEY_DESCRIPTION => $this->getDescription(),
            self::KEY_ORDER => $this->getOrder(),
            self::KEY_PUBLIC => $this->isPublic(),
            self::KEY_THUMBNAIL => $this->getThumbnail(),
            self::KEY_TITLE => $this->getTitle(),
            self::KEY_VIDEO_URL => $this->getVideoUrl(),
            self::KEY_CREATED_AT => $this->getCreatedAt(),
            self::KEY_UPDATED_AT => $this->getUpdatedAt(),
        ];
    }
}

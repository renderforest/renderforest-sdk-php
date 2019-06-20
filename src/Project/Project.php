<?php

namespace Renderforest\Project;

use Renderforest\Base\ApiEntityBase;
use Renderforest\Project\Rendering\Entity\Rendering;
use Renderforest\Project\RenderQuality\Collection\RenderQualityCollection;

/**
 * Class Project
 * @package Renderforest\Project
 */
class Project extends ApiEntityBase
{
    /**
     *  Example JSON
     *  {
     *      "id": 5000295,
     *      "templateId": 768,
     *      "title": "Flipping Slideshow",
     *      "customTitle": "Aland Island 2016",
     *      "status": "rend",
     *      "createdAt": "2018-02-12T15:56:35.000Z",
     *      "updatedAt": "2018-02-12T16:00:37.000Z",
     *      "privacy": "UNLISTED",
     *      "renderedQualitiesOrder": [],
     *      "renderedQualities": {
     *          "free": null,
     *          "hd360": null,
     *          "hd720": null,
     *          "hd1080": null
     *      },
     *      "templateThumbnail": "https://example.com/media/Screens_2017/4_gen_2017/Flipping_Slideshow_4gen/e6c16f5e-093b-4255-9fd3-19825b8acb48.jpg",
     *      "projectThumbnail": null,
     *      "rendering": {
     *          "renderQueueId": 3995088,
     *          "renderQueueState": "ready",
     *          "renderQueueQuality": 360,
     *          "renderQueueAvgTime": 2
     *      }
     *  }
     */

    const KEY_ID = 'id';
    const KEY_TEMPLATE_ID = 'templateId';
    const KEY_TITLE = 'title';
    const KEY_CUSTOM_TITLE = 'customTitle';
    const KEY_STATUS = 'status';
    const KEY_CREATED_AT = 'createdAt';
    const KEY_UPDATED_AT = 'updatedAt';
    const KEY_PRIVACY = 'privacy';
    const KEY_RENDERED_QUALITIES_ORDER = 'renderedQualitiesOrder';
    const KEY_RENDERED_QUALITIES = 'renderedQualities';
    const KEY_TEMPLATE_THUMBNAIL = 'templateThumbnail';
    const KEY_PROJECT_THUMBNAIL = 'projectThumbnail';
    const KEY_RENDERING = 'rendering';

    const REQUIRED_KEYS = [
        self::KEY_ID,
        self::KEY_TEMPLATE_ID,
        self::KEY_TITLE,
        self::KEY_CUSTOM_TITLE,
        self::KEY_STATUS,
        self::KEY_CREATED_AT,
        self::KEY_UPDATED_AT,
        self::KEY_PRIVACY,
        self::KEY_RENDERED_QUALITIES_ORDER,
        self::KEY_TEMPLATE_THUMBNAIL,
        self::KEY_PROJECT_THUMBNAIL,
    ];

    const PRIVACY_UNLISTED = 'UNLISTED';
    const PRIVACY_PRIVATE = 'PRIVATE';

    const PRIVACY_OPTIONS = [
        self::PRIVACY_UNLISTED,
        self::PRIVACY_PRIVATE,
    ];

    /** @var int */
    protected $id;

    /** @var int */
    protected $templateId;

    /** @var string */
    protected $title;

    /** @var string|null */
    protected $customTitle;

    /** @var string */
    protected $status;

    /** @var string */
    protected $createdAt;

    /** @var string */
    protected $updatedAt;

    /** @var string */
    protected $privacy;

    /** @var string[] */
    protected $renderedQualitiesOrder;

    /** @var RenderQualityCollection */
    protected $renderQualityCollection;

    /** @var string|null */
    protected $templateThumbnail;

    /** @var string|null */
    protected $projectThumbnail;

    /** @var Rendering|null */
    protected $rendering;

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
     * @return string|null
     */
    public function getCustomTitle()
    {
        return $this->customTitle;
    }

    /**
     * @param string|null $customTitle
     */
    public function setCustomTitle($customTitle)
    {
        $this->customTitle = $customTitle;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    private function setStatus(string $status)
    {
        $this->status = $status;
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
     * @return string
     */
    public function getPrivacy(): string
    {
        return $this->privacy;
    }

    /**
     * @param string $privacy
     */
    public function setPrivacy(string $privacy)
    {
        $this->privacy = $privacy;
    }

    /**
     * @return string[]
     */
    public function getRenderedQualitiesOrder(): array
    {
        return $this->renderedQualitiesOrder;
    }

    /**
     * @param string[] $renderedQualitiesOrder
     */
    private function setRenderedQualitiesOrder(array $renderedQualitiesOrder)
    {
        $this->renderedQualitiesOrder = $renderedQualitiesOrder;
    }

    /**
     * @return RenderQualityCollection
     */
    public function getRenderQualityCollection(): RenderQualityCollection
    {
        return $this->renderQualityCollection;
    }

    /**
     * @param RenderQualityCollection $renderQualityCollection
     */
    private function setRenderQualityCollection(RenderQualityCollection $renderQualityCollection)
    {
        $this->renderQualityCollection = $renderQualityCollection;
    }

    /**
     * @return string|null
     */
    public function getTemplateThumbnail()
    {
        return $this->templateThumbnail;
    }

    /**
     * @param string|null $templateThumbnail
     */
    private function setTemplateThumbnail($templateThumbnail)
    {
        $this->templateThumbnail = $templateThumbnail;
    }

    /**
     * @return string|null
     */
    public function getProjectThumbnail()
    {
        return $this->projectThumbnail;
    }

    /**
     * @param string|null $projectThumbnail
     */
    private function setProjectThumbnail($projectThumbnail)
    {
        $this->projectThumbnail = $projectThumbnail;
    }

    /**
     * @return Rendering|null
     */
    public function getRendering()
    {
        return $this->rendering;
    }

    /**
     * @param Rendering|null $rendering
     */
    private function setRendering($rendering)
    {
        $this->rendering = $rendering;
    }

    /**
     * @param string $projectJson
     */
    public function exchangeJson(string $projectJson)
    {
        $projectArrayData = json_decode($projectJson, true);

        $projectArrayData = $projectArrayData['data'];

        $this->exchangeArray($projectArrayData);
    }

    /**
     * @param array $projectArrayData
     */
    public function exchangeArray(array $projectArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $projectArrayData)) {
                // throw exception
            }
        }

        $projectId = $projectArrayData[self::KEY_ID];
        $projectTemplateId = $projectArrayData[self::KEY_TEMPLATE_ID];
        $projectTitle = $projectArrayData[self::KEY_TITLE];
        $projectCustomTitle = $projectArrayData[self::KEY_CUSTOM_TITLE];
        $projectStatus = $projectArrayData[self::KEY_STATUS];
        $projectCreatedAt = $projectArrayData[self::KEY_CREATED_AT];
        $projectUpdatedAt = $projectArrayData[self::KEY_UPDATED_AT];
        $projectPrivacy = $projectArrayData[self::KEY_PRIVACY];
        $projectRenderedQualitiesOrder = $projectArrayData[self::KEY_RENDERED_QUALITIES_ORDER];
        $projectThumbnail = $projectArrayData[self::KEY_PROJECT_THUMBNAIL];

        $this->setId($projectId);
        $this->setTemplateId($projectTemplateId);
        $this->setTitle($projectTitle);
        $this->setCustomTitle($projectCustomTitle);
        $this->setStatus($projectStatus);
        $this->setCreatedAt($projectCreatedAt);
        $this->setUpdatedAt($projectUpdatedAt);
        $this->setPrivacy($projectPrivacy);
        $this->setRenderedQualitiesOrder($projectRenderedQualitiesOrder);
        $this->setProjectThumbnail($projectThumbnail);

        if (array_key_exists(self::KEY_RENDERING, $projectArrayData)) {
            $renderingArrayData = $projectArrayData[self::KEY_RENDERING];

            $rendering = new Rendering();
            $rendering->exchangeArray($renderingArrayData);

            $this->setRendering($rendering);
        }

        if (array_key_exists(self::KEY_RENDERED_QUALITIES, $projectArrayData)) {
            $renderedQualitiesArrayData = $projectArrayData[self::KEY_RENDERED_QUALITIES];

            $renderQualityCollection = new RenderQualityCollection();
            $renderQualityCollection->exchangeArray($renderedQualitiesArrayData);

            $this->setRenderQualityCollection($renderQualityCollection);
        }
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            self::KEY_ID => $this->getId(),
            self::KEY_TEMPLATE_ID => $this->getTemplateId(),
            self::KEY_TITLE => $this->getTitle(),
            self::KEY_CUSTOM_TITLE => $this->getCustomTitle(),
            self::KEY_STATUS => $this->getStatus(),
            self::KEY_CREATED_AT => $this->getCreatedAt(),
            self::KEY_UPDATED_AT => $this->getUpdatedAt(),
            self::KEY_PRIVACY => $this->getPrivacy(),
            self::KEY_RENDERED_QUALITIES_ORDER => $this->getRenderedQualitiesOrder(),
            self::KEY_RENDERED_QUALITIES => $this->renderQualityCollection->getArrayCopy(),
            self::KEY_TEMPLATE_THUMBNAIL => $this->getTemplateThumbnail(),
            self::KEY_PROJECT_THUMBNAIL => $this->getProjectThumbnail(),
            self::KEY_RENDERING => $this->getRendering()->getArrayCopy(),
        ];
    }
}

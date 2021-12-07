<?php

namespace Renderforest\Project\RenderQuality\Entity;

/**
 * Class RenderQuality
 * @package Renderforest\Project\RenderQuality\Entity
 */
class RenderQuality
{
    const RENDER_QUALITY_360 = 360;
    const RENDER_QUALITY_720 = 720;
    const RENDER_QUALITY_1080 = 1080;

    /**
     * Allowed render quality names
     */
    const VALID_RENDER_QUALITY_NAMES = [
        'free',
        'hd360',
        'hd720',
        'hd1080',
        'hd1440',
        'hd2160'
    ];

    /**
     * Render quality name, should be one of `VALID_RENDER_QUALITY_NAMES`
     *
     * @var string
     */
    protected $name;

    /** @var string|null */
    protected $value;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @throws \Exception
     */
    public function setName(string $name)
    {
        if (false === in_array($name, self::VALID_RENDER_QUALITY_NAMES)) {
            throw new \Exception(
                sprintf(
                    'Invalid name `%s`, should be one of [%s]',
                    $name,
                    implode(', ', self::VALID_RENDER_QUALITY_NAMES)
                )
            );
        }

        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string|null $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}

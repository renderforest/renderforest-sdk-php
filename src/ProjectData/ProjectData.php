<?php

namespace Renderforest\ProjectData;

use Renderforest\Base\ApiEntityBase;
use Renderforest\ProjectData\Color\Collection\ColorCollection;
use Renderforest\ProjectData\Screen\Collection\ScreenCollection;
use Renderforest\ProjectData\Sound\Collection\SoundCollection;

/**
 * Class ProjectData
 * @package Renderforest\ProjectData
 */
class ProjectData extends ApiEntityBase
{
    const KEY_TEMPLATE_ID = 'templateId';
    const KEY_CURRENT_SCREEN_ID = 'currentScreenId';
    const KEY_DURATION = 'duration';
    const KEY_FPS = 'fps';
    const KEY_EQUALIZER = 'equalizer';
    const KEY_EXTENDABLE_SCREENS = 'extendableScreens';
    const KEY_IS_LEGO = 'isLego';
    const KEY_MUTE_MUSIC = 'muteMusic';
    const KEY_PROJECT_COLORS = 'projectColors';
    const KEY_PROJECT_VERSION = 'projectVersion';
    const KEY_SCREENS = 'screens';
    const KEY_SOUNDS = 'sounds';
    const KEY_THEME_VARIABLE_NAME = 'themeVariableName';
    const KEY_THEME_VARIABLE_VALUE = 'themeVariableValue';
    const KEY_TEMPLATE_VERSION = 'templateVersion';
    const KEY_TITLE = 'title';
    const KEY_VOICE_SOUND_ID = 'voiceSoundId';
    const KEY_GENERATOR = 'generator';

    /** @var int */
    protected $templateId;

    /** @var int */
    protected $currentScreenId;

    /** @var int */
    protected $duration;

    /** @var int */
    protected $fps;

    /** @var bool */
    protected $equalizer;

    /** @var bool */
    protected $extendableScreens;

    /** @var bool */
    protected $isLego;

    /** @var bool */
    protected $muteMusic;

    /** @var ColorCollection */
    protected $projectColors;

    /** @var string|null */
    protected $projectVersion;

    /** @var ScreenCollection */
    protected $screens;

    /** @var SoundCollection */
    protected $sounds;

    /** @var string|null */
    protected $themeVariableName;

    /** @var string|null */
    protected $themeVariableValue;

    /** @var int|null */
    protected $templateVersion;

    /** @var string */
    protected $title;

    /** @var int|null */
    protected $voiceSoundId;

    /** @var string */
    protected $generator;

    /**
     * ProjectData constructor.
     */
    public function __construct()
    {
        $this->projectColors = new ColorCollection();
        $this->screens = new ScreenCollection();
        $this->sounds = new SoundCollection();
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
    public function setTemplateId(int $templateId)
    {
        $this->templateId = $templateId;
    }

    /**
     * @return int
     */
    public function getCurrentScreenId(): int
    {
        return $this->currentScreenId;
    }

    /**
     * @param int $currentScreenId
     */
    public function setCurrentScreenId(int $currentScreenId)
    {
        $this->currentScreenId = $currentScreenId;
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
    public function setDuration(int $duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return int
     */
    public function getFps(): int
    {
        return $this->fps;
    }

    /**
     * @param int $fps
     */
    public function setFps(int $fps)
    {
        $this->fps = $fps;
    }

    /**
     * @return bool
     */
    public function isEqualizer(): bool
    {
        return $this->equalizer;
    }

    /**
     * @param bool $equalizer
     */
    public function setEqualizer(bool $equalizer)
    {
        $this->equalizer = $equalizer;
    }

    /**
     * @return bool
     */
    public function isExtendableScreens(): bool
    {
        return $this->extendableScreens;
    }

    /**
     * @param bool $extendableScreens
     */
    public function setExtendableScreens(bool $extendableScreens)
    {
        $this->extendableScreens = $extendableScreens;
    }

    /**
     * @return bool
     */
    public function isLego(): bool
    {
        return $this->isLego;
    }

    /**
     * @param bool $isLego
     */
    public function setIsLego(bool $isLego)
    {
        $this->isLego = $isLego;
    }

    /**
     * @return bool
     */
    public function isMuteMusic(): bool
    {
        return $this->muteMusic;
    }

    /**
     * @param bool $muteMusic
     */
    public function setMuteMusic(bool $muteMusic)
    {
        $this->muteMusic = $muteMusic;
    }

    /**
     * @return ColorCollection
     */
    public function getProjectColors(): ColorCollection
    {
        return $this->projectColors;
    }

    /**
     * @param ColorCollection $projectColors
     */
    public function setProjectColors(ColorCollection $projectColors)
    {
        $this->projectColors = $projectColors;
    }

    /**
     * @return string|null
     */
    public function getProjectVersion(): ?string
    {
        return $this->projectVersion;
    }

    /**
     * @param string|null $projectVersion
     */
    public function setProjectVersion(?string $projectVersion)
    {
        $this->projectVersion = $projectVersion;
    }

    /**
     * @return ScreenCollection
     */
    public function getScreens(): ScreenCollection
    {
        return $this->screens;
    }

    /**
     * @param ScreenCollection $screens
     */
    public function setScreens(ScreenCollection $screens)
    {
        $this->screens = $screens;
    }

    /**
     * @return SoundCollection
     */
    public function getSounds(): SoundCollection
    {
        return $this->sounds;
    }

    /**
     * @param SoundCollection $sounds
     */
    public function setSounds(SoundCollection $sounds)
    {
        $this->sounds = $sounds;
    }

    /**
     * @return string|null
     */
    public function getThemeVariableName(): ?string
    {
        return $this->themeVariableName;
    }

    /**
     * @param string|null $themeVariableName
     */
    public function setThemeVariableName(?string $themeVariableName)
    {
        $this->themeVariableName = $themeVariableName;
    }

    /**
     * @return string|null
     */
    public function getThemeVariableValue(): ?string
    {
        return $this->themeVariableValue;
    }

    /**
     * @param string|null $themeVariableValue
     */
    public function setThemeVariableValue(?string $themeVariableValue)
    {
        $this->themeVariableValue = $themeVariableValue;
    }

    /**
     * @return int|null
     */
    public function getTemplateVersion(): ?int
    {
        return $this->templateVersion;
    }

    /**
     * @param int|null $templateVersion
     */
    public function setTemplateVersion(?int $templateVersion)
    {
        $this->templateVersion = $templateVersion;
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
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return int|null
     */
    public function getVoiceSoundId(): ?int
    {
        return $this->voiceSoundId;
    }

    /**
     * @param int|null $voiceSoundId
     */
    public function setVoiceSoundId(?int $voiceSoundId)
    {
        $this->voiceSoundId = $voiceSoundId;
    }

    /**
     * @return string
     */
    public function getGenerator(): string
    {
        return $this->generator;
    }

    /**
     * @param string $generator
     */
    public function setGenerator(string $generator)
    {
        $this->generator = $generator;
    }

    /**
     * @param array $projectDataArrayData
     */
    public function exchangeArray(array $projectDataArrayData)
    {
        if (
            false === array_key_exists(self::KEY_TEMPLATE_ID, $projectDataArrayData)
            ||
            false === array_key_exists(self::KEY_CURRENT_SCREEN_ID, $projectDataArrayData)
            ||
            false === array_key_exists(self::KEY_DURATION, $projectDataArrayData)
            ||
            false === array_key_exists(self::KEY_FPS, $projectDataArrayData)
            ||
            false === array_key_exists(self::KEY_EQUALIZER, $projectDataArrayData)
            ||
            false === array_key_exists(self::KEY_EXTENDABLE_SCREENS, $projectDataArrayData)
            ||
            false === array_key_exists(self::KEY_IS_LEGO, $projectDataArrayData)
            ||
            false === array_key_exists(self::KEY_MUTE_MUSIC, $projectDataArrayData)
        ) {
            // throw exception
        }

        $templateId = $projectDataArrayData[self::KEY_TEMPLATE_ID];
        $currentScreenId = $projectDataArrayData[self::KEY_CURRENT_SCREEN_ID];
        $duration = $projectDataArrayData[self::KEY_DURATION];
        $fps = $projectDataArrayData[self::KEY_FPS];
        $equalizer = $projectDataArrayData[self::KEY_EQUALIZER];
        $extendableScreens = $projectDataArrayData[self::KEY_EXTENDABLE_SCREENS];
        $isLego = $projectDataArrayData[self::KEY_IS_LEGO];
        $muteMusic = $projectDataArrayData[self::KEY_MUTE_MUSIC];

        $this->setTemplateId($templateId);
        $this->setCurrentScreenId($currentScreenId);
        $this->setDuration($duration);
        $this->setFps($fps);
        $this->setEqualizer($equalizer);
        $this->setExtendableScreens($extendableScreens);
        $this->setIsLego($isLego);
        $this->setMuteMusic($muteMusic);

//        if (array_key_exists(self::KEY_PROJECT_COLORS, $projectDataArrayData)) {
//            $projectColorsArrayData = $projectDataArrayData[self::KEY_PROJECT_COLORS];
//
//            $colorCollection = new ColorCollection();
//            $colorCollection->exchangeArray($projectColorsArrayData);
//
//            $this->setProjectColors($colorCollection);
//        }

        if (array_key_exists(self::KEY_SCREENS, $projectDataArrayData)) {
            $screensArrayData = $projectDataArrayData[self::KEY_SCREENS];

            $screenCollection = new ScreenCollection();
            $screenCollection->exchangeArray($screensArrayData);

            $this->setScreens($screenCollection);
        }

        if (array_key_exists(self::KEY_SOUNDS, $projectDataArrayData)) {
            $soundsArrayData = $projectDataArrayData[self::KEY_SOUNDS];

            $soundCollection = new SoundCollection();
            $soundCollection->exchangeArray($soundsArrayData);

            $this->setSounds($soundCollection);
        }

        if (array_key_exists(self::KEY_THEME_VARIABLE_NAME, $projectDataArrayData)) {
            $this->setThemeVariableName($projectDataArrayData[self::KEY_THEME_VARIABLE_NAME]);
        }

        if (array_key_exists(self::KEY_THEME_VARIABLE_VALUE, $projectDataArrayData)) {
            $this->setThemeVariableValue($projectDataArrayData[self::KEY_THEME_VARIABLE_VALUE]);
        }

        if (array_key_exists(self::KEY_TITLE, $projectDataArrayData)) {
            $this->setTitle($projectDataArrayData[self::KEY_TITLE]);
        }

        if (array_key_exists(self::KEY_VOICE_SOUND_ID, $projectDataArrayData)) {
            $this->setVoiceSoundId($projectDataArrayData[self::KEY_VOICE_SOUND_ID]);
        }

        if (array_key_exists(self::KEY_GENERATOR, $projectDataArrayData)) {
            $this->setGenerator($projectDataArrayData[self::KEY_GENERATOR]);
        }
    }

    /**
     * @param string $projectDataJson
     */
    public function exchangeJson(string $projectDataJson)
    {
        $projectDataArray = json_decode($projectDataJson, true);

        $projectDataArray = $projectDataArray['data']['data'];

        $this->exchangeArray($projectDataArray);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [
            self::KEY_TEMPLATE_ID => $this->getTemplateId(),
            self::KEY_CURRENT_SCREEN_ID => $this->getCurrentScreenId(),
            self::KEY_DURATION => $this->getDuration(),
            self::KEY_FPS => $this->getFps(),
            self::KEY_EQUALIZER => $this->isEqualizer(),
            self::KEY_EXTENDABLE_SCREENS => $this->isExtendableScreens(),
            self::KEY_IS_LEGO => $this->isLego(),
            self::KEY_MUTE_MUSIC => $this->isMuteMusic(),
            self::KEY_PROJECT_COLORS => $this->projectColors->getArrayCopy(),
            self::KEY_PROJECT_VERSION => $this->getProjectVersion(),
            self::KEY_SCREENS => $this->screens->getArrayCopy(),
            self::KEY_SOUNDS => $this->sounds->getArrayCopy(),
            self::KEY_THEME_VARIABLE_NAME => $this->getThemeVariableName(),
            self::KEY_THEME_VARIABLE_VALUE => $this->getThemeVariableValue(),
            self::KEY_TEMPLATE_VERSION => $this->getTemplateVersion(),
            self::KEY_TITLE => $this->getTitle(),
            self::KEY_VOICE_SOUND_ID => $this->getVoiceSoundId(),
            self::KEY_GENERATOR => $this->getGenerator(),
        ];

        return $arrayCopy;
    }
}

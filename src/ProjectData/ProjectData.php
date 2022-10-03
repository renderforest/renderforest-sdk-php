<?php

namespace Renderforest\ProjectData;

use Renderforest\Base\ApiEntityBase;
use Renderforest\Font\Font;
use Renderforest\ProjectData\Color\Collection\ColorCollection;
use Renderforest\ProjectData\ProjectDataFont\ProjectDataFont;
use Renderforest\ProjectData\ProjectDataFont\ProjectDataFontCollectionGroup;
use Renderforest\ProjectData\Screen\Collection\ScreenCollection;
use Renderforest\ProjectData\Screen\Entity\Screen;
use Renderforest\ProjectData\Sound\Collection\SoundCollection;
use Renderforest\Sound\UserSound;

/**
 * Class ProjectData
 * @package Renderforest\ProjectData
 */
class ProjectData extends ApiEntityBase
{
    const KEY_TEMPLATE_ID = 'templateId';
    const KEY_CURRENT_SCREEN_ID = 'currentScreenId';
    const KEY_DURATION = 'duration';
    const KEY_EDITING_MODE = 'editingMode';
    const KEY_FPS = 'fps';
    const KEY_EQUALIZER = 'equalizer';
    const KEY_EXTENDABLE_SCREENS = 'extendableScreens';
    const KEY_IS_LEGO = 'isLego';
    const KEY_MUTE_SFX = 'muteSfx';
    const KEY_HAS_SFX = 'hasSfx';
    const KEY_PROJECT_COLORS = 'projectColors';
    const KEY_PROJECT_VERSION = 'projectVersion';
    const KEY_SCREENS = 'screens';
    const KEY_SOUNDS = 'sounds';
    const KEY_TEMPLATE_VERSION = 'templateVersion';
    const KEY_TITLE = 'title';
    const KEY_GENERATOR = 'generator';

    const KEY_STYLES = 'styles';
    const KEY_VOICE_OVER = 'voiceOver';
    const KEY_FONTS = 'fonts';

    const WRITABLE_KEYS = [
        self::KEY_CURRENT_SCREEN_ID,
        self::KEY_EDITING_MODE,
        self::KEY_MUTE_SFX,
        self::KEY_SOUNDS,
        self::KEY_PROJECT_COLORS,
        self::KEY_SCREENS,
        self::KEY_STYLES,
        self::KEY_VOICE_OVER,
        self::KEY_FONTS,
    ];

    const EDITING_MODE_SIMPLE = 'simple';
    const EDITING_MODE_ADVANCED = 'advanced';
    const EDITING_MODES = [
        self::EDITING_MODE_SIMPLE,
        self::EDITING_MODE_ADVANCED,
    ];

    /** @var int */
    protected $templateId;

    /** @var int|null */
    protected $currentScreenId;

    /** @var int */
    protected $duration;

    /** @var string */
    protected $editingMode;

    /** @var int */
    protected $fps;

    /** @var bool */
    protected $equalizer;

    /** @var bool */
    protected $extendableScreens;

    /** @var bool */
    protected $isLego;

    /** @var bool */
    protected $muteSfx;

    /** @var bool */
    protected $hasSfx;

    /** @var ColorCollection */
    protected $projectColors;

    /** @var string|null */
    protected $projectVersion;

    /** @var ScreenCollection */
    protected $screens;

    /** @var SoundCollection */
    protected $sounds;

    /** @var int|null */
    protected $templateVersion;

    /** @var string */
    protected $title;

    /** @var string|null */
    protected $generator;

    /** @var ProjectDataStyles|null */
    protected $styles;

    /** @var ProjectDataVoiceOver|null */
    protected $voiceOver;

    /** @var ProjectDataFontCollectionGroup|null */
    protected $fonts;

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
     * @return ProjectData
     */
    public function setTemplateId(int $templateId): ProjectData
    {
        $this->templateId = $templateId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCurrentScreenId()
    {
        return $this->currentScreenId;
    }

    /**
     * @param int|null $currentScreenId
     * @return ProjectData
     */
    public function setCurrentScreenId($currentScreenId): ProjectData
    {
        $this->currentScreenId = $currentScreenId;

        return $this;
    }

    /**
     * @return float
     */
    public function getDuration(): float
    {
        return $this->duration;
    }

    /**
     * @param float $duration
     * @return ProjectData
     */
    private function setDuration(float $duration): ProjectData
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return string
     */
    public function getEditingMode(): string
    {
        return $this->editingMode;
    }

    /**
     * @param string $editingMode
     * @return ProjectData
     */
    public function setEditingMode(string $editingMode): ProjectData
    {
        $this->editingMode = $editingMode;

        return $this;
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
     * @return ProjectData
     */
    private function setFps(int $fps): ProjectData
    {
        $this->fps = $fps;

        return $this;
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
     * @return ProjectData
     */
    public function setEqualizer(bool $equalizer): ProjectData
    {
        $this->equalizer = $equalizer;

        return $this;
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
     * @return ProjectData
     */
    private function setExtendableScreens(bool $extendableScreens): ProjectData
    {
        $this->extendableScreens = $extendableScreens;

        return $this;
    }

    /**
     * @return bool
     */
    public function isLego(): bool
    {
        return $this->isLego;
    }

    /**
     * @return bool
     */
    public function hasSfx(): bool
    {
        return $this->hasSfx;
    }

    /**
     * @param bool $hasSfx
     * @return ProjectData
     */
    public function setHasSfx(bool $hasSfx): ProjectData
    {
        $this->hasSfx = $hasSfx;

        return $this;
    }

    /**
     * @param bool $isLego
     * @return ProjectData
     */
    public function setIsLego(bool $isLego): ProjectData
    {
        $this->isLego = $isLego;

        return $this;
    }

    /**
     * @return bool
     */
    public function isMuteSfx(): bool
    {
        return $this->muteSfx;
    }

    /**
     * @param bool $muteSfx
     * @return ProjectData
     */
    public function setMuteSfx(bool $muteSfx): ProjectData
    {
        if (true === $this->hasSfx) {
            $this->muteSfx = $muteSfx;
        } else {
            $this->muteSfx = false;
        }

        return $this;
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
     * @return ProjectData
     */
    public function setProjectColors(ColorCollection $projectColors): ProjectData
    {
        $this->projectColors = $projectColors;

        return $this;
    }

    /**
     * @return string|null
     */
    private function getProjectVersion()
    {
        return $this->projectVersion;
    }

    /**
     * @param string|null $projectVersion
     * @return ProjectData
     */
    private function setProjectVersion($projectVersion): ProjectData
    {
        $this->projectVersion = $projectVersion;

        return $this;
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
     * @return ProjectData
     */
    public function setScreens(ScreenCollection $screens): ProjectData
    {
        $this->screens = $screens;

        return $this;
    }

    /**
     * @return SoundCollection
     */
    public function getSounds(): SoundCollection
    {
        return $this->sounds;
    }

    /**
     * @return SoundCollection
     */
    public function insertUniqueSound(UserSound $sound): ProjectData
    {
        $collection = new SoundCollection();
        $this->sounds = $collection->add($sound);

        return $this;
    }

    /**
     * @param SoundCollection $sounds
     * @return ProjectData
     */
    private function setSounds(SoundCollection $sounds): ProjectData
    {
        $this->sounds = $sounds;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTemplateVersion()
    {
        return $this->templateVersion;
    }

    /**
     * @param int|null $templateVersion
     * @return ProjectData
     */
    public function setTemplateVersion($templateVersion): ProjectData
    {
        $this->templateVersion = $templateVersion;

        return $this;
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
     * @return ProjectData
     */
    public function setTitle(string $title): ProjectData
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getGenerator()
    {
        return $this->generator;
    }

    /**
     * @param string|null $generator
     * @return ProjectData
     */
    private function setGenerator($generator): ProjectData
    {
        $this->generator = $generator;

        return $this;
    }

    /**
     * @return ProjectDataStyles|null
     */
    public function getStyles()
    {
        return $this->styles;
    }

    /**
     * @param ProjectDataStyles|null $styles
     * @return ProjectData
     */
    public function setStyles($styles): ProjectData
    {
        $this->styles = $styles;

        return $this;
    }

    /**
     * @return ProjectDataFontCollectionGroup|null
     */
    public function getFonts()
    {
        return $this->fonts;
    }

    /**
     * @param ProjectDataFontCollectionGroup|null $fonts
     * @return ProjectData
     */
    private function setFonts($fonts): ProjectData
    {
        $this->fonts = $fonts;

        return $this;
    }

    /**
     * @param ProjectDataFont|Font $font
     * @return ProjectData
     * @throws \Exception
     */
    public function setPrimaryFont($font): ProjectData
    {
        $projectDataFont = null;

        if ($font instanceof ProjectDataFont) {
            $projectDataFont = $font;
        }

        if ($font instanceof Font) {
            $projectDataFont = new ProjectDataFont();
            $projectDataFont->exchangeArray(
                $font->getArrayCopy()
            );
        }

        if (false === is_null($projectDataFont)) {
            $this->getFonts()->getSelected()->setPrimaryFont($projectDataFont);
        } else {
            throw new \Exception('Invalid font object passed to project data');
        }

        return $this;
    }

    /**
     * @param ProjectDataFont|Font $font
     * @return ProjectData
     * @throws \Exception
     */
    public function setSecondaryFont($font): ProjectData
    {
        $projectDataFont = null;

        if ($font instanceof ProjectDataFont) {
            $projectDataFont = $font;
        }

        if ($font instanceof Font) {
            $projectDataFont = new ProjectDataFont();
            $projectDataFont->exchangeArray(
                $font->getArrayCopy()
            );
        }

        if (false === is_null($projectDataFont)) {
            $this->getFonts()->getSelected()->setSecondaryFont($projectDataFont);
        } else {
            throw new \Exception('Invalid font object passed to project data');
        }

        return $this;
    }

    /**
     * @return ProjectData
     * @throws \Exception
     */
    public function resetFonts(): ProjectData
    {
        $this->getFonts()->getSelected()->reset();

        $defaultFontsPrimary = $this->getFonts()->getDefaults()->getPrimaryFont();
        $defaultFontsSecondary = $this->getFonts()->getDefaults()->getSecondaryFont();

        $this->getFonts()->getSelected()->setPrimaryFont($defaultFontsPrimary);
        $this->getFonts()->getSelected()->setSecondaryFont($defaultFontsSecondary);

        return $this;
    }

    /**
     * @return ProjectDataVoiceOver|null
     */
    public function getVoiceOver()
    {
        return $this->voiceOver;
    }

    /**
     * @param ProjectDataVoiceOver|null $voiceOver
     * @return ProjectData
     */
    public function setVoiceOver($voiceOver): ProjectData
    {
        $this->voiceOver = $voiceOver;

        return $this;
    }

    /**
     * @param array $projectDataArrayData
     * @throws \Exception
     */
    public function exchangeArray(array $projectDataArrayData)
    {
        $templateId = $projectDataArrayData[self::KEY_TEMPLATE_ID];
        $this->setTemplateId($templateId);

        if (array_key_exists(self::KEY_CURRENT_SCREEN_ID, $projectDataArrayData)) {
            $this->setCurrentScreenId($projectDataArrayData[self::KEY_CURRENT_SCREEN_ID]);
        }

        if (array_key_exists(self::KEY_EDITING_MODE, $projectDataArrayData)) {
            $this->setEditingMode($projectDataArrayData[self::KEY_EDITING_MODE]);
        }

        $duration = $projectDataArrayData[self::KEY_DURATION];
        $this->setDuration($duration);

        $fps = $projectDataArrayData[self::KEY_FPS];
        $this->setFps($fps);

        $equalizer = $projectDataArrayData[self::KEY_EQUALIZER];
        $this->setEqualizer($equalizer);

        $extendableScreens = $projectDataArrayData[self::KEY_EXTENDABLE_SCREENS];
        $this->setExtendableScreens($extendableScreens);

        $isLego = $projectDataArrayData[self::KEY_IS_LEGO];
        $this->setIsLego($isLego);

        $hasSfx = $projectDataArrayData[self::KEY_HAS_SFX];
        $this->setHasSfx($hasSfx);

        $muteSfx = $projectDataArrayData[self::KEY_MUTE_SFX];
        $this->setMuteSfx($muteSfx);

        if (array_key_exists(self::KEY_PROJECT_COLORS, $projectDataArrayData)) {
            $projectColorsArrayData = $projectDataArrayData[self::KEY_PROJECT_COLORS];

            $colorCollection = new ColorCollection();
            $colorCollection->exchangeArray($projectColorsArrayData);

            $this->setProjectColors($colorCollection);
        }

        if (array_key_exists(self::KEY_SCREENS, $projectDataArrayData)) {
            $screensArrayData = $projectDataArrayData[self::KEY_SCREENS];

            if (false === is_null($screensArrayData)) {
                $screenCollection = new ScreenCollection();
                $screenCollection->exchangeArray($screensArrayData);

                $this->setScreens($screenCollection);
            }
        }

        if (array_key_exists(self::KEY_SOUNDS, $projectDataArrayData)) {
            $soundsArrayData = $projectDataArrayData[self::KEY_SOUNDS];

            if (false === is_null($soundsArrayData) && is_array($soundsArrayData)) {
                if (count($soundsArrayData)) {
                    $soundCollection = new SoundCollection();
                    $soundCollection->exchangeArray($soundsArrayData);

                    $this->setSounds($soundCollection);
                }
            }
        }

        if (array_key_exists(self::KEY_STYLES, $projectDataArrayData)) {
            $stylesArrayData = $projectDataArrayData[self::KEY_STYLES];

            if (false === is_null($stylesArrayData) && is_array($stylesArrayData)) {
                if (count($stylesArrayData)) {
                    $styles = new ProjectDataStyles();
                    $styles->exchangeArray($stylesArrayData);

                    $this->setStyles($styles);
                }
            }
        }

        if (array_key_exists(self::KEY_VOICE_OVER, $projectDataArrayData)) {
            $voiceOverArrayData = $projectDataArrayData[self::KEY_VOICE_OVER];

            if (false === is_null($voiceOverArrayData) && is_array($voiceOverArrayData)) {
                if (count($voiceOverArrayData)) {
                    $projectDataVoiceOver = new ProjectDataVoiceOver();
                    $projectDataVoiceOver->exchangeArray($voiceOverArrayData);

                    $this->setVoiceOver($projectDataVoiceOver);
                }
            }
        }

        if (array_key_exists(self::KEY_FONTS, $projectDataArrayData)) {
            $fontsArrayData = $projectDataArrayData[self::KEY_FONTS];

            if (false === is_null($fontsArrayData) && is_array($fontsArrayData)) {
                if (count($fontsArrayData)) {
                    $fonts = new ProjectDataFontCollectionGroup();
                    $fonts->exchangeArray($fontsArrayData);

                    $this->setFonts($fonts);
                }
            }
        }

        if (array_key_exists(self::KEY_TITLE, $projectDataArrayData)) {
            $this->setTitle($projectDataArrayData[self::KEY_TITLE]);
        }

        if (array_key_exists(self::KEY_GENERATOR, $projectDataArrayData)) {
            $this->setGenerator($projectDataArrayData[self::KEY_GENERATOR]);
        }

        if (array_key_exists(self::KEY_TEMPLATE_VERSION, $projectDataArrayData)) {
            $this->setTemplateVersion($projectDataArrayData[self::KEY_TEMPLATE_VERSION]);
        }

        if (array_key_exists(self::KEY_PROJECT_VERSION, $projectDataArrayData)) {
            $this->setProjectVersion($projectDataArrayData[self::KEY_PROJECT_VERSION]);
        }
    }

    /**
     * @param string $projectDataJson
     * @throws \Exception
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
    public function getArrayCopyFull(): array
    {
        $arrayCopy = [
            self::KEY_TEMPLATE_ID => $this->getTemplateId(),
            self::KEY_CURRENT_SCREEN_ID => $this->getCurrentScreenId(),
            self::KEY_DURATION => $this->getDuration(),
            self::KEY_EDITING_MODE => $this->getEditingMode(),
            self::KEY_FPS => $this->getFps(),
            self::KEY_EQUALIZER => $this->isEqualizer(),
            self::KEY_EXTENDABLE_SCREENS => $this->isExtendableScreens(),
            self::KEY_IS_LEGO => $this->isLego(),
            self::KEY_HAS_SFX => $this->hasSfx(),
            self::KEY_MUTE_SFX => $this->isMuteSfx(),
            self::KEY_PROJECT_COLORS => $this->projectColors->getArrayCopy(),
            self::KEY_PROJECT_VERSION => $this->getProjectVersion(),
            self::KEY_SCREENS => $this->screens->getArrayCopy(),
            self::KEY_SOUNDS => $this->sounds->getArrayCopy(),
            self::KEY_TEMPLATE_VERSION => $this->getTemplateVersion(),
            self::KEY_TITLE => $this->getTitle(),
            self::KEY_GENERATOR => $this->getGenerator(),
        ];

        if (false === is_null($this->fonts)) {
            $arrayCopy[self::KEY_FONTS] = $this->fonts->getArrayCopy();
        }

        if (false === is_null($this->styles)) {
            $arrayCopy[self::KEY_STYLES] = $this->styles->getArrayCopy();
        }

        if (false === is_null($this->voiceOver)) {
            $arrayCopy[self::KEY_VOICE_OVER] = $this->voiceOver->getArrayCopy();
        }

        if (false === is_null($this->fonts)) {
            $F[self::KEY_FONTS] = $this->fonts->getArrayCopy();
        }

        return $arrayCopy;
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = $this->getArrayCopyFull();

        foreach (array_keys($arrayCopy) as $key) {
            if (false === in_array($key, self::WRITABLE_KEYS)) {
                unset($arrayCopy[$key]);
            }
        }

        return $arrayCopy;
    }

    /**
     * @param int $screenOrder
     * @return Screen
     * @throws \Exception
     */
    public function getScreenByOrder(int $screenOrder): Screen
    {
        return $this->screens->getScreenByOrder($screenOrder);
    }
}

<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

namespace Renderforest\ProjectData;

use Renderforest\Error\MissingOrderError;

class ProjectData
{
    private $generator;
    private $patchProperties;
    private $projectDataJson;
    private $projectDataUtil;

    /**
     * Project_data constructor.
     * @param $projectDataJson
     */
    public function __construct($projectDataJson)
    {
        $composer = file_get_contents(dirname(__FILE__) . '/../../composer.json');
        $composerJson = json_decode($composer, true);
        $sdkVersion = $composerJson['version'];

        $this->generator = "renderforest/sdk-php/$sdkVersion";
        $this->patchProperties = [];
        $this->projectDataJson = $this->objectToArray($projectDataJson);
        $this->projectDataUtil = new ProjectDataUtil();
        $this->setGenerator();
    }

    /**
     * Converts `stdClass` object to array recursively.
     * @param \stdClass $objectToConvert
     * @return array
     */
    private function objectToArray($objectToConvert)
    {
        if (is_object($objectToConvert)) {
            $objectToConvert = get_object_vars($objectToConvert);
        }

        if (is_array($objectToConvert)) {
            return array_map([__CLASS__, __METHOD__], $objectToConvert);
        } else {
            return $objectToConvert;
        }
    }

    /**
     * Checks if given array have `NULL` property then unset it, otherwise does noting.
     * @param $array - The data to unset `NULL` props.
     * @return array
     */
    private function unsetNullProperties($array)
    {
        foreach ($array as $key => $value) {
            if ($value === NULL) {
                unset($array[$key]);
            }
        }

        return $array;
    }

    /**
     * Set the generator.
     */
    private function setGenerator()
    {
        $this->projectDataJson['data']['generator'] = $this->generator;
        array_push($this->patchProperties, 'generator');
    }

    /**
     * Get patch object.
     * @return array
     */
    public function getPatchObject()
    {
        $projectDataJsonData = $this->projectDataJson['data'];

        return array_reduce($this->patchProperties, function ($acc, $property) use ($projectDataJsonData) {
            $acc[$property] = $projectDataJsonData[$property];

            return $acc;
        }, []);
    }

    /**
     * Reset patch object.
     */
    public function resetPatchObject()
    {
        $this->patchProperties = [];
    }

    /**
     * Get the project id.
     * @return integer
     */
    public function getProjectId()
    {
        return $this->projectDataJson['projectId'];
    }

    /**
     * Get the template id.
     * @return integer
     */
    public function getTemplateId()
    {
        return $this->projectDataJson['data']['templateId'];
    }

    /**
     * Check whether is equalizer or not.
     * @return boolean
     */
    public function isEqualizer()
    {
        return $this->projectDataJson['data']['equalizer'];
    }

    /**
     * Check whether is lego or not.
     * @return boolean
     */
    public function isLego()
    {
        return $this->projectDataJson['data']['isLego'];
    }

    /**
     * Get the project muteMusic property.
     * @return boolean
     */
    public function getMuteMusic()
    {
        return $this->projectDataJson['data']['muteMusic'];
    }

    /**
     * Set the project muteMusic property.
     * @param $muteMusic boolean
     */
    public function setMuteMusic($muteMusic)
    {
        $this->projectDataJson['data']['muteMusic'] = $muteMusic;
        array_push($this->patchProperties, 'muteMusic');
    }

    /**
     * Get the project colors.
     * @return array|null
     */
    public function getProjectColors()
    {
        return isset($this->projectDataJson['data']['projectColors']) ?
            $this->projectDataJson['data']['projectColors'] : null;
    }

    /**
     * Get the project duration.
     * @return array
     */
    public function getProjectDuration()
    {
        return $this->projectDataJson['data']['duration'];
    }

    /**
     * Set the project colors.
     * @param array projectColors
     */
    public function setProjectColors($projectColors)
    {
        $this->projectDataJson['data']['projectColors'] = $projectColors;
        array_push($this->patchProperties, 'projectColors');
    }

    /**
     * Get the project theme.
     * @return array
     */
    public function getTheme()
    {
        return [
            'themeVariableName' => $this->projectDataJson['data']['themeVariableName'],
            'themeVariableValue' => $this->projectDataJson['data']['themeVariableValue']
        ];
    }

    /**
     * Set the project theme.
     * @param array payload
     */
    public function setTheme($payload)
    {
        $this->projectDataJson['data']['themeVariableName'] = $payload['themeVariableName'];
        $this->projectDataJson['data']['themeVariableValue'] = $payload['themeVariableValue'];
        array_push($this->patchProperties, 'themeVariableName');
        array_push($this->patchProperties, 'themeVariableValue');
    }

    /**
     * Get the project sounds.
     * @return array
     */
    public function getSounds()
    {
        return $this->projectDataJson['data']['sounds'];
    }

    /**
     * Set the project sounds.
     * @param array sounds
     */
    public function setSounds($sounds)
    {
        $this->projectDataJson['data']['sounds'] = $sounds;
        array_push($this->patchProperties, 'sounds');
    }

    /**
     * Get the project styles.
     * @return array
     */
    public function getStyles()
    {
        return $this->projectDataJson['data']['styles'];
    }

    /**
     * Set the project styles.
     * @param array styles
     */
    public function setStyles($styles)
    {
        $this->projectDataJson['data']['styles'] = $styles;
        array_push($this->patchProperties, 'styles');
    }

    /**
     * Get the project voiceOver.
     * @return array
     */
    public function getVoiceOver()
    {
        return $this->projectDataJson['data']['voiceOver'];
    }

    /**
     * Set the project voiceOver.
     * @param array voiceOver
     */
    public function setVoiceOver($voiceOver)
    {
        $voiceOver = (empty($voiceOver)) ? new \stdClass() : $voiceOver;
        $this->projectDataJson['data']['voiceOver'] = $voiceOver;
        array_push($this->patchProperties, 'voiceOver');
    }

    /**
     * Get the project title.
     * @return string
     */
    public function getTitle()
    {
        return $this->projectDataJson['data']['title'];
    }

    /**
     * Get screens (add methods on screens & screen areas).
     * @return array
     */
    public function getScreens()
    {
        $screens = $this->projectDataJson['data']['screens'];

        return array_map(function ($screen) {
            return $this->constructScreen($screen);
        }, $screens);
    }

    /**
     * Set screens.
     * @param array screens
     */
    public function setScreens($screens)
    {
        $this->projectDataJson['data']['screens'] = $screens;
        array_push($this->patchProperties, 'screens');
    }

    /**
     * Pushes the given `newScreen` to `screens` array.
     * @param array $newScreen - The new screen to push.
     * @return array
     */
    public function pushScreen($newScreen)
    {
        if (!isset($newScreen['order'])) {
            throw new MissingOrderError('Screen order property is missing.');
        }

        $screens = $this->getScreens();
        return $this->projectDataUtil->insertAndNormalizeOrder($screens, $newScreen);
    }

    /**
     * Construct screen.
     * @param array $screen
     * @return array
     */
    public function constructScreen($screen)
    {
        $constructedScreen = [
            'id' => isset($screen['id']) ? $screen['id'] : NULL,
            'characterBasedDuration' => isset($screen['characterBasedDuration']) ? $screen['characterBasedDuration'] : NULL,
            'compositionName' => isset($screen['compositionName']) ? $screen['compositionName'] : NULL,
            'duration' => isset($screen['duration']) ? $screen['duration'] : NULL,
            'extraVideoSecond' => isset($screen['extraVideoSecond']) ? $screen['extraVideoSecond'] : NULL,
            'gifBigPath' => isset($screen['gifBigPath']) ? $screen['gifBigPath'] : NULL,
            'gifPath' => isset($screen['gifPath']) ? $screen['gifPath'] : NULL,
            'gifThumbnailPath' => isset($screen['gifThumbnailPath']) ? $screen['gifThumbnailPath'] : NULL,
            'hidden' => isset($screen['hidden']) ? $screen['hidden'] : NULL,
            'iconAdjustable' => isset($screen['iconAdjustable']) ? $screen['iconAdjustable'] : NULL,
            'isFull' => isset($screen['isFull']) ? $screen['isFull'] : NULL,
            'maxDuration' => isset($screen['maxDuration']) ? $screen['maxDuration'] : NULL,
            'order' => isset($screen['order']) ? $screen['order'] : NULL,
            'path' => isset($screen['path']) ? $screen['path'] : NULL,
            'tags' => isset($screen['tags']) ? $screen['tags'] : NULL,
            'title' => isset($screen['title']) ? $screen['title'] : NULL,
            'type' => isset($screen['type']) ? $screen['type'] : NULL,
            'areas' => isset($screen['areas']) ? $screen['areas'] : NULL,
            'getAreas' => function () use ($screen) {
                return array_map(function ($area) {
                    return $this->constructArea($area);
                }, $screen['areas']);
            },
        ];

        return $this->unsetNullProperties($constructedScreen);
    }

    /**
     * Construct area.
     * @param array $area
     * @return array
     */
    public function constructArea($area)
    {
        $resultWithNulls = [
            'id' => isset($area['id']) ? $area['id'] : NULL,
            'height' => isset($area['height']) ? $area['height'] : NULL,
            'width' => isset($area['width']) ? $area['width'] : NULL,
            'value' => isset($area['value']) ? $area['value'] : NULL,
            'cords' => isset($area['cords']) ? $area['cords'] : NULL,
            'title' => isset($area['wordCount']) ? $area['wordCount'] : NULL,
            'order' => isset($area['order']) ? $area['order'] : NULL,
            'type' => isset($area['type']) ? $area['type'] : NULL
        ];

        $result = $this->unsetNullProperties($resultWithNulls);

        if ($area['type'] === 'text') {
            $result['setText'] = function ($text) {
                $area['value'] = $text;
                array_push($this->patchProperties, 'screens');
            };
        }

        if ($area['type'] === 'image') {
            $imageParams = [
                'fileName' => isset($area['fileName']) ? $area['fileName'] : NULL,
                'originalHeight' => isset($area['originalHeight']) ? $area['originalHeight'] : NULL,
                'originalWidth' => isset($area['originalWidth']) ? $area['originalWidth'] : NULL,
                'mimeType' => isset($area['mimeType']) ? $area['mimeType'] : NULL,
                'webpPath' => isset($area['webpPath']) ? $area['webpPath'] : NULL,
                'fileType' => isset($area['fileType']) ? $area['fileType'] : NULL,
                'thumbnailPath' => isset($area['thumbnailPath']) ? $area['thumbnailPath'] : NULL,
                'imageCropParams' => isset($area['imageCropParams']) ? $area['imageCropParams'] : NULL,
                'setImage' => function ($image) use ($area) {
                    $this->setAreaImage($area, $image);
                    array_push($this->patchProperties, 'screens');
                }
            ];

            $result = array_replace_recursive($result, $this->unsetNullProperties($imageParams));
        }

        if ($area['type'] === 'video') {
            $areaParams = [
                'fileName' => isset($area['fileName']) ? $area['fileName'] : NULL,
                'originalHeight' => isset($area['originalHeight']) ? $area['originalHeight'] : NULL,
                'originalWidth' => isset($area['originalWidth']) ? $area['originalWidth'] : NULL,
                'mimeType' => isset($area['mimeType']) ? $area['mimeType'] : NULL,
                'webpPath' => isset($area['webpPath']) ? $area['webpPath'] : NULL,
                'fileType' => isset($area['fileType']) ? $area['fileType'] : NULL,
                'thumbnailPath' => isset($area['thumbnailPath']) ? $area['thumbnailPath'] : NULL,
                'videoCropParams' => isset($area['videoCropParams']) ? $area['videoCropParams'] : NULL,
                'setVideo' => function ($video) use ($area) {
                    $this->setAreaVideo($area, $video);
                    array_push($this->patchProperties, 'screens');
                }
            ];

            $result = array_replace_recursive($result, $this->unsetNullProperties($areaParams));
        }

        return $result;
    }

    /**
     * @param array $area
     * @param array $image
     * @return array
     * Set image on area.
     */
    public function setAreaImage($area, $image)
    {
        $imageProperties = [
            'fileName' => isset($image['fileName']) ? $image['fileName'] : NULL,
            'mimeType' => isset($image['mime']) ? $image['mime'] : NULL,
            'value' => isset($image['filePath']) ? $image['filePath'] : NULL,
            'webpPath' => isset($image['webpPath']) ? $image['webpPath'] : NULL,
            'fileType' => isset($image['fileType']) ? $image['fileType'] : NULL,
            'thumbnailPath' => isset($image['thumbnailPath']) ? $image['thumbnailPath'] : NULL,
            'imageCropParams' => [
                'tranform' => isset($image['imageCropParams']['transform']) ? $image['imageCropParams']['transform'] : NULL,
                'top' => isset($image['imageCropParams']['top']) ? $image['imageCropParams']['top'] : NULL,
                'left' => isset($image['imageCropParams']['left']) ? $image['imageCropParams']['left'] : NULL,
                'width' => isset($image['imageCropParams']['width']) ? $image['imageCropParams']['width'] : NULL,
                'height' => isset($image['imageCropParams']['height']) ? $image['imageCropParams']['height'] : NULL
            ]
        ];

        return array_replace_recursive($area, $this->unsetNullProperties($imageProperties));
    }

    /**
     * @param array $area
     * @param array $video
     * @return array
     * Set video on area.
     */
    public function setAreaVideo($area, $video)
    {
        $videoProperties = [
            'fileName' => isset($video['fileName']) ? $video['fileName'] : NULL,
            'mimeType' => isset($video['mime']) ? $video['mime'] : NULL,
            'value' => isset($video['filePath']) ? $video['filePath'] : NULL,
            'webpPath' => isset($video['webpPath']) ? $video['webpPath'] : NULL,
            'fileType' => isset($video['fileType']) ? $video['fileType'] : NULL,
            'videoCropParams' => isset($video['videoCropParams']) ? $video['videoCropParams'] : NULL
        ];

        return array_replace_recursive($area, $this->unsetNullProperties($videoProperties));
    }
}

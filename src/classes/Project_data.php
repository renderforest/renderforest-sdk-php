<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

class Project_data
{
    private $generator;
    private $patchProperties;
    private $projectDataJson;

    /**
     * Project_data constructor.
     * @param $projectDataJson
     */
    public function __construct($projectDataJson)
    {
        /**
         * Get SDK version from composer.json file and set it in generator`.
         */
        $ComposerJson = json_decode(file_get_contents(dirname(__FILE__) . '/../../../composer.json'), true);
        $sdkVersion = $ComposerJson['version'];
        $this->generator = "renderforest/sdk-node/$sdkVersion";

        $this->projectDataJson = $projectDataJson;
        $this->patchProperties = [];
        $this->setGenerator();
    }

    /**
     * @description Set the generator.
     */
    private function setGenerator()
    {
        $this->projectDataJson['data']['generator'] = $this->generator;
        array_push($this->patchProperties, 'generator');
    }

    /**
     * @description Get patch object.
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
     * @description Reset patch object.
     */
    public function resetPatchObject()
    {
        $this->patchProperties = [];
    }

    /**
     * @returns {number}
     * @description Get the project id.
     */
    public function getProjectId()
    {
        return $this->projectDataJson['projectId'];
    }

    /**
     * @returns {number}
     * @description Get the template id.
     */
    public function getTemplateId()
    {
        return $this->projectDataJson['data']['templateId'];
    }

    /**
     * @returns {boolean}
     * @description Check whether is equalizer or not.
     */
    public function isEqualizer()
    {
        return $this->projectDataJson['data']['equalizer'];
    }

    /**
     * @returns {boolean}
     * @description Check whether is lego or not.
     */
    public function isLego()
    {
        return $this->projectDataJson['data']['isLego'];
    }

    /**
     * @returns {boolean}
     * @description Get the project muteMusic property.
     */
    public function getMuteMusic()
    {
        return $this->projectDataJson['data']['muteMusic'];
    }

    /**
     * @param {boolean} muteMusic
     * @description Set the project muteMusic property.
     */
    public function setMuteMusic($muteMusic)
    {
        $this->projectDataJson['data']['muteMusic'] = $muteMusic;
        array_push($this->patchProperties, 'muteMusic');
    }

    /**
     * @returns {Array}
     * @description Get the project colors.
     */
    public function getProjectColors()
    {
        return $this->projectDataJson['data']['projectColors'];
    }

    /**
     * @param {Array} projectColors
     * @description Set the project colors.
     */
    public function setProjectColors($projectColors)
    {
        $this->projectDataJson['data']['projectColors'] = $projectColors;
        array_push($this->patchProperties, 'projectColors');
    }

    /**
     * @returns {Object}
     * @description Get the project theme.
     */
    public function getTheme()
    {
        return [
            'themeVariableName' => $this->projectDataJson['data']['themeVariableName'],
            'themeVariableValue' => $this->projectDataJson['data']['themeVariableValue']
        ];
    }

    /**
     * @param {Object} payload
     * @param {string} payload.themeVariableName
     * @param {string} payload.themeVariableValue
     * @description Set the project theme.
     */
    public function setTheme($payload)
    {
        $this->projectDataJson['data']['themeVariableName'] = $payload['themeVariableName'];
        $this->projectDataJson['data']['themeVariableValue'] = $payload['themeVariableValue'];
        array_push($this->patchProperties, 'themeVariableName');
        array_push($this->patchProperties, 'themeVariableValue');
    }

    /**
     * @returns {Array}
     * @description Get the project sounds.
     */
    public function getSounds()
    {
        return $this->projectDataJson['data']['sounds'];
    }

    /**
     * @param {Array} sounds
     * @description Set the project sounds.
     */
    public function setSounds($sounds)
    {
        $this->projectDataJson['data']['sounds'] = $sounds;
        array_push($this->patchProperties, 'sounds');
    }

    /**
     * @returns {string}
     * @description Get the project title.
     */
    public function getTitle()
    {
        return $this->projectDataJson['data']['title'];
    }

    /**
     * @returns {Array}
     * @description Get screens (add methods on screens & screen areas).
     */
    public function getScreens()
    {
        $screens = $this->projectDataJson['data']['screens'];

        return array_map(function ($screen) {
            return $this->constructScreen($screen);
        }, $screens);
    }

    /**
     * @param {Array} screens
     * @description Set screens.
     */
    public function setScreens($screens)
    {
        $this->projectDataJson['data']['screens'] = $screens;
        array_push($this->patchProperties, 'screens');
    }

    /**
     * @param array $screen
     * @return array
     * Construct screen.
     */
    public function constructScreen($screen)
    {
        function constructor()
        {
            global $areas;
            return array_map(function ($area) {
                return $this->constructArea($area);
            }, $areas);
        }

        return [
            'id' => $screen['id'],
            'characterBasedDuration' => $screen['characterBasedDuration'],
            'compositionName' => $screen['compositionName'],
            'duration' => $screen['duration'],
            'extraVideoSecond' => $screen['extraVideoSecond'],
            'gifBigPath' => $screen['gifBigPath'],
            'gifPath' => $screen['gifPath'],
            'gifThumbnailPath' => $screen['gifThumbnailPath'],
            'hidden' => $screen['hidden'],
            'iconAdjustable' => $screen['iconAdjustable'],
            'isFull' => $screen['isFull'],
            'maxDuration' => $screen['maxDuration'],
            'order' => $screen['order'],
            'path' => $screen['path'],
            'tags' => $screen['tags'],
            'title' => $screen['title'],
            'type' => $screen['type'],
            'areas' => $screen['areas'],
            'getAreas' => constructor()
        ];
    }

    /**
     * @param array $area
     * @return array
     * Construct area.
     */
    public function constructArea($area)
    {
        $result = [
            'id' => $area['id'],
            'height' => $area['height'],
            'width' => $area['width'],
            'value' => $area['value'],
            'cords' => $area['cords'],
            'title' => $area['wordCount'],
            'order' => $area['order'],
            'type' => $area['type']
        ];

        if ($area['type'] === 'text') {
            $result['setText'] = function ($text) {
                $area['value'] = $text;
                array_push($this->patchProperties, 'screens');
            };
        }

        if ($area['type'] === 'image') {
            $imageParams = [
                'fileName' => $area['fileName'],
                'originalHeight' => $area['originalHeight'],
                'originalWidth' => $area['originalWidth'],
                'mimeType' => $area['mimeType'],
                'webpPath' => $area['webpPath'],
                'fileType' => $area['fileType'],
                'thumbnailPath' => $area['thumbnailPath'],
                'imageCropParams' => $area['imageCropParams'],
                'setImage' => function ($image) {
                    global $area;

                    $this->setAreaImage($area, $image);
                    array_push($this->patchProperties, 'screens');
                }
            ];

            array_replace_recursive($result, $imageParams);
        }

        if ($area['type'] === 'video') {
            $areaParams = [
                'fileName' => $area['fileName'],
                'originalHeight' => $area['originalHeight'],
                'originalWidth' => $area['originalWidth'],
                'mimeType' => $area['mimeType'],
                'webpPath' => $area['webpPath'],
                'fileType' => $area['fileType'],
                'thumbnailPath' => $area['thumbnailPath'],
                'videoCropParams' => $area['videoCropParams'],
                'setVideo' => function ($video) {
                    global $area;

                    $this->setAreaVideo($area, $video);
                    array_push($this->patchProperties, 'screens');
                }
            ];

            array_replace_recursive($result, $areaParams);
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
        $imageProperties = ['fileName' => $image['fileName'],
            'mimeType' => $image['mime'],
            'value' => $image['filePath'],
            'webpPath' => $image['webpPath'],
            'fileType' => $image['fileType'],
            'thumbnailPath' => $image['thumbnailPath'],
            'imageCropParams' => [
                'tranform' => $image['imageCropParams']['transform'],
                'top' => $image['imageCropParams']['top'],
                'left' => $image['imageCropParams']['left'],
                'width' => $image['imageCropParams']['width'],
                'height' => $image['imageCropParams']['height']
            ]
        ];

        return array_replace_recursive($area, $imageProperties);
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
            'fileName' => $video['fileName'],
            'mimeType' => $video['mime'],
            'value' => $video['filePath'],
            'webpPath' => $video['webpPath'],
            'fileType' => $video['fileType'],
            'videoCropParams' => $video['videoCropParams']
        ];

        return array_replace_recursive($area, $videoProperties);
    }
}

# renderforest-sdk-php
Renderforest SDK for PHP.

[API Reference](https://developers.renderforest.com)

## Installation

The recommended way to install Renderforest SDK for PHP is through
[Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Next, run the Composer command to install the latest stable version of Renderforest SDK for PHP:

```bash
php composer.phar require renderforest/sdk-php
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```


# Introduction

Welcome to the Renderforest API! You can use our API to:

* [Projects API](#projects-api)
  - [Get All Projects](#get-all-projects)
  - [Add Project](#add-project)
  - [Get Trial Project](#get-trial-project)
  - [Get a Specific Project](#get-a-specific-project)
  - [Update the Project - partial update](#update-the-project---partial-update)
  - [Delete a Specific Project](#delete-a-specific-project)
  - [Delete Specific Project Videos](#delete-specific-project-videos)
  - [Apply Template Preset on the Project](#apply-template-preset-on-the-project)
  - [Duplicate the Project](#duplicate-the-project)
  - [Render the Project](#render-the-project)
* [Projects-data API](#projects-data-api)
  - [Get Project-data](#get-project-data)
  - [Update Project-data - partial update](#update-project-data---partial-update)
  - [Getters and Setters of Project-data Instance](#getters-and-setters-of-project-data-instance)
    * [Getters](#getters)
      - [Get project id](#get-project-id)
      - [Get template id](#get-template-id)
      - [Check whether is equalizer or not](#check-whether-is-equalizer-or-not)
      - [Check whether is lego or not](#check-whether-is-lego-or-not)
      - [Get title](#get-title)
      - [Get mute music](#get-mute-music)
      - [Get sounds](#get-sounds)
      - [Get styles](#get-styles)
      - [Get voice-over](#get-voice-over)
      - [Get project colors](#get-project-colors)
      - [Get project duration](#get-project-duration)
      - [Get screens](#get-screens)
      - [Get screen areas](#get-screen-areas)
      - [Get patch object](#get-patch-object)
    * [Setters](#setters)
      - [Set styles](#set-styles)
      - [Set voice-over](#set-voice-over)
      - [Set mute music](#set-mute-music)
      - [Set sounds](#set-sounds)
      - [Set text on text holder area](#set-text-on-text-holder-area)
      - [Set image on image holder area](#set-image-on-image-holder-area)
      - [Set video on video holder area](#set-video-on-video-holder-area)
      - [Set project colors](#set-project-colors)
      - [Set screens](#set-screens)
    * [Push Screen](#push-screen)
* [Sounds API](#sounds-api)
  - [Get All Sounds](#get-all-sounds)
  - [Get Recommended Sounds](#get-recommended-sounds)
* [Supports API](#supports-api)
  - [Add Supports Ticket](#add-supports-ticket)
* [Templates API](#templates-api)
  - [Get All Templates](#get-all-templates)
  - [Get Templates Categories](#get-templates-categories)
  - [Get a Specific Template](#get-a-specific-template)
  - [Get Color-Presets of the Template](#get-color-presets-of-the-template)
  - [Get Pluggable-Screens of the Template](#get-pluggable-screens-of-the-template)
  - [Get Recommended-Custom-Colors of the Template](#get-recommended-custom-colors-of-the-template)
  - [Get Template-Presets of the Template](#get-template-presets-of-the-template)
  - [Get SVG Content of the Template](#get-svg-content-of-the-template)
  - [Get Theme of the Template](#get-theme-of-the-template)
  - [Get Transitions of the Template](#get-transitions-of-the-template)
* [Users API](#users-api)
  - [Get Current User](#get-current-user)
* [Creating Project from Scratch](#creating-project-from-scratch)
 
 
# API



## Projects API

### Get All Projects

Retrieves the projects.

```php
<?php

require 'vendor/autoload.php';

$renderforest = new \Renderforest\Client(['signKey' => '<signKey>', 'clientId' => -1]);

$payload = [
    'limit' => 2,
    'offset' => 10,
    'includeApiProjects' => false,
    'order' => 'DESC',
    'orderBy' => 'order',
    'search' => ''
];
try {
    $projects = $renderforest->getProjects($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e; // handle the error
}

var_dump($projects); // handle the success
```

- The renderedQualities property is optional and present if the project is in renders queue (ongoing rend).
- All the properties of `payload` object are optional.

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/projects/get-projects.php)


### Add Project

Creates a project.

```php
<?php

require 'vendor/autoload.php';

$renderforest = new \Renderforest\Client(['signKey' => '<signKey>', 'clientId' => -1]);

$payload = [
    'templateId' => 701
];
try {
    $addProject = $renderforest->addProject($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e; // handle the error
}

var_dump($addProject); // handle the success
```

- Also, project-data is created with the following list of initial properties: 
  templateId, title, duration, equalizer, isLego, extendableScreens, fps, projectVersion, screens, muteMusic, 
  currentScreenId, projectColors (optional), themeVariableName (optional), themeVariableValue (optional).


- The "muteMusic" is false initially. 
- If template is lego ("isLego" => true), then no initial screen is added and "screens" defaults to []. Otherwise, at least one screen is present. 
- The "currentScreenId" is the id of the first screen for non-lego templates & null for lego templates. 
- The "projectColors" is optional and gets value if the template has default colors. Both lego & non-lego templates might have default colors.
- Both "themeVariableName" & "themeVariableValue" are optional and are added (both) if template has theme. Both lego & non-lego templates might have a theme. 

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/projects/add-project.php)


### Get Trial Project

This endpoint retrieves a trial project. Designed to allow the user to make a project (trial - without saving) before
 getting logged in to get an overall idea.
The data can be used later to create real project (create project, update project-data with this data).

_No authorization is required for this endpoint._

```php
<?php

require 'vendor/autoload.php';

$renderforest = new \Renderforest\Client(['signKey' => '<signKey>', 'clientId' => -1]);

$payload = [
    'templateId' => 701
];
try {
    $trialProject = $renderforest->getTrialProject($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e; // handle the error
}

var_dump($trialProject); // handle the success
```

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/projects/get-trial-project.php)


### Get a Specific Project

Gets a specific project.

```php
<?php

require 'vendor/autoload.php';

$renderforest = new \Renderforest\Client(['signKey' => '<signKey>', 'clientId' => -1]);

$payload = [
    'projectId' => 5000295
];
try {
    $project = $renderforest->getProject($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e; // handle the error
}

var_dump($project); // handle the success
```

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/projects/get-project.php)


### Update the Project - partial update

Updates the project (partial update).

```php
<?php

require 'vendor/autoload.php';

$renderforest = new \Renderforest\Client(['signKey' => '<signKey>', 'clientId' => -1]);

$payload = [
    'projectId' => 5000658,
    'customTitle' => 'mock-customTitle'
];
try {
    $updateProject = $renderforest->updateProjectPartial($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e; // handle the error
}

var_dump($updateProject); // handle the success
```

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/projects/update-project-partial.php)


### Delete a Specific Project

Deletes a specific project.

```php
<?php

require 'vendor/autoload.php';

$renderforest = new \Renderforest\Client(['signKey' => '<signKey>', 'clientId' => -1]);

$payload = [
    'projectId' => 5000658
];
try {
    $deleteProject = $renderforest->deleteProject($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e; // handle the error
}

var_dump($deleteProject); // handle the success
```

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/projects/delete-project.php)


### Delete Specific Project Videos

Deletes specific project videos. The quality parameter is optional.

**IMPORTANT**: If you want to delete only a single quality video, you have to specify quality parameter, 
otherwise all quality videos of the project will be deleted.

```php
<?php

require 'vendor/autoload.php';

$renderforest = new \Renderforest\Client(['signKey' => '<signKey>', 'clientId' => -1]);

$payload = [
    'projectId' => 5000658,
    'quality' => 360 // optional argument
];
try {
    $deleteProject = $renderforest->deleteProjectVideos($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    var_dump($e); // handle the error
}

var_dump($deleteProject); // handle the success
```

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/projects/delete-project-videos.php)

### Apply Template Preset on the Project

Applies template preset on the project.

```php
<?php

require 'vendor/autoload.php';

$renderforest = new \Renderforest\Client(['signKey' => '<signKey>', 'clientId' => -1]);

$payload = [
    'projectId' => 5000658,
    'presetId' => 55
];
try {
    $applyTemplatePresetOnProject = $renderforest->applyTemplatePresetOnProject($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e; // handle the error
}

var_dump($applyTemplatePresetOnProject); // handle the success
```

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/projects/apply-template-preset-on-project.php)


### Duplicate the Project

Duplicates the project.

```php
<?php

require 'vendor/autoload.php';

$renderforest = new \Renderforest\Client(['signKey' => '<signKey>', 'clientId' => -1]);

$payload = [
    'projectId' => 5000658
];
try {
    $duplicateProject = $renderforest->duplicateProject($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e; // handle the error
}

var_dump($duplicateProject); // handle the success
```

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/projects/duplicate-project.php)


### Render the Project

Renders the project with given quality. The possible values for the quality are: 0, 360, 720, and 1080. 
The watermark parameter is optional, must be in '.png' file format and have canvas size of 1920 x 1080 pixels,
url length must not exceed 250 characters and is not applicable to HD quality videos.

```php
<?php

require 'vendor/autoload.php';

$renderforest = new \Renderforest\Client(['signKey' => '<signKey>', 'clientId' => -1]);

$payload = [
    'projectId' => 5000658,
    'quality' => 360,
    'watermark' => 'https://example.com/watermark.png' // optional parameter
];
try {
    $renderProject = $renderforest->renderProject($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e; // handle the error
}

var_dump($renderProject); // handle the success
```

- The possible values of the quality are: 0, 360, 720, and 1080.

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/projects/render-project.php)



## Projects-data API

### Get Project-data

Retrieves a specific project-data.

```php
<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

require 'vendor/autoload.php';

$renderforest = new \Renderforest\Client(['signKey' => '<signKey>', 'clientId' => -1]);

$payload = [
    'projectId' => 7549843
];
try {
    $projectDataInstance = $renderforest->getProjectData($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e; // handle the error
}

echo 'Project id: ';
var_dump($projectDataInstance->getProjectId());
echo 'Template id: ';
var_dump($projectDataInstance->getTemplateId());
echo 'Is equalizer: ';
var_dump($projectDataInstance->isEqualizer());
echo 'Is lego: ';
var_dump($projectDataInstance->isLego());
echo 'Title: ';
var_dump($projectDataInstance->getTitle());
echo 'Mute music: ';
var_dump($projectDataInstance->getMuteMusic());
echo 'Sounds: ';
var_dump($projectDataInstance->getSounds());
echo 'Styles: ';
var_dump($projectDataInstance->getStyles());
echo 'VoiceOver: ';
var_dump($projectDataInstance->getVoiceOver());
echo 'Project colors: ';
var_dump($projectDataInstance->getProjectColors());
echo 'Screens: ';
var_dump($projectDataInstance->getScreens());

$screens = $projectDataInstance->getScreens();
echo 'Areas: ';
var_dump($screens[1]['getAreas']());
```

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/project-data/get-project-data.php)

See the [Getters and Setters of Project-data Instance](#getters-and-setters-of-project-data-instance)


### Update Project-data - partial update

Updates the project-data (partial update).

```php
<?php

require 'vendor/autoload.php';

$renderforest = new \Renderforest\Client(['signKey' => '<signKey>', 'clientId' => -1]);

$payload = [
    'projectId' => 7549843
];

function sample()
{
    global $renderforest;
    global $payload;

    $projectDataInstance = $renderforest->getProjectData($payload);
    // make some change
    $projectDataInstance->setMuteMusic(true);

    // get payload data
    $projectId = $projectDataInstance->getProjectId();
    $data = $projectDataInstance->getPatchObject();

    $payloadForUpdate = [
        'projectId' => $projectId,
        'data' => $data
    ];

    $result = $renderforest->updateProjectDataPartial($payloadForUpdate);

    $projectDataInstance->resetPatchObject();

    return $result;
}

try {
    var_dump(sample()); // handle the success
} catch (Exception $e) {
    var_dump($e); // handle the error
}
```

- You can update the following list of properties: `currentScreenId, duration, generator, muteMusic, themeVariableName, 
  themeVariableValue, projectColors, simple, sounds, screens, voiceSoundId`.
- Any top-level properties (writable) can be updated separately (except `themeVariableName` & `themeVariableValue`), as
  well as all of them at the same time.
- The `themeVariableName` & `themeVariableValue` are related to the template theme and both should be updated at the same 
  time. Possible values you can get in the template theme section 
  (https://developers.renderforest.com/#get-theme-of-the-template).
- The `iconAdjustable` field of the screen takes one of the 0, 1 or 2 values. If iconAdjustable is 0, then the icon is 
  not updatable. The value 1 indicates that the icon is on the left side, and the value 2 indicates that the icon is on 
  the right side. You can update 1 <-> 2 to change the icon from left <-> right.
- No blob data accepted for the value field of a screen area.


- [See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/project-data/update-project-data-partial.php)
- [See advanced example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/project-data/update-project-data-partial-advanced.php)

See the [Getters and Setters of Project-data Instance](#getters-and-setters-of-project-data-instance)


### Getters and Setters of Project-data Instance

#### Getters

##### Get project id

```php
$projectDataInstance->getProjectId();  // 7096113
```

##### Get template id

```php
$projectDataInstance->getTemplateId();  // 701
```

##### Check whether is equalizer or not

```php
$projectDataInstance->isEqualizer();  // false
```

##### Check whether is lego or not

```php
$projectDataInstance->isLego();  // true
```

##### Get title

```php
$projectDataInstance->getTitle();  // 'Explainer Video Toolkit'
```

##### Get mute music

```php
$projectDataInstance->getMuteMusic();  // false
```

##### Get sounds

```php
$projectDataInstance->getSounds();  // Array of sound objects
```

##### Get styles

```php
$projectDataInstance->getStyles();  // [ theme: '1', transition: '2' ]
```

##### Get voice-over

```php
$projectDataInstance->getVoiceOver(); // [ path: 'https://example.com/voice-over.mp3' ]
```

##### Get project colors

```php
$projectDataInstance->getProjectColors();  // Array of color objects
```

##### Get project duration

```php
$projectDataInstance->getProjectDuration();  // The number representing project duration
```

##### Get screens

```php
$projectDataInstance->getScreens();  // Array of screen objects
```

##### Get screen areas

```php
$screens = $projectDataInstance->getScreens();

$firstScreenAreas = $screens && $screens[0] && $screens[0]['getAreas']();  // Array of area objects
```

##### Get patch object

```php
$projectDataInstance->getPatchObject();  // Array containing local updates. Used to update project-data (partial). 
```


#### Setters

##### Set styles

```php
// get theme/transition from .templates API
$styles = [
  'theme' => '1', // optional
  'transition' => '2' // optional
];
$projectDataInstance->setStyles($styles);
```

##### Set voice-over

In case if you want to unset `voiceover`, send empty array.

```php
$voiceOver = [
  'path' => 'https://example.com/voice-ower.mp3' // optional
];
$projectDataInstance->setVoiceOver($voiceOver);
```

##### Set mute music

```php
$projectDataInstance->setMuteMusic(true);
```

##### Set sounds

```php
// sound from ./sounds API
$sound1 = [
  'duration' => 120,
  'id' => 559,
  'genre' => 'Rock', // optional
  'lowQuality' => 'https://example.com/sample-low.mp3',
  'path' => 'https://example.com/sample.mp3',
  'title' => 'Inspiring Piano'
];


// your own sound
$sound2 = [
  'duration' => 12,
  'fileSize' => 198658,
  'id' => 952626,
  'path' => 'https://example.com/sample.mp3',
  'title' => 'sound sample.mp3',
  'userId' => 1469277,
  'voiceOver' => false
];

$sounds = [ $sound1, $sound2 ]
$projectDataInstance->setSounds($sounds);
```

##### Set text on text holder area

```php
if ($screens && $screens[0]) {
  $areas = $screens[0]['getAreas']();

  $area = $areas[0] ?? [];

  if ($area && $area['type'] === 'text') {
    $area['setText']('sample text');
}
```

##### Set image on image holder area

```php
if ($screens && $screens[1]) {
  $areas = $screens[1]['getAreas']();

  $area = $areas[0] ?? [];

  if ($area && $area['type'] === 'image') {
    $image = [
      'fileName' => 'sample file name', // optional
      'mime' => 'image/png', // optional
      'filePath' => 'https://example.com/sample.png',
      'webpPath' => 'https://example.com/sample.webp', // optional
      'fileType' => 'image', // optional
      'thumbnailPath' => 'https://example.com/sample-thumbnail.png', // optional
      'imageCropParams' => [
        'transform' => 0,
        'top' => 11,
        'left' => 0,
        'width' => 798,
        'height' => 456
        ]
      ];

    $area['setImage']($image);
  }
}
```

##### Set video on video holder area

```php
if ($screens && $screens[2]) {
  $areas = $screens[2]['getAreas']();

  $area = $areas[0];
  if ($area && $area['type'] === 'video') {
    $video = [
      'fileName' => 'sample file name', // optional
      'mime' => 'video/mp4', // optional
      'filePath' => 'https://example.com/sample.png',
      'webpPath' => 'https://example.com/sample.webp', // optional
      'fileType' => 'video', // optional
      'videoCropParams' => [
        'duration' => 6,
        'mime' => 'video/mp4',
        'thumbnail' => 'https://example.com/sample-thumbnail.png',
        'thumbnailVideo' => 'https://example.com/sample-thumbnail-video.mp4',
        'trims' => [0, 2, 3, 5],
        'volume' => [
          'music' => 10,
          'video' => 100
        ]
      ]
    ];

    $area['setVideo']($video);
  }
}
```

##### Set project colors

```php
// get project colors from ./templates API
$projectColors = [
  'ffffff', 'a1d4ec', '1d2e54', '61a371', 'a0b6e7', 'e0d0ef', '5c1313', 'b2e1f4', '706bb5', 'b4ddf5'
];
$projectDataInstance->setProjectColors($projectColors); // get project colors from ./templates API
```

##### Set screens

```php
// get screen from ./templates API
$screen = [
  'id' => 2125620,
  'characterBasedDuration' => true,
  'compositionName' => '191_man_Angry_2',
  'duration' => 5,
  'extraVideoSecond' => 0,
  'iconAdjustable' => 0,
  'gifPath' => 'https://example.com/191_man_Angry_2_1.gif',
  'gifBigPath' => 'https://example.com/191_man_Angry_2_1.gif',
  'gifThumbnailPath' => 'https://example.com/191_man_Angry_2_n.jpg',
  'hidden' => false,
  'maxDuration' => 15,
  'order' => 1900,
  'path' => 'https://example.com/191_man_Angry_2_n.jpg',
  'tags' => 'business, computer, chair, desk, laptop, occupation, office, worker, arms, boss, boy, businessman,chef, company, employer, professional',
  'title' => 'Angry Office worker with arms crossed',
  'type' => 1,
  'areas' => [
    ['id' => 3562168,
      'cords' => [656, 224, 1048, 224, 1048, 332, 656, 332],
      'height' => 108,
      'order' => 0,
      'title' => 'char_Angry_2',
      'type' => 'text',
      'value' => '',
      'wordCount' => 40,
      'width' => 392]
    ]
];

$_screens = $projectDataInstance->pushScreen($screen);

$projectDataInstance->setScreens($_screens); // get screen from ./templates API
```

#### Push screen

Inserts new `screen`, arrange screens by `screen.order` property and normalize orders to have consequent numbers.
In case `screen.order` is less than `0`, then inserts the new `screen` at the beginning of screens.
If `screen.order` property is more than last `screen's` order property, then appends to the end of screens.
Throws `MissingOrderError` if `screen.order` property is missing.

```php
$_screens = $projectDataInstance->pushScreen($screen); // Array of screens
```



## Sounds API

### Get All Sounds

Retrieves sounds given the duration.

The endpoint supports both authorized and unauthorized requests. If the authorization is not present, then response 
 limits to 5.
 
```php
<?php

require 'vendor/autoload.php';

$payload = [
    'duration' => 5
];
try {
    $companySoundsLimited = \Renderforest\Client::getCompanySoundsLimited($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e; // handle the error
}

var_dump($companySoundsLimited); // handle the success
```

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/sounds/get-company-sounds-limited.php)

```php
<?php

require 'vendor/autoload.php';

$renderforest = new \Renderforest\Client(['signKey' => '<signKey>', 'clientId' => -1]);

$payload = [
    'duration' => 4
];
try {
    $sounds = $renderforest->getSounds($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e; // handle the error
}

var_dump($sounds); // handle the success
```

- The sounds will have greater or equal duration to the specified one.
- Remember — any given value of the duration greater than 180 will be overridden by 180!

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/sounds/get-sounds.php)


### Get Recommended Sounds

Retrieves recommended sounds for the given template.

The endpoint supports both authorized and unauthorized requests. If the authorization is not present, then response 
 limits to 5.
 
```php
<?php

require 'vendor/autoload.php';

$payload = [
    'templateId' => 701,
    'duration' => 5
];
try {
    $recommendedSoundsLimited = \Renderforest\Client::getRecommendedSoundsLimited($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e; // handle the error
}

var_dump($recommendedSoundsLimited); // handle the success
```

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/sounds/get-recommended-sounds-limited.php)

```php
<?php

require 'vendor/autoload.php';

$renderforest = new \Renderforest\Client(['signKey' => '<signKey>', 'clientId' => -1]);

$payload = [
    'templateId' => 701,
    'duration' => 5
];
try {
    $recommendedSounds = $renderforest->getRecommendedSounds($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    var_dump($e); // handle the error
}

var_dump($recommendedSounds); // handle the success
```

- These sounds will have greater or equal duration to the specified one.
- Remember — any given value of the duration greater than 180 will be overridden by 180!

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/sounds/get-recommended-sounds.php)



## Supports API

### Add Supports Ticket

Creates supports ticket.

```php
<?php

require 'vendor/autoload.php';

$renderforest = new \Renderforest\Client(['signKey' => '<signKey>', 'clientId' => -1]);

$payload = [
    'message' => 'I need to...',
    'mailType' => 'Creative team',
    'subject' => 'Some help in ..'
];
try {
    $supportTicket = $renderforest->addSupportsTicket($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e; // handle the error
}

var_dump($supportTicket); // handle the success
```

- The possible values of ticket mailType are: 'Sales', 'Report a bug', 'Editing process', 'Creative team', 'Other'.

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/supports/add-supports-ticket.php)



## Templates API

_No authorization is required for ./templates API's._

### Get All Templates

Retrieves all templates.

```php
<?php

require 'vendor/autoload.php';

$payload = [
    'categoryId' => 3,
    'equalizer' => 'false',
    'limit' => 4,
    'offset' => 10
];
try {
    $templates = \Renderforest\Client::getTemplates($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e; // handle the error
}

var_dump($templates); // handle the success
```

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/templates/get-templates.php)


### Get Templates Categories

Retrieves templates categories.

```php
<?php

require 'vendor/autoload.php';

$payload = [
    'language' => 'en'
];
try {
    $templateCategories = \Renderforest\Client::getTemplatesCategories($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e; // handle the error
}

var_dump($templateCategories); // handle the success
```

- The supported language codes are: ar, de, en, es, fr, pt, ru, tr.

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/templates/get-templates-categories.php)


### Get a Specific Template

Retrieves a specific template.

```php
<?php

require 'vendor/autoload.php';

$payload = [
    'templateId' => 701,
    'language' => 'en'
];
try {
    $template = \Renderforest\Client::getTemplate($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e; // handle the error
}

var_dump($template); // handle the success
```

- The supported language codes are: ar, de, en, es, fr, pt, ru, tr.

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/templates/get-template.php)


### Get Color-Presets of the Template

Retrieves color-presets of the template.
You can apply these color presets to your project to give it better and unique look.

```php
<?php

require 'vendor/autoload.php';

$payload = [
    'templateId' => 701
];
try {
    $getTemplateColorPresets = \Renderforest\Client::getTemplateColorPresets($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e; // handle the error
}

var_dump($getTemplateColorPresets); // handle the success
```

- The number of color-presets is varying from template to template.

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/templates/get-template-color-presets.php)


### Get Pluggable-Screens of the Template

Retrieves pluggable-screens of the template.

```php
<?php

require 'vendor/autoload.php';

$payload = [
    'templateId' => 701
];
try {
    $templatePluggableScreens = \Renderforest\Client::getTemplatePluggableScreens($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e; // handle the error
}

var_dump($templatePluggableScreens); // handle the success
```

- Only lego templates might have a pluggable-screen. 
- The number of pluggable-screens is varying from template to template.
Pluggable-Screens are grouped by categories.

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/templates/get-template-pluggable-screens.php)


### Get Recommended-Custom-Colors of the Template

Retrieves recommended-custom-colors of the template.
You can apply these recommended custom colors to your project to give it better and unique look.

```php
<?php

require 'vendor/autoload.php';

$payload = [
    'templateId' => 701
];

try {
    $templateRecommendedCustomColors = \Renderforest\Client::getTemplateRecommendedCustomColors($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e; // handle the error
}

var_dump($templateRecommendedCustomColors); // handle the success
```

- The number of recommended-custom-colors is varying from template to template.

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/templates/get-template-recommended-custom-colors.php)


### Get Template-Presets of the Template

Retrieves template-presets of the template.

```php
<?php

require 'vendor/autoload.php';

$payload = [
    'templateId' => 701
];
try {
    $templatePresets = \Renderforest\Client::getTemplatePresets($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e; // handle the error
}

var_dump($templatePresets); // handle the success
```

- Only lego templates might have a template-preset.

- The number of template-presets is varying from template to template.
Template-presets are ready-made stories created from this template to fasten your video production.

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/templates/get-template-presets.php)


### Get SVG Content of the Template
Retrieves SVG content of the template.

```php
<?php

require 'vendor/autoload.php';

$payload = [
    'templateId' => 701
];
try {
    $templateSVGContent = \Renderforest\Client::getTemplateSVGContent($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    var_dump($e); // handle the error
}

var_dump($templateRecommendedCustomColors); // handle the success
```

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/templates/get-template-svg-content.php)


### Get Theme of the Template

Retrieves theme of the template.

```php
<?php

require 'vendor/autoload.php';

$payload = [
    'templateId' => 701
];
try {
    $templateTheme = \Renderforest\Client::getTemplateTheme($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e; // handle the error
}

var_dump($templateTheme); // handle the success
```

- Both lego & non-lego templates might have a theme.

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/templates/get-template-theme.php)


### Get Transitions of the Template

Retrieves transitions of the template.

```php
<?php

require 'vendor/autoload.php';

$payload = [
    'templateId' => 1021
];
try {
    $templateTransitions = \Renderforest\Client::getTemplateTransitions($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e; // handle the error
}

var_dump($templateTheme); // handle the success
```

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/templates/get-template-transitions.php)



## Users API


### Get Current User

Retrieves the current user.

```php
<?php

require 'vendor/autoload.php';

$renderforest = new \Renderforest\Client(['signKey' => '<signKey>', 'clientId' => -1]);

try {
    $currentUser = $renderforest->getCurrentUser();
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e; // handle the error
}

var_dump($currentUser); // handle the success
```

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/users/get-current-user.php)


## Creating Project from Scratch

Example for creating project from scratch. Includes creating project, updating project data, video rendering status 
checking and video downloading.

[See example](https://github.com/renderforest/renderforest-sdk-php/blob/master/examples/scratch-project/create-project-from-scratch.php)

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

function sample()
{
    global $renderforest;
    global $payload;
    $projectDataInstance = $renderforest->getProjectData($payload);

    // make some change
    $projectDataInstance->setMuteMusic(true);

    $styles = [
        'theme' => '1', // optional
        'transition' => '2' // optional
    ];

    $projectDataInstance->setStyles($styles); // get theme/transition from ./templates API

    $voiceOver = [
        'path' => 'https://example.com/voice-ower.mp3' // optional
    ];

    $projectDataInstance->setVoiceOver($voiceOver);

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

    $sounds = [$sound1, $sound2];
    $projectDataInstance->setSounds($sounds);

    $screens = $projectDataInstance->getScreens();
    // set text on text holder area
    if ($screens && $screens[0]) {
        $areas = $screens[0]['getAreas']();

        $area = $areas[0] ?? [];

        if ($area && $area['type'] === 'text') {
            $area['setText']('sample text');
        }
    }
    // set image on image holder area
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
    // set video on video holder area
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

    $projectColors = [
        'ffffff', 'a1d4ec', '1d2e54', '61a371', 'a0b6e7', 'e0d0ef', '5c1313', 'b2e1f4', '706bb5', 'b4ddf5'
    ];

    $projectDataInstance->setProjectColors($projectColors); // get project colors from ./templates API

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

    $_screens = $projectDataInstance->getScreens();
    array_push($_screens, $screen);

    $projectDataInstance->setScreens($_screens); // get screen from ./templates API

    // get payload data
    $projectId = $projectDataInstance->getProjectId();
    $data = $projectDataInstance->getPatchObject();

    $updatePayload = [
        'projectId' => $projectId,
        'data' => $data
    ];

    $result = $renderforest->updateProjectDataPartial($updatePayload);

    $projectDataInstance->resetPatchObject();

    return $result;
}

try {
    var_dump(sample()); // handle the success
} catch (Exception $e) {
    var_dump($e); // handle the error
}

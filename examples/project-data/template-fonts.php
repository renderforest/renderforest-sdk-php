<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$projectData = $renderforestClient->getProjectData(16296971);

$templateAvailableFonts = $renderforestClient->getTemplateAvailableFonts(
    $projectData->getTemplateId()
);

$font1 = $templateAvailableFonts->getFontById(1645);
$font2 = $templateAvailableFonts->getFontById(690);

// Set project data fonts
$projectData->setPrimaryFont($font1);
$projectData->setSecondaryFont($font2);

// Reset project data fonts to defaults
$projectData->resetFonts();

$renderforestClient->updateProjectData(16296971, $projectData);

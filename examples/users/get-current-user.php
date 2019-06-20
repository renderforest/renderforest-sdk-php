<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$currentUser = $renderforestClient->getCurrentUser();

echo 'ID - ' . $currentUser->getId() . PHP_EOL;
echo 'Is Active - ' . ($currentUser->isActive() ? 'true' : 'false') . PHP_EOL;
echo 'Is Blocked - ' . ($currentUser->isBlocked() ? 'true' : 'false') . PHP_EOL;
echo 'Email - ' . $currentUser->getEmail() . PHP_EOL;
echo 'First Name - ' . $currentUser->getFirstName() . PHP_EOL;
echo 'Language - ' . $currentUser->getLanguage() . PHP_EOL;
echo 'Last Login - ' . $currentUser->getLastLogin() . PHP_EOL;
echo 'Minute Limit - ' . $currentUser->getMinuteLimit() . PHP_EOL;
echo 'Post Max Size - ' . $currentUser->getPostMaxSize() . PHP_EOL;
echo 'Privacy - ' . $currentUser->getPrivacy() . PHP_EOL;
echo 'Is Public Share - ' . ($currentUser->isPublicShare() ? 'true' : 'false') . PHP_EOL;
echo 'Rend Limit - ' . $currentUser->getRendLimit() . PHP_EOL;
echo 'Roles - ' . $currentUser->getRoles() . PHP_EOL;
echo 'Status - ' . $currentUser->getStatus() . PHP_EOL;
echo 'Upload Host - ' . $currentUser->getUploadHost() . PHP_EOL;
echo 'Upload Max File Size - ' . $currentUser->getUploadMaxFileSize() . PHP_EOL;

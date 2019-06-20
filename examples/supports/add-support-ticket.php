<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$supportTicket = new \Renderforest\Support\SupportTicket();
$supportTicket
    ->setMailType($supportTicket::MAIL_TYPE_SALES)
    ->setSubject('subject 1')
    ->setMessage('message 1');

$supportTicketResponse = $renderforestClient->createSupportTicket($supportTicket);

echo $supportTicketResponse->getTicketId() . PHP_EOL;
echo $supportTicketResponse->getMessageId() . PHP_EOL;

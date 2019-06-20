## Supports API

**For detailed usage please see examples for each method.**

  - [Add Supports Ticket](#add-supports-ticket)

### Add Supports Ticket

Creates supports ticket (authorization is required).
```php
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
```

[See add supports ticket example](/examples/supports/add-support-ticket.php)

**[⬆ back to the top](#supports-api)**

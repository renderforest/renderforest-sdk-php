## Users API

**For detailed usage please see examples for each method.**

  - [Get Current User](#get-current-user)

### Get Current User

Retrieves the current user (authorization is required). 
```php
<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$currentUser = $renderforestClient->getCurrentUser();
```

[See get current user example](/examples/users/get-current-user.php)

**[⬆ back to the top](#users-api)**

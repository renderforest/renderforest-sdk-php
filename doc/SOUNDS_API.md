## Sounds API

**For detailed usage please see examples for each method.**

- [Get All Sounds](#get-all-sounds)
- [Get Company's Library Sounds](#get-companys-library-sounds)
- [Get Recommended Sounds](#get-recommended-sounds)

### Get All Sounds

Retrieves sounds given the duration (authorization is required).

```php
<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$sounds = $renderforestClient->getAllSounds(15);
```

- The sounds will have greater or equal duration to the specified one.
- **Remember** — any given value of the duration greater than 180 will be overridden by 180!

[See get all sounds example](/examples/sounds/get-all-sounds.php)

### Get Company's Library Sounds

Retrieves company's library sounds for given duration (authorization is not required).
If the authorization is not present, then response limits to 5.
 
```php
<?php

require '../../vendor/autoload.php';

$sounds = \Renderforest\ApiClient::getCompanySoundsLimited(15);
```

[See get company's library sounds limited example](/examples/sounds/get-company-sounds-limited.php)

With authorization it's possible to fetch all library sounds.

```php
<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$sounds = $renderforestClient->getCompanySounds(15);
```
- These sounds will have greater or equal duration to the specified one.
- **Remember** — any given value of the duration greater than 180 will be overridden by 180!

[See get company sounds example](/examples/sounds/get-company-sounds.php)


### Get Recommended Sounds

Retrieves recommended sounds for the given template (authorization is not required).
If the authorization is not present, then response limits to 5.
 
```php
<?php

require '../../vendor/autoload.php';

$sounds = \Renderforest\ApiClient::getRecommendedSoundsLimited(701, 15);
```

[See get recommended sounds limited example](/examples/sounds/get-recommended-sounds-limited.php)

With authorization it's possible to fetch all recommended sounds.

```php
<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$sounds = $renderforestClient->getRecommendedSounds(701, 15);
```
- These sounds will have greater or equal duration to the specified one.
- **Remember** — any given value of the duration greater than 180 will be overridden by 180!

[See get recommended sounds example](/examples/sounds/get-recommended-sounds.php)

**[⬆ back to the top](#sounds-api)**
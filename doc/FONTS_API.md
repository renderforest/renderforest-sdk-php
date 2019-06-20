## Fonts API

  - [Get Template Available Fonts](#get-template-available-fonts)

### Get template available fonts

Retrieves template available fonts.
```php
<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$fonts = $renderforestClient->getTemplateAvailableFonts(701);
```

[See get template available fonts example](/examples/fonts/get-template-available-fonts.php)

`getTemplateAvailabeFonts ` function returns an object containing all fonts. 
The returned object has `getFontById ` method which accepts `fontId` parameter.  

```php
$primaryFont = $fonts->getFontById(1656) // returns font
```

Now the font can be used as parameter for `setFonts` setter in project data instance.

[See setFonts() setter in project data](/docs/project-data-api/PROJECT_DATA_API.md#set-project-fonts)

**[⬆ back to the top](#fonts-api)**

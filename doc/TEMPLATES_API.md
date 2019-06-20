## Templates API

_No authorization is required for ./templates API's._

**For detailed usage please see examples for each method.**

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

### Get All Templates

Retrieves all templates.
```php
<?php

require '../../vendor/autoload.php';

$templates = \Renderforest\ApiClient::getAllTemplates();
```
[See get all templates example](/examples/templates/get-all-templates.php)


### Get Templates Categories

Retrieves templates categories.

```php
<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$templateCategories = $renderforestClient->getTemplatesCategories('ru');
```
- The supported language codes are: ar, de, en, es, fr, pt, ru, tr.

[See get template categories example](/examples/templates/get-templates-categories.php)


### Get Template

Retrieves a specific template.

```php
<?php

require '../../vendor/autoload.php';

$template = \Renderforest\ApiClient::getTemplate(701, 'ru');
```

- The supported language codes are: ar, de, en, es, fr, pt, ru, tr.

[See get specific template example](/examples/templates/get-template.php)


### Get Color-Presets of the Template

Retrieves color-presets of the template.
You can apply these color presets to your project to give it better and unique look.
```php
<?php

require '../../vendor/autoload.php';

$templateColorPresets = \Renderforest\ApiClient::getTemplateColorPresets(701);
```

- The number of color-presets is varying from template to template.

[See get template color presets example](/examples/templates/get-template-color-presets.php)


### Get Pluggable-Screens of the Template

Retrieves pluggable-screens of the template.
```php

```

- Only lego templates might have a pluggable-screen. 
- The number of pluggable-screens is varying from template to template.
  Pluggable-Screens are grouped by categories.

[See get pluggable-screens example](/examples/templates/get-template-pluggable-screens.php)


### Get Recommended-Custom-Colors of the Template

Retrieves recommended-custom-colors of the template.
You can apply these recommended custom colors to your project to give it better and unique look.
```php
<?php

require '../../vendor/autoload.php';

$customColors = \Renderforest\ApiClient::getTemplateRecommendedCustomColors(701);
```
- The number of recommended-custom-colors is varying from template to template.

[See get recommended custom colors example](/examples/templates/get-template-recommended-custom-colors.php)


### Get Template-Presets of the Template

Retrieves template-presets of the template.
```php
<?php

require '../../vendor/autoload.php';

$templatePresets = \Renderforest\ApiClient::getTemplatePresets(701);
```

- Only lego templates might have a template-preset.

- The number of template-presets is varying from template to template.
Template-presets are ready-made stories created from this template to fasten your video production.

[See get template presets example](/examples/templates/get-template-presets.php)


### Get SVG Content of the Template

Retrieves SVG content of the template.

```php

```

[See get template svg content example](/examples/templates/get-template-svg-content.php)


### Get Theme of the Template

Retrieves theme of the template.

```php
<?php

require '../../vendor/autoload.php';

$templateTheme = \Renderforest\ApiClient::getTemplateTheme(701);
```

- Both lego & non-lego templates might have a theme.

[See get template them example](/examples/templates/get-template-theme.php)



### Get Transitions of the Template

Retrieves transitions of the template.

```php
<?php

require '../../vendor/autoload.php';

$templateTransitions = \Renderforest\ApiClient::getTemplateTransitions(701);
```

[See get template transitions example](/examples/templates/get-template-transitions.php)

**[⬆ back to the top](#templates-api)**

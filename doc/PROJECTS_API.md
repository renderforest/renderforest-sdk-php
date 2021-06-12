## Projects API

**For detailed usage please see examples for each method.**

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
  - [Get rendering status](#get-rendering-status)

### Get All Projects

Retrieves all projects based on search query.
```php
<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$projects = $renderforestClient->getAllProjects(
    3, // limit
    1, // offset
    true, // include API projects
    'ASC', // order
    'date', // order by
    'quick' // search
);
```

- In the result the `renderedQualities` property is optional and present if the project is in renders queue (ongoing rend).
- All the properties of `getAllProjects` function are optional.

[See get all projects example](/examples/projects/get-all-projects.php)


### Add Project

Creates a project by given `template id`.
```php
<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$projectId = $renderforestClient->addProject(701); // template id
```
- Also, project-data is created with the following list of initial properties: 
  templateId, title, duration, equalizer, isLego, extendableScreens, fps, projectVersion, screens, muteSfx, 
  currentScreenId, projectColors (optional), themeVariableName (optional), themeVariableValue (optional).
- The "muteSfx" is false initially. 
- If template is lego ("isLego": true), then no initial screen is added and "screens" defaults to []. Otherwise, at least one screen is present. 
- The "currentScreenId" is the id of the first screen for non-lego templates & null for lego templates. 
- The "projectColors" is optional and gets value if the template has default colors. Both lego & non-lego templates might have default colors.
- Both "themeVariableName" & "themeVariableValue" are optional and are added (both) if template has theme. Both lego & non-lego templates might have a theme. 

[See add project example](/examples/projects/add-project.php)


### Get Trial Project

This endpoint retrieves a trial project. Designed to allow the user to make a project (trial - without saving) before
 getting logged in to get an overall idea.
The data can be used later to create real project (create project, update project-data with this data).

_No authorization is required for this endpoint._
```php
<?php

require '../../vendor/autoload.php';

$trialProject = \Renderforest\ApiClient::getTrialProject(701);
```

[See get trial project example](/examples/projects/get-trial-project.php)


### Get a Specific Project

Gets a specific project by `project id`.
```php
<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$project = $renderforestClient->getProject(16970309);
```

[See get specific project example](/examples/projects/get-specific-project.php)


### Update the Project - partial update

Updates the project (partial update).
```php
<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$projectId = $renderforestClient->updateProject(
    16296675,
    'new custom title', // new custom title
);
```

 - Updated fields are `custom title`.

[See update project partial example](/examples/projects/update-project-partial.php)


### Delete a Specific Project

Deletes a specific project by `project id`.

```php
<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$affectedRows = $renderforestClient->deleteSpecificProject(15747948);
```

[See delete specific project example](/examples/projects/delete-specific-project.php)


### Delete Specific Project Videos

Deletes specific project videos. The quality parameter is optional.

**IMPORTANT**: If you want to delete only a single quality video, you have to specify quality parameter, 
otherwise all quality videos of the project will be deleted.

```php
<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$affectedRows = $renderforestClient->deleteSpecificProjectVideos(
    16296971,
    \Renderforest\Project\RenderQuality\Entity\RenderQuality::RENDER_QUALITY_360
);
```

[See delete specific project videos example](/examples/projects/delete-specific-project-videos.php)


### Apply Template Preset on the Project

Applies template preset on the project.

```php
<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$projectId = $renderforestClient->applyTemplatePresetOnProject(
    16297523,
    294
);
```
[See apply template preset on the project example](/examples/projects/apply-template-preset-on-project.php)


### Duplicate the Project

Duplicates the project by `project id`.

```php
<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$newProjectId = $renderforestClient->duplicateProject(16296675);
```

[See duplicate project example](/examples/projects/duplicate-project.php)


### Render the Project

Renders the project with given quality. The possible values for the quality are: 0, 360, 720, and 1080. 
The watermark parameter is optional, must be in '.png' file format and have canvas size of 1920 x 1080 pixels,
url length must not exceed 250 characters.

```php
<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$queueId = $renderforestClient->renderProject(
    16970309,
    \Renderforest\Project\RenderQuality\Entity\RenderQuality::RENDER_QUALITY_360,
    'https://example.com/watermark.png'
);
```

- The possible values of the quality are: 0, 360, 720, and 1080.

[See render project example](/examples/projects/render-project.php)


### Get rendering status

(Coming soon)

**[⬆ back to the top](#projects-api)**
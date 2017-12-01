# Settings Module

[![License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](https://packagist.org/packages/anomaly/settings-module) 
[![Build Status](https://scrutinizer-ci.com/g/anomalylabs/settings-module/badges/build.png?b=master)](https://scrutinizer-ci.com/g/anomalylabs/settings-module/build-status/master)
[![Code Quality](http://img.shields.io/scrutinizer/g/anomalylabs/settings-module.svg)](https://scrutinizer-ci.com/g/anomalylabs/settings-module/)
[![Total Downloads](http://img.shields.io/packagist/dt/anomaly/settings-module.svg)](https://packagist.org/packages/anomaly/settings-module)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/36aca857-a877-439d-8edd-0cbc42924133/small.png)](https://insight.sensiolabs.com/projects/36aca857-a877-439d-8edd-0cbc42924133)

System settings management.

## Introduction

Powerful addon settings and management services.

### Features

The Settings module comes with everything you need to manage settings values for addons.

*   Powered by Field Types
*   Compatible with any addon.
*   Easy integration with any project.

### Installation

You can install the Settings module with the `addon:install` command:

    php artisan addon:install anomaly.module.settings

> The Settings module comes installed with PyroCMS out of the box.{.note}

## Usage

Settings values are powered entirely by `field types`. This section will go over the basics of defining, managing, and using settings for addons.

#### Settings Keys

Settings values are defined by a `key`. The `key` is simply the `dot namespace` of the addon and the setting field `slug`.

    anomaly.modules.files::max_upload_size

#### Defining Settings

Settings are defined using [field definitions](/documentation/streams-platform/v1.1#ui/forms/fields/the-field-definition) located in the addon's `resources/config/settings.php` file:

```php
<?php

return [
    'max_upload_size'      => [
        'type'     => 'anomaly.field_type.integer',
        'required' => true,
        'config'   => [
            'default_value' => function () {
                $post = str_replace('M', '', ini_get('post_max_size'));
                $file = str_replace('M', '', ini_get('upload_max_filesize'));

                return $file > $post ? $post : $file;
            },
            'max'           => function () {
                $post = str_replace('M', '', ini_get('post_max_size'));
                $file = str_replace('M', '', ini_get('upload_max_filesize'));

                return $file > $post ? $post : $file;
            },
            'min'           => 1,
        ],
    ],
    'max_parallel_uploads' => [
        'type'     => 'anomaly.field_type.integer',
        'required' => true,
        'config'   => [
            'default_value' => 3,
            'min'           => 1,
        ],
    ],
];
```

#### Defining Form Sections

You can also quickly define form sections the same as fields. To define sections move your `resources/config/settings.php` file to `resources/settings/settings.php` and include a `resources/settings/sections.php` file to define sections. The `sections.php` file simply returns an array of [section definitions](/documentation/streams-platform/v1.1#ui/control-panel/the-section-definition):

```php
<?php

return [
    'details'      => [
        'context' => 'info',
        'title'   => 'streams::label.details',
        'fields'  => [
            'name',
            'description',
        ],
    ],
    'contact'      => [
        'context' => 'primary',
        'title'   => 'streams::label.contact',
        'fields'  => [
            'business',
            'phone',
            'address',
            'address2',
            'city',
            'state',
            'postal_code',
            'country',
        ],
    ],
];
```

#### Displaying Settings Forms

Settings can be set by `API` just like any other Stream entry however you may want to display a settings form.

To get started you can extend or inject the `\Anomaly\SettingsModule\Setting\Form\SettingFormBuilder` class. The `entry` value for configuration form builders are the addon's `dot namespace`:

```php
use \Anomaly\SettingsModule\Setting\Form\SettingFormBuilder;

public function edit(SettingFormBuilder $builder)
{
    return $builder->render('anomaly.module.files');
}
```

> The settings form builder is not much different than any other form builder so go crazy and extend or customize as needed in your own project.{.tip}

### Plugin

This section will go over how to use the `SettingsModulePlugin` that ships with the Settings module.

#### setting

The `setting` function returns an instance of the setting as a `presenter`.

The presenter returned depends on the field type used for the setting.

###### Returns: `\Anomaly\Streams\Platform\Entry\EntryPresenter` or `null`

###### Arguments

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Required</th>

<th>Type</th>

<th>Default</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

$key

</td>

<td>

true

</td>

<td>

string

</td>

<td>

none

</td>

<td>

The key of the setting you want to get.

</td>

</tr>

</tbody>

</table>

###### Twig

```twig
{{ setting('streams::name') }} {# Returns __toString from setting field type presenter #}

<ul>
  {% for locale, name in setting('streams::enabled_locales').selections() %}
    <li>
      {{ name }} [{{ locale }}]
    </li>
  {% endfor %}
</ul>
```

#### setting_value

The `setting_value` function returns the raw value of the setting.

###### Returns: `mixed`

###### Arguments

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Required</th>

<th>Type</th>

<th>Default</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

$key

</td>

<td>

true

</td>

<td>

string

</td>

<td>

none

</td>

<td>

The key of the setting to get.

</td>

</tr>

</tbody>

</table>

###### Example

```twig
{{ setting_value('streams::name') }}

{{ setting_value('streams::default_locale') }}

<ul>
    {% for locale in setting_value('streams::enabled_locales') %}
    <li>
        {{ locale }}
    </li>
    {% endfor %}
</ul>
```

## Introduction[](#introduction)

Powerful addon settings and management services.


### Features[](#introduction/features)

The Settings module comes with everything you need to manage settings values for addons.

*   Powered by Field Types
*   Compatible with any addon.
*   Easy integration with any project.


### Installation[](#introduction/installation)

You can install the Settings module with the `addon:install` command:

    php artisan addon:install anomaly.module.settings

<div class="alert alert-warning">**Notice:** The Settings module comes installed with PyroCMS out of the box.</div>


### Settings[](#introduction/settings)

Settings values are powered entirely by `field types`. This section will go over the basics of defining, managing, and using settings for addons.


#### Settings Keys[](#introduction/settings/settings-keys)

Settings values are defined by a `key`. The `key` is simply the `dot namespace` of the addon and the setting field `slug`.

    anomaly.modules.files::max_upload_size


#### Defining Settings[](#introduction/settings/defining-settings)

Settings are defined using [field definitions](/documentation/streams-platform/v1.1#ui/forms/fields/the-field-definition) located in the addon's `resources/config/settings.php` file:

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


#### Defining Form Sections[](#introduction/settings/defining-form-sections)

You can also quickly define form sections the same as fields. To define sections move your `resources/config/settings.php` file to `resources/settings/settings.php` and include a `resources/settings/sections.php` file to define sections. The `sections.php` file simply returns an array of [section definitions](/documentation/streams-platform/v1.1#ui/control-panel/the-section-definition):

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


#### Displaying Settings Forms[](#introduction/settings/displaying-settings-forms)

Settings can be set by `API` just like any other Stream entry however you may want to display a settings form.

To get started you can extend or inject the `\Anomaly\SettingsModule\Setting\Form\SettingFormBuilder` class. The `entry` value for configuration form builders are the addon's `dot namespace`:

    use \Anomaly\SettingsModule\Setting\Form\SettingFormBuilder;

    public function edit(SettingFormBuilder $builder)
    {
        return $builder->render('anomaly.module.files');
    }

<div class="alert alert-primary">**Pro Tip:** The settings form builder is not much different than any other form builder so go crazy and extend or customize as needed in your own project.</div>

## Usage[](#usage)

This section will show you how to use the addon via API and in the view layer.


### Settings[](#usage/settings)

This section will go over how to utilize the settings values you have defined.


#### Setting Interface[](#usage/settings/setting-interface)

This section will go over the `\Anomaly\SettingsModule\Setting\Contract\SettingInterface` class.


##### SettingInterface::field()[](#usage/settings/setting-interface/settinginterface-field)

The `field` method returns the field type instance for the value or `null` if the value's field no longer exists.

###### Returns: `\Anomaly\Streams\Platform\Addon\FieldType\FieldType` or `null`

###### Example

    $setting = $settings->get('anomaly.module.files::max_upload_size');

    if ($field = $setting->field()) {
        echo $field->getValue();
    }


#### Setting Repository[](#usage/settings/setting-repository)

This section will go over the `\Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface` class.


##### SettingRepositoryInterface::get()[](#usage/settings/setting-repository/settingrepositoryinterface-get)

The `get` method returns the setting instance.

###### Returns: `\Anomaly\SettingsModule\Setting\Contract\SettingInterface`

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

The setting key.

</td>

</tr>

</tbody>

</table>

###### Example

    $max = $settings->value('anomaly.module.files::max_upload_size');

    echo $max->getValue();


##### SettingRepositoryInterface::set()[](#usage/settings/setting-repository/settingrepositoryinterface-set)

The `set` method allows you to set a setting value.

<div class="alert alert-info">**Note:** Values are passed through the setting's field **modifier**.</div>

###### Returns: `boolean`

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

The setting key.

</td>

</tr>

<tr>

<td>

$value

</td>

<td>

true

</td>

<td>

mixed

</td>

<td>

none

</td>

<td>

The setting value.

</td>

</tr>

</tbody>

</table>

###### Example

    $settings->set('anomaly.module.files::max_upload_size', 32);


##### SettingRepositoryInterface::value()[](#usage/settings/setting-repository/settingrepositoryinterface-value)

The `value` method returns the value as the setting field type normally would with `getType`.

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

The setting key.

</td>

</tr>

<tr>

<td>

$default

</td>

<td>

false

</td>

<td>

mixed

</td>

<td>

null

</td>

<td>

The default value.

</td>

</tr>

</tbody>

</table>

###### Example

    $value = $settings->value('anomaly.module.files::max_upload_size', 2);


##### SettingRepositoryInterface::presenter()[](#usage/settings/setting-repository/settingrepositoryinterface-presenter)

The `presenter` method returns the setting value's field type presenter or `null` if the value's field no longer exists.

###### Returns: `\Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter` or `null`

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

The setting key.

</td>

</tr>

</tbody>

</table>


### Plugin[](#usage/plugin)

This section will go over how to use the `SettingsModulePlugin` that ships with the Settings module.


#### setting[](#usage/plugin/setting)

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

    {{ setting('streams::name') }} // Returns __toString from setting field type presenter

    <ul>
        {% for locale, name in setting('streams::enabled_locales').selections() %}
        <li>
            {{ name }} [{{ locale }}]
        </li>
        {% endfor %}
    </ul>


#### setting_value[](#usage/plugin/setting-value)

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

    {{ setting_value('streams::name') }}

    {{ setting_value('streams::default_locale') }}

    <ul>
        {% for locale in setting_value('streams::enabled_locales') %}
        <li>
            {{ locale }}
        </li>
        {% endfor %}
    </ul>


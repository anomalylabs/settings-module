# Settings Module

*anomaly.module.settings*

#### System settings management for the Streams Platform.

The Settings Module provides application-wide settings management with database-backed storage and field-based editing.

## Features

- Application-wide settings
- Field-based settings editing
- Default value handling
- Settings caching
- Validation support
- Control panel interface

## Usage

### Accessing Settings

```php
// Get setting value
$siteName = setting('streams::name');

// Get with default
$perPage = setting('posts::per_page', 25);

// Using facade
use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;

$settings = app(SettingRepositoryInterface::class);
$value = $settings->value('streams::name');
```

### In Twig

```twig
{# Get setting #}
{{ setting('streams::name') }}

{# Check setting #}
{% if setting('maintenance_mode') %}
    <div class="alert">Site is in maintenance mode</div>
{% endif %}
```

### Setting Values

```php
$settings->set('streams::name', 'My Site');

// Set multiple
$settings->set([
    'streams::name' => 'My Site',
    'streams::description' => 'Welcome'
]);
```

## Requirements

- Streams Platform ^1.10
- PyroCMS 3.10+

## License

The Settings Module is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

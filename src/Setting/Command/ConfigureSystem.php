<?php namespace Anomaly\SettingsModule\Setting\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Foundation\Application;

/**
 * Class ConfigureSystem
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\SettingsModule\Setting\Command
 */
class ConfigureSystem implements SelfHandling
{

    /**
     * Configuration to setting map.
     *
     * @var array
     */
    protected $settings = [
        'app.debug'                         => 'streams::debug',
        'app.timezone'                      => 'streams::timezone',
        'streams::locales.default'          => 'streams::default_locale',
        'streams::locales.enabled'          => 'streams::enabled_locales',
        'streams::themes.admin'             => 'streams::admin_theme',
        'streams::themes.standard'          => 'streams::standard_theme',
        'streams::maintenance.auth'         => 'streams::basic_auth',
        'streams::maintenance.ip_whitelist' => 'streams::ip_whitelist',
        'streams::system.per_page'          => 'streams::per_page',
        'mail.from.name'                    => 'streams::sender',
        'mail.from.address'                 => 'streams::email',
        'mail.driver'                       => 'streams::mail_driver',
        'mail.host'                         => 'streams::mail_host',
        'mail.port'                         => 'streams::mail_port',
        'mail.username'                     => 'streams::mail_username',
        'mail.password'                     => 'streams::mail_password',
        'mail.pretend'                      => 'streams::mail_debug'
    ];

    /**
     * Handle the command.
     *
     * @param SettingRepositoryInterface $settings
     * @param Application                $application
     * @param Repository                 $config
     */
    public function handle(SettingRepositoryInterface $settings, Application $application, Repository $config)
    {
        foreach ($this->settings as $key => $value) {
            $config->set($key, $settings->value($value, $config->get($key)));
        }

        $maintenance = $settings->value('streams::maintenance', false);

        if ($maintenance && !$application->isDownForMaintenance()) {
            touch(storage_path('framework/down'));
        }

        if (!$maintenance && $application->isDownForMaintenance()) {
            unlink(storage_path('framework/down'));
        }
    }
}

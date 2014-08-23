<?php namespace Streams\Addon\Module\Settings\Controller\Admin;

use Streams\Core\Controller\AdminController;

class SettingsController extends AdminController
{
    public function index()
    {
        return \View::make('module::index');
    }
}

<?php namespace Anomaly\SettingsModule\Support\Form;

use Anomaly\SettingsModule\Setting\SettingModel;
use Illuminate\Http\Request;

class SettingFormHandler
{

    public function handle(SettingModel $model, Request $request)
    {
        dd($request->all());
    }
}

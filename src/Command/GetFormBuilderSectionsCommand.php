<?php namespace Anomaly\SettingsModule\Command;

class GetFormBuilderSectionsCommand
{

    protected $type;

    protected $slug;

    function __construct($slug, $type)
    {
        $this->slug = $slug;
        $this->type = $type;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getType()
    {
        return $this->type;
    }
}
 
<?php

/**
 * Get a setting value.
 *
 * @param      $key
 * @param null $default
 * @return mixed
 */
function setting($key, $default = null)
{
    return app('streams.settings')->get($key, $default);
}
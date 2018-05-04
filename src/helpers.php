<?php

use Illuminate\Support\Facades\Cookie;

if (! function_exists('lang')) {
    /**
     * Translate the given message.
     *
     * @param  string  $key
     * @param  array  $replace
     * @param  string  $locale
     * @return string|array|null
     */
    function lang($key, $replace = [], $locale = null)
    {
        $key = 'localization::' . $key;
        if ($locale == null) {
            $locale = Cookie::get('localization', null);
        }
        if ($locale !== null && !config('localization.lang.'.$locale.'.active')) {
            $locale = config('localization.default', null);
        }
        return app('translator')->getFromJson($key, $replace, $locale ?? config('localization.default', null));
    }
}

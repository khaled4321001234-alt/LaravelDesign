<?php

// region: locale
if( !function_exists('isLocaleAllowed') ) {
    /**
     * @param string|\Closure $locale
     *
     * @return bool
     */
    function isLocaleAllowed($locale): bool
    {
        return array_key_exists($locale, array_flip(getLocales(true)));
    }
}

if( !function_exists('getLocales') ) {
    /**
     * @return array
     */
    function getLocales(bool $withNames = false): array
    {
        $locales = config('app.locales', config('nova.locales', []));

        return $withNames ? array_flip($locales) : array_keys($locales);
    }
}

if( !function_exists('getDefaultLocale') ) {
    /**
     * @param string|\Closure $default
     *
     * @return string|null
     */
    function getDefaultLocale($default = 'en'): string|null
    {
        $default = value($default);

        return config('app.locale', config('app.fallback_locale', $default)) ?: $default;
    }
}
// endregion: locale

if( !function_exists('currentLocale') ) {
    /**
     * return appLocale
     *
     * @param bool $full
     *
     * @return string
     */
    function currentLocale($full = false): string
    {
        if( $full )
            return (string) app()->getLocale();

        $locale = str_replace('_', '-', app()->getLocale());
        $locale = current(explode("-", $locale));

        return $locale ?: "";
    }
}

if( !function_exists('setCurrentLocale') ) {
    /**
     * @param \Closure|string|null $locale
     *
     * @return bool
     */
    function setCurrentLocale($locale = null): bool
    {
        try {
            $session = request()->session();
        } catch(Exception|Error $error) {
            try {
                $session = resolve('session');
                request()->setLaravelSession($session);
            } catch(Exception $exception) {
                $session = optional();
            }
        }
        $language = value($locale);
        $language ??= $session->get('language') ?: getDefaultLocale('en');

        if( $language && isLocaleAllowed($language) ) {
            if( currentLocale() !== $language ) {
                $session->put('language', $language);
                $session->save();

                app()->setLocale($language);
            }

            return true;
        }

        return false;
    }
}


if( !function_exists('columnLocalize') ) {
    /**
     * Localize column name.
     *
     * @param string      $columnName Column name
     * @param string|null $locale     Locale name, Null = current locale name
     *
     * @return string
     */
    function columnLocalize($columnName = 'name', $locale = null, string $table = "", string $as = "")
        {
            return ($table ? "{$table}." : "")
                . rtrim($columnName, '_')
                . '_'
                . ($locale ?: currentLocale())
                . ($as ? " as {$as}" : "");
        }

}

if( !function_exists('columnLocalizeOpposite') ) {
    /**
     * Localize column name.
     *
     * @param string      $columnName Column name
     * @param string|null $locale     Locale name, Null = current locale name
     *
     * @return string
     */
    function columnLocalizeOpposite($columnName = 'name', $locale = null, string $table = "", string $as = "")
    {
		$locale = ($locale ?: currentLocale()) === 'ar' ? 'en' : 'ar';
        return ($table ? "{$table}.":"") . $locale . '_' . rtrim($columnName, '_') . (
			$as ? " as {$as}" : ""
	        );
    }
}
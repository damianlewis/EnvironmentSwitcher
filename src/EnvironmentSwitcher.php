<?php

namespace EnvironmentSwitcher;

use Exception;

abstract class EnvironmentSwitcher
{
    const ENV_FILE = __DIR__.'/../../.env';

    /**
     * Switches the current application environment to the given environment.
     *
     * @param string $env
     *
     * @return bool
     * @throws Exception
     */
    public static function switch(string $env): bool
    {
        if (! file_exists($src = self::ENV_FILE.'.'.$env)) {
            throw new Exception($src);
        }

        return copy($src, self::ENV_FILE);
    }
}
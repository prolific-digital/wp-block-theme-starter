<?php

/**
 * Autoloads classes for the theme.
 *
 * This function registers an autoloader that automatically includes class files
 * when they are needed. It supports two formats:
 * - Regular: Converts the class name to lowercase, replaces backslashes with directory separators,
 *   and loads the class file from the 'classes' directory.
 * - WordPress: Converts the class name to lowercase, replaces backslashes with directory separators,
 *   prefixes the class name with 'class-', and loads the class file from the 'classes' directory.
 *
 * @param string $classname The name of the class to load.
 *
 * @return void
 */
spl_autoload_register(function ($classname) {

    // Regular
    $class      = str_replace('\\', DIRECTORY_SEPARATOR, strtolower($classname));
    $classpath  = dirname(__FILE__) .  DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . $class . '.php';

    // WordPress
    $parts      = explode('\\', $classname);
    $class      = 'class-' . strtolower(array_pop($parts));
    $folders    = strtolower(implode(DIRECTORY_SEPARATOR, $parts));
    $wppath     = dirname(__FILE__) .  DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . $folders . DIRECTORY_SEPARATOR . $class . '.php';

    if (file_exists($classpath)) {
        include_once $classpath;
    } elseif (file_exists($wppath)) {
        include_once $wppath;
    }
});

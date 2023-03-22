<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitd2fb62e3bf5a436b7508e393096a555a
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitd2fb62e3bf5a436b7508e393096a555a', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitd2fb62e3bf5a436b7508e393096a555a', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitd2fb62e3bf5a436b7508e393096a555a::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd2fb62e3bf5a436b7508e393096a555a
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'Engine\\DI\\' => 10,
            'Engine\\' => 7,
        ),
        'C' => 
        array (
            'Cms\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Engine\\DI\\' => 
        array (
            0 => __DIR__ . '/../..' . '/engine/DI',
        ),
        'Engine\\' => 
        array (
            0 => __DIR__ . '/../..' . '/engine',
        ),
        'Cms\\' => 
        array (
            0 => __DIR__ . '/../..' . '/cms',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd2fb62e3bf5a436b7508e393096a555a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd2fb62e3bf5a436b7508e393096a555a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd2fb62e3bf5a436b7508e393096a555a::$classMap;

        }, null, ClassLoader::class);
    }
}

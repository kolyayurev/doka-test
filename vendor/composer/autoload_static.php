<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit89036ddc2262feefc4031479a8bad7d6
{
    public static $files = array (
        'd9570edbac2424df5253fe4e2f7a1980' => __DIR__ . '/../..' . '/core/Helpers/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit89036ddc2262feefc4031479a8bad7d6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit89036ddc2262feefc4031479a8bad7d6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit89036ddc2262feefc4031479a8bad7d6::$classMap;

        }, null, ClassLoader::class);
    }
}
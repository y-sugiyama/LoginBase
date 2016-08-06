<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb825439507f0f34d755eea15cf0df113
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb825439507f0f34d755eea15cf0df113::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb825439507f0f34d755eea15cf0df113::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}

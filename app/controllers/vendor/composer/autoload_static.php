<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2630204b4530f49893e5af786955cc1d
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2630204b4530f49893e5af786955cc1d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2630204b4530f49893e5af786955cc1d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2630204b4530f49893e5af786955cc1d::$classMap;

        }, null, ClassLoader::class);
    }
}

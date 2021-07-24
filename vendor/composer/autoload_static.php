<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit036055879a6946bf206ac9be68a8d9d2
{
    public static $prefixLengthsPsr4 = array (
        'o' => 
        array (
            'ocs\\wplib\\' => 10,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ocs\\wplib\\' => 
        array (
            0 => __DIR__ . '/..' . '/ocs/wplib/src',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit036055879a6946bf206ac9be68a8d9d2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit036055879a6946bf206ac9be68a8d9d2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit036055879a6946bf206ac9be68a8d9d2::$classMap;

        }, null, ClassLoader::class);
    }
}

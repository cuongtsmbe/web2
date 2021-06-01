<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit204f2496b6c8cb9af872e5e3f0b105be
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit204f2496b6c8cb9af872e5e3f0b105be::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit204f2496b6c8cb9af872e5e3f0b105be::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit204f2496b6c8cb9af872e5e3f0b105be::$classMap;

        }, null, ClassLoader::class);
    }
}

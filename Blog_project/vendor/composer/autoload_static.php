<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1be3f613648eb87119847642489c547d
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit1be3f613648eb87119847642489c547d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1be3f613648eb87119847642489c547d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1be3f613648eb87119847642489c547d::$classMap;

        }, null, ClassLoader::class);
    }
}

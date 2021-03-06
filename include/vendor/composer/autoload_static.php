<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitca8bc72057ae08fc8bf7ad8ad144d3f6
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Plasticbrain\\FlashMessages\\' => 27,
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Plasticbrain\\FlashMessages\\' => 
        array (
            0 => __DIR__ . '/..' . '/plasticbrain/php-flash-messages/src',
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitca8bc72057ae08fc8bf7ad8ad144d3f6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitca8bc72057ae08fc8bf7ad8ad144d3f6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitca8bc72057ae08fc8bf7ad8ad144d3f6::$classMap;

        }, null, ClassLoader::class);
    }
}

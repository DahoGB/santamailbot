<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb58e883dc0c70b9deb4060c306d226fe
{
    public static $files = array (
        '547f39254e5312c66b30c9b6a7d3570f' => __DIR__ . '/..' . '/eleirbag89/telegrambotphp/Telegram.php',
        '221a7c0887f892e44dd08191321d3815' => __DIR__ . '/..' . '/eleirbag89/telegrambotphp/TelegramErrorLogger.php',
    );

    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/..' . '/league/color-extractor/src',
    );

    public static $prefixesPsr0 = array (
        'c' => 
        array (
            'claviska' => 
            array (
                0 => __DIR__ . '/..' . '/claviska/simpleimage/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->fallbackDirsPsr4 = ComposerStaticInitb58e883dc0c70b9deb4060c306d226fe::$fallbackDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitb58e883dc0c70b9deb4060c306d226fe::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitb58e883dc0c70b9deb4060c306d226fe::$classMap;

        }, null, ClassLoader::class);
    }
}

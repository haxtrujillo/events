<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6d0ff57f565e938a06f4eccb632d84ae
{
    public static $prefixesPsr0 = array (
        'R' => 
        array (
            'Raven_' => 
            array (
                0 => __DIR__ . '/..' . '/sentry/sentry/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit6d0ff57f565e938a06f4eccb632d84ae::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}

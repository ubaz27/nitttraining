<?php

// autoload.php @generated by Composer

<<<<<<< HEAD
require_once __DIR__ . '/composer/autoload_real.php';

return ComposerAutoloaderInitd995249a30f59566d19dd565d15f066a::getLoader();
=======
if (PHP_VERSION_ID < 50600) {
    if (!headers_sent()) {
        header('HTTP/1.1 500 Internal Server Error');
    }
    $err = 'Composer 2.3.0 dropped support for autoloading on PHP <5.6 and you are running '.PHP_VERSION.', please upgrade PHP or use Composer 2.2 LTS via "composer self-update --2.2". Aborting.'.PHP_EOL;
    if (!ini_get('display_errors')) {
        if (PHP_SAPI === 'cli' || PHP_SAPI === 'phpdbg') {
            fwrite(STDERR, $err);
        } elseif (!headers_sent()) {
            echo $err;
        }
    }
    trigger_error(
        $err,
        E_USER_ERROR
    );
}

require_once __DIR__ . '/composer/autoload_real.php';

return ComposerAutoloaderInit671140809cf8f5bb39a559a73891d9f8::getLoader();
>>>>>>> c3d04cc92fe67578ab00ea1ef48a41df536778b9

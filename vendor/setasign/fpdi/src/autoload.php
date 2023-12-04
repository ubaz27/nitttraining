<?php

/**
 * This file is part of FPDI
 *
 * @package   setasign\Fpdi
<<<<<<< HEAD
 * @copyright Copyright (c) 2020 Setasign GmbH & Co. KG (https://www.setasign.com)
=======
 * @copyright Copyright (c) 2023 Setasign GmbH & Co. KG (https://www.setasign.com)
>>>>>>> c3d04cc92fe67578ab00ea1ef48a41df536778b9
 * @license   http://opensource.org/licenses/mit-license The MIT License
 */

spl_autoload_register(static function ($class) {
    if (strpos($class, 'setasign\Fpdi\\') === 0) {
        $filename = str_replace('\\', DIRECTORY_SEPARATOR, substr($class, 14)) . '.php';
        $fullpath = __DIR__ . DIRECTORY_SEPARATOR . $filename;

        if (is_file($fullpath)) {
            /** @noinspection PhpIncludeInspection */
            require_once $fullpath;
        }
    }
});

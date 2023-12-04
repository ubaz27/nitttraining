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

namespace setasign\Fpdi\PdfParser\Filter;

/**
 * Exception for Ascii85 filter class
 */
class Ascii85Exception extends FilterException
{
    /**
     * @var integer
     */
    const ILLEGAL_CHAR_FOUND = 0x0301;

    /**
     * @var integer
     */
    const ILLEGAL_LENGTH = 0x0302;
}

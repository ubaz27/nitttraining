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

namespace setasign\Fpdi\PdfReader;

use setasign\Fpdi\FpdiException;

/**
 * Exception for the pdf reader class
 */
class PdfReaderException extends FpdiException
{
    /**
     * @var int
     */
    const KIDS_EMPTY = 0x0101;

    /**
     * @var int
     */
    const UNEXPECTED_DATA_TYPE = 0x0102;

    /**
     * @var int
     */
    const MISSING_DATA = 0x0103;
}

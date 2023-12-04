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

namespace setasign\Fpdi\PdfParser\Type;

use setasign\Fpdi\PdfParser\PdfParserException;

/**
 * Exception class for pdf type classes
 */
class PdfTypeException extends PdfParserException
{
    /**
     * @var int
     */
    const NO_NEWLINE_AFTER_STREAM_KEYWORD = 0x0601;
}

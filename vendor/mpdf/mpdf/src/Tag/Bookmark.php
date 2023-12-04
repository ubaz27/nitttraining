<?php

namespace Mpdf\Tag;

<<<<<<< HEAD
=======
use Mpdf\Mpdf;

>>>>>>> c3d04cc92fe67578ab00ea1ef48a41df536778b9
class Bookmark extends Tag
{

	public function open($attr, &$ahtml, &$ihtml)
	{
		if (isset($attr['CONTENT'])) {
			$objattr = [];
			$objattr['CONTENT'] = htmlspecialchars_decode($attr['CONTENT'], ENT_QUOTES);
			$objattr['type'] = 'bookmark';
			if (!empty($attr['LEVEL'])) {
				$objattr['bklevel'] = $attr['LEVEL'];
			} else {
				$objattr['bklevel'] = 0;
			}
<<<<<<< HEAD
			$e = "\xbb\xa4\xactype=bookmark,objattr=" . serialize($objattr) . "\xbb\xa4\xac";
=======
			$e = Mpdf::OBJECT_IDENTIFIER . "type=bookmark,objattr=" . serialize($objattr) . Mpdf::OBJECT_IDENTIFIER;
>>>>>>> c3d04cc92fe67578ab00ea1ef48a41df536778b9
			if ($this->mpdf->tableLevel) {
				$this->mpdf->cell[$this->mpdf->row][$this->mpdf->col]['textbuffer'][] = [$e];
			} // *TABLES*
			else { // *TABLES*
				$this->mpdf->textbuffer[] = [$e];
			} // *TABLES*
		}
	}

	public function close(&$ahtml, &$ihtml)
	{
	}
}

<?php

namespace Mpdf\Tag;

<<<<<<< HEAD
=======
use Mpdf\Mpdf;

>>>>>>> c3d04cc92fe67578ab00ea1ef48a41df536778b9
class IndexEntry extends Tag
{

	public function open($attr, &$ahtml, &$ihtml)
	{
		if (!empty($attr['CONTENT'])) {
			if (!empty($attr['XREF'])) {
				$this->mpdf->IndexEntry(htmlspecialchars_decode($attr['CONTENT'], ENT_QUOTES), $attr['XREF']);
				return;
			}
			$objattr = [];
			$objattr['CONTENT'] = htmlspecialchars_decode($attr['CONTENT'], ENT_QUOTES);
			$objattr['type'] = 'indexentry';
			$objattr['vertical-align'] = 'T';
<<<<<<< HEAD
			$e = "\xbb\xa4\xactype=indexentry,objattr=" . serialize($objattr) . "\xbb\xa4\xac";
=======
			$e = Mpdf::OBJECT_IDENTIFIER . "type=indexentry,objattr=" . serialize($objattr) . Mpdf::OBJECT_IDENTIFIER;
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

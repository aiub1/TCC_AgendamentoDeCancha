<?php
define('FPDF_FONTPATH', 'font/');
require('fpdf.php');

// --- UTF8
function ConvUTF8 ($str)
{
		$str = iconv('UTF-8', 'windows-1252', $str);
		return $str;
}

class PDFW extends FPDF
{
	
	// --- DASHED
    function SetDash($black=null, $white=null)
    {
        if($black!==null)
            $s=sprintf('[%.3F %.3F] 0 d',$black*$this->k,$white*$this->k);
        else
            $s='[] 0 d';
        $this->_out($s);
    }
		
	// --- ROTATE
	
	var $angle=0;

	function Rotate($angle, $x=-1, $y=-1)
	{
			if($x==-1)
					$x=$this->x;
			if($y==-1)
					$y=$this->y;
			if($this->angle!=0)
					$this->_out('Q');
			$this->angle=$angle;
			if($angle!=0)
			{
					$angle*=M_PI/180;
					$c=cos($angle);
					$s=sin($angle);
					$cx=$x*$this->k;
					$cy=($this->h-$y)*$this->k;
					$this->_out(sprintf('q %.5f %.5f %.5f %.5f %.2f %.2f cm 1 0 0 1 %.2f %.2f cm', $c, $s, -$s, $c, $cx, $cy, -$cx, -$cy));
			}
	}

	function _endpage()
	{
			if($this->angle!=0)
			{
					$this->angle=0;
					$this->_out('Q');
			}
			parent::_endpage();
	}
	
	function RotatedText($x, $y, $txt, $angle)
	{
		//Text rotated around its origin
		$this->Rotate($angle, $x, $y);
		$this->Text($x, $y, $txt);
		$this->Rotate(0);
	}

	function RotatedImage($file, $x, $y, $w, $h, $angle)
	{
		//Image rotated around its upper-left corner
		$this->Rotate($angle, $x, $y);
		$this->Image($file, $x, $y, $w, $h);
		$this->Rotate(0);
	}
}

?>
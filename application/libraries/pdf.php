<?php 
/**
* 
*/
require_once(APPPATH . './vendor/dompdf/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
class pdf
{
	function __construct()
	{
		$pdf = new Dompdf();
		$CI =& get_instance();
		$CI->dompdf = $pdf;
		
	}
}
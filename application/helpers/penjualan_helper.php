<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('persen_converter'))
{
	function persen_converter($var)
	{
		return (float) $var * 100 . ' %';
	}   
}

if ( ! function_exists('rupiah_converter'))
{
	function rupiah_converter($var)
	{
		$angka = $var;
		$jumlah_desimal ="0";
		$pemisah_desimal =",";
		$pemisah_ribuan =".";
		return "Rp ".number_format($angka, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan);
	}   
}

if ( ! function_exists('ekstrak_angka'))
{
	function ekstrak_angka($var)
	{
		
		return preg_replace('/\D/', '', $var);
	}   
}
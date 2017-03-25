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

if ( ! function_exists('tampil_bulan'))
{
	function tampil_bulan ($x) {
		$bulan = array ('','Januari','Februari','Maret','April',
			'Mei','Juni','Juli','Agustus',
			'September','Oktober','November','Desember');
		return $bulan[$x];
	}
}

if (! function_exists('tampil_pesan')) {
	function tampil_pesan($tipe, $pesan)
	{
		if (!$pesan  || !$tipe ) {
			return null;
		}
		$sql = '
		<script>

			toastr.options = {
				"closeButton": false,
				"debug": false,
				"newestOnTop": true,
				"progressBar": false,
				"positionClass": "toast-bottom-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "5000",
				"hideDuration": "5000",
				"timeOut": "3000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			},
			toastr["'.$tipe.'"]("'.$pesan.'")

		</script>
		';

		return $sql;
	}
}
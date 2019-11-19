<?php
function format_uang($angka){
	$hasil = number_format($angka,0,',','.');
	return $hasil;	 
}	
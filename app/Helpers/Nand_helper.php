<?php
namespace App\Helpers;

class Nand_helper{
    function rupiah($angka){
	
        $hasil_rupiah = "Rp" . number_format($angka,0,',','.').",-";
        echo $hasil_rupiah;
     
    }
}
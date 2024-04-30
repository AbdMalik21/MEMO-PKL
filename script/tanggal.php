<?php function format_indo($date){
	
    if($date =='0000-00-00')
    {	
    	$result = '00-00-0000';
    	return($result);
    }
 	else{
    $BulanIndo = array("Jan", "Feb", "Mar", "April", "Mei", "Juni", "Juli", "Agt", "Sep", "Okt", "Nov", "Des");

    $tahun = substr($date, 0, 4);               
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);
    $result = $tgl . "-" . $BulanIndo[(int)$bulan-1]. "-". $tahun;
    return($result);
	}
	}
 ?>
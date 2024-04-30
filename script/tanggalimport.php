<?php function format_indo($date){
    // $BulanIndo = array("Jan", "Feb", "Mar", "April", "Mei", "Juni", "Juli", "Agt", "Sep", "Okt", "Nov", "Des");
    $tgl = substr($date, 0, 2);
    if($tgl < 10){
        $tgl = substr($date, 0, 1);
        $bulan = substr($date, 2, 3);
        $tahun   = substr($date, 6, 2);
    }
    else {
        $bulan = substr($date, 3, 3);
        $tahun   = substr($date, 7, 2);
    }               
    if ($bulan=='Jan') {
    	$bulan = '01';
    }
    else if ($bulan=='Feb') {
    	$bulan = '02';
    }
    if ($bulan=='Mar') {
    	$bulan = '03';
    }
    else if ($bulan=='Apr') {
    	$bulan = '04';
    }
    else if ($bulan=='May') {
    	$bulan = '05';
    }
    else if ($bulan=='Jun') {
    	$bulan = '06';
    }
    else if ($bulan=='Jul') {
    	$bulan = '07';
    }
    else if ($bulan=='Aug') {
    	$bulan = '08';
    }
    else if ($bulan=='Sep') {
    	$bulan = '09';
    }
    else if ($bulan=='Oct') {
    	$bulan = '10';
    }
    else if ($bulan=='Nov') {
    	$bulan = '11';
    }
    else if ($bulan=='Dec') {
    	$bulan = '12';
    }
    else
    	$bulan == '00';

    $result =  "20".$tahun. "-" . $bulan. "-". $tgl;
    return($result);
}
 ?>



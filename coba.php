<?php 
   
    for($i=1; $i <=12 ; $i++){
        $bulan = date('F',strtotime('0000-'.$i.'-01'));
        $nama_bulan[] = $bulan;
    };
    
    foreach($nama_bulan as $tampil){
        echo $tampil.' <br>';
    }

?>
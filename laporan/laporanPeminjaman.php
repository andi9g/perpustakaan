<?php
ob_start();
include_once('../proses/proses.php');
$laporan = new perpustakaan;
	
	
?>
<html>
    <head>
        <link rel='stylesheet' href='styleLaporan.css'>
    </head>
    <body>
        <table border='0' style='width: 100%;'>
            <tr>
                <td style='width: 65px;;max-width: 65px;'>
                    <img src='stti.png' alt='' width='65px'>
                </td>
                <td class='tdku'>
                    <center>
                    <h4>SEKOLAH TINGGI TEKNOLOGI INDONESIA TANJUNGPINANG</h4>
                    <h4>JL. POMPA AIR KM 2,5 TANJUNGPINANG</h4>
                    <p style='font-size: 11px;'>TELP. (0771) 317780 Website : http://www.sttindonesia.ac.id Email : info@sttindonesia.ac.id</p>
					</center>
					<hr color="black">
                </td>
                <td style='width: 65px;max-width: 65px;'>
                <!-- <img src='stti.png' alt='' width='65px'> -->

                </td>
            </tr>
        </table>

        
        
			<h5 style="text-align: center;">LAPORAN PEMINJAMAN</h5>
		
        

        <table border="1" style="border-style: solid !important;">
            <tr>
                <th>No</th>
                <th>Nis</th>
                <th style='max-width: 200px;width: 200px;padding: 0px 2px;'>Nama Peminjam</th>
                <th>Id Buku</th>
                <th style='max-width: 200px;width: 200px;padding: 0px 2px;'>Judul Buku</th>
                <th>Tgl Pinjam</th>
            </tr>


			<?php $i=1; foreach($laporan->tampil_laporan() as $tampil) {?>
            <tr>
                <td style='padding: 0px 5px;text-align: center;'><?php echo $i++;?></td>
                <td style='padding: 0px 5px;'><?php echo $tampil['nis'];?></td>
                <td><?php echo $tampil['nama'];?></td>
                <td style='padding: 0px 5px;text-transform: uppercase;'><?php echo $tampil['id_buku'];?></td>
                <td><?php echo $tampil['judul_buku'];?></td>
                <td style='padding: 0px 5px;'><?php echo date('d/m/Y',strtotime($tampil['tgl_pinjam']));?></td>
			</tr>
			<?php }?>
        </table>


    </body>
</html>




<?php

	require_once "./mpdf_v8.0.3/vendor/autoload.php";
	$mpdf = new \Mpdf\Mpdf();
	$mpdf->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
	$html = ob_get_contents();
	ob_end_clean();
	$mpdf->WriteHTML(utf8_encode($html));
	$mpdf->Output();
?>
<div class="card-header">
    <div class="row">
        <div class="col">
            <h4 style="text-transform: capitalize;font-weight: bold;"><i class="fa fa-calendar-check-o"></i>&nbsp;&nbsp;<?php echo str_replace('_',' ',$_GET['pages'])?></h4>
        </div>
        <div class="col text-right">
            <a href="?pages=pinjam_buku" class="btn <?php if($_SESSION['sidebarku']=='light'){?>btn-success<?php }else {echo 'btn-danger';}?> btn-sm">
                <i class="fa fa-plus"> </i> Pinjam Buku
            </a>
        </div>
    </div>
    
</div>


<div class="card-body">
    <table id="example1" class="table <?php if($_SESSION['sidebarku']=='light'){?>table-bordered <?php };?>table-striped tableku22" style="text-transform: capitalize;">
        <thead>
        <tr>
            <th>Nis</th>
            <th>Nama Peminjam</th>
            <th>id_buku</th>
            <th>Judul Buku</th>
            <th>Tgl Pinjam</th>
            <th>Batas Akhir</th>
            <th>Ket.</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
                foreach($db->data_peminjaman() as $tampil){
            ?>
            <tr>
                <td style="font-weight: bold;"><?php echo $tampil['nis']?></td>
                <td><?php echo $tampil['nama']?></td>
                <td style="font-weight: bold;"><?php echo $tampil['id_buku']?></td>
                <td><?php echo $tampil['judul_buku']?></td>
                <td><?php echo date('d F Y',strtotime($tampil['tgl_pinjam']))?></td>
                <td><?php echo date('d F Y',strtotime($tampil['tgl_kembali']))?></td>
                <td>
                    <?php

                        $tgl_pinjam =  strtotime($tampil['tgl_pinjam']);
                        $tgl_kembali =  strtotime($tampil['tgl_kembali']);
                        $tgl_sekarang = strtotime(date('Y-m-d'));

                        $ket = $tgl_sekarang - $tgl_kembali;
                        $ket = $ket / 86400;

                        if($ket > 0) {
                            echo "<font style='font-weight: bold;' class='text-danger'>Terlambat ".$ket." Hari (Telat)</font>";
                        }else if($ket == 0 ){
                            echo "<font style='font-weight: bold;' class='text-warning'> Hari Terakhir </font>";
                        } else if($ket < 0 && $ket >= -3){
                            echo "<font style='font-weight: bold;' class='text-warning'> ".($ket * -1)." Hari Lagi (Sebentar Lagi) </font>";
                        } else if($ket < -3 ){
                            echo "<font style='font-weight: bold;' class='text-success'> ".($ket * -1)." Hari Lagi (Aman) </font>";
                        }
                    
                    ?>

                </td>
                
            </tr>
            
        <?php }?>
       
        </tbody>
    </table>
</div>



<?php
    if(isset($_POST['hapus_siswa'])){
        $ket = $db->hapus_siswa($_POST['hapus_siswa']);
        
    }
?>


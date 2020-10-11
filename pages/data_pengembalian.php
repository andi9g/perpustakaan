<div class="card-header">
    <div class="row">
        <div class="col">
            <h4 style="text-transform: capitalize;font-weight: bold;"><i class="fa fa-calendar-times-o"></i>&nbsp;&nbsp;<?php echo str_replace('_',' ',$_GET['pages'])?></h4>
        </div>
        <div class="col text-right">
            <a href="?pages=data_peminjaman" class="btn <?php if($_SESSION['sidebarku']=='light'){?>btn-success<?php }else {echo 'btn-danger';}?> btn-sm">
                <i class="fa fa-search"> </i> Lihat Data Peminjaman
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
            <th>Id Buku</th>
            <th>Judul Buku</th>
            <th>Ket.</th>
            <th>Aksi</th>
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

                <td>
                    <form action="" method="post">
                        <button type="submit" onclick="return confirm('( <?php echo $tampil['nama'];?> ) '+' Mengembalikan Buku  ( '+'<?php echo $tampil['judul_buku'];?>'+' )?');" name="selesai_satuan" value="<?php echo $tampil['id'];?>" class="btn btn-primary btn-xs px-2"><b>SELESAI</b></button>
                        <button type="submit" onclick="return confirm('( <?php echo $tampil['nama'];?> )  Mengembalikan semua Buku?')" name="selesai_semua" value="<?php echo $tampil['nis'];?>" class="btn btn-danger btn-xs"> <i class="fa fa-calendar-minus-o px-1"></i></button>
                    </form>
                </td>
                
            </tr>
            
        <?php }?>
       
        </tbody>
    </table>
</div>



<?php
    if(isset($_POST['selesai_satuan'])){
        $db->selesai_satuan($_POST['selesai_satuan']);
    }

    if(isset($_POST['selesai_semua'])){
        $db->selesai_semua($_POST['selesai_semua']);
    }
?>


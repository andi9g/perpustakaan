<div class="card-header">
    <div class="row">
        <div class="col">
            <h4  style="text-transform: capitalize;font-weight: bold;"><i class="fa fa-book"></i>&nbsp;&nbsp;<?php echo str_replace('_',' ',$_GET['pages'])?></h4>
        </div>
        <div class="col text-right">
            <a href="?pages=<?php echo $_GET['pages']?>&aksi=tambah_buku" class="btn <?php if($_SESSION['sidebarku']=='light'){?>btn-success<?php }else {echo 'btn-danger';}?> btn-sm">
                <i class="fa fa-plus"> </i> Tambah Buku
            </a>
        </div>
    </div>
    
</div>


<div class="card-body">
    <table id="example1" class="table <?php if($_SESSION['sidebarku']=='light'){?>table-bordered <?php };?>table-striped tableku22" style="text-transform: capitalize;">
        <thead>
        <tr>
            <th>Id Buku</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Stok Buku</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
            <?php
                foreach($db->tampil_buku() as $tampil){
            ?>
            <tr>
                <td><?php echo $tampil['id_buku']?></td>
                <td><?php echo $tampil['judul_buku']?></td>
                <td><?php echo $tampil['penerbit']?></td>
                <td><?php echo $tampil['pengarang']?></td>
                <td><?php echo $tampil['tahun_terbit']?></td>
                <td><?php echo $tampil['stok_buku']?></td>
                <td>
                    <form method="post" class="d-inline mr-1 p-0">
                        <button onclick="return confirm('Yakin ingin mehapus?')" type="submit" class="btn btn-warning btn-xs px-2 p-0" name="hapus" value="<?php echo $tampil['id_buku'];?>"><i class="fa fa-trash text-dark"></i></button>
                    </form>
                    <a href="index.php?pages=<?php echo $_GET['pages'];?>&aksi=ubah_buku&id=<?php echo $tampil['id_buku'];?>" class="btn btn-info btn-xs px-2 p-0" "><i class="fa fa-pencil text-dark"></i></a>
                </td>
            </tr>
            
        <?php }?>
       
        </tbody>
    </table>
</div>



<?php
    if(isset($_POST['hapus'])){
        $ket = $db->hapus_buku($_POST['hapus']);
        
    }
?>


<?php
    $id = $_GET['id'];
    $ubah = $_GET['aksi'];
    if($ubah=='ubah_buku'){
        $table = 'tb_buku';
        $attr = 'id_buku';
    }else if($ubah=='ubah_siswa'){
        $table = 'tb_siswa';
        $attr = 'nis';
    }
?>

<div class="card-header">
    <div class="row">
        <div class="col">
            <h5 class="d-inline" style="text-transform: capitalize;font-weight: bold;"><?php echo str_replace('_',' ',$_GET['aksi'])?></h5><h3 class="d-inline"> <font style="text-transform: uppercase;">( <?php echo $_GET['id'];?> )</font></h3>
        </div>
    </div>
    
</div>


<form method="post">
    <div class="card-body">

        <?php 
            foreach($db->tampil_ubah($table,$attr,$id) as $tampil){
        ?>
        

        <div class="form-group row">
            <label for="exampleInputEmail1" class="col-md-2" >Nama Lengkap</label>
            <input type="text" name="nama" style="text-transform: capitalize;" class="form-control col-md-10 inputku" id="exampleInputEmail1" value="<?php echo $tampil['nama'];?>">
        </div>

        <div class="form-group row">
            <label for="exampleInputEmail1" class="col-md-2" >No. Hp</label>
            <input type="number" name="hp" style="text-transform: capitalize;" class="form-control col-md-10 inputku" id="exampleInputEmail1" value="<?php echo $tampil['hp'];?>">
        </div>

        <div class="form-group row">
            <label for="exampleInputEmail1" class="col-md-2" >Alamat</label>
            <input type="text" name="alamat" style="text-transform: capitalize;" class="form-control col-md-10 inputku" id="exampleInputEmail1" value="<?php echo $tampil['alamat'];?>">
        </div>

            <?php }?>
        
       
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        
        <div class="row">
            <div class="col-md">
            <a href="index.php?pages=<?php echo $_GET['pages'];?>" class="text-left"> << Kembali</a>
            </div>
            <div class="col text-right">
            <button type="submit" onclick="return confirm('yakin ingin mengubahnya?..')" name="<?php echo $ubah;?>" class="btn btn-primary text-right">Ubah Siswa</button>
            </div>
        </div>
        
    </div>
    </form>

    <?php  
        if(isset($_POST[$ubah])){
            $db->ubah_siswa($table,$id,$_POST['nama'],$_POST['hp'],$_POST['alamat']);
        }
    
    ?>

    
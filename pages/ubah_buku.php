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
                <label for="exampleInputEmail1" class="col-md-2" >Judul Buku</label>
                <input type="text" name="judul_buku" style="text-transform: capitalize;" class="form-control col-md-10 inputku" id="exampleInputEmail1" value="<?php echo $tampil['judul_buku'];?>">
            </div>

            <div class="form-group row">
                <label for="exampleInputEmail1" class="col-md-2" >Penerbit</label>
                <input type="text" name="penerbit" style="text-transform: capitalize;" class="form-control col-md-10 inputku" id="exampleInputEmail1" value="<?php echo $tampil['penerbit'];?>">
            </div>

            <div class="form-group row">
                <label for="exampleInputEmail1" class="col-md-2" >Pengarang</label>
                <input type="text" name="pengarang" style="text-transform: capitalize;" class="form-control col-md-10 inputku" id="exampleInputEmail1" value="<?php echo $tampil['pengarang'];?>">
            </div>

            <div class="form-group row">
                <?php $years = range(1940, strftime("%Y", time())); ?>
                    <label for="exampleInputEmail1" class="col-md-2" >Tahun Terbit</label>
                <select class="form-control col-md-10 inputku colorku" name="tahun_terbit" required>
                    <option value="pilih">-- Pilih Tahun Terbit --</option>
                    <?php foreach($years as $year) : ?>
                        <option value="<?php echo $year; ?>"
                            <?php
                                if($year == $tampil['tahun_terbit']){echo "selected";}
                            ?>
                        ><?php echo $year; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group row">
                <label for="exampleInputEmail1" class="col-md-2" >Stok buku</label>
                <input type="number" name="stok_buku" class="form-control col-md-10 inputku " id="exampleInputEmail1" value="<?php echo $tampil['stok_buku'];?>">
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
            <button type="submit" onclick="return confirm('yakin ingin mengubahnya?..')" name="<?php echo $ubah;?>" class="btn btn-primary text-right">Ubah Buku</button>
            </div>
        </div>
        
    </div>
    </form>

    <?php  
        if(isset($_POST[$ubah])){
            $db->ubah_buku($table,$id,$_POST['judul_buku'],$_POST['pengarang'],$_POST['penerbit'],$_POST['tahun_terbit'],$_POST['stok_buku']);
        }
    
    ?>

    
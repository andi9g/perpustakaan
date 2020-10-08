<div class="card-header">
    <div class="row">
        <div class="col">
            <h5  style="text-transform: capitalize;font-weight: bold;"><?php echo str_replace('_',' ',$_GET['aksi'])?></h5>
        </div>
    </div>
    
</div>


<form method="post">
    <div class="card-body">
        <div class="form-group row">
            <label for="exampleInputEmail1" class="col-md-2" >Nis</label>
            <input type="number" name="nis" class="form-control col-md-10 inputku" style="text-transform: uppercase;" id="exampleInputEmail1" placeholder="nis">
        </div>

        <div class="form-group row">
            <label for="exampleInputEmail1" class="col-md-2" >Nama Lengkap</label>
            <input type="text" name="nama" style="text-transform: capitalize;" class="form-control col-md-10 inputku" id="exampleInputEmail1" placeholder="nama lengkap">
        </div>

        <div class="form-group row">
            <label for="exampleInputEmail1" class="col-md-2" >No. Hp</label>
            <input type="number" name="hp" style="text-transform: capitalize;" class="form-control col-md-10 inputku" id="exampleInputEmail1" placeholder="083123457xx">
        </div>

        <div class="form-group row">
            <label for="exampleInputEmail1" class="col-md-2" >Alamat</label>
            <input type="text" name="alamat" style="text-transform: capitalize;" class="form-control col-md-10 inputku" id="exampleInputEmail1" placeholder="alamat">
        </div>
        
       
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        
        <div class="row">
            <div class="col-md">
            <a href="index.php?pages=<?php echo $_GET['pages'];?>" class="text-left"> << Kembali</a>
            </div>
            <div class="col text-right">
            <button type="reset" class="btn btn-warning text-right">Reset</button>
            <button type="submit" name="tambah_siswa" class="btn btn-primary text-right">Tambah Siswa</button>
            </div>
        </div>
        
    </div>
    </form>

    <?php 
        if(isset($_POST['tambah_siswa'])){
            $db->tambah_siswa($_POST['nis'],$_POST['nama'],$_POST['hp'],$_POST['alamat']);
        }
    
    ?>

    
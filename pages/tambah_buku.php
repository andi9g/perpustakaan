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
            <label for="exampleInputEmail1" class="col-md-2" >Id Buku</label>
            <input type="text" name="id_buku" class="form-control col-md-10 inputku" style="text-transform: uppercase;" id="exampleInputEmail1" placeholder="Id buku">
        </div>

        <div class="form-group row">
            <label for="exampleInputEmail1" class="col-md-2" >Judul Buku</label>
            <input type="text" name="judul_buku" style="text-transform: capitalize;" class="form-control col-md-10 inputku" id="exampleInputEmail1" placeholder="Judul buku">
        </div>

        <div class="form-group row">
            <label for="exampleInputEmail1" class="col-md-2" >Penerbit</label>
            <input type="text" name="penerbit" style="text-transform: capitalize;" class="form-control col-md-10 inputku" id="exampleInputEmail1" placeholder="Penerbit">
        </div>

        <div class="form-group row">
            <label for="exampleInputEmail1" class="col-md-2" >Pengarang</label>
            <input type="text" name="pengarang" style="text-transform: capitalize;" class="form-control col-md-10 inputku" id="exampleInputEmail1" placeholder="Pengarang">
        </div>

        <div class="form-group row">
            <?php $years = range(1940, strftime("%Y", time())); ?>
                <label for="exampleInputEmail1" class="col-md-2" >Tahun Terbit</label>
            <select class="form-control col-md-10 inputku colorku" name="tahun_terbit" required>
                <option value="pilih">-- Pilih Tahun Terbit --</option>
                <?php foreach($years as $year) : ?>
                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group row">
            <label for="exampleInputEmail1" class="col-md-2" >Stok buku</label>
            <input type="number" name="stok_buku" class="form-control col-md-10 inputku " id="exampleInputEmail1" placeholder="1 s/d 500">
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
            <button type="submit" name="tambah_buku" class="btn btn-primary text-right">Tambah Buku</button>
            </div>
        </div>
        
    </div>
    </form>

    <?php 
        if(isset($_POST['tambah_buku'])){
            $db->tambah_buku($_POST['id_buku'],$_POST['judul_buku'],$_POST['penerbit'],$_POST['pengarang'],$_POST['tahun_terbit'],$_POST['stok_buku']);
        }
    
    ?>

    
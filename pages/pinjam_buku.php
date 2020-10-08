<div class="card-header">
    <div class="row">
        <div class="col">
            <h4  style="text-transform: capitalize;font-weight: bold;"><i class="fa fa-book"></i>&nbsp;&nbsp;<?php echo str_replace('_',' ',$_GET['pages'])?></h4>
        </div>
        <div class="col text-right">
            <a href="?pages=<?php echo $_GET['pages']?>&aksi=tambah_buku" class="btn <?php if($_SESSION['sidebarku']=='light'){?>btn-success<?php }else {echo 'btn-danger';}?> btn-sm">
                <i class="fa fa-search"> </i> Lihat Data Peminjaman
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
                <td class='d-block'>
                    <button type="button" class="btn btn-warning d-block btn-xs px-3" data-toggle="modal" data-target="#modal<?php echo $tampil['id_buku'];?>">
                       <font style="font-weight: bold;"> PINJAM </font>
                    </button>
                </td>
            </tr>

            
            <div class="modal fade" id="modal<?php echo $tampil['id_buku'];?>">
                <div class="modal-dialog">
                <div class="modal-content">
                <form action="" method="post">
                    <div class="modal-header <?php if($_SESSION['sidebarku']=='light'){?>bg-light<?php }else{ echo "bg-dark";}?>" style="border: none !important;">
                        <h4 class="modal-title">Pinjam <font style="text-transform: uppercase;">( <?php echo $tampil['judul_buku'];?> )</font></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body <?php if($_SESSION['sidebarku']=='light'){?><?php }else{ echo "breadcrumbColor";}?>">
                        

                    <div class="row">
                        <h6 class="col-md"><b>Identitas Peminjam</b></h6>
                        <hr>
                    </div>
                        <div class="row">
                            <div class="col-md-12 px-4">
                                <div class="form-group">
                                
                                <select class="form-control select2 bg-dark" name="nis_pinjam" style="width: 100%;" require>
                                    <option value="pilih" selected="selected">Masukkan Nim atau Nama</option>
                                    <?php foreach($db->identitas_peminjam() as $identitas){?>
                                    <option value="<?php echo $identitas['nis'];?>"><font style="text-transform: capitalize;"><?php echo $identitas['nis']." - ".$identitas['nama'];?></font></option>
                                    <?php }?>
                                    
                                </select>
                                </div>
                            </div>
                        </div>


                        <br>
                        <div class="row">
                            <h6 class="col-md"><b>Ket. Buku</b></h6>
                            <hr>
                        </div>

                        <div class="form-group row px-4">
                            <label for="exampleInputEmail1" class="col-md-3" >Id Buku</label>
                            <input type="text" name="id_buku" style="text-transform: capitalize;" class="form-control col-md-9 inputku3" id="exampleInputEmail1" value="<?php echo $tampil['id_buku'];?>" disabled>
                        </div>

                        <div class="form-group row px-4">
                            <label for="exampleInputEmail1" class="col-md-3" >Judul Buku</label>
                            <input type="text" name="judul_buku" style="text-transform: capitalize;" class="form-control col-md-9 inputku3" id="exampleInputEmail1" value="<?php echo $tampil['judul_buku'];?>" disabled>
                        </div>

                        <div class="form-group row px-4">
                            <label for="exampleInputEmail1" class="col-md-3" >Pengarang</label>
                            <input type="text" name="pengarang" style="text-transform: capitalize;" class="form-control col-md-9 inputku3" id="exampleInputEmail1" value="<?php echo $tampil['pengarang'];?>" disabled>
                        </div>
                        <div class="form-group row px-4">
                            <label for="exampleInputEmail1" class="col-md-3" >Penerbit</label>
                            <input type="text" name="pengarang" style="text-transform: capitalize;" class="form-control col-md-9 inputku3" id="exampleInputEmail1" value="<?php echo $tampil['penerbit'];?>" disabled>
                        </div>
                        <div class="form-group row px-4">
                            <label for="exampleInputEmail1" class="col-md-3" >Stok</label>
                            <input type="text" name="pengarang" style="text-transform: capitalize;" class="form-control col-md-9 inputku3" id="exampleInputEmail1" value="<?php echo $tampil['stok_buku'];?>" disabled>
                        </div>

                        



                    </div>

                    <div class="modal-footer justify-content-between <?php if($_SESSION['sidebarku']=='light'){?>bg-light<?php }else{ echo "bg-dark";}?>" style="border: none !important;" >
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" name="pinjam_buku" class="btn btn-primary" value="<?php echo $tampil['id_buku']?>">Pinjam</button>
                    </div>
                </form>
                </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->


            
        <?php }?>
       
        </tbody>
    </table>
</div>



<?php

                                        
    if(isset($_POST['pinjam_buku'])){
        $ket = $db->pinjam_buku($_POST['nis_pinjam'],$_POST['pinjam_buku']); 
    }
?>


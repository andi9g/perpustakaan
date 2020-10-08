<?php 

date_default_timezone_set("Asia/Bangkok");

    class perpustakaan
    {
        /**
         * Class constructor.
         */
        public function __construct()
        {
            $this->koneksi = new mysqli('localhost','root','','db_perpustakaan') ;
        }




        public function tampil_ubah($table, $attr, $id){
            
            $sql = $this->koneksi->query("SELECT * FROM $table WHERE $attr='$id'");

            while($tampil = mysqli_fetch_array($sql)){

                $data[] = $tampil;

            }
            return $data;

        }



        //Data Buku///////////////////////////////////////////////

        public function tampil_buku() {
            $sql = $this->koneksi->query("SELECT * FROM tb_buku");

            while($tampil = mysqli_fetch_array($sql)){
                $data[] = $tampil;
            }
            return $data;
        }


        public function hapus_buku($id_buku) {
            
            $sql = $this->koneksi->query("DELETE FROM tb_buku WHERE id_buku='$id_buku'");

            if($sql){
                ?>
                    <script>
                        alert("Data berhasil dihapus");
                        window.location.href = 'index.php?pages=<?php echo $_GET['pages'];?>';
                    </script>
                <?php
            }else {
                ?>
                    <script>
                        alert("Syntax ERROR!!");
                    </script>
                <?php
            }
        }

        public function tambah_buku($id_buku, $judul_buku,$pengarang,$penerbit,$tahun_terbit,$stok_buku) {

            mysqli_escape_string($this->koneksi,$id_buku);
            mysqli_escape_string($this->koneksi,$judul_buku);
            mysqli_escape_string($this->koneksi,$pengarang);
            mysqli_escape_string($this->koneksi,$penerbit);
            mysqli_escape_string($this->koneksi,$tahun_terbit);
            mysqli_escape_string($this->koneksi,$stok_buku);
            

            $sql = $this->koneksi->query("INSERT INTO tb_buku VALUES ('$id_buku','$judul_buku','$pengarang','$penerbit','$tahun_terbit','$stok_buku')");

            if($sql){
                ?>
                    <script>
                        alert("Data berhasil ditambahkan");
                        window.location.href = 'index.php?pages=<?php echo $_GET['pages'];?>';
                    </script>
                <?php
            }else {
                ?>
                    <script>
                        alert("Syntax ERROR!!");
                    </script>
                <?php
            }

        }


        public function ubah_buku($table,$id,$judul,$pengarang,$penerbit,$tahun_terbit,$stok_buku){

            $sql = $this->koneksi->query("UPDATE $table SET judul_buku='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun_terbit', stok_buku='$stok_buku' WHERE id_buku='$id'");

            if($sql){
                ?>
                    <script>
                        alert("Data berhasil diubah");
                        window.location.href = 'index.php?pages=<?php echo $_GET['pages'];?>';
                    </script>
                <?php
            }else {
                ?>
                    <script>
                        alert("Syntax ERROR!!");
                    </script>
                <?php
            }


        }













        //Data Siswa /////////////////////////////////////////////

        public function tampil_siswa() {
            $sql = $this->koneksi->query("SELECT * FROM tb_siswa");

            while($tampil = mysqli_fetch_array($sql)){
                $data[] = $tampil;
            }
            return $data;
        }



        public function tambah_siswa($nis, $nama,$hp,$alamat) {

            mysqli_escape_string($this->koneksi,$nis);
            mysqli_escape_string($this->koneksi,$nama);
            mysqli_escape_string($this->koneksi,$hp);
            mysqli_escape_string($this->koneksi,$alamat);
            $password = 12345;
            

            $sql = $this->koneksi->query("INSERT INTO tb_siswa VALUES ('$nis','$password','$nama','$hp','$alamat')");

            if($sql){
                ?>
                    <script>
                        alert("Data berhasil ditambahkan");
                        window.location.href = 'index.php?pages=<?php echo $_GET['pages'];?>';
                    </script>
                <?php
            }else {
                ?>
                    <script>
                        alert("Syntax ERROR!!");
                    </script>
                <?php
            }

        }


        public function hapus_siswa($nis) {
            
            $sql = $this->koneksi->query("DELETE FROM tb_siswa WHERE nis='$nis'");

            if($sql){
                ?>
                    <script>
                        alert("Data berhasil dihapus");
                        window.location.href = 'index.php?pages=<?php echo $_GET['pages'];?>';
                    </script>
                <?php
            }else {
                ?>
                    <script>
                        alert("Syntax ERROR!!");
                    </script>
                <?php
            }
        }



        public function ubah_siswa($table,$nis,$nama,$hp,$alamat){

            $sql = $this->koneksi->query("UPDATE $table SET nama='$nama', hp='$hp', alamat='$alamat' WHERE nis='$nis'");

            if($sql){
                ?>
                    <script>
                        alert("Data berhasil diubah");
                        window.location.href = 'index.php?pages=<?php echo $_GET['pages'];?>';
                    </script>
                <?php
            }else {
                ?>
                    <script>
                        alert("Syntax ERROR!!");
                    </script>
                <?php
            }


        }







        //Peminjaman ////////////////////////////////////////

        public function identitas_peminjam(){
            $sql = $this->koneksi->query("SELECT * FROM tb_siswa");

            while($tampil = mysqli_fetch_array($sql)) {
                $data[] = $tampil;
            }
            return $data;
        }

        
        public function pinjam_buku($nis,$id_buku){
            $cek1 = $this->koneksi->query("SELECT * FROM tb_siswa WHERE nis='$nis'");
            $cek2 = $this->koneksi->query("SELECT * FROM tb_buku WHERE id_buku='$id_buku'");
            $cek3 = $this->koneksi->query("SELECT * FROM tb_peminjaman WHERE nis='$nis' AND id_buku='$id_buku'");
            $ketemu = mysqli_fetch_assoc($cek3);

            if((mysqli_num_rows($cek1)>0)&&(mysqli_num_rows($cek2)>0)){
                if($ketemu<=0){
                    $buku = mysqli_fetch_assoc($cek2);
                    $stok_b = $buku['stok_buku']; 
                    if($stok_b > 2){
                        $tgl_pinjam = date('Y-m-d');
                        $tgl_kembali = date('Y-m-d', strtotime('+7 days', strtotime($tgl_pinjam)));

                        $sql = $this->koneksi->query("INSERT INTO tb_peminjaman (nis,id_buku,tgl_pinjam,tgl_kembali) VALUES ('$nis','$id_buku','$tgl_pinjam','$tgl_kembali')");

                        
                        if($sql){
                            $stok_b = $stok_b - 1;
                            $this->koneksi->query("UPDATE tb_buku SET stok_buku='$stok_b' WHERE id_buku='$id_buku'");

                            ?>
                                <script>
                                    alert("Buku Berhasil Dipinjam");
                                    window.location.href = 'index.php?pages=data_peminjaman';
                                </script>
                            <?php
                        } else {
                            ?>
                                <script>
                                    alert("Data Gagal Dipinjam");
                                </script>
                            <?php
                        }
                    }else {
                        ?>
                        <script>
                            alert("Data Gagal Dipinjam, Stok minimal 2");
                        </script>
                    <?php
                    }


                }else {
                    ?>
                    <script>
                        alert("Buku sebelumnya telah dipinjam");
                    </script>
                <?php
                }
            }else {
                ?>
                    <script>
                        alert("Data Gagal Dipinjam");
                    </script>
                <?php
            }
        }




        public function data_peminjaman(){
            $sql = $this->koneksi->query
            ("SELECT p.nis, s.nama, p.id_buku, b.judul_buku, p.tgl_pinjam, p.tgl_kembali
            FROM tb_peminjaman as p
            JOIN tb_siswa as s ON p.nis = s.nis
            JOIN tb_buku as b ON p.id_buku = b.id_buku 
            ORDER BY s.nama DESC
            ");

            while($tampil = mysqli_fetch_array($sql)){
                $data[] = $tampil;
            }
            return $data;
        }






    }
    

?>
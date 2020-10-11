<?php 
error_reporting(0);
date_default_timezone_set("Asia/Bangkok");

    class perpustakaan
    {
        /**
         * Class constructor.
         */
        public function __construct()
        {
            $this->koneksi = new mysqli('localhost','wardariz_perpustakaan','andibayu420415','wardariz_perpustakaan') ;
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

            $cek = $this->koneksi->query("SELECT * FROM tb_peminjaman WHERE id_buku='$id_buku'");
            
            if(mysqli_num_rows($cek) <= 0){
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
            } else {
                ?>
                    <script>
                        alert("Data gagal dihapus, Masih dalam Peminjaman!!");
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

            $cek = $this->koneksi->query("SELECT * FROM tb_peminjaman WHERE nis='$nis'");
            
            if(mysqli_num_rows($cek) <= 0){
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

            }else {
                ?>
                    <script>
                        alert("Data gagal dihapus, Masih dalam Peminjaman!!");
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
                        $bulan = date('F');
                        $tahun = date('Y');
                        $sql = $this->koneksi->query("INSERT INTO tb_peminjaman (nis,id_buku,tgl_pinjam,tgl_kembali) VALUES ('$nis','$id_buku','$tgl_pinjam','$tgl_kembali')");

                        
                        if($sql){
                            $stok_b = $stok_b - 1;
                            $this->koneksi->query("UPDATE tb_buku SET stok_buku='$stok_b' WHERE id_buku='$id_buku'");

                            $this->koneksi->query("INSERT INTO tb_databulanan (nis,id_buku,bulan,tahun,tgl_pinjam,tgl_kembali) VALUES ('$nis','$id_buku','$bulan','$tahun','$tgl_pinjam','$tgl_kembali')");

                            ?>
                                <script>
                                    alert("Buku Berhasil Dipinjam");
                                    window.location.href = 'index.php?pages=pinjam_buku';
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
            ("SELECT p.id,p.nis, s.nama, p.id_buku, b.judul_buku, p.tgl_pinjam, p.tgl_kembali
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








        //selesai peminjaman
        public function selesai_satuan($id) {
            $sql = $this->koneksi->query("SELECT * FROM tb_peminjaman WHERE id='$id'");
            
            $ambil = mysqli_fetch_assoc($sql);
            if($sql) {
                $id = $ambil['id'];
                $id_buku = $ambil['id_buku'];

                $buku = $this->koneksi->query("SELECT * FROM tb_buku WHERE id_buku='$id_buku'");
                $cek = mysqli_fetch_assoc($buku);
                $stok = $cek['stok_buku'] + 1;
                $selesai = $this->koneksi->query("DELETE FROM tb_peminjaman WHERE id='$id'");

                    if($selesai){
                        $this->koneksi->query("UPDATE tb_buku SET stok_buku='$stok' WHERE id_buku='$id_buku'");

                        

                        ?>
                            <script>
                                alert("Buku berhasil dikembalikan");
                                window.location.href = 'index.php?pages=pengembalian_buku';
                            </script>
                        <?php
                    }else{
                        ?>
                            <script>
                                alert("Pengembalian Gagal");
                            </script>
                        <?php
                    }
            }else {
                ?>
                    <script>
                        alert("Error!!..");
                    </script>
                <?php
            }
        }


        public function selesai_semua($nis) {
            $sql = $this->koneksi->query("SELECT * FROM tb_peminjaman WHERE nis='$nis'");

            if($sql) {
                

                while($tampil = mysqli_fetch_assoc($sql)){
                    $id_buku = $tampil['id_buku'];
                    $stok = 0;

                    $buku = $this->koneksi->query("SELECT * FROM tb_buku WHERE id_buku='$id_buku'");
                    $cek = mysqli_fetch_assoc($buku);
                    $stok = $cek['stok_buku'] + 1;

                    $this->koneksi->query("UPDATE tb_buku SET stok_buku='$stok' WHERE id_buku='$id_buku'");

                    
                }

                $selesai = $this->koneksi->query("DELETE FROM tb_peminjaman WHERE nis='$nis'");

                if($selesai){
                    ?>
                        <script>
                            alert("Buku berhasil dikembalikan keseluruhan");
                            window.location.href = 'index.php?pages=pengembalian_buku';
                        </script>
                    <?php
                }else {
                    ?>
                    <script>
                        alert("Data gagal di hapus!");
                    </script>
                <?php
                }

            }else {
                ?>
                    <script>
                        alert("Error!!..");
                    </script>
                <?php
            }
        }



        public function chart($tahun) {

            for($i=1; $i <=12 ; $i++){
                $bulan = date('F',strtotime('0000-'.$i.'-01'));
                $nama_bulan[] = $bulan;
            };

            foreach($nama_bulan as $bulan){
                $sql = $this->koneksi->query("SELECT * FROM tb_databulanan WHERE bulan='$bulan' AND tahun='$tahun'");
                $data[] = mysqli_num_rows($sql);
            }

            
            echo json_encode($data);

            // $cek = $this->koneksi->query("SELECT * FROM tb_databulanan WHERE tahun='$tahun'");

            // while($tampil = mysqli_fetch_array($cek)){
            //     $tanggal = $
            // }

        }







        public function tampil_laporan() {
            $sql = $this->koneksi->query
            ("SELECT bulan.nis, ts.nama, bulan.id_buku, tb.judul_buku, bulan.tgl_pinjam
                FROM tb_databulanan as bulan
                JOIN tb_siswa as ts ON bulan.nis=ts.nis
                JOIN tb_buku as tb ON bulan.id_buku=tb.id_buku
                ORDER BY nama ASC
            ");

            while($tampil = mysqli_fetch_assoc($sql)){
                $data[] = $tampil;
            }
            return $data;
        }



        public function login($username, $password) {
            $username = mysqli_escape_string($this->koneksi,$username);
            $password = md5(mysqli_escape_string($this->koneksi, $password));
            
            $sql = $this->koneksi->query("SELECT * FROM tb_user WHERE username='$username' AND password='$password'");

            if(mysqli_num_rows($sql)>0) {
                $ambil = mysqli_fetch_assoc($sql);
                session_start();
                
                $_SESSION['username'] = $ambil['username'];
                $_SESSION['posisi'] = 'admin';
                $_SESSION['sidebarku'] = 'light';

                header('location:index.php');

            }else {
                session_start();
                $_SESSION['ket'] = 'username atau password salah!';
                $_SESSION['ket1'] = true;

            }

        }


    }
    

?>
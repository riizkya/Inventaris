<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bantuan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

            <div class="panel panel-default">
                        <div class="panel-heading">
                            Dokumentasi
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Manajemen Data</a>
                                </li>
                                <li><a href="#profile" data-toggle="tab">Proses Data</a>
                                </li>
                                <li><a href="#messages" data-toggle="tab">Tampilkan Data</a>
                                </li>
                                <li><a href="#settings" data-toggle="tab">Cetak Laporan dan Pengaturan</a>
                                </li>
                                <li><a href="#akun" data-toggle="tab">Manajemen Akun</a>
                                </li>
                                
                                
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <h4><b>Detail Manajemen Data</b></h4>
                                    <p>Menu ini digunakan untuk melakukan proses input data yang berkaitan dengan : 
                                    <ol>
                                        <li>Perangkat IT : Router , Access Point , Switch , Hub , Perangkat Komponen Hardware RAM ,LAN Card dll .</li>
                                        <li>Perangkat Komputer : PC Admin , PC User dll</li>
                                        <li>Perangkat Server .</li>
                                    </ol> 
                                    Silahkan masukan data sesuai dengan form yang telah disediakan . Untuk atribut bagian <b>ID Barang</b> tidak perlu diinputkan , karena sudah diinputkan secara otomatis sesuai dengan format kode barang. Jika telah selesai melakukan input pada form , silahkan tekan tombol <b>SUBMIT</b> untuk menyimpan ke database.</p>

                                     <img src="<?php echo base_url()?>aset/doc/input1.jpg" class="img-rounded"  width="591" height="562">
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <h4><b>Detail Proses Data</b></h4>
                                    <p>Menu ini digunakan untuk proses yang berkaitan dengan Data yaitu : 
                                            <ol>
                                                <li>Proses Mutasi Barang : Digunakan untuk melakukan mutasi / pemindahan barang dari suatu tempat ke tempat lain , baik secara masal maupun perbarang.</li>
                                                <li>Proses Opname Barang : Digunakan untuk melaukan reparasi / perbaikan terhadap barang yang rusak.</li>
                                                <li>Proses Nonaktif Barang : Digunakan untuk menonaktifkan suatu barang dikarenakan sebab tertentu , barang yang dinonaktifkan akan disimpan pada suatu tempat dan dapat diaktifkan kembali sewaktu-waktu.</li>
                                            </ol>
                                        Setelah masuk ke menu bagian proses , makan akan muncul 2 tabel . Tabel yang pertama merupakan data seluruh barang . setiap barang dapat ditambahkan ke dalam form Proses (Mutasi , Opname , Nonaktif) yang berada pada panel bagian bawah melalui tombol <b>TAMBAH</b> yang ada pada setiap barang. Sebelum diproses data barang akan ditampung ke dalam form editor Proses untuk melakukan input beberapa atribut pada form yang telah disediakan. Isikan form sesuai dengan kebutuhan.
                                    </p><br>
                                        <h6><b>Gambar 1. Tabel Data Barang</b></h6>
                                        <p>Tombol berwarna biru berguna untuk menambahkan barang yang dipilih untuk ditambahkan ke panel proses</p>
                                     <img src="<?php echo base_url()?>aset/doc/proc.jpg" class="img-rounded"  width="800" height="327">

                                     <br><br>
                                        <h6><b>Gambar 2. Contoh Proses Opname</b></h6>
                                        <p>Daftar barang yang telah ditambahkan akan muncul pada panel proses. Isikan atribut seperti tanggal , lokasi mutasi , keterangan opname , sebab nonaktif  , sesuai dengan Proses yang dipilih. Tekan tombol hapus untuk membatalkan data yang akan dimasukan . Jika telah selesai input form , maka tekan tombol <b>SUBMIT</b> untuk menyimpan ke database.</p>
                                      <img src="<?php echo base_url()?>aset/doc/proses1.jpg" class="img-rounded"  width="600" height="227">

                                      <br><br>
                                        <h6><b>Gambar 3. Contoh Proses Nonaktif</b></h6>
                                        <p>Gambar di bawah merupakan contoh lain dari proses yaitu Nonaktif , terdapat atribut tanggal non aktif yang harus diisikan , sebab nonaktif dan Lokasi penyimpanan disetiap barang.</p>
                                       <img src="<?php echo base_url()?>aset/doc/proses3.jpg" class="img-rounded"  width="600" height="327">

                                       <br><br>
                                        <h6><b>Gambar 4. Contoh Proses Mutasi</b></h6>
                                        <p>Gambar di bawah merupakan contoh lain dari proses yaitu Mutasi. Untuk proses mutasi , data barang yang akan dipindahkan dapat dilakukan secara masal maupun satu per satu . Isikan atribut tanggal dan lokasi penempatan yang baru . Kemudian setelah disubmit , data barang yang dimutasikan lokasinya akan berubah sesuai dengan penempatan baru yang telah diinputkan.</p>


                                       <img src="<?php echo base_url()?>aset/doc/proses4.jpg" class="img-rounded"  width="600" height="327">
                                    <br><br>

                                </div>
                                <div class="tab-pane fade" id="messages">
                                    <h4><b>A. Tampilan Data Barang.</b></h4>
                                    <p>Seluruh data yang telah disimpan baik data barang Perangkat IT , Komputer , Server maupun data barang yang telah dilakukan proses Mutasi , Opname dan Nonaktif dapat dilihat dalam bentuk tabel mealui Menu <b>Tampilkan Data.</b> Dalam tabel tersebut terdapat beberapa atribut yang ditampilan , Pengguna dapat melakukan pengurutan data berdasarkan kolom tertentu dengan mengklik bagian <b>nama kolom</b> . Selain itu juga dapat melakukan proses pencarian data pada tabel untuk menyaring data. Masing-masing data yang ditampilkan dapat dilakukan 3 aksi yaitu :
                                    <ol>
                                        <li>Edit : Melakukan perubahan terhadap atribut barang.</li>
                                        <li>Hapus : Menghapus data dari database berdasarkan ID barang.</li>
                                        <li>Detail : Menampilkan informasi lebih detail terkait data barang yang diampilkan.</li>
                                    </ol>

                                    </p><br>
                                    <h6><b>Gambar 1. Tampilan Data Barang</b></h6>
                                     <img src="<?php echo base_url()?>aset/doc/show1.jpg" class="img-rounded"  width="600" height="327">

                                     <br><br>

                                     <h4><b>B. Tampilan Data Proses.</b></h4>
                                    <p> Data yang telah dilakukan proses dapat dilihat hasilnya pada tampilan data proses . Masing-masing akan menampilkan seluruh data yang pernah dilakukan proses mutasi , opname dan nonaktif. Pada menu ini ada 2 hal yang perlu diperhatikan yaitu :
                                    <ol>
                                        <li>Untuk proses barang yang diopname apabila telah selesai , dapat dilakukan proses <b>PENYELESAIAN</b> yang menandakan bahwa barang yang diopname telah selesai , dan <b>NONAKTIF</b> Apabila akan melakukan Nonaktif secara langsung</li>
                                        <li>Untuk proses barang nonaktif , sewaktu-waktu dapat diaktifkan kembali . Hal tersebut dapat dilakukan dengan cara menekan tombol <b>Aktifkan</b> yang ada pada tabel barang nonaktif. Silahkan pilih barang yang akan diaktifkan kembali , kemudian isikan atribut tanggal aktif , sebab aktif dan penempatan yang baru.</li>
                                    </ol>
                                    Seluruh barang yang dilakukan proses diatas akan dicatat dalam sebah Log history yang dapat dilihat pada menu <b>Tampilkan Data Log </b>.
                                     
                                    
                                    </p><br>
                                    <h6><b>Gambar 2. Tampilan Data Opname</b></h6>
                                    <p>Tombol biru sebelah kanan berguna untuk melakukan penyelesaian dari proses opname suatu barang.</p>
                                     <img src="<?php echo base_url()?>aset/doc/show2.jpg" class="img-rounded"  width="700" height="227">

                                     <br><br>
                                    <h6><b>Gambar 3. Tampilan Data Nonaktif</b></h6>
                                    <p>Tombol hijau berguna untuk mengkatifkan kembali barang yang telah dinonaktifkan.</p>
                                     <img src="<?php echo base_url()?>aset/doc/show3.jpg" class="img-rounded"  width="700" height="227">
                                </div>
                                <div class="tab-pane fade" id="settings">
                                    <h4><b>A. Cetak Laporan</b></h4>
                                    <p>Menu ini berguna untuk mencetak laporan data barang dan proses dalam bentuk pdf yang dapat diunduh . Untuk bagian <b>SIGNATURE</b> pengaturan nama dan jabatan dapat dilakukan pada Menu Pengaturan.</p>
                                    <br>
                                    <h6><b>Gambar 1. Tampilan Laporan</b></h6>
                                    <p>Atribut nama dan jabatan dapat disesuaikan dengan mengkases menu Pengaturan.</p>
                                     <img src="<?php echo base_url()?>aset/doc/pdf1.jpg" class="img-rounded"  width="500" height="427">

                                     <br><br>

                                     <h4><b>B. Pengaturan Signature</b></h4>
                                    <p>Pengaturan ini berguna untuk menyesuaikan Daftar Jabatan dan nama yang digunakan untuk proses pencetakan laporan. Menu ini dapat diakses pada bagian pojok kanan atas , kemudian pilih <b>PENGATURAN.</b> Pada halaman pengaturan akan muncul beberapa form dengan posisi yang sudah disesuaikan dengan format surat . Silahkan isikan nama dan jabatan sesuai dengan kebutuhan dokumen laporan. Jika sudah maka tekan tombol <b>SIMPAN PERUBAHAN</b> untuk menyimpan ke database. </p>
                                    <br>
                                    <h6><b>Gambar 2. Tampilan Pengaturan Form Signature.</b></h6>
                                    <p>Isikan atribut form sesuai kebutuhan , jika sudah tekan tombol SIMPAN.</p>
                                     <img src="<?php echo base_url()?>aset/doc/seting.jpg" class="img-rounded"  width="700" height="427">

                                     <br><br>

                                     <h4><b>C. Pengaturan Rentang Tanggal</b></h4>
                                    <p>Pengaturan ini berguna untuk melakukan filter berdasarkan rentang antara tanggal awal dan tanggal akhir terhadap suatu proses. Terdapat 2 pilihan pengaturan utama yaitu , apakah saat pencetakan laporan ingin menggunakan rentang tanggal atau tidak ? , Jika memilih <b>YA</b> , maka baris laporan yang dihasilkan akan sesuai dengan rentang tanggal yang diinputkan , jika memilih <b>TIDAK</b> , maka tidak akan ada filter tanggal dan semua baris akan ditampilkan . Pengaturan ini berlaku untuk seluruh Data yang berkaitan dengan <b> Proses Mutasi , Opname dan Nonaktif.</b></p>
                                    <br>
                                    <h6><b>Gambar 3. Tampilan Pengaturan Form Filter Tanggal.</b></h6>
                                    <p>Pastikan saat mengisi atribut tanggal awal dan akhir tidak terbalik . Jangan lupa untuk selalu menyimpan pengaturan dengan menekan tombol <b>SIMPAN PERUBAHAN </b></p>
                                     <img src="<?php echo base_url()?>aset/doc/setting2.jpg" class="img-rounded"  width="700" height="427">
                                </div>

                                <div class="tab-pane fade" id="akun">
                                    <h4><b>Detail Manajemen Akun</b></h4>
                                    <p>Menu ini digunakan untuk melakukan berbagai manajemen yang berkaitan dengan akun yaitu : 
                                    <ol>
                                        <li>Registrasi : Digunakan untuk mendaftarkan pengguna baru .</li>
                                        <li>Edit Akun : Digunakan untuk memodifikasi / merubah identitas maupun password pengguna.</li>
                                        <li>Hapus Akun : Digunakan untuk menghapus akun tertentu berdasarkan username.</li>
                                        <li>Profil Akun : Digunakan untuk melihat detail akun dan juga dapat dilakukan edit.</li>
                                    </ol> 
                                    Masukan data yang telah disediakan dan sesuaikan dengan format yang telah ditetapkan , seperti panjang minimal password. Untuk bagian edit , apabila tidak ingin melakukan perubahan password , <b>KOSONGKAN</b> bagian field password , apabila ingin mengganti password , isikan password yang baru sesuai dengan format. <br>
                                    Keterangan untuk atribut Privilege :
                                    <ol>
                                        <li>Privilege 1 : Hak akses penuh untuk admin , dapat melakukan modifikasi penuh terhadap data inventaris</li>
                                        <li>Privilege 2 : Hak akses Pengguna , hanya dapat melakukan view dan cetak lapotan.</li>
                                    </ol>
                                    </p><br><br>
                                        <h6><b>Gambar 1. Tampilan Manajemen Akun.</b></h6>
                                    <p>Terdapat beberapa tombol untuk proses editing , hapus dan registrasi.</p>
                                     <img src="<?php echo base_url()?>aset/doc/akun.jpg" class="img-rounded"  width="891" height="462">
                                     <br><br><br>

                                     <h6><b>Gambar 2. Tampilan Edit Akun.</b></h6>
                                    <p>Isikan form untuk diedit sesuai dengan kebutuhan.</p>
                                     <img src="<?php echo base_url()?>aset/doc/akun2.jpg" class="img-rounded"  width="391" height="562">
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

             </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
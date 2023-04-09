<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Manajemen Data Perangkat Jaringan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Input Data Perangkat Jaringan
                        </div>
                        <div class="panel-body">
                             <form class="form-horizontal" role="form" action="<?=base_url()?>manajer_user/update_profil" method="post">
                             
                               
                                                  <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                     <label>Username</label>
                                    <input class="form-control" placeholder="Contoh : admin" type="text" name = "txt_username" required id = "id_username" readonly value = "<?php echo $data_user->username ?>">
                                </div>
                             </div>
                             <br>   
                              
                             <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                     <label>Nama Lengkap</label>
                                    <input class="form-control" placeholder="Masukan Nama Lengkap" type="text" name = "txt_nama" id = "id_nama" autofocus value = "<?php echo $data_user->nama ?>">
                                </div>
                             </div>
                             <br>   

                              
                             <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                     <label>Jabatan</label>
                                    <input class="form-control" placeholder="Jabatan Pengguna" type="text" name = "txt_jabatan" id = "id_jabatan" value = "<?php echo $data_user->jabatan ?>">
                                </div>
                             </div>
                             <br>   

                            
                             <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                     <label>E-Mail</label>
                                    <input class="form-control" placeholder="Contoh : tvku@gmail.com" type="email" name = "txt_email" value = "<?php echo $data_user->email ?>">
                                </div>
                             </div>
                             <br>   

                              
                             <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                     <label>Kontak</label>
                                    <input class="form-control" placeholder="Contoh : 081xxxxxxxxx" type="text" name = "txt_kontak" value = "<?php echo $data_user->kontak ?>">
                                </div>
                             </div>
                             <br>   
                             
                              
                             <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                     <label>Password</label>
                                    <input class="form-control" placeholder="Kosongkan field ini jika tidak merubah password" type="password" name = "txt_pass" id = "txt_pass_prof" pattern=".{5,}"  title="Password minimal 5 karakter">
                                </div>
                             </div>
                             <br>   

                             
                             <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                     <label>Konfirmasi Password</label>
                                    <input class="form-control" placeholder="Konfirmasi Password" type="password" name = "txt_pass2" id = "txt_pass2_prof" >
                                </div>
                             </div>
                             <br>   

                              
                             
                                <br>
                            <div class = "row">
                                <div class = "col-md-5 col-md-offset-5">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                             </div>
                            
                        </form>              



                        </div>
                        
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
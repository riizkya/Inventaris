 <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                Daftar Akun Baru
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Form Registrasi Akun</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal" role="form" action="<?=base_url()?>manajer_user/create" method="post">
                             
                               
                                <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                     <label>Username</label>
                                    <input class="form-control" placeholder="Contoh : admin" type="text" name = "txt_username" value="<?php echo set_value('txt_username'); ?>" required pattern=".{4,}"  title="Username minimal 4 karakter">
                                </div>
                             </div>
                             <br>                    
                              
                             <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                     <label>Nama Lengkap</label>
                                    <input class="form-control" placeholder="Masukan Nama Lengkap" type="text" name = "txt_nama" value="<?php echo set_value('txt_nama'); ?>" autofocus>
                                </div>
                             </div>
                             <br>   

                              
                             <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                     <label>Jabatan</label>
                                    <input class="form-control" placeholder="Contoh : Staff IT" type="text"  name = "txt_jabatan" value="<?php echo set_value('txt_jabatan'); ?>">
                                </div>
                             </div>
                             <br>   

                              <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                     <label>E-Mail</label>
                                    <input class="form-control" placeholder="Contoh : tvku@gmail.com" type="email" name = "txt_email" value="<?php echo set_value('txt_email'); ?>">

                                </div>
                             </div>
                             <br>   

                              
                             <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                     <label>Kontak</label>
                                    <input class="form-control" placeholder="Contoh : 081xxxxxxxxx" type="text" name = "txt_kontak" value="<?php echo set_value('txt_kontak'); ?>" pattern=".{6,}"  title="Username minimal 6 digit">
                                </div>
                             </div>
                             <br>   
                             
                              
                             <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                    <label>Password</label>
                                    <input class="form-control" placeholder="Password minimal 5 karakter" type="password" name = "txt_pass" id = "txt_pass"  required pattern=".{5,}"  title="Password minimal 5 karakter">
                                </div>
                             </div>
                             <br>   

                             
                             <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                    <label>Konfirmasi Password</label>
                                    <input class="form-control" placeholder="Ketik ulang password" type="password" name = "txt_pass2" id = "txt_pass2" required>
                                </div>
                             </div>
                             <br>   

                              
                            <div class="row">
                                <div class = "col-md-8 col-md-offset-2">    
                                <label>Akses Level</label><br>                                
                                                      <label class="radio-inline">
                                                <input type="radio" name="rad_priv" id="rad_baik" value="1" checked >Admin IT
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="rad_priv" id="rad_sedang" value="2" >User Biasa
                                            </label>

                                </div>

                               
                             </div>
                                <br>
                             
                                <br>
                            <div class = "row">
                                <div class = "col-md-5 col-md-offset-5">
                                    <button type="submit" class="btn btn-primary">Buat Akun</button>
                                </div>
                             </div>
                            
                        </form>              
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
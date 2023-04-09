
                            <!-- Modal -->
                            <div class="modal fade" id="myModal_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Form Edit Akun</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal" role="form" action="<?=base_url()?>manajer_user/update" method="post">
                             
                               
                                                  <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                     <label>Username</label>
                                    <input class="form-control" placeholder="Contoh : admin" type="text" name = "txt_username" required id = "id_username" readonly >
                                </div>
                             </div>
                             <br>   
                              
                             <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                     <label>Nama Lengkap</label>
                                    <input class="form-control" placeholder="Masukan Nama Lengkap" type="text" name = "txt_nama" id = "id_nama" autofocus>
                                </div>
                             </div>
                             <br>   

                              
                             <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                     <label>Jabatan</label>
                                    <input class="form-control" placeholder="Jabatan Pengguna" type="text" name = "txt_jabatan" id = "id_jabatan">
                                </div>
                             </div>
                             <br>   

                            
                              <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                     <label>E-Mail</label>
                                    <input class="form-control" placeholder="Contoh : tvku@gmail.com" type="email" name = "txt_email" id = "txt_email">
                                </div>
                             </div>
                             <br>   

                              
                             <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                     <label>Kontak</label>
                                    <input class="form-control" placeholder="Contoh : 081xxxxxxxxx" type="text" name = "txt_kontak" id = "txt_kontak">
                                </div>
                             </div>
                             <br>   
                             
                              
                             <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                     <label>Password</label>
                                    <input class="form-control" placeholder="Kosongkan field ini jika tidak merubah password" type="password" name = "txt_pass" id = "txt_pass_edit" pattern=".{5,}"  title="Password minimal 5 karakter">
                                </div>
                             </div>
                             <br>   

                             
                             <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                     <label>Konfirmasi Password</label>
                                    <input class="form-control" placeholder="Konfirmasi Password" type="password" name = "txt_pass2" id = "txt_pass2_edit" >
                                </div>
                             </div>
                             <br>   

                              
                            <div class="row">
                                <div class = "col-md-8 col-md-offset-2">    
                                <label>Akses Level</label><br>                                
                                                      <label class="radio-inline">
                                                <input type="radio" name="rad_priv" id="rad_1" value="1" checked>Admin IT
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="rad_priv" id="rad_2" value="2" >User Biasa
                                            </label>

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
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
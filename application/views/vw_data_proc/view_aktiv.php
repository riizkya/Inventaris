
                            <!-- Modal -->
                            <div class="modal fade" id="myModal_aktiv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Form Aktivasi Barang</h4>
                                        </div>
                                        <div class="modal-body">
            <form class="form-horizontal" role="form" action="<?=base_url()?>manajer_nonaktif/aktivasi" method="post">
                             
                               
                                                  <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                     <label>ID Barang</label>
                                    <input class="form-control"  type="text" name = "txt_id" required id = "txt_id" readonly >
                                </div>
                             </div>
                             <br>   
                              
                             <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                     <label>Tanggal Aktif</label>
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" name = "txt_tanggal" required  />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                             </div>
                             <br>   

                              
                             <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                     <label>Sebab Aktiv</label>
                                    <input class="form-control" placeholder="Isikan sebab aktif di sini" type="text" name = "txt_sebab">
                                </div>
                             </div>
                             <br>   

                            
                              <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                     <label>Lokasi Baru</label>
                                    
                                    <select class="form-control" id = "cmb_tempat" name = "txt_lokasi">
                                               <?php 
                                                    foreach ($tempat_pc->result() as $val) 
                                                    {                  
                                                        echo "<option>".$val->penempatan."</option>";
                                                    }
                                                    foreach ($tempat_hd->result() as $val) 
                                                    {                  
                                                        echo "<option>".$val->penempatan."</option>";
                                                    }
                                                    foreach ($tempat_sv->result() as $val) 
                                                    {                  
                                                        echo "<option>".$val->penempatan."</option>";
                                                    }
                                                ?>
                                    </select>

                                      <br>
                                   <button type="button" class="btn btn-primary" onclick= "add_tempat()">Tambah Tempat</button><br>
                                    
                                </div>
                             </div>
                             <br>   

                              
                           
                                
                            <div class = "row">
                                <div class = "col-md-5 col-md-offset-5">
                                    <button type="submit" class="btn btn-success">Submit Aktivasi</button>
                                </div>
                             </div>
                            
                            <input class="form-control" placeholder="Jabatan Pengguna" type="hidden" name = "txt_sebab_no" id = "txt_sebab_no">
                            <input class="form-control" placeholder="Jabatan Pengguna" type="hidden" name = "txt_lokasi_no" id = "txt_lokasi_no">
                            <input class="form-control" placeholder="Jabatan Pengguna" type="hidden" name = "txt_tgl_no" id = "txt_tgl_no">
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

                            <!-- Modal -->
                            <div class="modal fade" id="myModal_nonaktif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Form Nonaktif Barang</h4>
                                        </div>
                                        <div class="modal-body">
            <form class="form-horizontal" role="form" action="<?=base_url()?>manajer_nonaktif/nonaktif_opname" method="post">
                             
                               
                                                  <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                     <label>ID Barang</label>
                                    <input class="form-control"  type="text" name = "txt_id" required id = "txt_id" readonly >
                                </div>
                             </div>
                             <br>   
                              
                             <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                     <label>Tanggal Nonaktif</label>
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
                                     <label>Sebab NonAktiv</label>
                                    <input class="form-control" placeholder="Isikan sebab nonaktif di sini" type="text" name = "txt_sebab">
                                </div>
                             </div>
                             <br>   

                            
                              <div class = "row">
                                <div class = "col-md-8 col-md-offset-2">
                                     <label>Lokasi Penyimpanan</label>
                                    
                                    <input class="form-control" placeholder="Isikan lokasi penyimpanan di sini" type="text" name = "txt_lokasi">

                                    <br>
                                    
                                </div>
                             </div>
                             <br>   

                              
                            <div class = "row">
                                <div class = "col-md-5 col-md-offset-5">
                                    <button type="submit" class="btn btn-success">Submit Nonaktif</button>
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
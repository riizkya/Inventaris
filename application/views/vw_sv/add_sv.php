<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Manajemen Data Server</h1>
                    <dt>Gunakan form ini untuk melakukan input data Server</dt>
                    <br>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Input Data Server
                        </div>
                        <div class="panel-body">
                             <form class="form-horizontal" role="form" action="<?=base_url()?>manajer_server/create" method="post">
                             <label>ID Server</label>
                             <div class="row">
                                <div class = "col-md-5">
                                    <input class="form-control" placeholder="Enter text" type="text" name = "txt_id" readonly value = "<?php echo $id_value ?>">
                                </div>
                             </div>
                             <br>

                             <label>Keterangan</label>
                             <div class = "row">
                                <div class = "col-md-5">
                                    <input class="form-control" placeholder="Contoh : HP Server" type="text" name = "txt_keterangan">
                                </div>
                             </div>
                             <br>  

                             <label>Tanggal Masuk</label>
                             <div class = "row">
                                <div class = "col-md-5">
                                   <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" name = "txt_tanggal" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                             </div>
                             <br>   
                             

                             
                             <label>Penempatan</label><br>
                             <div class = "row">
                                <div class = "col-md-5">
                                    
                                            <select class="form-control" id = "cmb_tempat" name = "cmb_tempat">
                                                 <?php 
                                                    foreach ($tempat->result() as $val) 
                                                    {
                                                        
                                                        echo "<option>".$val->penempatan."</option>";
                                                    }
                                                ?>
                                            </select>
                                            
                                </div>

                                <div class = "col-md-5">
                                    <button type="button" class="btn btn-success" onclick= "add_tempat()">Tambah Tempat</button><br>
                                </div>

                             </div>
                                <br>
                              <label>IP Address</label>
                             <div class = "row">
                                <div class = "col-md-5">
                                    <input class="form-control" placeholder="Contoh : 192.168.xxx.xxx / 192.168.xxx.xxx" type="text" name  = "txt_ip"> 
                                </div>
                             </div>
                             

                             <br>
                             <div class="row">

                                <div class = "col-md-5">
                                <label>Kegunaan</label>                                     
                                      <textarea class="form-control" rows="3" name = "txt_guna"></textarea><br>
                                </div>

                                 <div class = "col-md-5">   
                                 <label>Processor</label>                                 
                                      <textarea class="form-control" rows="3" name = "txt_proc"></textarea><br>
                                </div>
                             </div>

                              <br>
                             <div class="row">

                                <div class = "col-md-5">
                                <label>Motherboard</label>                                     
                                      <textarea class="form-control" rows="3" name = "txt_mobo"></textarea><br>
                                </div>

                                 <div class = "col-md-5">   
                                 <label>Harddisk</label>                                 
                                      <textarea class="form-control" rows="3" name = "txt_hdd"></textarea><br>
                                </div>
                             </div>

                              <br>
                             <div class="row">

                                <div class = "col-md-5">
                                <label>RAM</label>                                     
                                      <textarea class="form-control" rows="3" name = "txt_ram"></textarea><br>
                                </div>

                                 <div class = "col-md-5">   
                                 <label>VGA</label>                                 
                                      <textarea class="form-control" rows="3" name = "txt_vga"></textarea><br>
                                </div>
                             </div>

                            
                             
                             <label>LAN Card</label>
                             <div class="row">
                                <div class = "col-md-5">                                    
                                      <textarea class="form-control" rows="3" name = "txt_lan"></textarea><br>
                                </div>
                             </div>

                            
                             <label>Kondisi</label>
                            <div class="row">
                                <div class = "col-md-5">                                    
                                                      <label class="radio-inline">
                                                <input type="radio" name="rad_kondisi" id="rad_baik" value="Baik" checked onclick = "disable_text()">Baik
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="rad_kondisi" id="rad_sedang" value="Sedang" onclick = "disable_text()">Sedang
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="rad_kondisi" id="rad_rusak" value="Rusak" onclick = "disable_text()">Rusak
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="rad_kondisi" id="rad_lain" value="Lain" onclick = "enable_text()">Lainnya. . .
                                            </label>

                                </div>

                               
                             </div>
                                <br>

                              <div class = "row">
                                <div class = "col-md-5">
                                    <input class="form-control" placeholder="Input kondisi lain . . ." disabled id = "txt_kondisi" type="text" name = "txt_kondisi">
                                </div>
                             </div>
                             <br>  
                                                         
                                          
                               <div class = "row">
                                <div class = "col-md-5">
                                    <button type="submit" class="btn btn-primary">Submit Data</button>
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
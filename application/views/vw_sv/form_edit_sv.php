 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Manajemen Data Server</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Edit Data Server
                        </div>
                        <div class="panel-body">
                              <form class="form-horizontal" role="form" action="<?=base_url()?>manajer_server/update/<?=$data_sv->id_barang?>" method="post">
                             <label>ID Server</label>
                             <div class="row">
                                <div class = "col-md-5">
                                    <input class="form-control" placeholder="Enter text" type="text" name = "txt_id" value="<?=$data_sv->id_barang?>" readonly>
                                </div>
                             </div>
                             <br>

                             <label>Keterangan</label>
                             <div class = "row">
                                <div class = "col-md-5">
                                    <input class="form-control" placeholder="Contoh : Mikrotik Router" type="text" name = "txt_keterangan" value="<?=$data_sv->keterangan?>">
                                </div>
                             </div>
                             <br>  

                             <label>Tanggal Masuk</label>
                             <div class = "row">
                                <div class = "col-md-5">
                                   <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" name = "txt_tanggal" value="<?=$data_sv->tanggal?>"/>
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
                                                        if ($data_sv->penempatan == $val->penempatan)
                                                    	{
                                                    		echo "<option selected>".$val->penempatan."</option>";
                                                    	}
                                                    	else
                                                    	{
                                                    		echo "<option >".$val->penempatan."</option>";
                                                    	}
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
                                    <input class="form-control" placeholder="Contoh : Mikrotik Router" type="text" name = "txt_ip" value="<?=$data_sv->ip_address?>" >
                                </div>
                             </div>
                             <br>  

                             
                             <div class="row">

                                <div class = "col-md-5">
                                <label>Kegunaan</label>                                     
                                      <textarea class="form-control" rows="3" name  = "txt_guna"><?=$data_sv->kegunaan?></textarea><br>
                                </div>

                                 <div class = "col-md-5">   
                                 <label>Processor</label>                                 
                                      <textarea class="form-control" rows="3" name  = "txt_proc"><?=$data_sv->processor?></textarea><br>
                                </div>
                             </div>

                              <br>
                             <div class="row">

                                <div class = "col-md-5">
                                <label>Motherboard</label>                                     
                                      <textarea class="form-control" rows="3" name = "txt_mobo"><?=$data_sv->motherboard?></textarea><br>
                                </div>

                                 <div class = "col-md-5">   
                                 <label>Harddisk</label>                                 
                                      <textarea class="form-control" rows="3" name = "txt_hdd"><?=$data_sv->harddisk?></textarea><br>
                                </div>
                             </div>

                              <br>
                             <div class="row">

                                <div class = "col-md-5">
                                <label>RAM</label>                                     
                                      <textarea class="form-control" rows="3" name = "txt_ram"><?=$data_sv->ram?></textarea><br>
                                </div>

                                 <div class = "col-md-5">   
                                 <label>VGA</label>                                 
                                      <textarea class="form-control" rows="3" name = "txt_vga"><?=$data_sv->vga?></textarea><br>
                                </div>
                             </div>

                            
                             
                             <label>LAN Card</label>
                             <div class="row">
                                <div class = "col-md-5">                                    
                                      <textarea class="form-control" rows="3" name  = "txt_lan"><?=$data_sv->lan_card?></textarea><br>
                                </div>
                             </div>

                            
                             <label>Kondisi</label>
                            <div class="row">
                                <div class = "col-md-5">                                    
                                                      <label class="radio-inline">
                                                <input type="radio" name="rad_kondisi" id="rad_baik" value="Baik" checked onclick = "disable_text()" <?php echo ($data_sv->kondisi == 'Baik')?'checked':'' ?>>Baik
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="rad_kondisi" id="rad_sedang" value="Sedang" onclick = "disable_text()" <?php echo ($data_sv->kondisi == 'Sedang')?'checked':'' ?>>Sedang
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="rad_kondisi" id="rad_rusak" value="Rusak" onclick = "disable_text()" <?php echo ($data_sv->kondisi == 'Rusak')?'checked':'' ?>>Rusak
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="rad_kondisi" id="rad_lain" value="Lain" onclick = "enable_text()"
                                                	 <?php echo ($data_sv->kondisi != 'Rusak' && $data_sv->kondisi != 'Sedang' && $data_sv->kondisi != 'Baik')?'checked':'' ?>

                                                >Lainnya. . .
                                            </label>

                                </div>

                               
                             </div>
                                <br>

                              <div class = "row">
                                <div class = "col-md-5">
                                    <input class="form-control" placeholder="Input kondisi lain . . ." disabled id = "txt_kondisi" type="text" name = "txt_kondisi"

                                    	<?php echo ($data_sv->kondisi != 'Rusak' && $data_sv->kondisi != 'Sedang' && $data_sv->kondisi != 'Baik')?"value = \"$data_sv->kondisi\"" : 'disabled' ?>
                                    >
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
 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Manajemen Data Komputer</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Edit Data Komputer
                        </div>
                        <div class="panel-body">
                              <form class="form-horizontal" role="form" action="<?=base_url()?>manajer_pc/update/<?=$data_pc->id_barang?>" method="post">
                             <label>ID Komputer</label>
                             <div class="row">
                                <div class = "col-md-5">
                                    <input class="form-control" placeholder="Enter text" type="text" name = "txt_id" value="<?=$data_pc->id_barang?>" readonly>
                                </div>
                             </div>
                             <br>

                             <label>Keterangan</label>
                             <div class = "row">
                                <div class = "col-md-5">
                                    <input class="form-control" placeholder="Contoh : Mikrotik Router" type="text" name = "txt_keterangan" value="<?=$data_pc->keterangan?>">
                                </div>
                             </div>
                             <br>  

                             <label>Tanggal Masuk</label>
                             <div class = "row">
                                <div class = "col-md-5">
                                   <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" name = "txt_tanggal" value="<?=$data_pc->tanggal?>"/>
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
                                                        if ($data_pc->penempatan == $val->penempatan)
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
                                    <input class="form-control" placeholder="Contoh : Mikrotik Router" type="text" name = "txt_ip" value="<?=$data_pc->ip_address?>" >
                                </div>
                             </div>
                             <br>  

                             
                             <div class="row">

                                <div class = "col-md-5">
                                <label>Kegunaan</label>                                     
                                      <textarea class="form-control" rows="3" name  = "txt_guna"><?=$data_pc->kegunaan?></textarea><br>
                                </div>

                                 <div class = "col-md-5">   
                                 <label>Processor</label>                                 
                                      <textarea class="form-control" rows="3" name  = "txt_proc"><?=$data_pc->processor?></textarea><br>
                                </div>
                             </div>

                              <br>
                             <div class="row">

                                <div class = "col-md-5">
                                <label>Motherboard</label>                                     
                                      <textarea class="form-control" rows="3" name = "txt_mobo"><?=$data_pc->motherboard?></textarea><br>
                                </div>

                                 <div class = "col-md-5">   
                                 <label>Harddisk</label>                                 
                                      <textarea class="form-control" rows="3" name = "txt_hdd"><?=$data_pc->harddisk?></textarea><br>
                                </div>
                             </div>

                              <br>
                             <div class="row">

                                <div class = "col-md-5">
                                <label>RAM</label>                                     
                                      <textarea class="form-control" rows="3" name = "txt_ram"><?=$data_pc->ram?></textarea><br>
                                </div>

                                 <div class = "col-md-5">   
                                 <label>VGA</label>                                 
                                      <textarea class="form-control" rows="3" name = "txt_vga"><?=$data_pc->vga?></textarea><br>
                                </div>
                             </div>

                            
                             
                             <label>LAN Card</label>
                             <div class="row">
                                <div class = "col-md-5">                                    
                                      <textarea class="form-control" rows="3" name  = "txt_lan"><?=$data_pc->lan_card?></textarea><br>
                                </div>
                             </div>

                            
                             <label>Kondisi</label>
                            <div class="row">
                                <div class = "col-md-5">                                    
                                                      <label class="radio-inline">
                                                <input type="radio" name="rad_kondisi" id="rad_baik" value="Baik" checked onclick = "disable_text()" <?php echo ($data_pc->kondisi == 'Baik')?'checked':'' ?>>Baik
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="rad_kondisi" id="rad_sedang" value="Sedang" onclick = "disable_text()" <?php echo ($data_pc->kondisi == 'Sedang')?'checked':'' ?>>Sedang
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="rad_kondisi" id="rad_rusak" value="Rusak" onclick = "disable_text()" <?php echo ($data_pc->kondisi == 'Rusak')?'checked':'' ?>>Rusak
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="rad_kondisi" id="rad_lain" value="Lain" onclick = "enable_text()"
                                                	 <?php echo ($data_pc->kondisi != 'Rusak' && $data_pc->kondisi != 'Sedang' && $data_pc->kondisi != 'Baik')?'checked':'' ?>

                                                >Lainnya. . .
                                            </label>

                                </div>

                               
                             </div>
                                <br>

                              <div class = "row">
                                <div class = "col-md-5">
                                    <input class="form-control" placeholder="Input kondisi lain . . ." disabled id = "txt_kondisi" type="text" name = "txt_kondisi"

                                    	<?php echo ($data_pc->kondisi != 'Rusak' && $data_pc->kondisi != 'Sedang' && $data_pc->kondisi != 'Baik')?"value = \"$data_pc->kondisi\"" : 'disabled' ?>
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
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Manajemen Data Perangkat IT</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Edit Data Perangkat IT
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" action="<?=base_url()?>manajer_perangkat/update/<?=$data_hd->id_barang?>" method="post">
                             <label>ID Perangkat</label>
                             <div class="row">
                                <div class = "col-md-5">
                                    <input class="form-control" placeholder="Enter text" type="text" name = "txt_id" value="<?=$data_hd->id_barang?>" readonly>
                                </div>
                             </div>
                             <br>

                             <label>Nama Perangkat</label>
                             <div class = "row">
                                <div class = "col-md-5">
                                    
                                    <input class="form-control" placeholder="Contoh : Mikrotik Router" type="text" name = "txt_nama" value="<?=$data_hd->nama_hardware?>">
                                </div>
                             </div>
                             <br>   
                             
                              <label>Tanggal Masuk</label>
                             <div class = "row">
                                <div class = "col-md-5">
                                   <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" name = "txt_tanggal" value="<?=$data_hd->tanggal?>"/>
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
                                                    	if ($data_hd->penempatan == $val->penempatan)
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
                                    <button type="button" class="btn btn-success" onclick= "add_tempat()" >Tambah Tempat</button><br>
                                </div>
                             </div>
                             <br>

                             <label>Kegunaan</label>
                             <div class="row">
                                <div class = "col-md-5">                                    
                                      <textarea class="form-control" rows="3" name = "txt_guna" ><?=$data_hd->kegunaan?></textarea><br>
                                </div>
                             </div>
                             
                            
                             <label>Kondisi</label>
                            <div class="row">
                                <div class = "col-md-5">                                    
                                                      <label class="radio-inline" >
                                                <input type="radio" name="rad_kondisi" id="rad_baik" value="Baik" onclick = "disable_text()" <?php echo ($data_hd->kondisi == 'Baik')?'checked':'' ?>>Baik
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="rad_kondisi" id="rad_sedang" value="Sedang" onclick = "disable_text()" <?php echo ($data_hd->kondisi == 'Sedang')?'checked':'' ?>>Sedang
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="rad_kondisi" id="rad_rusak" value="Rusak" onclick = "disable_text()" <?php echo ($data_hd->kondisi == 'Rusak')?'checked':'' ?>>Rusak
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="rad_kondisi" id="rad_lain" value="Lain" onclick = "enable_text()" 
                                                
                                                <?php echo ($data_hd->kondisi != 'Rusak' && $data_hd->kondisi != 'Sedang' && $data_hd->kondisi != 'Baik')?'checked':'' ?>

                                                >Lainnya. . .
                                            </label>

                                </div>

                               
                             </div>
                                <br>

                              <div class = "row">
                                <div class = "col-md-5">
                                    <input class="form-control" placeholder="Input kondisi lain . . ."   id = "txt_kondisi" type="text" name = "txt_kondisi"
                                    	<?php echo ($data_hd->kondisi != 'Rusak' && $data_hd->kondisi != 'Sedang' && $data_hd->kondisi != 'Baik')?"value = \"$data_hd->kondisi\"" : 'disabled' ?>
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
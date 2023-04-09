 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pengaturan</h1>
                </div>
                <!-- /.col-lg-12 -->
</div>


            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    
                    <!-- /.panel -->

                     <div class="panel panel-success">
                        <div class="panel-heading">
                            Pengaturan Tanggal pada Laporan Data Proses.
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           
                           <form class="form-horizontal" role="form" action="<?=base_url()?>manajer_setting/update_tgl" method="post">
                             
                            <label>Gunakan Pengaturan Filter Data berdasarkan Tanggal ??</label>
                            <div class="row">
                                <div class = "col-md-5">                                    
                                            <label class="radio-inline">
                                                <input type="radio" name="rad_kondisi" id="rad_ya" <?php echo ($data_signature->use == 1)?'checked':'' ?> value="1" onclick = "set_date_on()" onload = "halo()">Ya
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="rad_kondisi" id="rad_tidak" <?php echo ($data_signature->use == 0)?'checked':'' ?> value="0" onclick = "set_date_off()">Tidak
                                            </label>

                                </div>

                               
                             </div>
                            <br><br>

                              <div class = "row">
                                <div class = "col-md-5">
                                      <label>Tanggal Awal</label>
                                         <div class = "row">
                                            <div class = "col-md-7">
                                               <div class='input-group date' id='datetimepicker_aw'>
                                                    <input type='text' class="form-control" name = "txt_tanggal_aw" id = "txt_tanggal_aw" value="<?php echo $data_signature->tgl_awal; ?>"/>
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                         </div>
                                         <br>   
                                </div>

                                 <div class = "col-md-5">
                                      <label>Tanggal Akhir</label>
                                         <div class = "row">
                                            <div class = "col-md-7">
                                               <div class='input-group date' id='datetimepicker_ak'>
                                                    <input type='text' class="form-control" name = "txt_tanggal_ak" id = "txt_tanggal_ak" value="<?php echo $data_signature->tgl_akhir; ?>" />
                                                    <span class="input-group-addon" >
                                                        <span class="glyphicon glyphicon-calendar" disable></span>
                                                    </span>
                                                </div>
                                            </div>
                                         </div>
                                         <br>   
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
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

<script type="text/javascript">
    var data_sign = <?php echo $data_signature->use; ?>;
    if (data_sign==1)
    {
            $("span").css("pointer-events", "auto");
            document.getElementById('txt_tanggal_ak').disabled = false;
            document.getElementById('txt_tanggal_aw').disabled = false;
    }
    else
    {
            $("span").css("pointer-events", "none");
            document.getElementById('txt_tanggal_ak').disabled = true;
            document.getElementById('txt_tanggal_aw').disabled = true;
    }
</script>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Pengaturan Nama dan Jabatan Halaman Signature Laporan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           
                           <form class="form-horizontal" role="form" action="<?=base_url()?>manajer_setting/update" method="post">
                             
                               
                            <div class = "row">
                                <div class = "col-md-4">
                                     <label>Jabatan 1</label>
                                    <input class="form-control" placeholder="" type="text" name = "txt_jabatan1" value="<?php echo $data_signature->jabatan1; ?>" >
                                </div>

                                <div class = "col-md-4 col-md-offset-3">
                                     <label>Jabatan 2</label>
                                    <input class="form-control" placeholder="" type="text" name = "txt_jabatan2"  value="<?php echo $data_signature->jabatan2; ?>">
                                </div>
                             </div>
                             <br>   
                              
                            <br>

                             <div class = "row">
                                <div class = "col-md-4">
                                     <label>Nama 1</label>
                                    <input class="form-control" placeholder="" type="text" name = "txt_nama1"  value="<?php echo $data_signature->nama1; ?>">
                                </div>

                                <div class = "col-md-4 col-md-offset-3">
                                     <label>Nama 2</label>
                                    <input class="form-control" placeholder="" type="text" name = "txt_nama2"  value="<?php echo $data_signature->nama2; ?>">
                                </div>
                             </div>
                             <br>   <br>

                              <div class = "row">
                                <div class = "col-md-4 col-md-offset-3">
                                     <label>Jabatan 3</label>
                                    <input class="form-control" placeholder="" type="text" name = "txt_jabatan3"  value="<?php echo $data_signature->jabatan3; ?>">
                                </div>
                             </div>
                             <br><br>
                              <div class = "row">
                                <div class = "col-md-4 col-md-offset-3">
                                     <label>Nama 3</label>
                                    <input class="form-control" placeholder="" type="text" name = "txt_nama3" value="<?php echo $data_signature->nama3; ?>">
                                </div>
                             </div>

                             <br>   <br>

                            <div class = "row">
                                <div class = "col-md-5 col-md-offset-5">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                             </div>
                            
                        </form>              
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
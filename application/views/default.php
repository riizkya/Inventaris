<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Statistik Data Inventaris TVKU</h1>
                </div>
                <!-- /.col-lg-12 -->
</div>
            <!-- /.row -->
<br><br>
<dt>Informasi Jumlah Seluruh Barang Inventaris</dt><br>
<div class="row">

         <div class="col-lg-3 col-md-6 col-md-offset-1">

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-briefcase  fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $sum_hd ?></div>
                                        <div>Total Data Barang Perangkat IT</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url()?>manajer_perangkat">
                                <div class="panel-footer">
                                    <span class="pull-left">Lihat Detail</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
        </div>

         <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-desktop fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $sum_pc ?></div>
                                        <div>Total Data Barang Komputer</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url()?>manajer_pc">
                                <div class="panel-footer">
                                    <span class="pull-left">Lihat Detail</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
        </div>

         <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $sum_sv ?></div>
                                        <div>Total Data Barang Server</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url()?>manajer_server">
                                <div class="panel-footer">
                                    <span class="pull-left">Lihat Detail</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                   
</div>

<div class = "row">
         <div class="col-lg-3 col-md-6 col-md-offset-2">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-recycle  fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $sum_no ?></div>
                                        <div>Total Data Barang NonAktif</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url()?>manajer_nonaktif/view">
                                <div class="panel-footer">
                                    <span class="pull-left">Lihat Detail</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                     <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-wrench  fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $sum_op ?></div>
                                        <div>Total Data Barang yang Diopname</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url()?>manajer_opname/view">
                                <div class="panel-footer">
                                    <span class="pull-left">Lihat Detail</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
</div>

<br><br>

<div class="row">
        <div class="col-lg-6  col-md-8  col-sm-10 ">
                <!--  START -->
                
                    <dt>Diagram Kondisi Barang</dt><br><br>

            <canvas id="BarChart_hd" height="100" class="img-responsive" ></canvas><br><br>
                 <!--  END -->
                    <dt>Keterangan</dt><br>
                    <dd style = "color : blue;">Biru &emsp;&emsp;&ensp;&thinsp;=  Perangkat IT</dd> 
                    <dd style = "color : green;">Hijau &emsp;&emsp;&thinsp;= Komputer</dd>
                    <dd style = "color : orange;">Orange &emsp;= Server</dd>
        </div>

         <div class="col-lg-6  col-md-8  col-sm-10 ">
                <!--  START -->
                <dt>Diagram Barang Non Aktif</dt><br><br>
              <canvas id="BarChart_no" height="100" class="img-responsive" ></canvas>
                 <!--  END -->
        </div>
       
</div>
<br>
<div class = "row">
     <div class="col-lg-6  col-md-8  col-sm-10 col-md-offset-2">
                <!--  START -->
                <dt>Diagram Barang yang Diopname</dt><br><br>
              <canvas id="BarChart_op" height="100" class="img-responsive" ></canvas>
                 <!--  END -->
        </div>
</div>
<br><hr>



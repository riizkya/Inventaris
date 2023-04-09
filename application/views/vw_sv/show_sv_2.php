 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Seluruh Server</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Tabel
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
            <tr>
                <th>No</th>
                <th>ID Server</th>
                <th>Keterangan</th>
                <th>Tanggal Masuk</th>
                <th>Penempatan</th>
              
                <th>IP Address</th>
                <th>Kondisi</th>
                <th>Aksi</th>

            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 1;

                foreach ($data_sv->result() as $val) 
                {
                    # code...
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td>$val->id_barang</td>";
                    echo "<td>$val->keterangan</td>";
                    echo "<td>$val->tanggal</td>";
                    echo "<td>$val->penempatan</td>";
                    echo "<td>$val->ip_address</td>";
                    echo "<td>$val->kondisi</td>";

                    $spec = array(
                        $val->id_barang , 
                        $val->keterangan,
                        $val->tanggal,
                        $val->penempatan,
                        $val->kegunaan,
                        $val->ip_address,
                        $val->processor,
                        $val->motherboard,
                        $val->harddisk,
                        $val->ram,
                        $val->vga,
                        $val->lan_card,
                        $val->kondisi
                        );
    
                    echo "
                          <td>
                                
                                 <button class=\"btn btn-success\" data-toggle=\"modal\" data-target=\"#myModal_sv\" onclick = 'set_detail(".json_encode($spec).")'><i class=\"fa fa-search fa-1x\"></i></button>
                          </td>
                    ";

                    echo "</tr>";
                    $no++;
                }
            ?>
        </tbody>
                                </table>
                            </div>
                           <?php $this->load->view('vw_sv/detail_sv'); ?>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Seluruh Barang yang Diopname</h1>
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
                <th>Tanggal Opname</th>
                <th>ID Barang</th>
                <th>Keterangan Barang</th>
                <th>Keterangan Opname</th>
                <th>Pilihan</th>

            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 1;

                foreach ($data_mt_pc->result() as $val) 
                {
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td>$val->tanggal_masuk</td>";
                    echo "<td>$val->id_barang</td>";
                    echo "<td>$val->ket_br</td>";
                    echo "<td>$val->ket_op</td>";
                    echo "<td><a href=\"".base_url()."manajer_opname/update/$val->id_barang\" class=\"btn btn-primary btn-sm\" onclick=\"return confirm('Selesaikan Proses Opname ?')\">Selesai</a> 

                             <button class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#myModal_nonaktif\" onclick = 'set_nonaktif(\"".$val->id_barang."\")'>Nonaktifkan</button>
                    </td>";
                    echo "</tr>";   
                  

                    $no++;
                }

                 foreach ($data_mt_sv->result() as $val) 
                {
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td>$val->tanggal_masuk</td>";
                    echo "<td>$val->id_barang</td>";
                    echo "<td>$val->ket_br</td>";
                    echo "<td>$val->ket_op</td>";
                    echo "<td><a href=\"".base_url()."manajer_opname/update/$val->id_barang\" class=\"btn btn-primary btn-sm\" onclick=\"return confirm('Selesaikan Proses Opname ?')\">Selesai</a> 

                         <button class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#myModal_nonaktif\" onclick = 'set_nonaktif(\"".$val->id_barang."\")'>Nonaktifkan</button>
                    </td>";
                    echo "</tr>";   
                       

                    $no++;
                }

                 foreach ($data_mt_hd->result() as $val) 
                {
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td>$val->tanggal_masuk</td>";
                    echo "<td>$val->id_barang</td>";
                    echo "<td>$val->ket_br</td>";
                    echo "<td>$val->ket_op</td>";
                     echo "<td><a href=\"".base_url()."manajer_opname/update/$val->id_barang\" class=\"btn btn-primary btn-sm\" onclick=\"return confirm('Selesaikan Proses Opname ?')\">Selesai</a> 

                        <button class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#myModal_nonaktif\" onclick = 'set_nonaktif(\"".$val->id_barang."\")'>Nonaktifkan</button>
                     </td>";
                    echo "</tr>";   
                   

                    $no++;
                }

             ?>
        </tbody>
                                </table>
                            </div>
                            <?php  $this->load->view('vw_data_proc/view_nonaktif_opname'); ?>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Seluruh Barang yang Dinonaktifkan</h1>
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
                <th>Tanggal Non Aktif</th>
                <th>ID Barang</th>
                <th>Keterangan Barang</th>
                <th>Lokasi Penyimpanan</th>
                <th>Sebab Non Aktif</th> 
                <th>Pilihan</th>

            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 1;

                foreach ($data_mt_pc->result() as $val) 
                {
                    $data = array($val->id_barang , $val->tanggal , $val->ket_no , $val->sebab);
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td>$val->tanggal</td>";
                    echo "<td>$val->id_barang</td>";
                    echo "<td>$val->ket_br</td>";
                    echo "<td>$val->ket_no</td>";
                    echo "<td>$val->sebab</td>";
                    echo "<td> <button class=\"btn btn-success\" data-toggle=\"modal\" data-target=\"#myModal_aktiv\" onclick = 'set_aktiv(".json_encode($data).")'>Aktifkan</button> </td>";
                    echo "</tr>";   

                    $no++;
                }

                 foreach ($data_mt_sv->result() as $val) 
                {
                    $data = array($val->id_barang , $val->tanggal , $val->ket_no , $val->sebab);
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td>$val->tanggal</td>";
                    echo "<td>$val->id_barang</td>";
                    echo "<td>$val->ket_br</td>";
                    echo "<td>$val->ket_no</td>";
                    echo "<td>$val->sebab</td>";
                    echo "<td> <button class=\"btn btn-success\" data-toggle=\"modal\" data-target=\"#myModal_aktiv\" onclick = 'set_aktiv(".json_encode($data).")'>Aktifkan</button> </td>";
                    echo "</tr>";   

                    $no++;
                }

                 foreach ($data_mt_hd->result() as $val) 
                {
                    $data = array($val->id_barang , $val->tanggal , $val->ket_no , $val->sebab);
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td>$val->tanggal</td>";
                    echo "<td>$val->id_barang</td>";
                    echo "<td>$val->ket_br</td>";
                    echo "<td>$val->ket_no</td>";
                    echo "<td>$val->sebab</td>";
                    echo "<td> <button class=\"btn btn-success\" data-toggle=\"modal\" data-target=\"#myModal_aktiv\" onclick = 'set_aktiv(".json_encode($data).")'>Aktifkan</button> </td>";
                    echo "</tr>";   

                    $no++;
                }

             ?>
        </tbody>
                                </table>
                            </div>
                           <?php  $this->load->view('vw_data_proc/view_aktiv'); ?>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
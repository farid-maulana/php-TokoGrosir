            <!-- Basic Form Start -->
            <div class="basic-form-area mg-b-15">
            </div>

            <!-- Static Table Start -->
            <div class="data-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline13-list shadow-reset">
                                <div class="sparkline13-hd">
                                    <div class="main-sparkline13-hd">
                                        <h1>Data <span class="table-project-n">Transaksi</span>
                                        <!-- <button id="basicSuccess" class="btn btn-success">Success</button> -->
                                        </h1>
                                        <!-- <div class="sparkline13-outline-icon">
                                            <span class="sparkline13-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span class="sparkline13-collapse-close"><i class="fa fa-times"></i></span>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="sparkline13-graph">
                                    <div class="datatable-dashv1-list custom-datatable-overright">
                                        <div id="toolbar">
                                            <select class="form-control">
                                                <option value="">Export Basic</option>
                                                <option value="all">Export All</option>
                                                <option value="selected">Export Selected</option>
                                            </select>
                                        </div>
                                        <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                            <thead>
                                                <tr>
                                                    <th data-field="state" data-checkbox="true"></th>
                                                    <th data-field="id">No</th>
                                                    <th data-field="no_nota">No. Nota</th>
                                                    <th data-field="id_pembeli">ID Pembeli</th>
                                                    <th data-field="tgl_transaksi">Tanggal Transaksi</th>
                                                    <th data-field="total_bayar">Total Bayar</th>
                                                    <th data-field="pic">PIC</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 0;
                                                if ($db->data("transaksi") != 0) {
                                                    foreach ($db->data("transaksi") as $data) {
                                                        $no++;
                                                ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $data['no_nota']; ?></td>
                                                    <td><?php echo $data['id_pembeli']; ?></td>
                                                    <td><?php echo $data['tgl_transaksi']; ?></td>
                                                    <td><?php echo $data['total_bayar']; ?></td>
                                                    <td><?php echo $data['pic']; ?></td>
                                                    <!-- <td><button class="Information Information-color mg-b-10 btn btn-info" data-toggle="modal" data-target="#tambahbarang"><i class="fa fa-edit"></i></button></td> -->
                                                </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Static Table End -->
            
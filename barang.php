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
                                        <h1>Data <span class="table-project-n">Barang</span>
                                        <button class="Information Information-color mg-b-10 btn btn-primary pull-right" data-toggle="modal" data-target="#tambahbarang">Tambah Data Barang</button>
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
                                                    <th data-field="kode" >Kode Barang</th>
                                                    <th data-field="nama_barang">Nama Barang</th>
                                                    <th data-field="jenis">Jenis</th>
                                                    <th data-field="stok">Stok</th>
                                                    <th data-field="beli">Harga Beli</th>
                                                    <th data-field="jual">Harga Jual</th>
                                                    <!-- <th>Action</th> -->
                                                </tr>
                                            </thead>
                                            <tbody id="data_barang">
                                                <?php
                                                $no = 0;
                                                if ($db->data("barang") != 0) {
                                                    foreach ($db->data("barang") as $data) {
                                                        $no++;
                                                ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $data['kd_barang']; ?></td>
                                                    <td data-name="nama_barang" class="nama_barang" data-type="text" data-pk="<?php echo $data['kd_barang']; ?>"><?php echo $data['nama_barang']; ?></td>
                                                    <td data-name="jenis" class="jenis" data-type="text" data-pk="<?php echo $data['kd_barang']; ?>"><?php echo $data['jenis']; ?></td>
                                                    <td data-name="jumlah" class="jumlah" data-type="text" data-pk="<?php echo $data['kd_barang']; ?>"><?php echo $data['jumlah']; ?></td>
                                                    <td data-name="hrg_beli" class="hrg_beli" data-type="text" data-pk="<?php echo $data['kd_barang']; ?>"><?php echo 'Rp '.number_format($data['hrg_beli'],0,',','.').',-'; ?></td>
                                                    <td data-name="hrg_jual" class="hrg_jual" data-type="text" data-pk="<?php echo $data['kd_barang']; ?>"><?php echo 'Rp '.number_format($data['hrg_jual'],0,',','.').',-'; ?></td>
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
            <div id="tambahbarang" class="modal modal-adminpro-general fullwidth-popup-InformationproModal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-close-area modal-close-df">
                    <!-- <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a> -->
                  </div>
                  <div class="modal-body">
                    <form action="proses/proses.php?aksi=tambah_barang" method="post">
                      <input type="hidden" name="tabel[tabel]" value="barang">
                      <input type="hidden" name="tabel[url]" value="barang">
                      <div class="form-group-inner">
                        <div class="row">
                          <div class="col-lg-3">
                              <label class="login2 pull-right pull-right-pro">Kode Barang</label>
                          </div>
                          <div class="col-lg-9">
                                <input type="text" class="form-control" name="data[kd_barang]" />
                          </div>
                        </div>
                      </div>
                      <div class="form-group-inner">
                        <div class="row">
                          <div class="col-lg-3">
                              <label class="login2 pull-right pull-right-pro">Nama Barang</label>
                          </div>
                          <div class="col-lg-9">
                              <input type="text" class="form-control" name="data[nama_barang]" />
                          </div>
                        </div>
                      </div>
                      <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3">
                                <label class="login2 pull-right pull-right-pro">Jenis Barang</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="data[jenis]" />
                            </div>
                        </div>
                      </div>
                      <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3">
                                <label class="login2 pull-right pull-right-pro">Stok</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="data[jumlah]" />
                            </div>
                        </div>
                      </div>
                      <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3">
                                <label class="login2 pull-right pull-right-pro">Harga Beli</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="data[hrg_beli]" />
                            </div>
                        </div>
                      </div>
                      <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3">
                                <label class="login2 pull-right pull-right-pro">Harga Jual</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="data[hrg_jual]" />
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default pull-left">Cancel</button>
                    <input type="submit" name="submit" value="Save" class="btn btn-success">
                  </div>
              </form>
                </div>
              </div>
            </div>
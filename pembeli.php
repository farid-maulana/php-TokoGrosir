<?php
if (!isset($_SESSION['nama_user'])) {
    header("location:login.php");
}
?>
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
                                        <h1>Data <span class="table-project-n">Pembeli</span>
                                        <button class="Information Information-color mg-b-10 btn btn-primary pull-right" data-toggle="modal" data-target="#tambahpembeli">Tambah Data Pembeli</button>
                                        </h1>
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
                                                    <th data-field="name">ID Pembeli</th>
                                                    <th data-field="email">Nama Pembeli</th>
                                                    <th data-field="phone">Alamat</th>
                                                    <th data-field="company">No. Telp</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data_pembeli">
                                                <?php
                                                $no = 0;
                                                if ($db->data("pembeli") != 0) {
                                                    foreach ($db->data("pembeli") as $data) {
                                                        $no++;
                                                ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $data['id_pembeli']; ?></td>
                                                    <td data-name="nama_pembeli" class="nama_pembeli" data-type="text" data-pk="<?php echo $data['id_pembeli']; ?>"><?php echo $data['nama_pembeli']; ?></td>
                                                    <td data-name="alamat" class="alamat" data-type="text" data-pk="<?php echo $data['id_pembeli']; ?>"><?php echo $data['alamat']; ?></td>
                                                    <td data-name="no_telp" class="no_telp" data-type="text" data-pk="<?php echo $data['id_pembeli']; ?>"><?php echo $data['no_telp']; ?></td>
                                                    </td>
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
            <div id="tambahpembeli" class="modal modal-adminpro-general fullwidth-popup-InformationproModal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-close-area modal-close-df">
                    <!-- <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a> -->
                  </div>
                  <div class="modal-body">
                    <form action="proses/proses.php?aksi=tambah_pembeli" method="post">
                      <input type="hidden" name="tabel[tabel]" value="pembeli">
                      <input type="hidden" name="tabel[url]" value="pembeli">
                      <div class="form-group-inner">
                        <div class="row">
                          <div class="col-lg-3">
                              <label class="login2 pull-right pull-right-pro">ID Pembeli</label>
                          </div>
                          <div class="col-lg-9">
                                <input type="text" class="form-control" name="data[id_pembeli]" />
                          </div>
                        </div>
                      </div>
                      <div class="form-group-inner">
                        <div class="row">
                          <div class="col-lg-3">
                              <label class="login2 pull-right pull-right-pro">Nama Pembeli</label>
                          </div>
                          <div class="col-lg-9">
                              <input type="text" class="form-control" name="data[nama_pembeli]" />
                          </div>
                        </div>
                      </div>
                      <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3">
                                <label class="login2 pull-right pull-right-pro">Alamat</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="data[alamat]" />
                            </div>
                        </div>
                      </div>
                      <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3">
                                <label class="login2 pull-right pull-right-pro">No. Telp.</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="data[no_telp]" />
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
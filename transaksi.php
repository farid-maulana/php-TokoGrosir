<?php
if (!isset($_SESSION['nama_user'])) {
    header("location:login.php");
}
?>
            <!-- Basic Form Start -->
            <div class="basic-form-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline12-list shadow-reset mg-t-30">
                                <div class="sparkline12-hd">
                                    <div class="main-sparkline12-hd">
                                        <h1>Form Transaksi Penjualan
                                         <span class="pull-right"><?php echo date('d F Y'); ?></span></h1>
                                        <!-- <div class="sparkline12-outline-icon">
                                            <span class="sparkline12-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span class="sparkline12-collapse-close"><i class="fa fa-times"></i></span>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="sparkline12-graph">
                                    <div class="basic-login-form-ad">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="all-form-element-inner">
                                                    <form id="insert-to-cart" method="post">
                                                        <input type="hidden" name="data[jumlah]" value='1'>
                                                        <input type="hidden" name="tabel[tabel]" value="cart">
                                                        <?php
                                                        $a = 0;
                                                        foreach ($db->data("barang") as $kd_brg) {
                                                            $a++;
                                                        ?>
                                                            <input type="hidden" name="data[kd_barang<?php echo $a; ?>]" id="kd<?php echo $a; ?>" value="<?php echo $kd_brg['kd_barang']; ?>">
                                                        <?php
                                                        }
                                                        ?>
                                                        <div class="form-group-inner col-lg-6">
                                                          <h4 class="pull-left">Data Barang</h4>
                                                          <table id="table" data-toggle="table" data-pagination="true" data-search="true">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Nama Barang</th>
                                                                    <th>Harga</th>
                                                                    <th>Add</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="brg">
                                                                <?php
                                                                if ($db->data("barang") != 0) {
                                                                    $no = 0;
                                                                    foreach ($db->data("barang") as $barang) {
                                                                        $no++;
                                                                ?> 
                                                                        <tr>
                                                                            <td><?php echo $no; ?></td>
                                                                            <td><?php echo $barang['nama_barang']; ?></td>
                                                                            <td><?php echo 'Rp '.number_format($barang['hrg_jual'],0,',','.').',-'; ?></td>
                                                                            <td><a name="insert_to_cart" id="insert_to_cart<?php echo $no; ?>" data-id="<?php echo $no ?>" class="btn btn-primary">ADD</a></td>
                                                                        </tr>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </tbody>
                                                          </table>
                                                        </div>
                                                    </form>
                                                    <form method="post" action="proses/proses.php?aksi=transaksi">
                                                        <div class="col-lg-6">
                                                            <h4 class="pull-left">Cart Penjualan</h4>
                                                            <div class="sparkline12-graph">
                                                                <div class="static-table-list">
                                                                    <table class="table hover-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>No</th>
                                                                                <th>Nama Barang</th>
                                                                                <th>Harga</th>
                                                                                <th>Jumlah</th>
                                                                                <th>Subtotal</th>
                                                                                <th></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="show_cart">
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner col-lg-6">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">ID Pembeli</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <select name="id_pembeli" class="form-control chosen-select">
                                                                        <?php
                                                                        if ($db->data("pembeli") != 0) {
                                                                            foreach ($db->data("pembeli") as $id) {
                                                                        ?>
                                                                                <option value="<?php echo $id['id_pembeli']; ?>"><?php echo $id['id_pembeli']." | ".$id['nama_pembeli']; ?></option>
                                                                        <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <a data-toggle="modal" data-target="#tambahpembeli" href="#">Belum jadi member?</a>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner col-lg-6">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">PIC</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" name="pic" readonly="readonly" value="<?php echo $_SESSION['nama_user']; ?>" />
                                                                    <input type="hidden" name="no_nota" value="<?php echo 'N'.date('dm').'OT'.date('yhi').'A'.date('s'); ?>">
                                                                    <input type="hidden" name="tgl_transaksi" value="<?php echo date('d-m-Y'); ?>">
                                                                </div>

                                                                    <div class="col-lg-12">
                                                                        <div class="login-horizental cancel-wp">
                                                                            <button class="btn btn-sm btn-success login-submit-c pull-right pull-right-pro" type="submit">PAYMENT!</button>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="tambahpembeli" class="modal modal-adminpro-general fullwidth-popup-InformationproModal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                  </div>
                  <div class="modal-body">
                    <form action="proses/proses.php?aksi=tambah" method="post">
                      <input type="hidden" name="tabel[tabel]" value="pembeli">
                      <input type="hidden" name="tabel[url]" value="transaksi">
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

            
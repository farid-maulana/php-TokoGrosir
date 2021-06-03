<?php
spl_autoload_register(function($class){
	include "class/".$class.".php";
});
$db = new class_function();
$nota=$_GET['no_nota'];
?>
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Invoice | Okler Themes | Porto-Admin</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="invoice/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="invoice/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="invoice/magnific-popup/magnific-popup.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="invoice/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="invoice/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="invoice/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="invoice/modernizr/modernizr.js"></script>
	</head>
	<body onload="window.print();">
		<section class="body">

			<!-- <div class="inner-wrapper"> -->

				<!-- <section role="main" class="content-body"> -->
					<!-- start: page -->

					<section class="panel">
						<div class="panel-body">
							<div class="invoice">
								<header class="clearfix">
									<div class="row">
										<div class="col-sm-6 mt-md">
											<?php
											foreach ($db->datawhere("detail_transaksi","no_nota='".$nota."' GROUP by no_nota") as $transaksi) {
												?>
											<h2 class="h2 mt-none mb-sm text-dark text-bold"><?php echo $transaksi['no_nota']; ?></h2>
											<?php
										}
										?>
											<h4 class="h4 m-none text-dark text-bold"></h4>
										</div>
										<div class="col-sm-6 text-right mt-md mb-md">
											<address class="ib mr-xlg">
												Okler Themes Ltd
												<br/>
												24 Henrietta Street, London, England
												<br/>
												Phone: +12 3 4567-8901
												<br/>
												okler@okler.net
											</address>
											<div class="ib">
												<!-- <img src="assets/images/invoice-logo.png" alt="OKLER Themes" /> -->
												<h3><img src="img/logo.png" alt="" width="100px" height="100px">AGANZA</h3>
											</div>
										</div>
									</div>
								</header>
								<div class="bill-info">
									<div class="row">
										<div class="col-md-6">
											<div class="bill-to">
												<p class="h5 mb-xs text-dark text-semibold">To:</p>
												<?php
												foreach ($db->datawhere("transaksi","no_nota='".$nota."'") as $pembeli) {
													foreach ($db->datawhere("pembeli","id_pembeli=".$pembeli['id_pembeli']) as $pmbli) {
												?>
												<address>
													<?php 
													echo $pmbli['nama_pembeli'].
													"<br/>".
													$pmbli['alamat'].
													"<br/>
													Phone: ". $pmbli['no_telp'].
													"<br/>"
													?>
												</address>
												<?php
											}
											}
											?>
											</div>
										</div>
										<div class="col-md-6">
											<div class="bill-data text-right">
												<p class="mb-none">
													<span class="text-dark">Invoice Date:</span>
													<?php
													foreach ($db->datawhere("transaksi","no_nota='".$nota."'") as $date) {
													?>
													<span class="value"><?php echo $date['tgl_transaksi']; ?></span>
													<?php
												}
												?>
												</p>
												<!-- <p class="mb-none">
													<span class="text-dark">Due Date:</span>
													<span class="value">06/20/2014</span>
												</p> -->
											</div>
										</div>
									</div>
								</div>
							
								<div class="table-responsive">
									<table class="table invoice-items">
										<thead>
											<tr class="h4 text-dark">
												<th id="cell-id"     class="text-semibold">#</th>
												<th id="cell-item"   class="text-semibold">Barang</th>
												<th id="cell-price"  class="text-center text-semibold">Harga</th>
												<th id="cell-qty"    class="text-center text-semibold">Jumlah</th>
												<th id="cell-total"  class="text-center text-semibold">Total</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no=0;
											$total=0;
											foreach ($db->datawhere("detail_transaksi","no_nota='".$nota."'") as $brg) {
												foreach ($db->datawhere("barang","kd_barang='".$brg['kd_barang']."'") as $nama_brg) {
											?>
											<tr>
												<td><?php echo $no+=1; ?></td>
												<td class="text-semibold text-dark"><?php echo $nama_brg['nama_barang']; ?></td>
												<td><?php echo $nama_brg['hrg_jual']; ?></td>
												<td class="text-center"><?php echo $brg['jumlah']; ?></td>
												<td class="text-center"><?php echo $brg['total_harga']; ?></td>
											</tr>
											<?php
												$total += $brg['total_harga'];
												}
											}
											?>
										</tbody>
									</table>
								</div>
							
								<div class="invoice-summary">
									<div class="row">
										<div class="col-sm-4 col-sm-offset-8">
											<table class="table h5 text-dark">
												<tbody>
													<!-- <tr class="b-top-none">
														<td colspan="2">Subtotal</td>
														<td class="text-left">$73.00</td>
													</tr>
													<tr>
														<td colspan="2">Shipping</td>
														<td class="text-left">$0.00</td>
													</tr> -->
													<tr class="h4">
														<td colspan="2">Grand Total</td>
														<td class="text-left"><?php echo $total; ?></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

							<div class="text-right mr-lg">
								<!-- <a href="#" class="btn btn-default">Submit Invoice</a> -->
								<a href="pages-invoice-print.html" target="_blank" class="btn btn-primary ml-sm"><i class="fa fa-print"></i> Print</a>
							</div>
						</div>
					</section>

					<!-- end: page -->
				<!-- </section> -->
			<!-- </div> -->
		</section>

		<!-- Vendor -->
		<script src="invoice/jquery/jquery.js"></script>
		<script src="invoice/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="invoice/bootstrap/js/bootstrap.js"></script>
		<script src="invoice/nanoscroller/nanoscroller.js"></script>
		<script src="invoice/magnific-popup/magnific-popup.js"></script>
		<script src="invoice/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="invoice/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="invoice/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="invoice/theme.init.js"></script>

	</body>
</html>
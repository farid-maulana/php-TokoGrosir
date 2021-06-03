<?php
spl_autoload_register(function($class){
	include"../class/".$class.".php";
});
$db = new class_function();
session_start();
if ($db->data("cart") != 0) {
    $no=0;
    $total=0;
    foreach ($db->data("cart") as $order) {
        $no++;
?>
        <tr>
            <td><?php echo $no; ?></td>
            <input type="hidden" name="count[]" value="<?php echo $no; ?>">
            <?php
            foreach ($db->datawhere("barang","kd_barang='".$order['kd_barang']."'") as $brg) {
            ?>
                <td><?php echo $brg['nama_barang']; ?></td>
                <input type="hidden" name="kd_barang<?php echo $no; ?>" value="<?php echo $brg['kd_barang']; ?>">
                <td><?php echo 'Rp '.number_format($brg['hrg_jual'],0,',','.'); ?></td>
            <td><?php echo $order['jumlah']; ?></td>
            <td>
                <?php 
                $subtotal = $order['jumlah']*$brg['hrg_jual'];
                echo 'Rp '.number_format($subtotal,0,',','.');
                $total +=$subtotal;
                ?>
            </td>
            <input type="hidden" name="jumlah<?php echo $no; ?>" value="<?php echo $order['jumlah']; ?>">
            <input type="hidden" name="subtotal<?php echo $no; ?>" value="<?php echo $subtotal; ?>">
            <input type="hidden" id="kode<?php echo $no; ?>" value="<?php echo $order['kd_barang']; ?>">
            <td><a id="hapus<?php echo $no; ?>" data-id="<?php echo $no ?>" class="hapus" title="hapus"><i class="fa fa-times"></i></a></td>
        </tr>
<?php
        }
    }
?>
        <tr>
            <td colspan="4">TOTAL</td>
            <td>
                <?php
                echo 'Rp '.number_format($total,0,',','.');
                ?>
            </td>
            <input type="hidden" name="total" value="<?php echo $total; ?>">
        </tr>
<?php
}
?>
    <!-- jquery
        ============================================ -->
    <script src="../js/vendor/jquery-2.1.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            //cart
            // $("#hapus").click(function() {
            //     var nilai = $("#kode").val();
            //     alert(nilai);
            // });

            //var row = document.getElementById("brg").rows.length;
            for(var x = 0; x <= 100; x++){
                counts = 0;
                $("#hapus"+x).click(function(){
                    var noe = $(this).data("id");
                    counts+=1;
                    var hps = $("#kode"+noe).val();
                    console.log(hps);
                    $.ajax({
                        type: 'POST',
                        url: 'proses/proses.php?aksi=hapuscart&kd='+hps,
                        success: function(){
                            $('#show_cart').load('proses/cart.php');
                        }
                    });
                });
            }
        })
    </script>


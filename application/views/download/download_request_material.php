<!DOCTYPE html>
<html lang="en">

<head>

    <!-- <meta http-equiv="refresh" content="5"> -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/sbadmin/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- CSS DataTables Export -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/data_tables/css/jquery.dataTables.min">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/data_tables/css/buttons.dataTables.min">
	<link href="<?= base_url('assets/sbadmin/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    
    <!-- CSS DataTables Export Online -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">

</head>

<body id="page-top">

    <!-- tabel dari database -->
	<div class="container">
		<div class="row mt-5">
			<div class="col-lg-12">
				<h2 class="text-center"><?= $title; ?></h2>
				<table id="example" class="table table-hover table-bordered text-nowrap">
					<thead>
						<tr>
							<th width="5%">NO</th>
							<th>BARCODE</th>
							<th>PRODUCT</th>
							<th>SUPPLIER</th>
							<th>QTY</th>
							<th>UOM</th>
							<th>PIC</th>
							<th>REMARK</th>
							<th>CREATED AT</th>
							<th>TIME CREATED</th>
							<th>UPDATED AT</th>
							<th>TIME UPDATED</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; ?>
						<?php foreach( $all_request_material as $row ) : ?>
						<tr>
							<td class="text-center">
								<?= $no++; ?>
							</td>
							<td class="text-center">
								<?= $row['join_barcode']; ?>
							</td>
							<td>
								<?= $row['join_product']; ?>
							</td>
							<td>
								<?= $row['join_supplier']; ?>
							</td>
							<td class="text-right">
								<?= $row['qty']; ?>
							</td>
							<td>
								<?= $row['join_uom']; ?>
							</td>
							<td>
								<?= $row['join_name']; ?>
							</td>
							<td>
								<?= $row['remark']; ?>
							</td>
							<td>
								<?= date('Y-m-d', strtotime($row['created_at'])); ?>
							</td>
							<td>
								<?= date('H:i', strtotime($row['created_at'])); ?>
							</td>
							<td>
								<?= date('Y-m-d', strtotime($row['updated_at'])); ?>
							</td>
							<td>
								<?= date('H:i', strtotime($row['updated_at'])); ?>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

    <!-- JS DataTables Export -->
    <script src="<?= base_url(); ?>assets/data_tables/js/jquery-3.5.1.js"></script>
    <script src="<?= base_url(); ?>assets/data_tables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/data_tables/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url(); ?>assets/data_tables/js/jszip/3.1.3/jszip.min.js"></script>
    <script src="<?= base_url(); ?>assets/data_tables/js/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="<?= base_url(); ?>assets/data_tables/js/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="<?= base_url(); ?>assets/data_tables/js/buttons.html5.min.js"></script>
    <script src="<?= base_url(); ?>assets/data_tables/js/buttons.print.min.js"></script>

	<!-- Page level plugins -->
    <script src="<?= base_url('assets/sbadmin/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- JS DataTables Export Online -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>

    <script>
        // table
        $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'csv', 'pdf'
                ]
            } );
        } );

        var $       = require( 'jquery' );
        var dt      = require( 'datatables.net' )();
        var buttons = require( 'datatables.net-buttons' )();
    </script>

</body>

</html>

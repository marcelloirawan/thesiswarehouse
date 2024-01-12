
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('dashboard/dashboard'); ?>">Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">Customer</li>
		</ol>
	</nav>
	<!-- end breadcrumb -->

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">
			CUSTOMER
		</h1>
		<div>
			<a href="<?= base_url('master/customer_add'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
				<i class="fas fa-plus fa-sm text-white-50"></i> 
				Add
			</a>
			<a href="<?= base_url('') . $url_active; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
				<i class="fas fa-sync fa-sm text-white-50"></i> 
				Refresh
			</a>
		</div>
	</div>

	<!-- message -->
	<div class="row">
		<div class="col-lg-12">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>
	<!-- end message -->

	<!-- Content Row -->
	<div class="row">
		<div class="col-lg-12">

			<div class="card border-left-primary shadow">
				<div class="card-body">
					
					<div class="table-responsive">
						<table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr class="text-center">
									<th width="5%">NO</th>
									<th>CUSTOMER</th>
									<th>PIC</th>
									<th>PHONE</th>
									<th>EMAIL</th>
									<th>ADDRESS</th>
									<th>NPWP</th>
									<th>CHANGE DATE</th>
									<th>OPSI</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach( $all_customer as $row ) : ?>
								<tr>
									<td class="text-center">
										<?= $no++; ?>
									</td>
									<td>
										<?= $row['nama']; ?>
									</td>
									<td>
										<?= $row['pic']; ?>
									</td>
									<td>
										<?= $row['phone']; ?>
									</td>
									<td>
										<?= $row['email']; ?>
									</td>
									<td>
										<?= $row['address']; ?>
									</td>
									<td>
										<?= $row['npwp']; ?>
									</td>
									<td>
										<?= date('d F Y', strtotime($row['updated_at'])); ?>
									</td>
									<td class="text-center">
										<a href="<?= base_url('master/customer_edit/' . $row['id_customer']); ?>" class="badge badge-primary">
											<i class="fas fa-fw fa-edit"></i>
											edit
										</a>
										<a href="#" class="badge badge-danger modalAjaxDelete" data-toggle="modal" data-target="#modalDelete" data-id="<?= $row['id_customer']; ?>" data-customer="<?= $row['nama']; ?>">
											<i class="fas fa-fw fa-trash"></i>
											delete
										</a>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>

				</div>
			</div>

		</div>
	</div>
	<!-- End Content Row -->


</div>
<!-- /.container-fluid -->

<!-- Modal-->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalLabel">
                    Delete customer!
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <p>
					Are you sure want to delete ?
                </p>

                <form action="<?= base_url('master/customer_delete'); ?>" method="post">

                    <!-- otomatis -->
                    <input type="text" name="ajaxDeleteIdCustomer" id="ajaxDeleteIdCustomer" value="" hidden>
                    <!-- end otomatis -->

                    <div class="form-group">
                        <label>Customer</label>
                        <input type="text" class="form-control" id="ajaxDeleteCustomer" name="ajaxDeleteCustomer" disabled>
                    </div>
                    <div class="form-group">
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <button class="btn btn-secondary mr-2" type="button" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/sbadmin/'); ?>vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
    // Setup - add a text input to each footer cell
    $('#dataTable thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#dataTable thead');
 
    var table = $('#dataTable').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        initComplete: function () {
            var api = this.api();
 
            // For each column
            api
                .columns()
                .eq(0)
                .each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" class="form-control" />');
 
                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();
 
                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();
 
                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
        },
    });
});

$(function() {
	$('.modalAjaxDelete').on('click', function() {

		const id = $(this).data('id');
		const customer = $(this).data('customer');

		$('#ajaxDeleteIdCustomer').val(id);
		$('#ajaxDeleteCustomer').val(customer);

	});
});
</script>

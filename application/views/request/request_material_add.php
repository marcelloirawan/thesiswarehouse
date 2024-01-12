
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('dashboard/dashboard'); ?>">Dashboard</a></li>
			<li class="breadcrumb-item"><a href="<?= base_url('request/request_material'); ?>">Request Material</a></li>
			<li class="breadcrumb-item active" aria-current="page">Add</li>
		</ol>
	</nav>
	<!-- end breadcrumb -->

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">
			REQUEST MATERIAL
		</h1>
		<div>
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
					
					<form action="<?= base_url('request/request_material_submit'); ?>" method="post">

						<div class="form-group">
							<label>Barcode</label>
							<input type="text" class="form-control" id="barcode" name="barcode" required autofocus>
						</div>

						<div class="form-group">
							<label>Supplier</label>
							<select name="id_supplier" id="id_supplier" class="form-control" required>
								<option value="">-- Choose supplier --</option>
								<?php foreach( $all_supplier as $row_select ) : ?>
									<option value="<?= $row_select['id_supplier']; ?>">
										<?= $row_select['supplier']; ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="form-group">
							<label>Qty</label>
							<input type="number" class="form-control" id="qty" name="qty" min="1" required>
						</div>

						<div class="form-group">
							<label>Remark</label>
							<input type="text" class="form-control" id="remark" name="remark">
						</div>

						<div class="row">
							<div class="col-lg-12">
								<button type="submit" class="btn btn-sm btn-primary w-100">Submit</button>
							</div>
						</div>


					</form>

				</div>
			</div>

		</div>
	</div>
	<!-- End Content Row -->


</div>
<!-- /.container-fluid -->

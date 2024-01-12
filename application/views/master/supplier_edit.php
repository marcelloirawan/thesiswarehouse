
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('dashboard/dashboard'); ?>">Dashboard</a></li>
			<li class="breadcrumb-item"><a href="<?= base_url('master/supplier'); ?>">Supplier</a></li>
			<li class="breadcrumb-item active" aria-current="page">
				<?= $supplier_edit['supplier']; ?>
			</li>
		</ol>
	</nav>
	<!-- end breadcrumb -->

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">
			SUPPLIER
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
					
					<form action="<?= base_url('master/supplier_update'); ?>" method="post">

						<!-- otomatis -->
						<input type="text" name="id_supplier" id="id_supplier" value="<?= $supplier_edit['id_supplier']; ?>" hidden>

						<div class="form-group">
							<label>Supplier</label>
							<input type="text" class="form-control" id="supplier" name="supplier" value="<?= $supplier_edit['supplier']; ?>" required>
						</div>

						<div class="form-group">
							<label>PIC</label>
							<input type="text" class="form-control" id="pic" name="pic" value="<?= $supplier_edit['pic']; ?>" required>
						</div>

						<div class="form-group">
							<label>Phone</label>
							<input type="text" class="form-control" id="phone" name="phone" value="<?= $supplier_edit['phone']; ?>" required>
						</div>

						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" id="email" name="email" value="<?= $supplier_edit['email']; ?>" required>
						</div>

						<div class="form-group">
							<label>Address</label>
							<input type="text" class="form-control" id="address" name="address" value="<?= $supplier_edit['address']; ?>" required>
						</div>

						<div class="form-group">
							<label>NPWP</label>
							<input type="text" class="form-control" id="npwp" name="npwp" value="<?= $supplier_edit['npwp']; ?>" required>
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

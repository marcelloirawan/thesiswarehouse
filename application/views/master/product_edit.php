
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('dashboard/dashboard'); ?>">Dashboard</a></li>
			<li class="breadcrumb-item"><a href="<?= base_url('master/product'); ?>">Product</a></li>
			<li class="breadcrumb-item active" aria-current="page">
				<?= $product_edit['product']; ?>
			</li>
		</ol>
	</nav>
	<!-- end breadcrumb -->

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">
			PRODUCT
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
					
					<form action="<?= base_url('master/product_update'); ?>" method="post" enctype="multipart/form-data">

						<!-- otomatis -->
						<input type="text" name="id_product" id="id_product" value="<?= $product_edit['id_product']; ?>" hidden>

						<div class="form-group">
							<label>Barcode</label>
							<input type="text" class="form-control" id="" name="" value="<?= $product_edit['barcode']; ?>" disabled>
						</div>

						<div class="form-group">
							<label>Category</label>
							<select name="id_category" id="id_category" class="form-control" required>
								<option value="<?= $product_edit['id_category']; ?>">
									<?= $product_edit['category']; ?>
								</option>
								<?php foreach( $all_category as $row_select ) : ?>
									<option value="<?= $row_select['id_category']; ?>">
										<?= $row_select['category']; ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="form-group">
							<label>Product</label>
							<input type="text" class="form-control" id="product" name="product" value="<?= $product_edit['product']; ?>" required>
						</div>

						<div class="form-group">
							<label>UOM</label>
							<input type="text" class="form-control" id="uom" name="uom" value="<?= $product_edit['uom']; ?>" required>
						</div>

						<div class="form-group">
							<label>Image</label>

							<div class="row">

								<div class="col-sm-1">
									<img src="<?= base_url('assets/img/product/' . $product_edit['image']); ?>" alt="" class="img-thumbnail" width="150px">
								</div>

								<div class="col-sm-11">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="image" name="image" accept="image/png, image/gif, image/jpeg">
										<label for="image" class="custom-file-label">Choose file</label>
									</div>
								</div>
								
							</div>
						</div>

						<div class="form-group">
							<label>Remark</label>
							<input type="text" class="form-control" id="remark" name="remark" value="<?= $product_edit['remark']; ?>" required>
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

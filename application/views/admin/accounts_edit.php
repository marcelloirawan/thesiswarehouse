
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('dashboard/dashboard'); ?>">Dashboard</a></li>
			<li class="breadcrumb-item"><a href="<?= base_url('admin/accounts'); ?>">Accounts</a></li>
			<li class="breadcrumb-item active" aria-current="page">
				<?= $user_edit['name']; ?>
			</li>
		</ol>
	</nav>
	<!-- end breadcrumb -->

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">
			FORM EDIT ACCOUNT
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
					
					<form action="<?= base_url('admin/accounts_update'); ?>" method="post">

						<!-- otomatis -->
						<input type="text" name="id_users" id="id_users" value="<?= $user_edit['id_users']; ?>" hidden>

						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" id="name" name="name" value="<?= $user_edit['name']; ?>" required>
						</div>

						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" id="email" name="email" value="<?= $user_edit['email']; ?>" disabled>
						</div>

						<div class="form-group">
							<label>Role</label>
							<select name="id_roles" id="id_roles" class="form-control">

								<?php if( $user_edit['id_roles'] == 1 ) : ?>
									<option value="1">
										Admin
									</option>
									<option value="2">
										Staff
									</option>
								<?php else : ?>
									<option value="2">
										Staff
									</option>
									<option value="1">
										Admin
									</option>
								<?php endif; ?>

							</select>
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

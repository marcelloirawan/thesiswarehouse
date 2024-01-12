
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('dashboard/dashboard'); ?>">Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
		</ol>
	</nav>
	<!-- end breadcrumb -->

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">DASHBOARD</h1>
		<a href="<?= base_url('') . $url_active; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
				class="fas fa-sync fa-sm text-white-50"></i> Refresh</a>
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
		<div class="col-lg-12 mb-3">

			<!-- <div class="card shadow">
				<div class="card-body"> -->

					<div class="row">

						<!-- Card Example -->
						<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Supplier
											</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
												<?= number_format($count_all_supplier); ?>
											</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- End Card Example -->

						<!-- Card Example -->
						<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Customer
											</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
												<?= number_format($count_all_customer); ?>
											</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- End Card Example -->

						<!-- Card Example -->
						<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Category
											</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
												<?= number_format($count_all_category); ?>
											</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- End Card Example -->

						<!-- Card Example -->
						<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Product
											</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
												<?= number_format($count_all_product); ?>
											</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- End Card Example -->

					</div>

					<div class="row">
						<div class="col-lg-12 mb-3">

							<div class="card border-left-primary shadow">
								<div class="card-body">

									<h4>Product <?= $current_year; ?></h4>

									<div>
										<canvas id="myChart"></canvas>
									</div>

									<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

									<script>
										const ctx = document.getElementById('myChart');

										new Chart(ctx, {
											type: 'bar',
											data: {
											labels: [
												'January',
												'February',
												'March',
												'April',
												'May',
												'June',
												'July',
												'August',
												'September',
												'October',
												'November',
												'December',
											],
											datasets: [
												{
													label: '# of Barang Masuk',
													data: [
														<?= $count_january_barang_masuk; ?>,
														<?= $count_february_barang_masuk; ?>,
														<?= $count_march_barang_masuk; ?>,
														<?= $count_april_barang_masuk; ?>,
														<?= $count_may_barang_masuk; ?>,
														<?= $count_june_barang_masuk; ?>,
														<?= $count_july_barang_masuk; ?>,
														<?= $count_august_barang_masuk; ?>,
														<?= $count_september_barang_masuk; ?>,
														<?= $count_october_barang_masuk; ?>,
														<?= $count_november_barang_masuk; ?>,
														<?= $count_december_barang_masuk; ?>,
													],
													borderWidth: 1
												},
												{
													label: '# of Barang Keluar',
													data: [
														<?= $count_january_barang_keluar; ?>,
														<?= $count_february_barang_keluar; ?>,
														<?= $count_march_barang_keluar; ?>,
														<?= $count_april_barang_keluar; ?>,
														<?= $count_may_barang_keluar; ?>,
														<?= $count_june_barang_keluar; ?>,
														<?= $count_july_barang_keluar; ?>,
														<?= $count_august_barang_keluar; ?>,
														<?= $count_september_barang_keluar; ?>,
														<?= $count_october_barang_keluar; ?>,
														<?= $count_november_barang_keluar; ?>,
														<?= $count_december_barang_keluar; ?>,
													],
													borderWidth: 1
												},
											]
											},
											options: {
											scales: {
												y: {
												beginAtZero: true
												}
											}
											}
										});
									</script>

								</div>
							</div>

						</div>
					</div>
					
				<!-- </div>
			</div> -->

		</div>
	</div>
	<!-- End Content Row -->


</div>
<!-- /.container-fluid -->

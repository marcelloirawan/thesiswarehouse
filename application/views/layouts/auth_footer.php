
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/sbadmin/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/sbadmin/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/sbadmin/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/sbadmin/'); ?>js/sb-admin-2.min.js"></script>

	<script>
		
		// <!-- Script show password -->
			$(document).ready(function () {
				$('.custom-control-input').click(function () {
					if ($(this).is(':checked')) {
						$('.form-password').attr('type', 'text');
					} else {
						$('.form-password').attr('type', 'password');
					}
				});
			});
		// <!-- End Script show password -->

	</script>

</body>

</html>

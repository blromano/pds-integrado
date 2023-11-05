<?php
	if (session_status() == PHP_SESSION_NONE) session_start();
	if (isset($_SESSION["Modal"])) {
		$titulo = $_SESSION["Modal"][0];
		$msg = $_SESSION["Modal"][1];
		?>
		<div id="modal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<!--<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><?php echo $titulo; ?></h4>
					</div>-->
					<div class="modal-body">
						<p class="text-center"><?php echo $msg; ?></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>
		<script>
			$(document).ready(function () {
				$('#modal').modal('show');
			});
		</script>
		<?php
		unset($_SESSION["Modal"]);
	}
?>
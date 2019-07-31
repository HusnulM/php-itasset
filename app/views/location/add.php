<div class="col-xs-12 col-sm-12">
	<div id="msg-alert">
		<?php
			Flasher::msgInfo();
		?>
	</div>	
	<div class="widget-box">
		<div class="widget-header">
			<h4 class="widget-title">Create Asset Location</h4>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="widget-body">
					<form action="<?= BASEURL; ?>/location/create" method="post">
						<div class="widget-main">
							<div>
								<label for="form-field-mask-1">
									Location Name
								</label>

								<div class="form-group">
									<input type="text" name="Description" class="form-control">
								</div>
							</div>
							<div>
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-6">
				
			</div>
		</div>
	</div>
</div>
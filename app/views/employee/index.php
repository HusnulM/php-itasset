<?php $post_url = ''; ?>
<div class="col-xs-12 col-sm-12">
  	<?php
		Flasher::msgInfo();
	?>
	<div class="widget-box">
		<div class="widget-header">
			<h4 class="widget-title"><?= $data['wg-hdr']; ?></h4>
		</div>
		<?php
			if($data['empData']['empId']) :
				$post_url = BASEURL .'/employee/update';
		?>
		<?php 
			else:
				$post_url = BASEURL .'/employee/create';
			endif; 
		?>
		<form action="<?= $post_url; ?>" method="post">
			<div class="row">
				<div class="col-md-6">
					<div class="widget-body">
						<div class="widget-main">
							<div>
								<input type="hidden" name="empId" id="empId" value="<?= $data['empData']['empId']; ?>">
								<label for="form-field-mask-1">
									First Name
								</label>

								<div class="form-group">
									<input type="text" name="fName" value="<?= $data['empData']['firstname']; ?>" class="form-control" required="true">
								</div>
							</div>
							<div>
								<label for="form-field-mask-1">
									Last Name
								</label>

								<div class="form-group">
									<input type="text" name="lName" value="<?= $data['empData']['lastname']; ?>" class="form-control" required="true">
								</div>
							</div>
							<div>
								<label for="form-field-mask-1">
									Gender
								</label>

								<div class="form-group">
									<select name="gender" class="form-control">
										<option value="<?= $data['empData']['gender']; ?>">
											<?php if($data['empData']['gender'] == "1"){
												echo "Male";
											}else if($data['empData']['gender'] == "2"){
												echo "Female";
											} ?>
										</option>
										<option value="1">Male</option>
										<option value="2">Female</option>
									</select>
								</div>
							</div>
							<div>
								<button type="submit" class="btn btn-primary"> Save <i class="menu-icon fa fa-save"></i> </button>
								<a href="<?= BASEURL; ?>/employee/list" class="btn btn-primary"> Employee List</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="widget-body">
						<div class="widget-main">
							
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
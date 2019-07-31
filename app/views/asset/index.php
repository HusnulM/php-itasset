<?php $post_url = ''; ?>

<div class="row">
	<div class="col-sm-12" id="msg-info">
		<?php
			Flasher::msgInfo();
		?>
	</div>

	<div class="col-xs-12 col-sm-12">
	<div class="widget-box">
		<div class="widget-header">
			<h4 class="widget-title"></h4>
		</div>
		<form action="<?= BASEURL; ?>/asset/create" method="post">
			<div class="row">
				<div class="col-md-6">
					<div class="widget-body">
						<div class="widget-main">
							<div>
								<label for="form-field-mask-1">
									Asset Category
								</label>

								<div class="form-group">
									<select name="assetKat" id="assetKat" class="form-control">
										<option value=""></option>
										<?php foreach ($data['asetkat'] as $asetkat) :?>
											<option value="<?= $asetkat['assetKat']; ?>"><?= $asetkat['Description']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div>
								<label for="form-field-mask-1">
									Employee ID
								</label>

								<div class="form-group">
									<input type="text" name="empId" id="empId" value="" class="form-control" required="true" data-url="<?= BASEURL; ?>/employee/getEmpById">
								</div>
							</div>
							<div>
								<label for="form-field-mask-1">
									Employee Name
								</label>

								<div class="form-group">
									<input type="text" name="empName" id="empName" value="" class="form-control" readonly="true" required="true">
								</div>
							</div>
							<div>
								<label for="form-field-mask-1">
									Asset Description
								</label>

								<div class="form-group">
									<input type="text" name="desc" id="desc" value="" class="form-control" required="true">
								</div>
							</div>
							<!-- <div>
								<label for="form-field-mask-1">
									Image
								</label>
								<div class="form-group">
									<input type="file" name="fileToUpload" id="fileToUpload">
								</div>
							</div> -->
							<div>
								<button type="submit" class="btn btn-primary">Save</button>								
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="widget-body">
						<div class="widget-main">
							<div>
								<label for="form-field-mask-1">
									Asset Location
								</label>

								<div class="form-group">
									<select name="location" id="location" class="form-control">
										<!-- <option value=""></option> -->
										<?php foreach ($data['location'] as $location) :?>
											<option value="<?= $location['location']; ?>"><?= $location['description']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div>
								<label for="form-field-mask-1">
									Quantity
								</label>
								<div class="form-group">
									<input type="text" name="qty" id="qty" class="form-control" required="true" value="1">
								</div>

								<label for="form-field-mask-1">
									Satuan
								</label>
								<div class="form-group">
									<select name="unit" id="unit" class="form-control">
										<?php foreach ($data['runit'] as $runit) :?>
											<option value="<?= $runit['unit']; ?>"><?= $runit['unit']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>

							<div>
								<label for="form-field-mask-1">
									Asset Status
								</label>

								<div class="form-group">
									<select name="assetStatus" id="assetStatus" class="form-control">
										<?php foreach ($data['stts'] as $stts) :?>
											<option value="<?= $stts['assetStatus']; ?>"><?= $stts['Description']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
</div>

<script>
	document.getElementById("empId").focus();
</script>
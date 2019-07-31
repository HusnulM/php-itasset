<div class="row">
	<div class="col-sm-12" id="msg-info">

	</div>
	<?php if($data['empdt']['empId']) : ?>
		<div class="col-md-12">
			<a href="<?= BASEURL; ?>/employee/department" class="btn btn-primary mb-3">BACK</a>
		</div>
	<?php endif; ?>

	<div class="col-md-12">
		<br>
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">Assign User Department</h4>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="widget-body">
						<div class="col-md-6">
							<input type="hidden" name="id" id="id">
							<div class="form-group">
								<label for="empId">Employee ID</label>
								<input type="text" name="empId" id="empId" class="form-control" placeholder="Input Employee Id" required="true" data-url="<?= BASEURL; ?>/employee/getEmpById" value="<?= $data['empdt']['empId']; ?>">
							</div>
							<div class="form-group">
								<label for="empName">Personal Name</label>
								<input type="text" name="empName" id="empName" class="form-control" readonly="true" required="true" value="<?= $data['empdt']['fullname']; ?>">
							</div>
							<label for="password">Select Department</label>
							<div class="form-group">
								<select name="detpId" id="detpId" class="form-control">
									<option value="<?= $data['empdt']['deptId']; ?>"><?= $data['empdt']['deptName']; ?></option>
									<?php foreach ($data['deptdt'] as $rdata) :?>
										<option value="<?= $rdata['deptId']; ?>" ><?= $rdata['deptName']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<button class="btn btn-primary" id="btn-register" data-url="<?= BASEURL; ?>/employee/setEmpDept">Assign</button>
								<a href="<?= BASEURL; ?>/employee/department" class="btn btn-primary">Show Employee Department</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
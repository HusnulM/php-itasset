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
							<div class="form-group">
								<label for="form-field-mask-1">
									Asset Number
								</label>
								<div class="input-group">
									<input type="text" class="form-control search-query" id="src-asset-num" placeholder="Asset Number" readonly="true" />
									<span class="input-group-btn">
										<button type="button" class="btn btn-purple btn-sm" data-toggle="modal" data-target="#assetListModal">
											<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
											
										</button>
									</span>
								</div>
							</div>

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

<!-- Modal Asset List -->
	<div class="modal fade" id="assetListModal" tabindex="-1" role="dialog" aria-labelledby="assetListModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="assetListModalLabel">Asset Lists</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<?php $no=0; ?>
							<table id="dynamic-table" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Asset Number</th>
										<th scope="col">Asset Description</th>
										<th scope="col"></th>
										<th style="display:none;"></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($data['asset'] as $asset) : ?>
										<?php $no++; ?>

										<tr>
											<th scope="row"><?= $no; ?></th>
											<td><?= $asset['assetNum'] ?></td>
											<td><?= $asset['Description'] ?></td>
											<td><a href="#" class="btn btn-primary">select</a></td>
											<td style="display:none;"></td>
										</tr>

									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
<script>
	document.getElementById("empId").focus();
</script>

<script>
		var table = document.getElementById('dynamic-table');


		for(var i = 1; i < table.rows.length; i++)
		{
			table.rows[i].onclick = function()
			{
				document.getElementById("src-asset-num").value = this.cells[1].innerHTML;
				
				let assetnm = this.cells[1].innerHTML;
				let url = 'http://localhost:8181/it-asset/asset/details/'+assetnm;
				f_getAssetDetails(url);

				$('.modal').modal('hide');
			};
		}

	function f_getAssetDetails(url){
		$.ajax({
			url: url, 
			type: "get",		 
			success: function(result) {
				console.log(result);
			},
			error: function(xhr) {
			}
		});
	}
</script>
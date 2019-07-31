<div class="row">
	<div class="col-sm-12" id="msg-info">
		<?php
		Flasher::msgInfo();
		?>
	</div>

	<div class="col-md-12">
		<div class="widget-body">
			<div class="widget-main">
				<!-- <form class="form-search"> -->
					<div class="row">
						<div class="col-xs-12 col-sm-6">
							<div class="input-group">
								<input type="text" class="form-control search-query" id="src-asset-num" placeholder="Asset Number" />
								<span class="input-group-btn">
									<button type="button" class="btn btn-purple btn-sm" data-toggle="modal" data-target="#assetListModal">
										<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
										
									</button>
								</span>
							</div>

							<div class="hr"></div>
							<div class="form-group">
								<button class="btn btn-primary form-control" id="btn-asset-display" data-url="<?= BASEURL; ?>/asset/details" data-toggle="modal" data-target="#assetDetailModal">Show Data</button>
							</div>
						</div>
					</div>
					<!-- </form> -->
				</div>
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

	<!-- Modal Asset Details -->
	<div class="modal fade" id="assetDetailModal" tabindex="-1" role="dialog" aria-labelledby="assetDetailModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="assetDetailModalLabel">Asset Details</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12" id="asset-detail">

						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="btn-dtl-clsd" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<script>
  //jQuery('#qrcode').qrcode("this plugin is great");
  jQuery('#qrcodeTable').qrcode({
    render  : "table",
    text  : "http://jetienne.com"
  }); 
  jQuery('#qrcodeCanvas').qrcode({
    text  : "http://jetienne.com"
  }); 
</script>

	<script>
		var table = document.getElementById('dynamic-table');

		for(var i = 1; i < table.rows.length; i++)
		{
			table.rows[i].onclick = function()
			{
				document.getElementById("src-asset-num").value = this.cells[1].innerHTML;
				$('.modal').modal('hide');
			};
		}


	// var links = document.getElementsByTagName('td');
	// for (i=0; i<links.length; i++)
	// {
	// 	links[i].addEventListener("click", function(event)
	// 	{
	// 		event.preventDefault();
	// 		var res= document.getElementById("src-asset-num");

	// 		res.value = this.parentNode.parentNode.getElementsByTagName("td")[0].innerHTML;

	// 		$('.modal').modal('hide');
	// 	}
	// 	, false);
	// }
	</script>
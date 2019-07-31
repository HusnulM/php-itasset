<div class="row">
	<div class="col-xs-12 col-sm-12">
		<?php
			Flasher::msgInfo();
		?>
		<div class="widget">
			<!-- <div class="widget-header">
				<h4 class="widget-title"></h4>
			</div> -->
			<form action="<?= BASEURL; ?>/user/register" method="POST" enctype="multipart/form-data">
				<div class="col-md-6">
					<input type="hidden" name="id" id="id">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" id="username" class="form-control" placeholder="Input Username" required="true">
					</div>
					<div class="form-group">
						<label for="nama">Name</label>
						<input type="text" name="nama" id="nama" class="form-control" placeholder="Input Full Name" required="true">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" id="email" class="form-control" placeholder="Input Email" required="true">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" class="form-control" placeholder="Input Password" required="true">
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary">Save</button>
						<a href="<?= BASEURL; ?>/user" class="btn btn-primary">Back</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
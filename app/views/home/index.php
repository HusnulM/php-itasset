<br><br>
<div class="container mt-5">
	<div class="row">
		<div class="col-sm-12">
			<?php
				Flasher::Message();
			?>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-sm-6 text-center">
			<h1><b>IT Asset Management</b></h1>
			<hr>
			<div class="panel panel-default">
			    <div class="panel-body">
			    	 <form action="<?= BASEURL; ?>/home/members" method="post">
					  <div class="form-group">
					    <label for="username">Username:</label>
					    <input type="username" class="form-control" name="username" id="username" style="text-align: center">
					  </div>
					  <div class="form-group">
					    <label for="pwd">Password:</label>
					    <input type="password" class="form-control" name="password" id="password" style="text-align: center">
					  </div>
					  <div>
					  	<button type="submit" class="btn btn-primary" style="width: 150px;">Login</button>
					  	<button type="submit" class="btn btn-primary">Forgot Password</button>
					  </div>
					  <!-- <div class="checkbox">
					    <label><input type="checkbox"> Remember me</label>
					  </div> -->
					</form> 
			    </div>
			</div>		
		</div>
	</div>
</div>

<script>
	document.getElementById("username").focus();
</script>
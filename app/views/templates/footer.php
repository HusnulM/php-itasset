
<!-- Register Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register New Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="<?= BASEURL; ?>/home/register" method="POST" enctype="multipart/form-data">
      		<input type="hidden" name="id" id="id">
					<div class="form-group">
	        	<label for="username">Username</label>
	        	<input type="text" name="username" id="username" class="form-control" placeholder="Input Your Username" required="true">
	        </div>
	        <div class="form-group">
	        	<label for="nama">Nama</label>
	        	<input type="text" name="nama" id="nama" class="form-control" placeholder="Input Your Name" required="true">
	        </div>
	        <div class="form-group">
	        	<label for="email">Email</label>
	        	<input type="email" name="email" id="email" class="form-control" placeholder="Input Your Email" required="true">
	        </div>
	        <div class="form-group">
	        	<label for="password">Password</label>
	        	<input type="password" name="password" id="password" class="form-control" placeholder="Input Your Password" required="true">
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Register</button>
	      </div>
      	</form>
    </div>
  </div>
</div>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="<?= BASEURL; ?>/home/members" method="POST" enctype="multipart/form-data">
      		<input type="hidden" name="id" id="id">
					<div class="form-group">
	        	<label for="username">Username</label>
	        	<input type="text" name="username" id="username" class="form-control" placeholder="Input Your Username" required="true">
	        </div>
	        <div class="form-group">
	        	<label for="password">Password</label>
	        	<input type="password" name="password" id="password" class="form-control" placeholder="Input Your Password" required="true">
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Login</button>
	      </div>
      	</form>
    </div>
  </div>
</div>

<!-- Login Modal -->
<div class="modal fade" id="addBookmarkModal" tabindex="-1" role="dialog" aria-labelledby="addBookmarkModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addBookmarkModalLabel">Add New Bookmark</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="<?= BASEURL; ?>/home/members" method="POST" enctype="multipart/form-data">
      		<input type="hidden" name="id" id="id">
			<div class="form-group">
	        	<label for="title">Title</label>
	        	<input type="text" name="titletitle" id="title" class="form-control" placeholder="Bookmark Title" required="true">
	        </div>
	        <div class="form-group">
	        	<label for="descdesc">Description</label>
	        	<input type="text" name="desc" id="desc" class="form-control" placeholder="Bookmark Description" required="true">
	        </div>
	        <div class="form-group">
	        	<label for="url">Bookmark URL</label>
	        	<input type="text" name="urlurl" id="url" class="form-control" placeholder="Bookmark URL" required="true">
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save</button>
	      </div>
      	</form>
    </div>
  </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script> -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="<?= BASEURL; ?>/js/bootstrap.js"></script>
<script src="<?= BASEURL; ?>/js/script.js"></script>
</body>
</html>
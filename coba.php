<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<button onclick="getData();">Get Data</button>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script>
	function getData(){
		$.ajax({
		  url: "http://localhost:8181/it-asset/asset/details/1000000001",
		  type: "get", //send it through get method
		 
		  success: function(response) {
		    //Do Something
		    console.log(response);
		  },
		  error: function(xhr) {
		    //Do Something to handle error
		  }
		});
	}
</script>
</body>
</html>
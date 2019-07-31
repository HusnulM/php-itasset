
$(function(){


	// $('#empId').on('keyup', function(e){

	// 	if(e.keyCode == 13)
	// 	{        
	// 		let empId = $('#empId').val();
	// 		let url = $(this).data('url')+'/'+empId;
	// 		getEmpData(url);
	// 	}
	// })



	$('#empId').on('change', function(e){
		let empId = $('#empId').val();
		let url = $(this).data('url')+'/'+empId+'/json';
		getEmpData(url);
	})

	$('#btn-register').on('click', function(){

		var t = document.getElementById("detpId");
		var selectedText = t.options[t.selectedIndex].text;
		
		$('#msg-info').html('');

		if($('#empId').val() == ""){
			setMessage('danger','Input Employee ID');
		}else if($('#detpId').val() == ""){
			setMessage('danger','Select Department!');
		}else{
			$.ajax({
				url: $(this).data('url'),
				type:'POST',
				dataType:'json',
				data:{
					empId  : $('#empId').val(),
					deptId : $('#detpId').val(),
					active : '1', 
				},
				success: function(result){
					console.log(result);
					if(result === 1){
						let msg = 'Employee Successfully Assigned to '+ selectedText + ' Department';
						setMessage('success', msg);

						$('#empId').val("");
						$('#empName').val("");
						$('#detpId').val("");
					}else if(result === "X"){
						let msg = 'Employee Already Assigned to '+ selectedText + ' Department';
						setMessage('danger', msg);
					}
				}
			});
		}
	})

	//Create Asset
	$('#btn-create-asset').on('click', function(){
		$('#msg-info').html('');
		$.ajax({
			url: $(this).data('url'),
			type:'POST',
			dataType:'json',
			data:{
				assetKat : $('#assetKat').val(),
				desc : $('#desc').val(), 
				empId: $('#empId').val(),
				createdBy: $(this).data('user'),
				createdDate: '2019-02-12',
				quantity : $('#qty').val(),
				unit : $('#unit').val(),
				assetStat : $('#assetStatus').val(),
				location : $('#location').val()
			},
			success: function(result){
				console.log(result);
				if(result === 1){
					let msg = 'Asset Created';
					setMessage('success', msg);
				}else if(result === "X"){
					let msg = 'Create Asset Error';
					setMessage('danger', msg);
				}
			}
		});
	});

	//Display Asset Details
	$('#btn-asset-display').on('click', function(){
		if($('#src-asset-num').val() === ''){

		}else{
			let url = $(this).data('url') + '/' + $('#src-asset-num').val();
			getAssetDetails(url);
		}
	});

	$('#btn-dtl-clsd').on('click', function(){
		$('#src-asset-num').val('');
	});
	
})

function getAssetDetails(url){
	$.ajax({
		url: url, 
		type: "get",		 
		success: function(result) {
			$('#assetDetailModalLabel').html('');
			$('#assetDetailModalLabel').append(`Asset ` + result.assetNum +` Details`);
			$('#asset-detail').html('');
				$('#asset-detail').append(`
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-4 text-center">
								<br><br><br>
								<img src="https://api.qrserver.com/v1/create-qr-code/?data=`+result.assetNum+`&amp;size=200x200" class="img-fluid">
							</div>
							<div class="col-md-8">
								<ul class="list-group">
								  <li class="list-group-item">Asset Number : `+ result.assetNum +`</li>
								  <li class="list-group-item">Asset Description : `+ result.Description +`</li>
								  <li class="list-group-item">Asset Category : `+ result.assetkat +`</li>
								  <li class="list-group-item">Employee Name : `+ result.fullname +`</li>
								  <li class="list-group-item">Created By : `+ result.createdBy +`</li>
								  <li class="list-group-item">Created Date : `+ result.createdDate +` </li>
								  <li class="list-group-item">Quantity : `+ result.quantity +` ` + result.unit +`</li>
								  <li class="list-group-item">Location : `+ result.location +`</li>
								  <li class="list-group-item">Status : `+ result.assetStat +`</li>
								</ul>
							</div>
						</div>
					</div>	
				`);
		},
		error: function(xhr) {
		}
	});
}

function setMessage(type, msg){
	$('#msg-info').append(`
		<div class="alert alert-`+ type +`" role="alert">
		<strong>`+ msg +` </strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
		`);
}

function getEmpData(url){
	$('#msg-info').html('');
	$.getJSON(url, function(data){
		if(data === false){
			let msg = 'Employee ID : ' + $('#empId').val() + ' Not Found! ';
			setMessage('danger', msg);
			$('#empId').val("");
			$('#empName').val("");
		}else{
			$('#empName').val(data.fullname);
		}
	});
}
<style type="text/css">
	#closeProfileModal{
		color: #4a4846;
	}

	#closeProfileModal:hover{
		color:red;
		cursor: pointer;
	}

	#inputnmFirstname{
		border-radius: 0px;
		border-top-color: transparent;
		border-right-color: transparent;
		border-left-color: transparent;
		background-color: #a1a09f;
		color: black;
		font-weight:bolder;
	}

	#inputnmFirstname:focus{
		border-bottom-color: black;
	}

	#inputnmLastname{
		border-radius: 0px;
		border-top-color: transparent;
		border-right-color: transparent;
		border-left-color: transparent;
		background-color: #a1a09f;
		color: black;
		font-weight:bolder;
	}

	#inputnmLastname:focus{
		border-bottom-color: black;
	}
</style>
<div class="row" style="margin-top: 5em;">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="card" style="box-shadow:
	        0 2.8px 2.2px rgba(0, 0, 0, 0.034),
	        0 6.7px 5.3px rgba(0, 0, 0, 0.048),
	        0 12.5px 10px rgba(0, 0, 0, 0.06),
	        0 22.3px 17.9px rgba(0, 0, 0, 0.072),
	        0 41.8px 33.4px rgba(0, 0, 0, 0.086),
	        0 100px 80px rgba(0, 0, 0, 0.12); background-color: transparent; backdrop-filter: blur(50px);">
	        <div class="alert alert-success text-center" role="alert" style="cursor: default; display: none;" id="alertidSaved">
			  Save Changes
			</div>
			<div class="card-body">
				<div id="divProfile"></div>
				<div class="row" style="cursor: default; margin-bottom: 6em;">
					<div class="col-md-3"></div>
					<div class="col-md-9">
						<table style="width: 100%;">
							<tr>
								<td style=" width: 20%; font-size: 16pt; font-weight: bolder;">Status:</td>
								<td style="text-align: left; font-size: 16pt;"><?php echo $_SESSION['status'] ?></td>
							</tr>
							<tr>
								<td style=" width: 20%; font-size: 16pt; font-weight: bolder;">Designation:</td>
								<td style="text-align: left; font-size: 16pt;"><?php echo $_SESSION['department'] ?></td>
							</tr>
							<tr>
								<td style=" width: 20%; font-size: 16pt; font-weight: bolder;">Region:</td>
								<td style="text-align: left; font-size: 16pt;"><?php echo $_SESSION['region'] ?></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8"></div>
					<div class="col-md-4">
						<button class="btn btn-dark btn-block btn-lg" id="btnSavechanges" disabled>Save Changes</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-2"></div>
</div>
<!-- Modal for User info-->
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document" style="cursor: default; background-color: #7a736c;">
    <div class="modal-content" style="background-color:#7a736c;">
      <div class="modal-header">
        <h5 class="modal-title" id="profileModalLabel">Profile</h5>
        <i class="fa-solid fa-xmark" data-dismiss="modal" style="font-size: 20pt;" id="closeProfileModal"></i>
      </div>
      	<div class="alert alert-warning text-center" role="alert" id="alertidEmpty" style="display: none;">
		  <i class="fa-solid fa-exclamation fa-beat" style="color: #ff0000;"></i> Please input empty field.
		</div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col-md-1"></div>
      		<div class="col-md-10">
      			<form>
      				<span style="font-size: 12pt; color: white;">Firstname</span>
		        	<input type="text" name="" class="form-control form-control-lg" style="margin-bottom: 1em;" id="inputnmFirstname" autocomplete="off">
		        	<span style="font-size: 12pt; color: white;">Lastname</span>
		        	<input type="text" name="" class="form-control form-control-lg" id="inputnmLastname" autocomplete="off">
		        </form>
				<div style="margin-top: 2em; float: right;">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        			<button type="button" class="btn btn-dark" style="font-weight: bolder;" id="btnPost"><i class="fa-solid fa-paper-plane" style="color: #d99b17;"></i> Post</button>
				</div>
      		</div>
      		<div class="col-md-1"></div>
      	</div>
      </div>
    </div>
  </div>
</div>
<form id="frmProfile" hidden>
	<input type="text" name="txtnmPostedfirstname" id="inputnmPostedfirstname" value="<?php echo $_SESSION['firstname']?>">
	<input type="text" name="txtnmPostedlastname" id="inputnmPostedlastname" value="<?php echo $_SESSION['lastname']?>">
	<input type="text" name="txtnmPostedimg" id="inputnmPostedimg">
</form>
<table id="tblProfile" hidden>
	<tbody></tbody>
</table>
<script type="text/javascript">
	$(document).ready(function(){
		viewuserinfo_v();
		viewfullname();

		$(document).on("click","#btnOpenfile",function(e){
			e.preventDefault();
			$("#inputnmUpload").click();
		})

		function viewuserinfo_v(){
			$.ajax({
				type:'ajax',
				method:'POST',
				url:'<?php echo base_url("index.php/Navbar/viewuserinfo_c"); ?>',
				data:$("#inputmlwuserid").serialize(),
				dataType:'json',
				success:function(response){
					if(response.success){
						var div = '';

						response.data.forEach(function(tbl){
							div += `
							<div class="row">
								<div class="col-md-3">
									<div class="card" style="border-radius: 0px; height: 140pt; width: 12.5em; position: static; background-color: transparent; border-color: transparent;" id="divBorderprofile">
										<div class="card-body">
											<img src="../userimg/${tbl['imguser']}" style="width: 9.9em; height: 11em;" id="inputnmUserimg">
											<input type="file" id="inputnmUpload" class="form-control" style="background-color: transparent; border-color: transparent; display: none;">
											<button class="btn btn-dark btn-block" style="border-radius: 0px;" id="btnOpenfile"><i class="fa-regular fa-images fa-shake" style="color: yellow;"></i> Change image</button>
										</div>
									</div>
								</div>
								<div class="col-md-9" style="margin-top: 1.5em; cursor: default;">
									<h1 style="font-size: 70pt; color: black;" id="h1post">${tbl['firstname']} ${tbl['lastname']} </h1>
									<span id="btnUpload" style="margin-right: 5em;"><i class="fa-regular fa-image fa-bounce" style="color: #0008ff; font-size: 16pt;"></i> Set as profile</span>
									<span data-toggle="modal" data-target="#profileModal" id="btnEditname"><i class="fa-sharp fa-regular fa-pen-to-square fa-beat-fade" style="color: red; font-size: 16pt;" ></i> Edit name</span>
									</div>
							</div>
							<hr>
							`;
						})
						$("#divProfile").html(div);
					}
				}
			})
		}

		$(document).on("click","#btnEditname",function(e){
			e.preventDefault();
			$("#getInfo").click();
		})

		$(document).on("click","#getInfo",function(e){
			$("#inputnmFirstname").val($(this).attr("data-firstname"));
			$("#inputnmLastname").val($(this).attr("data-lastname"));
			$("#inputnmPostedimg").val($(this).attr("data-img"));
		})

		function viewfullname(){
			$.ajax({
				type:'ajax',
				method:'POST',
				url:'<?php echo base_url("index.php/Navbar/viewuserinfo_c"); ?>',
				data:$("#inputmlwuserid").serialize(),
				dataType:'json',
				success:function(response){
					if(response.success){
						var tbody = '';
						response.data.forEach(function(tbl){
							tbody += `<tr data-firstname="${tbl['firstname']}" data-lastname="${tbl['lastname']}" data-img="${tbl['imguser']}" id="getInfo">
									<td>${tbl['lastname']}</td>
								</tr>`;
						})
						$("#tblProfile tbody").html(tbody);
					}
				}
			})
		}

		$("#btnPost").click(function(e){
				e.preventDefault();
				var inputnmFirstname = $("#inputnmFirstname").val();
				var inputnmLastname = $("#inputnmLastname").val();

				if(inputnmFirstname==(" ")>0){
					$("#alertidEmpty").fadeIn(500).fadeOut(555);
					$("#inputnmFirstname").focus();
				}else if(inputnmLastname==(" ")>0){
					$("#alertidEmpty").fadeIn(500).fadeOut(555);
					$("#inputnmLastname").focus();
				}else{
					post();
				}
		})

			function post(){
				var inputnmFirstname = $("#inputnmFirstname").val();
				var inputnmLastname = $("#inputnmLastname").val();
				$("#inputnmPostedfirstname").val(inputnmFirstname);
				$("#inputnmPostedlastname").val(inputnmLastname);
				$("#h1post").text(inputnmFirstname+" "+inputnmLastname);
				$("#closeProfileModal").click();
				$("#btnSavechanges").removeAttr("disabled","disabled");
			}

			$(document).on("click","#btnSavechanges",function(e){
				e.preventDefault();
				updateuser_v();
			})

			function updateuser_v(){
				$.ajax({
					type:'ajax',
					method:'POST',
					url:'<?php echo base_url("index.php/Profile/updateuser_c"); ?>',
					data:$("#frmProfile,#inputmlwuserid").serialize(),
					dataType:'json',
					success:function(response){
						if(response.success){
							$("#alertidSaved").fadeIn(500).fadeOut(555);
							location.reload();
						}else{
							$("#btnSavechanges").attr("disabled","disabled");
						}
					}
				})
			}

		function savetouserimg(){
			var fd = new FormData();
			var files = $('#inputnmUpload')[0].files;

			// Check file selected or not
			if(files.length > 0 ){
			fd.append('file',files[0]);

			$.ajax({
				url: '<?php echo base_url("index.php/Profile/view_c"); ?>',
				type: 'post',
				data: fd,
				contentType: false,
				processData: false,
				success: function(response){
					if(response != 0){
						$("#img").attr("src",response);
					}else{
						alert('file not uploaded');
						// $("#btnOpenInvalidbutton").click();
					}
				},
			})
			}else{
				$("#divBorderprofile").css("background-color","#fcd2d2");
				$("#divBorderprofile").css("border-bottom-color","red");
			}
		}

		$(document).on("change","#inputnmUpload",function(e){
			e.preventDefault();
			var fileName = e.target.files[0].name;
			$("#inputnmPostedimg").val(fileName);
			$("#btnSavechanges").removeAttr("disabled","disabled");
		})

		$(document).on("click","#btnUpload",function(){
			var inputnmPostedimg = $("#inputnmPostedimg").val();
			$("#inputnmPostedimg").val(inputnmPostedimg);
			emptyimg();
		})

		function emptyimg(){
			var inputnmPostedimg = $("#inputnmPostedimg").val();
			if(inputnmPostedimg==(" ")>0){
				alert("Please choose image.");
				$("#divBorderprofile").css("border-color","red");
			}else{
				updateimg_v();
			}
		}

		function updateimg_v(){
			$.ajax({
				type:'ajax',
				method:'POST',
				url:'<?php echo base_url("index.php/Profile/updateimg_c");?>',
				data:$("#inputmlwuserid,#inputnmPostedimg").serialize(),
				dataType:'json',
				success:function(response){
					if(response.success){
						savetouserimg();
						location.reload();
					}
				}
			})
		}
	})
</script>
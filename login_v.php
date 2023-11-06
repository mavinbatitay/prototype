<style type="text/css">
	#btnLogin i {
	  cursor: pointer;
	  display: inline-block;
	  position: relative;
	  transition: 0.5s;
	  color: yellow;
	  font-size: 20px;
	  font-weight: bold;
	}

	#btnLogin i:after {
	  content: '\f090';
	  position: absolute;
	  opacity: 0;
	  top: 0;
	  right: -20px;
	  transition: 0.5s;
	}

	#btnLogin:hover i{
		opacity: 0.7;
		padding-right: 25px;
		padding-bottom: 13.2px;
		color: yellow;
	}

	#btnLogin:hover i:after {
	  opacity: 1;
	  right: 0;
	}
</style>
<div class="row" style="cursor: default;">
	<div class="col-md-7">
		<div class="text-center" style="padding-top: 7em;">
			<img src="../img/mllogo1c.png" id="logo">
		</div>
		<h1 class="text-center">M. Lhuillier Financial Services Inc.</h1>
		<p class="text-center">Cash Balance Portal</p>
	</div>
	<div class="col-md-4" style="padding-top: 7em;">
		<div class="card">
			<div class="card-body">
				<h2 class="text-center"><i class="fa-solid fa-circle-user"></i> Login</h2>
				<form id="frmInputs">
					<div class="form-floating">
						<input type="text" name="txtnmUsername" class="form-control" id="inputnmUsername" placeholder="Username" autocomplete="off" required>
					<label for="inputnmUsername">Username</label>
					</div>
					<div class="form-floating">
						<input type="password" name="txtnmPassword" class="form-control" id="inputnmPassword" placeholder="Password" autocomplete="off" required>
						<label for="inputnmPassword">Password</label>
					</div>
					<div id="assignee" hidden></div>
					<label style="font-size: 9pt;">Create an account? <a href="User">Click here</a></label>
					<button class="btn btn-outline-dark" style="float: right; font-weight: bolder;" id="btnLogin">Login <i class="fa-solid"></i></button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>
<div class="modal fade" id="FailedModalToggle" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="failedModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background-color: transparent; border-color: transparent;">
    	
      <div class="modal-body">
        <div class="card mb-3" style="max-width: 540px; background-color: red;">
		  <div class="row g-0">
		    <div class="col-md-4" style="background-color: #b50202;">
		      <i class="fa-solid fa-face-frown" style="padding-top: 40px; padding-left: 25px; font-size: 70pt; color: #dea426;"></i>
		    </div>
		    <div class="col-md-8">
		    	<div class="row">
		    		<div class="col-md-2 ms-auto">
		    			<i class="fa-solid fa-xmark" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 30pt; color: white;"></i>
		    		</div>
		    	</div>
		      <div class="card-body" style="cursor: default;">
		        <h5 class="card-title" style="color: white;">Aw Snap!</h5>
		        <p class="card-text" style="color: white;">Invalid Credential</p>
		        <p class="card-text" style="color: black;"><small>Cash Balance Portal</small></p>
		      </div>
		    </div>
		  </div>
		</div>
      </div>
    </div>
  </div>
</div>
<button class="btn btn-primary" data-bs-toggle="modal" href="#FailedModalToggle" role="button" id="btnOpenFailedbutton" hidden>Open Failed modal</button>

<div class="modal fade" id="EmptyModalToggle" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="failedModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background-color: transparent; border-color: transparent;">
    	
      <div class="modal-body">
        <div class="card mb-3" style="max-width: 540px; background-color: red;">
		  <div class="row g-0">
		    <div class="col-md-4" style="background-color: #b50202;">
		      <i class="fa-regular fa-face-meh-blank" style="padding-top: 40px; padding-left: 25px; font-size: 70pt; color: #dea426;"></i>
		    </div>
		    <div class="col-md-8">
		    	<div class="row">
		    		<div class="col-md-2 ms-auto">
		    			<i class="fa-solid fa-xmark" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 30pt; color: white;"></i>
		    		</div>
		    	</div>
		      <div class="card-body" style="cursor: default;">
		        <h5 class="card-title" style="color: white;">Error!</h5>
		        <p class="card-text" style="color: white;">Please input empty fields.</p>
		        <p class="card-text" style="color: black;"><small>Cash Balance Portal</small></p>
		      </div>
		    </div>
		  </div>
		</div>
      </div>
    </div>
  </div>
</div>
<button class="btn btn-primary" data-bs-toggle="modal" href="#EmptyModalToggle" role="button" id="btnOpenEmptybutton" hidden>Open Failed modal</button>

<div class="modal fade" id="NotverifyModalToggle" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="failedModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background-color: transparent; border-color: transparent;">
    	
      <div class="modal-body">
        <div class="card mb-3" style="max-width: 540px; background-color: red;">
		  <div class="row g-0">
		    <div class="col-md-4" style="background-color: #b50202;">
		      <i class="fa-solid fa-skull" style="padding-top: 40px; padding-left: 25px; font-size: 70pt; color: #dea426;"></i>
		    </div>
		    <div class="col-md-8">
		    	<div class="row">
		    		<div class="col-md-2 ms-auto">
		    			<i class="fa-solid fa-xmark" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 30pt; color: white;"></i>
		    		</div>
		    	</div>
		      <div class="card-body" style="cursor: default;">
		        <h5 class="card-title" style="color: white;">Snap!</h5>
		        <p class="card-text" style="color: white;">Please contact your IT to verify your account.</p>
		        <p class="card-text" style="color: black;"><small>Cash Balance Portal</small></p>
		      </div>
		    </div>
		  </div>
		</div>
      </div>
    </div>
  </div>
</div>
<button class="btn btn-primary" data-bs-toggle="modal" href="#NotverifyModalToggle" role="button" id="btnOpenNotverifybutton" hidden>Open Not verify modal</button>
<script type="text/javascript">
	$(document).ready(function(){
		$("#btnLogin").click(function(e){
			e.preventDefault();
			empty();
		})

		function empty(){
			var inputnmUsername = $("#inputnmUsername").val();
			var inputnmPassword = $("#inputnmPassword").val();

			if(inputnmUsername==("")>0||inputnmPassword==("")>0){
				$("#btnOpenEmptybutton").click();
			}else{
				userdepartment_v();
			}
		}

		function userdepartment_v(){
			$.ajax({
				type:'ajax',
				method:'POST',
				url:'<?php echo base_url("login/userdepartment_c"); ?>',
				data:$("#frmInputs").serialize(),
				dataType:'json',
				success:function(response){
					if(response.success){
						var div = '';

						response.data.forEach(function(tbl){
							div += `<input type="text" value="${tbl['user_department']}" id="inputnmdepartment" name="txtnmDepartment">`;
						})
						$("#assignee").html(div);
						checkassignee();
					}else{
						$("#btnOpenFailedbutton").click();
					}
				}
			})
		}

		function checkassignee(){
			var inputnmdepartment = $("#inputnmdepartment").val();

			if(inputnmdepartment==="Not yet Assign"){
				$("#btnOpenNotverifybutton").click();
			}else{
				login_v();
			}
		}

		function login_v(){
			$.ajax({
				type:'ajax',
				method:'POST',
				url:'<?php echo base_url("login/userlogin_c"); ?>',
				data:$("#frmInputs").serialize(),
				dataType:'json',
				success:function(response){
					if(response.success){
						route();
					}else{
						$("#btnOpenFailedbutton").click();
					}
				}
			})
		}

		function route(){
			var inputnmdepartment = $("#inputnmdepartment").val();
			
			if(inputnmdepartment==="Admin"){
				location.replace("adminpersdailybalance");
			}else{
				location.replace("Home");
			}
		}
	})
</script>
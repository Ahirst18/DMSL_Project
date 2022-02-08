<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        html,body{
			height: 100%;
			margin: 0;
			background: rgb(2,0,36);
           
		
		}
   
   .myForm{
   	background-color: rgba(0,0,0,0.5) !important;
   	padding: 15px !important;
   border-radius: 15px !important;
   color: white;
   
   }

   input{
   	border-radius:0 15px 15px 0 !important;

   }
   input:focus{
       outline: none;
box-shadow:none !important;
border:1px solid #ccc !important;

   }

   .br-15{
   	border-radius: 15px 0 0 15px !important;
   }

   #add_more{
   	color: white !important;
   	background-color: #fa8231 !important;
   	border-radius: 15px !important;
   	border: 0 !important;

   }
   #remove_more{
   	color: white !important;
   	background-color: #fc5c65 !important;
   	border-radius: 15px !important;
   	border: 0 !important;
   	display: none;

   }
   	
   .submit_btn{
   	border-radius: 15px !important;
    background-color: #95c714 !important;
    border: 0 !important;
   }
    </style>
    <title>Document</title>
</head>
<body>
<?php include_once('backup.php'); ?>
<form>
<div class="container h-100">
	<div class="d-flex justify-content-center">
		<div class="card mt-5 col-md-4 animated bounceInDown myForm">
			<div class="card-header">
				<h4>Change Password</h4>
			</div>
			<div class="card-body">
				<form>
                <div class="form-row">
                  <div class="col">
                      <label>Current Password</label>
                      <input type="password" name="new_password"  class="form-control chosen-select" placeholder="Enter new password" required>
                  </div>
		      </div>
          <div class="form-row">
                  <div class="col">
                      <label>New Password</label>
                      <input type="password" name="new_password"  class="form-control chosen-select" placeholder="Enter new password" required>
                  </div>
		      </div>
          <div class="form-row">
                  <div class="col">
                      <label>Confirm Password</label>
                      <input type="password" name="con_password"  class="form-control chosen-select" placeholder="Enter confirm new  password" required>
                  </div>
		      </div>
        </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add_change_pw" class="btn btn-primary">Save Changes</button>
        </div>
      </div>
				</form>
			</div>
		</div>
	</div>
	</div>
</form>
</body>
</html>
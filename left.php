		<div class="col-md-3 sm-hidden">
			<div class="panel panel-default">
				<div class="panel-heading"><span class="glyphicon glyphicon-th-list"></span> User Center</div>
                <?php if(isset($_SESSION['username']))
				{
				?>
				<div class="list-group">
					<a href="usercenter.php" class="list-group-item">Modify Personal Information</a>
					<a href="changeuserpwd.php" class="list-group-item">Change Password</a>
                    <a href="orders.php" class="list-group-item">View Orders</a>
             
                    <a href="gouwu1.php" class="list-group-item">View Shopping Cart</a>
				</div>
                <?php
				}
				else
				{
				?>
                <div class="panel-body">
                <div class="height1"></div>
                <script language="javascript">
				function check1(){
					if(document.form2.usernc.value==""){
						alert("Please enter your account");
						return false;
						}
					if(document.form2.p1.value==""){
						alert("Please enter your password");
						return false;
					}
				}
				</script>
                <form class="form-horizontal" method="post" role="form" name="form2" action="login.php?act=login" onSubmit="return check1();">
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="usernc" id="usernc" placeholder="Please enter your username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="p1" id="p1" placeholder="Please enter your password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Log In</button> <a href="reg.php">
								<button type="button" class="btn btn-link">Register</button></a>
                        </div>
                    </div>
                </form></div>
                <?php } ?>
			</div>
			
		</div>
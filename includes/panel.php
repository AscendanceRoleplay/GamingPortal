	<!-- Panel -->
	<div id="toppanel">
		<div id="panel">
			<div class="content clearfix">
				<div class="left">
					<h1>User Panel</h1>
					<h2>OH MY GOSH IT SLIDES</h2>		
					<p class="grey">Register your account!</p>
					<h2>Already have an account?</h2>
					<p class="grey">Login to access the members area!</p>
				</div>
	            
	            
	            <?php
				
				if(!$_SESSION['id']):
				
				?>
	            
				<div class="left">
					<!-- Login Form -->
					<form class="clearfix" action="" method="post">
						<h1>Member Login</h1>
	                    
	                    <?php
							
							if($_SESSION['msg']['login-err'])
							{
								echo '<div class="err">'.$_SESSION['msg']['login-err'].'</div>';
								unset($_SESSION['msg']['login-err']);
							}
						?>
						
						<label class="grey" for="username">Username:</label>
						<input class="field" type="text" name="username" id="username" value="" size="23" />
						<label class="grey" for="password">Password:</label>
						<input class="field" type="password" name="password" id="password" size="23" />
		            	<label><input name="rememberMe" id="rememberMe" type="checkbox" checked="checked" value="1" /> &nbsp;Remember me</label>
	        			<div class="clear"></div>
						<input type="submit" name="submit" value="Login" class="bt_login" />
					</form>
				</div>
				<div class="left right">			
					<!-- Register Form -->
					<form action="" method="post">
						<h1>Not a member yet? Sign Up!</h1>		
	                    
	                    <?php
							
							if($_SESSION['msg']['reg-err'])
							{
								echo '<div class="err">'.$_SESSION['msg']['reg-err'].'</div>';
								unset($_SESSION['msg']['reg-err']);
							}
							
							if($_SESSION['msg']['reg-success'])
							{
								echo '<div class="success">'.$_SESSION['msg']['reg-success'].'</div>';
								unset($_SESSION['msg']['reg-success']);
							}
						?>
	                    		
						<label class="grey" for="username">Username:</label>
						<input class="field" type="text" name="username" id="username" value="" size="23" />
						<label class="grey" for="email">Password:</label>
						<input class="field" type="text" name="password" id="password" size="23" />
						<label class="grey" for="email">Email:</label>
						<input class="field" type="text" name="email" id="email" size="23" />
						<input type="submit" name="submit" value="Register" class="bt_register" />
					</form>
				</div>
	            
	            <?php
				
				else:
				
				?>
	            
	            <div class="left">
	            
	            <h1>Members panel</h1>
	            
	            <p></p>
	            <a href="registered.php">View your characters</a>
	            <p>- or -</p>
	            <a href="command.php">View your commands</a>
	            <p>- or -</p>
	            <a href="?logoff">Log off</a>
	            
	            </div>
	            
	            <div class="left right">
	            </div>
	            
	            <?php
				endif;
				?>
			</div>
		</div> <!-- /login -->	
	
	    <!-- The tab on top -->	
		<div class="tab">
			<ul class="login">
		    	<li class="left">&nbsp;</li>
		        <li>Hello <?php echo $_SESSION['usr'] ? $_SESSION['usr'] : 'Guest';?>!</li>
			<li>&nbsp;<?php echo $_SESSION['gmlevel']?></li>
				<li class="sep">|</li>
				<li id="toggle">
					<a id="open" class="open" href="#"><?php echo $_SESSION['id']?'Open Panel':'Log In | Register';?></a>
					<a id="close" style="display: none;" class="close" href="#">Close Panel</a>			
				</li>
		    	<li class="right">&nbsp;</li>
			</ul> 
		</div> <!-- / top -->
		
	</div> <!--panel -->
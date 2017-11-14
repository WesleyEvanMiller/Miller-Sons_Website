<?php
	include ('Connections/millernsons.php');
	
	session_start();
	
	if(isset($_POST['username']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$sql = "SELECT * FROM users WHERE Username = :username";
		$query = $handler->prepare($sql);
		$query->execute(array(":username" => $username));
		$results = $query->fetchAll();
		
		if($results != FALSE && $query->rowCount() > 0)
		{
			if($results[0]['Password']==$password)
			{
				$_SESSION['username'] = $username;
				header("Location: manage.php");
				die();
			}
		}
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login - Miller &amp; Sons</title>
<link href="Styles.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
	<div id="DivWrapper">
    
    	<div id="DivHeader">
    	
    		<ul id="HeaderLogo">
    		
    			<a href="index.html">
    				<img id="DivHeaderLogo" src="Resources/Miller Logo Final.png" alt="MillerandSonsLogo">
    			</a>
    			
    		</ul>

    	</div>
    	
    	<div id="divMenuBar">
    	
    		<a id="HomeButton" href="index.html"></a>
			
			<a id="ShopButton" href="Shop.html"></a>
			
			<a id="AboutButton" href="About.html"></a>
			
			<a id="ContactButton" href="Contact.html"></a>
						
    	</div>
    	
    	<div id="DivBody">
        <?php if(!isset($_SESSION['username'])):?>
        <form action ="" method="POST">
        	<ul id="loginCenter">
                <li>Username:<input type="text" id="UsernameBox" name="username" value="" /></li><br>
                <li>Password:&nbsp;<input type="password" id="PasswordBox" name="password" value="" /></li><br>
                <li><input type="submit" name="Log In" id="LogInButton" value="Log In"/></li>
			</ul>
        </form>
        <?php else:?>
        	<?php echo("You are logged in as ".$_SESSION['username']);
			header("Location: manage.php");
				die();?>
            
        <?php endif;?>
    	</div>
    	
    	<div id="DivFooter">
    	
    		<ul id="BottomTextBox">
    		
	    		<a href="index.html" class="bottomLinks">Home</a> &nbsp;&nbsp; |&nbsp;&nbsp;
				
				<a href="Shop.html" class="bottomLinks">Shop</a>  &nbsp;&nbsp;|&nbsp;&nbsp;
			
				<a href="About.html" class="bottomLinks">About Us</a>  &nbsp;&nbsp;|&nbsp;&nbsp;
				
				<a href="Contact.html" class="bottomLinks">Contact Us</a>  &nbsp;&nbsp;|&nbsp;&nbsp;
                
				<a href="login.php" class="bottomLinks">Login</a>  
			</ul>
			
    	</div>

    </div>
</body>
</html>
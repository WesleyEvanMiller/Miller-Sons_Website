<?php
	include ('Connections/millernsons.php');

	session_start();
	
	if(!isset($_SESSION['username']))
	{
    	header("Location: login.php");
		die();
	}
	
	if(isset($_POST['logout']))
	{
		session_unset();
    	session_destroy(); 
    	header("Location: login.php");
		die();
	}
	
	if(isset($_POST['name'])&&($_POST['name'])!="")
	{
		$name = $_POST['name'];
		$description = $_POST['description'];
		$image = $_POST['image'];
		$price = $_POST['price'];
		$tag = $_POST['tag'];
	
		if(isset($_POST['Add']))
		{
			$sql="INSERT INTO inventory (Name,Description,Image,Price,Tag) VALUES(:name,:description,:image,:price,:tag)";
			$query = $handler->prepare($sql);
			
			$query->execute(array(
				':name' => $name,
				':description' => $description,
				':image' => $image,
				':price' => $price,
				':tag' => $tag
			));
		}
	
		if(isset($_POST['Edit'])){
			$sql="UPDATE inventory SET description=?,image=?,price=?,tag=? WHERE name=?";
			
			$query = $handler->prepare($sql);
			
			$query->execute(array($description,$image,$price,$tag,$name));
		}
		
		if(isset($_POST['Delete'])){
			$sql="DELETE FROM inventory WHERE name=?";
			$query = $handler->prepare($sql);
			
			$query->execute(array($name));
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage - Miller &amp; Sons</title>
<link href="Styles.css" rel="stylesheet" type="text/css" media="screen">
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.3.min.js"></script>
<script src="shopScript.js"></script>

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
        <br>
			<?php 
            if(!isset($_POST['name'])||($_POST['name'])=="")
            {
                echo "<script type='text/javascript'>alert(\"Please enter or select via drop down a name.\");</script>";
            }
            ?>
            <form action ="" method="POST">
                <ul style="list-style-type:none;">
                    <li id="iSelect">Select To Edit:
                        <select name="Inventory Items" id="itemSelect">
                            <option selected="selected" value="none">None</option>
                        </select>
                    </li><br>
                    <li id="NBox">Name:<input type="text" name="name" id="NameBox" value="" /></li><br>
                    <li id="DBox">Decription:<br><textarea rows="5" cols="20" id="DecriptionBox" name="description" value="" /></textarea></li><br>
                    <li id="Imgselect">Image:&nbsp;
                        <select name="image" id="imageSelect">
                            <option selected="selected" value="Resources/BruiserWellPump.png">Submersible Well Pump</option>
                        </select>
                        <div id="selectedimg"></div>
                    </li><br>
                    <li id="PBox">Price:&nbsp;&nbsp;&nbsp;<input type="text" name="price" id="PriceBox" value="" /></li><br>
                    <li id="TBox">Tag:&nbsp;&nbsp;&nbsp;&nbsp;
                        <select name="tag" id="TagBox">
                        <option selected="selected" value="">None</option>
                            <option value="Submersible Well Pumps">Submersible Well Pumps</option>
                            <option value="Sewer Grinders">Sewer Grinders</option>
                            <option value="Effluent Pumps">Effluent Pumps</option>
                        </select>
                    </li><br>
                    <li><input type="submit" name="Add" id="Addbtn" value="Add"/></li>
                    <li><input type="submit" name="Edit" id="Editbtn" value="Edit"/></li>
                    <li><input type="submit" name="Delete" id="Deletebtn" value="Delete"/></li>
                    <li><input type="submit" name="logout" id="logoutbtn" value="Logout"/></li>
                </ul>
    
            </form>
            <div id="tabdiv">
                <table id="manageTable">
                    <tr>
                        <th>#</th><th>Name</th><th>Description</th><th>Image</th><th>Price</th><th>Tag</th>
                    </tr>
                </table>
            </div>
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

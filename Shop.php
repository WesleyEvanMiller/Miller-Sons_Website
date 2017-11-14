<?php
	include ('Connections/millernsons.php');
	
	$query = $handler->query('SELECT * FROM inventory');
	$results = $query->fetchAll(PDO::FETCH_ASSOC);
	$json = json_encode($results);
		echo($json);
?>


<!DOCTYPE html>
<html>

<head lang="en">

<meta content="text/html; charset=utf-8" http-equiv="Content-Type">

<title>Shop - Miller &amp; Sons</title>

<link href="Styles.css" rel="stylesheet" type="text/css" media="screen">
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.3.min.js"></script>
<script src="shopScript.js"></script>

<body">
<script type="text/javascript">
$('document').ready(function()
{

    $.getJSON('getData.php', function(test){document.write(test.name);});

});
</script>
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
			
			<a id="ShopButton" href="Shop.php"></a>
			
			<a id="AboutButton" href="About.html"></a>
			
			<a id="ContactButton" href="Contact.html"></a>

    	</div>
    	
    	<div id="DivBody">
    	
			<img class="DividerHorShop" id="DividerTopShop" src="resources/horizonalDivider.png" alt="Divider1">
            
            <div id="DivLeftMenu">
				<ul style="list-style-type:none">
                	<li><input type="text" id="srBox" value="" /><button id="srBtn">Search</button></li><br>
                    <li class="filters" style="color:black !important"><b>Filters</b></li>
                    <li class="filters" id="filterNone">+ None</li>
                	<li class="filters" id="filterWell">+ Submersible Well Pumps</li>
                    <li class="filters" id="filterGrinder">+ Sewer Grinders</li>
                    <li class="filters" id="filterEffluent">+ Effluent Pumps</li>
                    <li><input type="submit" name="test" id="test" value="test"/></li>
                <ul>
            </div>
            
            <img id="DividerSideShop" src="resources/verticalDivider.png" alt="Divider2">
            
            <div class="DivShopContent" id="page1">

                
            </div>
            
            <div class="DivShopContent" id="page2">
            
				
            </div>
            
            <img class="DividerHorShop" id="DividerUBotShop" src="resources/horizonalDivider.png" alt="Divider3">
            
            <div id="prevButton" data-button="prev"></div>
            <div id="onePlaceHold"></div>
            <div id="twoPlaceHold"></div>
            <div id="nextButton" data-button="next"></div>
            
            <img class="DividerHorShop" id="DividerLBotShop" src="resources/horizonalDivider.png" alt="Divider4">
            
            <a href="http://gpda.info/pro-dealer/miller-and-sons/21102/">
            	<img id="GouldsADealer" src="Resources/Goulds Authorized Dealer.png" alt="Goulds Authorized Dealer">
            </a>
            
            <p id="GouldsText"><i>An Authorized Dealer Of:</i></p>
        	
    	</div>
    	
    	<div id="DivFooter">
    	
    		<ul id="BottomTextBox">
    		
	    		<a href="index.html" class="bottomLinks">Home</a> &nbsp;&nbsp; |&nbsp;&nbsp;
				
				<a href="Shop.php" class="bottomLinks">Shop</a>  &nbsp;&nbsp;|&nbsp;&nbsp;
			
				<a href="About.html" class="bottomLinks">About Us</a>  &nbsp;&nbsp;|&nbsp;&nbsp;
				
				<a href="Contact.html" class="bottomLinks">Contact Us</a>  &nbsp;&nbsp;|&nbsp;&nbsp;
                
				<a href="login.php" class="bottomLinks">Login</a> 
				
			</ul>
			

    	</div>

    </div>

</body>

</html>

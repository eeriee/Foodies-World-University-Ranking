<html>
<head>
    <style type="text/css">

    /* Style the list */
	ul.tab {
	    list-style-type: none;
	    margin: 0;
	    padding: 0;
	    overflow: hidden;
	    border: 1px solid #ccc;
	    background-color: #f1f1f1;
	}

	/* Float the list items side by side */
	ul.tab li {float: left;}

	/* Style the links inside the list items */
	ul.tab li a {
	    display: inline-block;
	    color: black;
	    text-align: center;
	    padding: 14px 16px;
	    text-decoration: none;
	    transition: 0.3s;
	    font-size: 17px;
	}

	/* Change background color of links on hover */
	ul.tab li a:hover {background-color: #ddd;}

	/* Create an active/current tablink class */
	ul.tab li a:focus, .active {background-color: #ccc;}

	/* Style the tab content */
	.tabcontent {
	    display: none;
	    padding: 6px 12px;
	    border: 1px solid #ccc;
	    border-top: none;
	}

	</style>

	<script>
	function openTab(evt, tabName) {
	    // Declare all variables
	    var i, tabcontent, tablinks;

	    // Get all elements with class="tabcontent" and hide them
	    tabcontent = document.getElementsByClassName("tabcontent");
	    for (i = 0; i < tabcontent.length; i++) {
	        tabcontent[i].style.display = "none";
	    }

	    // Get all elements with class="tablinks" and remove the class "active"
	    tablinks = document.getElementsByClassName("tablinks");
	    for (i = 0; i < tablinks.length; i++) {
	        tablinks[i].className = tablinks[i].className.replace(" active", "");
	    }

	    // Show the current tab, and add an "active" class to the link that opened the tab
	    document.getElementById(tabName).style.display = "block";
	    evt.currentTarget.className += " active";
	}

	</script>

	<?php

		function sql_init(){
			//connect to DB
			$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
			// Check connection
			if($connection === false){
			    die("ERROR: Could not connect. " . mysqli_connect_error());
			}
			mysql_select_db('uni_ranking_db');
		}

		function nearbyUniRanking(){

		}

		function countryRanking() {
			//echo "<script type='text/javascript'>alert(".$_POST["country"].");</script>";
			sql_init();
		    $cr_query = "SELECT * FROM world_ranking WHERE country = '".$_POST["country"]."'"; //You don't need a ; like you do in SQL
			$cr_result = mysql_query($cr_query);
			global $cr_table;
			$cr_table = "<table>";
			while($cr_row = mysql_fetch_array($cr_result)){   //Creates a loop to loop through results
			$cr_table .= "<tr><td>" . $cr_row['id'] . "</td><td>" . $cr_row['uni_name'] . "</td><td>". $cr_row['city'] . "</td><td>". $cr_row['country'] . "</td></tr>";  //$row['index'] the index here is a field name
			}
			$cr_table .= "</table>";
			mysql_close(); //Make sure to close out the database connection
		} 

		function worldRanking(){
			sql_init();
			//get world ranking and form a table
			$wr_query = "SELECT * FROM world_ranking"; //You don't need a ; like you do in SQL
			$wr_result = mysql_query($wr_query);
			global $wr_table;
			$wr_table = "<table>";
			while($cr_row = mysql_fetch_array($wr_result)){   //Creates a loop to loop through results
			$wr_table .= "<tr><td>" . $cr_row['id'] . "</td><td>" . $cr_row['uni_name'] . "</td><td>". $cr_row['city'] . "</td><td>". $cr_row['country'] . "</td></tr>";  //$row['index'] the index here is a field name
			}
			$wr_table .= "</table>";
			mysql_close(); //Make sure to close out the database connection

		}

		worldRanking();

		if(isset($_GET['action'])=='submit_cr') {
		    countryRanking();
		}else if (isset($_GET['action'])=='uni') {
			nearbyUniRanking();
		}


	?>

</head>

<body>	

	<ul class="tab">
	  <li><a href="javascript:void(0)"  id="worldLink" class="tablinks" onclick="openTab(event, 'worldTab')">World Ranking</a></li>
	  <li><a href="javascript:void(0)"  id="countryLink" class="tablinks" onclick="openTab(event, 'countryTab')">Country Ranking</a></li>
	  <li><a href="javascript:void(0)"  id="uniLink" class="tablinks" onclick="openTab(event, 'uniTab')">Search for University</a></li>
	</ul>

	<div id="worldTab" class="tabcontent">
	  <h3>World University Ranking</h3>
	  <p>Data comes from world ranking table, displayed statically</p>
	  <?php echo $wr_table; ?>
	</div>

	<div id="countryTab" class="tabcontent">

	  <h3>Country Ranking</h3>
	  <p>Data dynamically pulled based on query</p> 

	  <?php
	  if (isset($cr_table) )
	  	echo $cr_table;
	  ?> 

	  <br><br>

	  <form action="?action=submit_cr" method="post">
	  Country: <input type="text" name="country"><br>
	  <input type="submit">
	  </form> 

	  
	</div>

	<div id="uniTab" class="tabcontent">
	  <h3>Search for University</h3>
	  <p>Placeholder, not implemented yet</p>

	  <br><br>

	  <form action="?action=submit_uni" method="post">
	  Country: <input type="text" name="uni"><br>
	  <input type="submit">
	  </form> 

	</div>

</body>
</html>
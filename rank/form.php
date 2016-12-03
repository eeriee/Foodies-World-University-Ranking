<?php 

	if (isset($_POST['uni'])) {
		nearbyUniRanking();
	}

	if(isset($_POST['country'])) {
	    countryRanking();
	}

	function sql_init(){
		$connection = mysql_connect('localhost', 'root', '12345'); 
		if($connection === false){
		    die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		mysql_select_db('test');
	}
	function nearbyUniRanking(){

		sql_init();

		$ur_query = "SELECT x.business_id as business_id, business_name, distance, avg_star, review_count, LOG2(review_count+2) * avg_star / LOG10(distance+10) as score, full_address, city, state FROM

			(SELECT university_name, uni_biz_dist.business_id, distance
			FROM uni_biz_dist
			INNER JOIN university
			ON uni_biz_dist.university_id=university.university_id
			WHERE university_name = '".$_POST["uni"]."') x

			INNER JOIN 

			(SELECT business_id, business_name, avg_star, review_count, full_address, city, state
			FROM business) y

			ON x.business_id = y.business_id
			ORDER BY score DESC
			LIMIT 10";

		$ur_result = mysql_query($ur_query);
		if($ur_result === FALSE) { 
		    die(mysql_error()); 
		}

   /*
   * *************** Here is the simple table listing top 10 restaurants *******************
   */


		global $ur_table;
		// $ur_table = "<table class=\"table table-striped\"><tr><td>Restaurant Name</td><td>Distance from University</td><td>Average Stars</td><td>Total Number of Reviews</td><td>Scores</td><td>Restaurant Address</td><td>City</td><td>State</td></tr>";
		// while($ur_row = mysql_fetch_array($ur_result)){   
		// $ur_table .= "<tr><td>" . $ur_row['business_name'] . "</td><td>" . $ur_row['distance'] . "</td><td>". $ur_row['avg_star'] . "</td><td>". $ur_row['review_count'] . "</td><td>". $ur_row['score']. "</td><td>". $ur_row['full_address']. "</td><td>". $ur_row['city']. "</td><td>". $ur_row['state']. "</td></tr>";  
		// }
		// $ur_table .= "</table>";


	/*
	* *************** Here is the queries showing everything about top 10 restaurants *******************
	*/
		
		

		while($ur_row = mysql_fetch_array($ur_result)){

			/******************************** part1 **********************************/
			$dist = sprintf('%0.2f', $ur_row['distance']);
			$ur_table .= "<div class=\"container\"><div class=\"part1\">";
			$ur_table .= "<h2 class=\"name\">".$ur_row['business_name']."</h2>";
			$ur_table .= "<div class=\"star\">".$ur_row['avg_star'];
			for ($i = 1; $i <= $ur_row['avg_star']; $i++) {
				$ur_table .= "<img class=\"star_icon\" src=\"img/star.png\"/>";
			}
			$ur_table .= "</div>";
			$ur_table .= "<div class=\"dist\">".$dist."km</div>";
			$ur_table .= "<div class=\"review_count\">".$ur_row['review_count']." reviews</div>";
			$ur_table .= "</div><div class=\"clear\"></div>";
			// end of part1


			/******************************** part2 **********************************/

			$ur_table .= "<div class=\"part2\">";
			$ur_table .= "<div class=\"address\"><img class=\"add_icon\" src=\"img/address.jpeg\"/>&nbsp&nbspAddress: ".$ur_row['full_address']."</div>";
			$ur_table .= "<div class=\"city\">".$ur_row['city'].",</div><div class=\"state\">".$ur_row['state']."</div>";
			$ur_table .= "<div class=\"clear\"></div>";

			//Query business_category table based on business id
			$ur_query_category = "SELECT business_id, categories
							      FROM business_category
								  WHERE business_id = '".$ur_row['business_id']."'";
			$ur_category_result = mysql_query($ur_query_category);
			if($ur_category_result === FALSE) { 
			    die(mysql_error()); 
			}
			$ur_category_row = mysql_fetch_array($ur_category_result); //only one row in this table

			$tags = str_replace("[", "", $ur_category_row['categories']);
			$tags = str_replace("]", "", $tags);
			$tags = str_replace("'", "", $tags);


			$ur_table .= "<div class=\"tags\"><span>Tags:&nbsp&nbsp</span> ".$tags."</div></div>";
			// end of part 2


			/******************************** part3 **********************************/

			$ur_table .= "<div class=\"part3\"><div class=\"opening\"><p class=\"opening_title\">Opening Hours: </p>";

			//Query business_hours table based on business id
			$ur_query_hour = "SELECT Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday
							      FROM business_hours
								  WHERE business_id = '".$ur_row['business_id']."'";
			$ur_hour_result = mysql_query($ur_query_hour);
			if($ur_hour_result === FALSE) { 
			    die(mysql_error()); 
			}
			$ur_hour_row = mysql_fetch_array($ur_hour_result); //only one row in this table

			$ur_table .= "<p>Monday ".$ur_hour_row['Monday'] ."</p><p>Tuesday ".$ur_hour_row['Tuesday'] ."</p><p>Wednesday ".$ur_hour_row['Wednesday'] ."</p><p>Thursday ".$ur_hour_row['Thursday'] ."</p><p>Friday ".$ur_hour_row['Friday'] ."</p><p>Saturday ".$ur_hour_row['Saturday'] ."</p><p>Sunday ".$ur_hour_row['Sunday'] ."</p></div></div>";

			// end of part 3

			/******************************** part4 **********************************/
			//Query business_attributes table based on business id
		 	$ur_query_attributes = "SELECT attribute_name, attribute_value
							      FROM business_attributes
								  WHERE business_id = '".$ur_row['business_id']."'";
			$ur_attributes_result = mysql_query($ur_query_attributes);
			if($ur_attributes_result === FALSE) { 
			    die(mysql_error()); 
			}

			$ur_table .= "<div class=\"part4\"><div class=\"highlights\">Highlights</div>";
			while($ur_attributes_row = mysql_fetch_array($ur_attributes_result)){ 
				$ur_table .= "<p> ".$ur_attributes_row['attribute_name'].": ".$ur_attributes_row['attribute_value']." </p>";

			}
			$ur_table .= "</div><div class=\"clear\"></div>";

			// end of part4

			/******************************** part5 **********************************/

			// Query review table based on business id
			$ur_query_review = "SELECT stars, text
							      FROM reviews
								  WHERE business_id = '".$ur_row['business_id']."'
								  LIMIT 5";  //limit to 5 reviews
			$ur_review_result = mysql_query($ur_query_review);
			if($ur_review_result === FALSE) { 
			    die(mysql_error()); 
			}
			$ur_table .= "<div class=\"part5\"><div class=\"reviews\">Reviews</div>";
			while($ur_row = mysql_fetch_array($ur_review_result)){ 
				$ur_table .= "<div class=\"review_block\"><p>Rating: ".$ur_row['stars']." </p>";
				$ur_table .= "<p>".$ur_row['text']." </p></div>";
			}
			$ur_table .= "</div>";

			// end of part 5

			$ur_table .= "</div>";
		}
		

		
		mysql_close(); 
		echo $ur_table;
	}

	function countryRanking() {
		//echo "<script type='text/javascript'>alert('called');</script>";

		sql_init();
		$cr_query = "SELECT university_name, score, T.area, T.country from university, (select distinct area, country from area_state, state_country where area_state.state = state_country.state and country = '".$_POST["country"]."') as T where university.area = T.area order by score desc";
		$cr_result = mysql_query($cr_query);
		$count = 0;
		$cr_table = "<table class=\"table table-striped\">";
		while($cr_row = mysql_fetch_array($cr_result)){
			$count++;
			$cr_table .= "<tr><td>" . $count . "</td><td>" . $cr_row['university_name'] . "</td><td>". $cr_row['area'] . "</td><td>". $cr_row['country'] . "</td></tr>";  //$row['index'] the index here is a field name
		}
		$cr_table .= "</table>";
		mysql_close(); //Make sure to close out the database connection
		echo $cr_table;
	} 
	function worldRanking(){
		sql_init();
		//get world ranking and form a table
		$wr_query = "SELECT university_name, score, T.area, T.country  from university, (select distinct area, country from area_state, state_country where area_state.state = state_country.state) as T where university.area = T.area order by score desc"; 
		$wr_result = mysql_query($wr_query);
		$count = 0;
		global $wr_table;
		$wr_table = "<table class=\"table table-striped\">";
		while($cr_row = mysql_fetch_array($wr_result)){   //Creates a loop to loop through results
			$count++;
			$wr_table .= "<tr><td>" . $count . "</td><td>" . $cr_row['university_name'] . "</td><td>". $cr_row['area'] . "</td><td>". $cr_row['country'] . "</td></tr>";  //$row['index'] the index here is a field name
		}
		$wr_table .= "</table>";
		mysql_close(); //Make sure to close out the database connection
	}
	
?>
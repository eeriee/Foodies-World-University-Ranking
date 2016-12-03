<html>
<head>
	<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/index.css"/>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>

	<?php
		include 'form.php';
		worldRanking();
	?>

</head>

<body>
	<ul class="tab">
		<li><a href="javascript:void(0)" id="homeLink" class="tablinks active" onclick="openTab(event, 'homeTab')">Home Page</a></li>
		<li><a href="javascript:void(0)" id="worldLink" class="tablinks" onclick="openTab(event, 'worldTab')">World Ranking</a></li>
		<li><a href="javascript:void(0)" id="countryLink" class="tablinks" onclick="openTab(event, 'countryTab')">Country Ranking</a></li>
		<li><a href="javascript:void(0)" id="uniLink" class="tablinks" onclick="openTab(event, 'uniTab')">Search for University</a></li>
	</ul>

	<div id="homeTab" class="tabcontent">
		<h1 id="welcome">Welcome to Foodies' University Ranking!</h1>
	</div>

	<div id="worldTab" class="tabcontent">
		<h1>World University Ranking</h1>
		<p class="comment">World university ranking based on restaurants</p>
		<div class="search_result">
			<?php echo $wr_table; ?>
		</div>
	</div>

	<div id="countryTab" class="tabcontent">

	  <h1>Country Ranking</h1>
	  <p class="comment">Universities ranking in a country based on restaurants</p> 
	  <form class="search" id="country_form">
	    <div class="input-group input-group-lg">
	      <span class="input-group-btn">
	        <button class="btn btn-default" type="submit">Go!</button>
	      </span>
	      <input type="text" class="form-control" name="country" placeholder="Search for countries">
	    </div><!-- /input-group -->
	  </form> 

	  <div class="result" id="country_result">
		  
	  </div>
  
	</div>

	<div id="uniTab" class="tabcontent">
	  <h1>Search for University</h1>
	  <p class="comment">Search for top 10 restaurants around universities</p>

      <form class="search" id="uni_form">
	    <div class="input-group input-group-lg">
	      <span class="input-group-btn">
	        <button class="btn btn-default" type="submit">Go!</button>
	      </span>
	      <input type="text" class="form-control" name="uni" placeholder="Search for Universities">
	    </div><!-- /input-group -->
	  </form> 

	  <div class="result" id="uni_result">
	  </div>

	</div>

    <footer class="footer">
        <p>Copyright &copy 2016 Foodies' World</p>
    </footer>

</body>
</html>
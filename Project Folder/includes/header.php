<html lang="en">
<head>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
        
    <!-- Bootstrap theme -->
    <!-- -->
	<link href="css/theme.css" rel="stylesheet" /> 
	<link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="css/own.css" rel= "stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Bungee+Inline|Merriweather" rel="stylesheet">

    <!-- Custom CSS -->
	<!-- 
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"> 
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700"> 
	<link rel="stylesheet" href="css/otherstyle.css"> 
	-->
    
    <title><?php echo $page_title; ?></title>	
    
       <?php date_default_timezone_set('America/Chicago'); ?>

        <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body role="document">

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

          </button>

          <a class="navbar-brand" href="#"><?php echo $user_name ?></a>
        </div>
        <div class="navbar-collapse collapse">
                <!-- Bootstrap theme col-md-3 search bar   type="submit"    -->
          <div class="col-sm-3  pull-left">
        
             
        <form class="navbar-form" role="search">
            <div class="input-group">
               <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                 <div class="input-group-btn">
                   <a href="#" onclick="getSearch()" type="" class="btn btn-default" ><i class="glyphicon glyphicon-search"></i></a>
                </div>
            </div>
        </form>
        </div>
        <!-- Bootstrap theme                  -->
         

          <ul class="nav navbar-nav">

             <li><a href="index.php">Home</a></li>

          
       
			<?php 
			
      if (!isset($_SESSION['user_id'])) {
				echo '<li><a href="register.php">Register</a></li> ';
				echo '<li><a href="login.php">Sign In</a></li>';
        echo '<li><a href="support.php">Support</a></li>';
        
			}
			else
			{
				$user = $_SESSION['user_id'];
        if ($is_admin) {
					//echo '<li><a href="view_users.php">View Users</a></li>';
         // echo '<li><a href="report.php">Reports</a></li>';
         // echo '<li><a href="addEditGame.php">Add Games</a></li>';
          //new stufff****************************

          echo '<li>'.
          '<a class="dropdown-toggle" data-toggle="dropdown">User Options'.
          '<span class="caret"></span></a>'.
          '<ul class="dropdown-menu">'.
            '<li class="dropdown-header">Select an option </li>'.
            "<li><a href=\"view_users.php?user_id=".$user."\">"."View Users"."</a></li>".
            '<li><a href="viewGames.php">View Games</a></li>'.
            '<li><a href="report.php">View Reports</a></li>'.
            "<li><a href=\"reviewWalkthroughList.php?rw=Walkthroughs&user_id=".$user."\">"."View Walkthroughs"."</a></li>".
            "<li><a href=\"reviewWalkthroughList.php?rw=Reviews&user_id=".$user."\">"."View Reviews"."</a></li>".
          '</ul>'.
          '</li>';
          //$li = $li . "<li><a href=\"viewWalkthrough.php?game_info=" . $row["walkthrough_name"] . "\">" . $row["first_name"]. " " . $row["walkthrough_name"]. " ". $row["walkthrough_type"] . "</a></li>";
          //"<a href=\"addWalkthrough.php?user_id=" .$user.  "\">"." add you own walkthrough". "</a>" 
				}else{
           echo '<li>'.
          '<a class="dropdown-toggle" data-toggle="dropdown">User Options'.
          '<span class="caret"></span></a>'.
          '<ul class="dropdown-menu">'.
            '<li class="dropdown-header">Select an option </li>'.
            "<li><a href=\"reviewWalkthroughList.php?rw=Walkthroughs&user_id=".$user."\">"."View Walkthroughs"."</a></li>".
            "<li><a href=\"reviewWalkthroughList.php?rw=Reviews&user_id=".$user."\">"."View Reviews"."</a></li>".
            '<li><a href="support.php">Support</a></li>'.
          '</ul>'.
          '</li>';

          
        }
				
				echo '<li><a href="password.php">Change Password</a></li>';
				echo '<li><a href="logout.php">Log Out</a></li>';
        

			}
        
        
        echo'<li>'.
          '<a class="dropdown-toggle" data-toggle="dropdown">Platforms'.
          '<span class="caret"></span></a>'.
          '<ul class="dropdown-menu">'.
            '<li class="dropdown-header">Select a platform </li>'.
            '<li><a href="platform.php?game_platform=XBOXONE">XBOXONE</a></li>'.
            '<li><a href="platform.php?game_platform=PS4">PS4</a></li>'.
            '<li><a href="platform.php?game_platform=SWITCH">SWITCH</a></li>'.
            '<li><a href="platform.php?game_platform=PC">PC</a></li>'.
          '</ul>'.
          '</li>'; 

			?>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
   
    <div class="container theme-showcase" role="main">
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
          <!-- Start of the page-specific content. -->
<!-- Script 8.1 - header.html -->
<script type="text/javascript">
function getSearch(){

  var $getJson;
  var game_platform = document.getElementById("srch-term").value;
  if(game_platform!=""){//if condition to make sure data is
    //alert(game_platform);
  var xhttp = new XMLHttpRequest();
  
  xhttp.onreadystatechange = function(){
    if(this.readyState==4 && this.status==200){
            $getJson = (this.responseText);
              $getJson.toString();
              $getJson=$getJson.toUpperCase();
              game_platform=game_platform.toUpperCase();
              //alert($getJson);
              //end = $getJson.length()-1;
              //combo = $getJson.substring(1,end);
              //alert(combo);
              
            if($getJson.includes(game_platform)){
              //alert("its in the database");
              
              
              location.href = 'searchResults.php?game_info='+ game_platform;

            }else{
              location.href = 'searchResults.php?game_info='+ "null";
            }
    }
  };
  var url="search2.php?search="+game_platform;
  //alert(url);
  xhttp.open("GET",url,true);
  

  xhttp.send();
  }
  

}
</script>

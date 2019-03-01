<?php
include ('connect.php');
session_start();
if(!(isset($_SESSION['username']) && $_SESSION['type']=="user")){
session_destroy();
header('location: index.php');
}

if(isset($_POST['quesub'])){
	$username=$_SESSION['username'];
	$que=$_POST['que'];
	$query="insert into question values('','$que','$username')";
	if($conn->query($query)){
		header('location: comforum.php');
	}else{
		echo "Error: ".$conn->error;
	}
}

if(isset($_POST['ansub'])){
	$qud=$_POST['qid'];
	$ans=$_POST['ans'];
	$username=$_SESSION['username'];
	$query3="insert into answer values('','$ans','$username', '$qud')";
	if($conn->query($query3)){
		header('location: comforum.php');
	}else{
		echo "Error: ".$conn->error;
	}
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  	<head>
  		<style type="text/css">
  			.sprite{
	
	height:50px;
	width:92px;
	
	background-image:url(images/sprite.png)
}
.sprite:hover{cursor:pointer;}

.navback a.activelink .home{
	background-position:697px 0px;
}

.home{
	background-position:700px 5px;
}

.home:hover{
	background-position:700px 50px;
}

.navback a.activelink .about{
	background-position:510px 148px;
}

.about{
	background-position:585px -1px;
}
.about:hover{
	background-position:596px 50px;
}

.navback a.activelink .event{
	background-position:423px 1px;
}
.event
{
	background-position:467px -1px;
}
.event:hover{
	background-position:460px 50px;
}


.navback a.activelink .contact{
background-position:332px 1px;
}
.contact{
	background-position:339px -4px;
}
.contact:hover{
	background-position:339px 46px;
}


.navback a.activelink .donate{
background-position:249px 1px;
}
.donate{
	background-position:207px 1px
}
.donate:hover{
	background-position:209px 50px;
}

.navback a.activelink .forum{
background-position:167px 2px;
}
.forum{
	background-position:92px 2px;
}
.forum:hover{
	background-position:92px 50px;
}
  		</style>
   	 	<meta charset="utf-8">
    	<title>PastimeSport</title>
    	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  	    <link rel="stylesheet" type="text/css" href="bootstrap/fontawesome/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="styl.css">
        <script src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
  	</head>
<body>

	
	<nav class="navbar navbar-expand-sm bg-info navbar-light fixed-top">
    <a class="navbar-brand" href="Index.php">
    <img src="images/logo.png" alt="Logo" style="width:40px;"> Pastime Sports</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="list-group navbar-nav mr-auto spacer1">
		<li class="list-group-item"><a href="user.php"><img src="images/spacer.png" width="1" height="1" class="sprite home"></a></li>
		<li class="list-group-item"><a href="aboutus.php"><img src="images/spacer.png" width="1" height="1" class="sprite about"></a></li>
		<li class="list-group-item"><a href="comforum.php"><img src="images/spacer.png" width="1" height="1" class="sprite event"></a></li>
		<li class="list-group-item"><a href="donation.php"><img src="images/spacer.png" width="1" height="1" class="sprite contact"></a></li>
		<li class="list-group-item"><a href="event.php"><img src="images/spacer.png" width="1" height="1" class="sprite donate"></a></li>
		<li class="list-group-item"><a href="sport.php"><img src="images/spacer.png" width="1" height="1" class="sprite forum"></a></li>
		
	</ul>
    </div> 

   
    <br>
    <a href="index.php">
    <button class="btn "> Logout 
    </button> 
    </a>
  </nav>
	</div>
	<h1 class="m text-center ">Forum</h1>
	<style type="text/css">
		.m
		{
			margin-top:100px;
		}
	</style>

<div class=" fwrapper">
			<div class="d-flex justify-content-center qb">
				<form method="post">
					<input class= type="text" name="que" placeholder="drop your question" required>
					<input  type="submit" name="quesub" value="ASK">
				</form>
			</div>
			<div class="d-flex justify-content-center q-a-d">
				<?php
				$str=0;
				$max=5;
				$query5="select * from question";
				$result5=$conn->query($query5);
				$tot= $result5->num_rows;
				$pages=ceil($tot/$max);
				if(isset($_GET['pg'])){
			    	$str=$max*($_GET['pg']-1);
				}
				$query2="select * from question LIMIT $str, $max";
				$result=$conn->query($query2);
				while($row=$result->fetch_assoc()){
					$quid=$row['id'];
					echo "<div class='mt-3 q-a'><div class='ques'>✮ [".$row['username']."] queried \"<i>".$row['question']."\"</i></div>
					<div class='ab'>
						<form method='post'>
						<input type='text' name='qid' value='$quid' hidden>
						<input type='text' name='ans' placeholder='answer this query' required><input type='submit' name='ansub' value='ASNWER'>
				</form></div>";
					$query4="select * from answer where qid='$quid'";
					$result4=$conn->query($query4);
					while($row4=$result4->fetch_assoc()){
						echo "<div class='d-inline ans'> ✓ ".$row4['answer']."</div>";
						
						echo "<div class='d-inline q-a'><div class=' ques'>✮ [".$row4['username']."] answered </div>";
					}
					echo "</div>";
				}

				for($i=1; $i<=$pages; $i++){
		 				   echo "<a href='forum.php?pg=$i'> $i </a>";
						}
				?>
			</div>
		</div>

</body>
</html>
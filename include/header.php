<!--Heading Navbar Start-->
<?php
  // Start Seession
  session_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <a href="index.php" class="navbar-brand text-monospace font-weight-bold"><img src="img/icon/icon.png" width="30" height="30"> BoiPoka</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <form class="form my-2 my-lg-0">
      <div class="container">
        <input class="form-control mr-sm-2" type="search" placeholder="Search Book" aria-label="Search" onkeyup="query(this.value)">
        <div class="position-absolute" style="top: 50px;" id="result"></div>
      </div>
    </form>
    
    <ul class="navbar-nav">
<?php
  if(!isset($_SESSION['username'])){
    print
    '
    <li class="nav-item">
      <a class="nav-link" href="login.php">Login</a>
    </li>
    ';
  }
  else{
    print
    '
    <li class="nav-item">
      <a class="nav-link" href="share.php">Share Book</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$_SESSION['username'].'</a>
      <div class="dropdown-menu" aria-labelledby="dropdown">
        <a class="dropdown-item" href="profile.php">Profile</a>
        <a class="dropdown-item" href="logout.php">Logout</a>
      </div>
    </div>
    ';
  }
?>
    </ul>
  </div>

</nav>

<script>
  function query(query){
    //document.getElementById("result").innerHTML=query;
    if(query.length == 0){
      document.getElementById("result").innerHTML="";
      return;
    }
    else{
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange=function(){
      if(this.readyState == 4 && this.status == 200){
        document.getElementById("result").innerHTML=this.responseText;
      }
    }
    xmlhttp.open("GET", "views/search.php?query="+query, true);
    xmlhttp.send();
    }
  }
</script>
<!--Heading Navbar End-->
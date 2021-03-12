
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <img class="navbar-brand" src="<?php echo $im .'ic.png'?>" width="50px" height="50px;" >
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item" active>
        <a class="nav-link" href="?action=main">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?action=take"> Appointment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?action=doctor profile">Doctor Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-bell fa-5px"></i></a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <?php echo  $_SESSION['name'];?>  
         <img class="rounde float-right"  src="../../Admin/Includes/templates/doctor/<?php echo $_SESSION['im'] ?>"  width="50px" height="50px;">
    
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="Home_user.php?action=edit&userid=<?php echo $_SESSION['ID']?> ">Edit Profile</a>
          <a class="dropdown-item" href="#">History</a>
          <a class="dropdown-item" href="logout.php">Log Out</a>
        </div> 
      </li>
    </ul>
  </div>
</nav>

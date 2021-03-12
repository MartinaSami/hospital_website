<?php
if ($_SERVER['REQUEST_METHOD']=='POST')
{
  echo $_POST['username'] . '<br>';
  echo $_POST['E-mail'] . '<br>';
  echo $_POST['cellphone'] . '<br>';
  echo $_POST['message'] . '<br>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SMS</title>
  <style>
 .form-group{
   padding: 10px;
   margin: 10px;
   font-weight: 800;
   border-color: black;
   border-radius: 5px;
    }
    .btn.btn-primary{
      padding: 5px;
      margin: 5px;
      
    }
    .checkbox{
      padding: 5px;
      margin: 5px;
    }
    .container{
			width: 500px;
			margin: 40px auto;
			border-radius: 10px;
			border: 5px solid rgba(28,74,90, 0.9);
			border-left: 40px solid rgba(28,74,90, 0.9);
			box-shadow:#0CBBB6;
		}
		.info{
			width: 100%;
			background-color: #0CBBB6;
			padding: 2px;
			text-shadow: 1px 1px 1px #0CBBB6;
			color: #fff;
			font-size: 20px;
		}
		.form-box{
			padding: 20px;
			background-color: #eee;
		}
		label{
			color: #0CBBB6;
			font-size: 18px;
		}
		.inp,.msg-box{
			width: 90%;
			padding: 10px;
			margin-top: 4px;
			margin-bottom: 5px;
			border-radius: 5px;
			border: 2px solid rgba(28,74,90, 0.9);
			font-weight: bold;
			color: rgba(28,74,90, 0.9);
			border-right: 15px solid rgba(28,74,90, 0.9);
			border-left: 15px solid rgba(28,74,90, 0.9);
			resize: none;
		}
		.msg-box{
			height: 80px;
		}
		.inp:focus,.msg-box:focus{
			outline: none;
			border: 2px solid navy;
			border-right: 15px solid navy;
			border-left: 15px solid navy;
		}
		.sub-btn{
			width: 100%;
			padding: 10px;
			border-radius: 5px;
			margin-top: 5px;
			border: none;
			background: linear-gradient(rgba(28,74,90, 0.9),#0CBBB6);
			cursor: pointer;
			color: #fff;
			font-size: 20px;
			text-shadow: 1px 1px 1px #444;
		}
		.sub-btn:hover{
			background: linear-gradient(rgba(28,74,90, 0.9),rgba(28,74,90, 0.9));
			opacity: 0.8;
			transition: all ease-out 0.2s;
		}
		.sub-btn:focus{
			outline: none;
		}
		@media(max-width: 720px){
			.container{
				width: 90%;
			}
		}
  </style>

 
         
                  <div class="text"><h1>write your message</h1></div>
  <div class="container"id="container">
		<div class="info">write message</div>
		<form action="mail_handler1.php" method="post" name="form" class="form-box">
			<label for="name">Name</label><br>
			<input type="text" name="name" class="inp" placeholder="Enter Name" required><br>
			<label for="email">Email ID</label><br>
			<input type="email" name="email" class="inp" placeholder="Enter Your Email" required><br>
			<label for="message">Message</label><br>
			<textarea name="msg" class="msg-box" placeholder="Enter Message Here..." required></textarea><br>
			<input type="submit" name="submit" value="Send" class="sub-btn">
		</form>
  </div>
  

  
</body>

</html>

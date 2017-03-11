<?php include("include/functions.php"); ?>
<?php include("header.php"); ?>

<center>
<div class="login-form" style="text-align:center">
<h3> Sign up</h3>
<form method="post">
 <label> Name :</label> <input type="text" name="user" ></br></br>
 <label>Email :</label> <input type="email" name="email" ></br></br>
 <label>Password :</label> <input type="text" name="password" ></br></br>
  <input type="submit" name="sign_up" value="sign up" >&nbsp;
  <button><a href="login.php">already a member</button>
  </form>
  </div>
</center>
<?php 
if(isset($_POST['sign_up']))
{	
	if (!empty($_POST['user'])&&!empty($_POST['email'])&&!empty($_POST['password'])) 
	{
    	try 
    	{
 			$pdo = new PDO('mysql:host=localhost;dbname=portfolio', 'root', 'root');
 			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		$name=($_POST['user']);
			$email=($_POST['email']);
			$password=($_POST['password']);
			$sql = "INSERT INTO `portfolio`.`users` (`u_id`, `name`, `email`, `password`) 
    		VALUES (NULL, '$name', '$email', '$password')";
			$test=$pdo->exec($sql);
			
		} 
    	catch (PDOException $e) 
    	{
        	echo $sql . "<br>" . $e->getMessage();
    	}
    	if ($a==true) 
    	{
    		$_SESSION['id']=$_POST['user'];
    		if (isset($_SESSION['id'])) 
    		{
    			redirect('index.php');
    		}
    		
    	}
	}
}	
include('footer.php');
 ?>
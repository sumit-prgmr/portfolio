<?php include('include/functions.php') ?>
 
<center>
<div class="login-form" style="text-align:center">
<p><?php if(isset($_GET['err'])) echo 'User/Password not correct'; ?></p>
<h3> login</h3>
<form method="post">
  <label>Username : </label>&nbsp;&nbsp;<input type="text" name="user" required="true"></br></br>
  <label>Password : </label>&nbsp;&nbsp;<input type="text" name="password" required="true"></br></br>
  <input type="submit" name="sign_in" value="sign in" >&nbsp;&nbsp;&nbsp;
  <button><a href="#">signup</a></button>
  </form>
  </div>
</center>
<?php

// function redirect($url)
// {
//     if (headers_sent())
//     {
//       die('<script type="text/javascript">window.location.href="' . $url . '";</script>');
//     }else
//     {
//       header('Location: '. $url);
//       die();
//     }
// }  
$a = false;
if(isset($_POST['sign_in']))
{ 
  try 
      {
        $pdo = new PDO('mysql:host=localhost;dbname=portfolio', 'root', 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $user = $_POST['user'];
        $password = $_POST['password'];
        $result = $pdo->prepare("SELECT name,password FROM users WHERE name= :user AND password= :pass");
        $result->bindParam(':user', $user);
        $result->bindParam(':pass', $password);
        $result->execute();
        $rows = $result->fetch(PDO::FETCH_NUM);
        if($rows > 0) 
        {
          $a=true; 
        } 
      }
  catch (PDOException $e) 
  {
    echo $result . "<br>" . $e->getMessage();
  }
  if ($a=true) 
      {
        session_start($user);
        redirect("main.php");

      } else {
        echo "user not found";
      }
}
?>
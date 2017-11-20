<?php
if(isset($_POST["submit"])){
if($_POST["p"]=="admin" && $_POST["u"]=="admin"){
    header("Location: ./bloqueResearchers.php");
exit(0);}
}
?>
<html>
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
 <link rel="stylesheet" type="text/css" href="../Style/admin.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>
<body>
  <div class="login">
	<h1>Login</h1>
    <!--  Login form to check if the user is an admin or not-->
    <form method="post" action="index.php">
    	<input type="text" name="u" placeholder="Username" required="required" />
        <input type="password" name="p" placeholder="Password" required="required" />
        <button type="submit" name="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
    </form>
</div>
</body>
</html>



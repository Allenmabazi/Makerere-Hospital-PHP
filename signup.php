<?php

?>

<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="mak.css">
    <title>Makerere Hospital</title>
</head>
<body>

<div class="mtn-pdd">
<form action="signup-dbh.php" method="post" class="log-form">
<h2>Makerere Hospital</h2>
<h2>User's Registration.</h2>
First Name <br>
<input type="text" name="fname"><br>
Last Name <br>
<input type="text" name="lname"><br>
User email <br>
<input type="text" name="admail"><br>
Password <br>
<input type="password" name="pwd"><br>
Repeat Password <br>
<input type="password" name="pwd-repeat"><br><br>

<input type="submit" name="signup-btn" value="SIGNUP" class="log-btn"><br><br>
<a href="index.php"><input type="button" value="CANCEL" class="log-btn2"></a>

<br>
</form>
</div>

</body>
</html>
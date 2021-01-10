<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="stylesheet" href="abt.css">
        <link rel="stylesheet" href="mak.css">
        <title>Makerere Hospital</title>
    </head>
<?php
include 'header.php';
?>
    <body>
        
    <div>
    <h2><i>THIS IS CONTACT PAGE</i></h2>
   

    <div>
<form  class=" mail-sent" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<h4>Contact Us With your Querry:</h4><br>
Name: <input type="text" name="name"><br><br>
E-mail: <input type="text" name="email"><br><br>
Resident: <input type="text" name="address" id="adr"><br><br>
Subject: <input type="text" name="subject"><br>
Contact messages: <br><br><textarea name="messages" rows="5" cols="35"></textarea><br><br>
<input type="submit" value="Submit" name="send-conta" class="button-sent"><br><br>
</form>
</div>

<?php


if (isset($_POST['send-conta'])) {

    $name =$_POST['name'];
    $mailFrom =$_POST['email'];
    $addres =$_POST['address'];
    $subject =$_POST['subject'];
    $message =$_POST['messages'];

    $mailTo = "mbabaziallen@gmail.com";
    $headers = "From: ".$mailFrom;
    $text ="You have received a contact email from: ". $name." of" .$addres ."\n\n". $message;
    mail( $mailTo, $subject, $text,$headers );
   
    header("Location: contac.php? mail=sent to ".$mailTo);
} 

?>
</div>
<br>


</div>


 
<?php
include 'footer.php';
?>
</body>
</html>
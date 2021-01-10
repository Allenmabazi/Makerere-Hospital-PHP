<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="stylesheet" href="mak.css">
        <link rel="stylesheet" href="abt.css">
        <title>Makerere Hospital</title>
    </head>
<?php
include 'header.php';
?>
<body>

<h2><i>THIS IS SERVICES PAGE</i></h2>    
<div class="semi-container">
  
<form  class="mail-sent" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<button name="get-btn" class="sale">CLAIM A SERVICE FORM</button>
<br><br>


<?php
if (isset($_POST['get-btn'])) {

  echo '  <div  class="mail-sent">
  <h4>Fill in The following Medical Detials:</h4>
  Full Name: <input type="text" name="name"><br><br>
  E-mail: <input type="text" name="email"><br><br>
  Telephone: <input type="text" name="tel"><br><br>
  Location: <input type="text" name="place"><br><br>
  Service: <select name="serv" id="">
          <option >Blood Test</option>
          <option >Medications</option>
          <option >Consultaiotn</option>
          <option >Others</option>
  </select><br><br>
  Paid plan: <input type="text" name="payment" placeholder="eg. cash or Banking"><br><br>
  Amount: <input type="text" name="price" placeholder="Amount charges"><br><br>
  Contact person: <input type="text" name="contP" placeholder="Anyone who can be reached quickly for you"><br><br>
  Telephone: <input type="text" name="tel2"><br><br>
  <input type="submit" name="sub-form" value="SUBMIT" class="button">
  <a href="service.php"><button>CLOSE FORM</button></a>
  <br><br>
  </div>
  </div>';
}

if (isset($_POST['sub-form'])) {
    require 'mak.php';

    $fullName = $_POST['name'];
    $mail = $_POST['email'];
    $Tell = $_POST['tel'];
    $Location = $_POST['place'];
    $serv = $_POST['serv'];

    $PayPlan = $_POST['payment'];
    $amount = $_POST['price'];
    $person = $_POST['contP'];
    $telephone = $_POST['tel2'];
    
    
    if (empty($fullName) || empty($mail ) ||empty($Tell) || empty($Location) || empty($serv) || empty($PayPlan) || empty($amount)|| empty($person) || empty($telephone)) {
        header("location: service.php ?? ERROR = Empty field!");
        
        exit();
    }elseif ($fullName == $Tell) {
      echo "Please Check your Name and try again ...!";
    }
    else{
        
        $sql = "SELECT fullname FROM clients WHERE fullname = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: service.php");
        echo " Please try connecting again.";
    }
    else{
        mysqli_stmt_bind_param($stmt, "s",$mail);
        mysqli_stmt_execute($stmt);
         mysqli_stmt_store_result($stmt);
         $resultCheck = mysqli_stmt_num_rows($stmt);
         if ($resultCheck > 0) {
         header("location: service.php ==?? user had already Been cleared!");
    
        }
    else{
        $sql = "INSERT INTO clients (fullname,email, contact, place, services, paid_plan, amount, cont_personel, telephone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
     $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
         header("location: service.php??= = Failled to connect... Please check your entry again..");
    
      }
    else{
        mysqli_stmt_bind_param($stmt, "sssssssss",$fullName, $mail, $Tell, $Location, $serv, $PayPlan, $amount, $person, $telephone);
        mysqli_stmt_execute($stmt);
        header("Location: service.php?=SUCCESS:: Details Succesfully Submitted...!!");
        exit();
          }
        }
      }
     
     mysqli_stmt_close($stmt);
     mysqli_close($conn);
    }
    }
 


?>   
</form>

<form  class="mail-sent" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<button name="get-btn2" class="sale2">VIEW SERVICE REQUESTS</button>
<br><br>

<?php
/*** retrieve data from clients table */


if (isset($_POST['get-btn2'])) {

  echo'
  <table class="allen">
<tr class="title-table"><td colspan="10" ><B>CLIENTS REQUEST / SERVICES</B></td></tr>
<tr>
<td class="tab">Clients-ID</td>
<td class="tab">Full Name</td>
<td class="tab">Email </td>
<td class="tab">Contact</td>
<td class="tab">Resident</td>
<td class="tab">Requested Service</td>
<td class="tab">payment Term </td>
<td class="tab">Amount</td>
<td class="tab">Contact Person </td>
<td class="tab">Tel/Contact</td>
</tr>
  ';

  require "mak.php";
if (!$conn) {
die("connection to database failed!");
}
$sql = "SELECT c_id, fullname,email, contact, place, services, paid_plan, amount, cont_personel, telephone FROM clients";
$results = $conn->query($sql);

if ($results->num_rows > 0) {
    while ($row = $results-> fetch_assoc()) {
       echo" 
       <tr>
       <td>" .$row['c_id'] ."</td>
       <td>" .$row['fullname'] ."</td>
       <td>" .$row['email'] ."</td>
       <td>" .$row['contact'] ."</td>
       <td>" .$row['place'] ."</td>
       <td>" .$row['services'] ."</td>
       <td>" .$row['paid_plan'] ."</td>
       <td>" .$row['amount'] ."</td>
       <td>" .$row['cont_personel'] ."</td>
       <td>" .$row['telephone'] ."</td>
       </tr>";
      
    }
    echo"</table>";
     echo" <a href='service.php'><button>HIDE TABLE</button></a>";
}
else{
    echo"No Results form table!.";
}
}

?>
</table>

</form>  

<!--THESE CODES SEND MAIL TO SERVICE AGENT -->
<form  class="mail-sent" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<button name="get-btn3" class="sale3">CONTACT SERVICE AGENT</button>
<br><br>


<?php

if (isset($_POST['get-btn3'])) {

    echo'
    <div>
<form  class=" allenah" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>
<h4>Contact Service Agent for Emergency:</h4><br>
Your E-mail: <br><input type="text" name="email"><br><br>
Subject: <br><input type="text" name="subject"><br>
Contact messages: <br><br><textarea name="messages" rows="5" cols="35"></textarea><br><br>
<input type="submit" value="Submit" name="send-conta" class="button-sent"><br><br>
<a href="service.php"><button>Cancel</button></a>
</form>
</div>
    ';
}

if (isset($_POST['send-conta'])) {

    $mailFrom =$_POST['email'];
    $subject =$_POST['subject'];
    $message =$_POST['messages'];

    $mailTo = "hospital.agent@gmail.com";
    $headers = "From: ".$mailFrom;
    $text ="You have received an emergency contact email from: ". $mail."\n\n". $message;
    mail( $mailTo, $subject, $text,$headers );
   
    header("Location: service.php? mail=Successfully sent".$mailTo);
} 



?>
<br>
</form> 



</div>

<?php
include 'footer.php';
?>
</body>
</html>
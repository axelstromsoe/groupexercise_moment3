<?php

use function PHPSTORM_META\type;

 include "inc/header.php";?>
<?php include "inc/mainNav.php";?>
  <h1>Anmäl ditt intresse att delta i föreläsning</h1>

 <form action="index.php" method="POST">
  <label for="email">Lägg till emailadress:</label>
  <input type="email" name="email" id="email" autocomplete="off">
  <br>
  <button type="submit"  class="button">Anmäl dig!</button>
 </form>
<br>
 <hr>
 <?php
$signup = new Signup();

if(isset($_POST['email'])){
  $signup->setEmail($_POST['email']);
} 

 ?>
  
<?php include "inc/footer.php";?>
<?php

use function PHPSTORM_META\type;

 include "inc/header.php";?>
<?php include "inc/mainNav.php";?>
  <h1>Att-göra-lista</h1>

 <form action="index.php" method="POST">
  <label for="inputTodo">Lägg till att göra:</label>
  <input type="text" name="todo" id="inputTodo" autocomplete="off">
  <br>
  <br>
  <label for="name">Ange <strong>prioritet</strong> för att göra:</label>
  <select name="name" id="name">
  <option value="p1"><?='Prio 1'?></option>
  <option value="p2"><?='Prio 2'?></option>
  <option value="p3"><?='Prio 3'?></option>
  </select>
  <br>
  <button type="submit"  class="button">Lägg till <i class="fa-solid fa-plus"></i></button>
 </form>
<br>
 <hr>
 <?php
$post = new Post();

if(isset($_POST['todo'])){
  $post->setPost($_POST['todo']);
} 



if (isset($_POST['btn-deleteAll'])){
  $post->deleteAll();
}
if (isset($_GET['delete'])){
  $post->deletePost();
}
$post->getPost();
 ?>

  <a href="todolist.json" target="_blank">Jsonfil</a>
  <hr>
  <form method="post">
    <button type="submit" name="btn-deleteAll" class="button">Ta bort alla poster</button>
  </form>
<?php include "inc/footer.php";?>
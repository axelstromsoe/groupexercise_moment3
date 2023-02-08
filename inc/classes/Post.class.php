<?php



class Post
{

  //Properties

private $message;
private $readTodolist;
private $existsTodolist;
private $postsArray;
private $JsonData;

  //Methods
public function __construct()
{
  $this->readTodolist = file_get_contents('todolist.json');
  $this->existsTodolist = file_exists('todolist.json');
  $this->postsArray = json_decode($this->readTodolist, true);
  
}
  // Funktion för att skriva till Jsonfil
  public function setPost($message) :bool
  {
    // Skapar en variabel som håller olika prioritet på posten mha värder på input option
    $prio = "";
    if ($_POST['name'] == 'p1'){
      $prio = 'Prio 1';
    } else if ($_POST['name'] == 'p2'){
      $prio = 'Prio 2';
    } else {
      $prio = 'Prio 3';
    }
    // Skapar meddelaned som skall sparas i fil och skrivas ut till skärmen
    $message = "<div class='" . $_POST['name'] . "'" . ">" . "<p>" . "Vad skall göras: " .  $_POST['todo'] . "<br>" . "Prioritet: " . $prio . "<br>" .  " Skapad: " . date('Y-M-d H:i:s') . "</p>" ;
    // sparar till privat variabel
    $this->message = $message;
    //Gör kontroll om POST-strägen är längre än 5 tecken
    if (strlen($_POST['todo']) > 5) {

      // Kontroll om todlist existerar och inte är null
      if ($this->existsTodolist && $this->readTodolist != NULL) {

        // Öppnar JSONfilen
        $this->readTodolist;
        // Decodar den öppnade JSONfilen
        $this->postsArray;
        //Pushar in nytt meddelande till array
        array_push($this->postsArray, $this->message);
        // Encodar till JSONobject
        $this->JsonData = json_encode($this->postsArray);
        //Skriver till JSONfil
        file_put_contents('todolist.json', $this->JsonData);
      

return true;
        // Om filen inte exiserar eller är Null, skapar en array och stoppar meddelande i array, encodar och skriver till jsonfil
      } else {
        $tempArr = array();
        array_push($tempArr, $this->message);
        $this->JsonData = json_encode($tempArr);
        file_put_contents('todolist.json', $this->JsonData);
      
        return true;
      }
    } else {
      // Skriver ut felmeddelande om mindre än 5 tecken
      echo "<p style='color: red;'> Måste vara minst 5 tecken långt</p>";
      //Kör funktionen för att skriva ut de poster som möjligtvis finns lagrade
   
      return false;
    }
  }

  public function getPost()
  {

    // Kontrollerar om Jsonfilen existerar och inte är null

    if ($this->existsTodolist && $this->readTodolist != NULL) {

      // Hämtar Jsonfil, decodar och sparar i array
      $this->readTodolist;
      $this->postsArray;
      // Loopar igenom arrayen och skapar poster med key och value från array
      if ($this->postsArray != "") {
        foreach ($this->postsArray as $index => $posts) {

          echo  $posts . "<a href='index.php?delete=$index' class='btn'>Ta bort post</a></div><hr>";
        }
      }
    }
  }
  
  // Funktion för att ta bort enskild post
  public function deletePost() : bool
  {

    //Hämta in anropet från GET delete
    $deletePosts = $_GET['delete'];


    // Läs in Jsonfilen som håller alla meddelanden
    $this->readTodolist; 
    $this->postsArray; 
    //Ta bort det meddelande som håller arrayindex som är samma som skickas med GET
    unset($this->postsArray[$deletePosts]);
    //Indexera om arrayen
    $this->postsArray = array_values($this->postsArray);
    // Konvertera array och skriv till fil
    $newFile = json_encode($this->postsArray);
    file_put_contents('todolist.json', $newFile);
    //Skickar tillbaka användaren till startsidan
    header('location: index.php');
    
   
    return true;
  }
  

  //Funktion som tar bort alla poster
  public function deleteAll() : bool
  {
    //Hämtar in JSONfilen och konverterar till array
    if ($this->existsTodolist){
      $this->readTodolist; 
      $this->postsArray;
      // Sätter arrayen till en tom array och sparar in den i JSONfilen igen
      $this->postsArray = array();
      $newFile = json_encode($this->postsArray);
      file_put_contents('todolist.json', $newFile);
      return true;
  }
  return false;
  }
}

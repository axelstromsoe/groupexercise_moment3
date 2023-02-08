<?php

class Signup
{

    /* ------ Egenskaper ------ */
    private $email;
    private $email_list;

    /* ------ Metoder ------ */

    // Konstruerare
    public function __construct(string $email)
    {

        $this->email = $email;

        // Kontroll ifall human.json finns
        if (file_exists("email.json")) {

            // Läsa in och konvererar JSON-filen
            $jsonFile = file_get_contents("email.json");
            $email_list = json_decode($jsonFile, true);

            // Sparar till email_list
            $this->email_list = $email_list;
        } else {
            
            file_put_contents("email.json", "[]");
            $this->email_list = [];
        }
    }

    // set-metod
    public function setEmail(string $email): bool
    {

        if (strlen($email) > 0) {

            $this->email = $email;
            return true;
        } else {

            return false;
        }
    }

    // Sparar e-post
    public function saveEmail(): bool
    {

        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {

            array_push($this->email_list, $this->email);

            // Konvertera array till JSON-format
            $jsonData = json_encode($this->email_list, JSON_PRETTY_PRINT);

            // Skriv till JSON-fil
            file_put_contents("email.json", $jsonData);

            return true;
        } else {

            return false;
        }
    }

    // get-metoder
    public function getList(): array
    {

        return $this->email_list;
    }
}

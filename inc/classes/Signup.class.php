<?php

class Signup
{

    /* ------ Egenskaper ------ */
    private $email;
    private $email_list;

    /* ------ Metoder ------ */

    // Konstruerare
    public function __constructor(string $email)
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
    public function saveEmail(): bool{

        return true;
    }

    // get-metoder
    public function getList(): array
    {

        return $this->email_list;
    }
}

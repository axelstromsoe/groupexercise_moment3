<?php

class Signup {

    /* ------ Egenskaper ------ */
    private $email;
    private $email_list;
    
    /* ------ Metoder ------ */

    // Konstruerare
    public function __constructor(string $email) {

        $this->email = $email;
    }

    // set-metod
    public function setEmail(string $email) : bool {

        if (strlen($email) > 0) {

            $this->email = $email;
            return true;
        } else {

            return false;
        }
    }

    // Sparar e-post
    public function saveEmail() : bool {
        return true;
    }

    // get-metoder
    public function getList() : array {

        return $this->email_list;
    }
}

?>
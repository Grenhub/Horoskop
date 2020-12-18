<?php

try {

    require("./addHoroscope.php");
    session_start();
    
    if (isset($_SERVER["REQUEST_METHOD"])) {

        if ($_SERVER["REQUEST_METHOD"] === "GET") {

            if (isset($_SESSION["horoscope"]))  {

                echo json_encode(true);
                exit;
                 
            } if (!isset($_SESSION["horoscope"])) {
                
                echo json_encode(false);  
                exit;              
            } 

        } 
    }
    
} catch(Exception $error) {
    echo json_encode(
        array(
            "Message" => $error -> getMessage(),
            "Success" => false 
            )
    );
    exit;
}

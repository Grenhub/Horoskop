<?php

try {
    require("./calculateHoroscope.php");
    session_start();
    if (isset($_SERVER["REQUEST_METHOD"])) {

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            if (isset($_POST["dayOfBirth"]) && (!isset($_SESSION["horoscope"]))) {
                $_SESSION["horoscope"] = (serialize($_POST["dayOfBirth"]));
                $inputDate = (unserialize($_SESSION["horoscope"]));
                $horoscope = calculateHoroscope($inputDate);
                echo json_encode($horoscope);
                exit;
            } else {
                echo json_encode(false);
                exit;
            }
        }
    }
} catch (Exception $error) {
    echo json_encode(
        array(
            "Message" => $error->getMessage(),
            "Success" => false
        )
    );
    exit;
}

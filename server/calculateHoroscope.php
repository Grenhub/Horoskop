<?php 

function calculateHoroscope($inputDate) {
   
   $date = $inputDate;
   $day = $date[8] . $date[9];
   $month = $date[5] . $date[6];
   
   $day = intval($day);
   $month = intval($month);
    
    switch ($month) {
        case 1:
            if ($day < 21) {
            return "Stenbock";
            } 
            return "Vattuman";
        case 2:
            if ($day < 19) {
                return "Vattuman";
            }
            return "Fisk";
        case 3:
            if ($day < 20) {
                return "Fisk";
            }
            return "Vädur";
        case 4:
            if ($day < 22) {
                return "Vädur";
            }
            return "Oxe";
        case 5:
            if ($day < 22) {
                return "Oxe";
            }
            return "Tvilling";
        case 6:
            if ($day < 23) {
                return "Tvilling";
            }
            return "Kräfta";
        case 7:
            if ($day < 23) {
                return "Kräfta";
            }
            return "Lejon";
        case 8:
            if ($day < 24) {
                return "Lejon";
            }
            return "Jungfru";
        case 9:
            if ($day < 25) {
                return "Jungfru";
            }
            return "Våg";
        case 10:
            if ($day < 24) {
                return "Våg";
            }
            return "Skorpion";
        case 11:
            if ($day < 25) {
                return "Skorpion";
            }
            return "Skytt";
        case 12:
            if ($day < 24) {
                return "Stenbock";
            }
            return "Vattuman";
        };
    
};
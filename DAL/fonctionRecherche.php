<?php
include_once 'views/connection.php';


function SelectItemWhere($values) {
    

    
   $txt = "";
   foreach ($values as $key => $value) {
        $txt .= "'" . $value . "',";
   }
   $WhereIn = substr($txt, 0, -1);

   return $stmt = $_SESSION['connection']->query("SELECT * from Items where typee in (" . $WhereIn . ")");
}
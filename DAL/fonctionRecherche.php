<?php
$whereIn = "";
$result = "";

if(isset($_GET['selectedValue'])){
    $selectedValue = $_GET['selectedValue'];
    $result = SelectItemWhere($selectedValue);
}
else{

}




function SelectItemWhere($values) {

    $host = 'localhost';
    $db = 'dbchevalersk18';
    $user = 'root';
    $password = '';
    $charset = 'utf8';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
   try {
       $conn = new PDO($dsn, $user, $password, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
   } catch (\Throwable $th) {
       throw new PDOException($th->getMessage());
   }
   $txt = "";
   foreach ($values as $key => $value) {
        $txt .= $value . ",";
   }
   $WhereIn = substr($txt, 0, -1);

   return $stmt = $conn->query('SELECT * from Items where typee in (' . $WhereIn . ')');
}
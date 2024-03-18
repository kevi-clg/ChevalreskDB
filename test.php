<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $host = 'localhost';
    $db = 'dbchevalersk18';
    $user = 'root';
    $password = '';
    $charset = 'utf8';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try {
        $conn = new PDO($dsn,$user,$password,[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
        echo "connexion établie <br>";
    } catch (\Throwable $th) {
        throw new PDOException($th->getMessage()) ;
    }

    $stmt = $conn->query('SELECT * from joueurs');

    while($row = $stmt->fetch()){
        echo $row['idJoueur'] . " " . $row['prénom'] . " " . $row['nom'] .  "<br>";
    }

//     echo"<br><br>Joueur avec le numéro 65<br>";
//     $var = 65;
//     $sql= 'SELECT * from joueurs where numero = :param1';
//     $stmt = $conn->prepare($sql);
//     $stmt->execute(['param1' => $var]);

//    foreach($stmt as $row){
//         echo  $row['prenom'] . " " . $row['nom']  . "<br>";
//     }

//     $sql = 'CALL AjouterJoueur(:param1,:param2,:param3)';
//     $stmt = $conn->prepare($sql);
//     $stmt->bindValue(':param1','Sion', PDO::PARAM_STR);
//     $stmt->bindValue(':param2','Éric', PDO::PARAM_STR);
//     $stmt->bindValue(':param3',27, PDO::PARAM_INT);
//     $stmt->execute();
    
//     $stmt = $conn->query('SELECT * from joueurs');

//     while($row = $stmt->fetch()){
//         echo $row['idJoueur'] . " " . $row['prenom'] . " " . $row['nom'] . " #" . $row['numero'] . "<br>";
//     }

    
    ?>
</body>
</html>
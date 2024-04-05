<?php
include_once 'sessionManager.php';

$data = json_decode(file_get_contents("php://input"), true);

$_SESSION['filtres'] = $data['filtres']; 

http_response_code(200);

redirect('itemsList.php');

<?php 
//database configuration
    $dbHost = 'localhost';
    $dbUsername = 'smit';
    $dbPassword = 'smit1234';
    $dbName = 'smit';
    
    //connect with the database
    $db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
    
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = $db->query("SELECT * FROM vendedor WHERE nombre LIKE '%".$searchTerm."%' ORDER BY nombre ASC");
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['nombre']." ".$row['apellido'];
		/*data = ['value' => "'".$row['nombre']." ".$row['apellido']"'",'des' =>"'".$row['codigo']."'"];*/
    }
    
    //return json data
    echo json_encode($data);


?>
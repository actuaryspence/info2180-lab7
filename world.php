<?php
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'world';
$all = $_GET['all'];
$country = $_GET['country'];
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
function answer($querys, $conn) {
    $results =  $conn->query($querys)->fetchAll(PDO::FETCH_ASSOC);
    
    header("Content-Type: text/html; charset=utf-8");
    echo '<ul>';
    foreach ($results as $row) {
      echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
    }
    echo '</ul>';
}
if ($all == "true") {
    answer("SELECT * FROM countries", $conn);
} else if(isset($country)==true) {
    answer("SELECT * FROM countries WHERE name LIKE '%$country%'", $conn);
}
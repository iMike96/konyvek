<?php

function connectDb() {    
    $server = 'localhost';
    $username = 'root';
    $password ='';
    $dbname = 'konyvek';

$dbconn = mysqli_connect($server,$username,$password,$dbname);


if(!$dbconn) {
    echo 'A csatlakozás nem sikerült';
    exit();
}

return $dbconn;

}

function addNewBook($connectDb) {

$connect = connectDb();

$query = 'INSERT INTO konyv (cim,iro,leiras) VALUES ("'.$_POST['cim'].'","'.$_POST['iro'].'","'.$_POST['leiras'].'")';

$insertSql = mysqli_query($connect,$query);


}

function listAllBooks($dbconn) {

$query = 'SELECT * FROM konyv;';


$summary = mysqli_query($dbconn,$query);

return $summary;

}


function editDescrtiption($dbconn){
$leiras = '';

$leiras = $_POST['leiras'];

$query = 'UPDATE konyv SET leiras = $leiras WHERE id = $id';



}


$connect = connectDb();

if (isset($_POST['cim']) && isset($_POST['iro']) && isset($_POST['leiras'])) {
    $title = $_POST['cim'];
    $writer = $_POST['iro'];
    $description = $_POST['leiras'];

addNewBook($connect);
}

$osszeskonyv = listAllBooks($connect);

while ($konyvek_row = mysqli_fetch_assoc($osszeskonyv)) {
    echo '<br><b>Könyv címe:</b> ' . $konyvek_row['cim'] . ' <br><b>Könyv írója:</b> ' . $konyvek_row['iro'] . ' <br><b>Leírás:</b> ' . $konyvek_row['leiras'] . '<br><br>';
}

?>

<html>
<form method="post">
<span>Könyv címe: </span><input type="text" name="cim"></input><br>
<span>Könyv írója: </span><input type="text"  name="iro"></input><br>
<span>Könyv leírása: </span><textarea name="leiras"></textarea><br>
    <input type="submit"></input>
</form>






</html>
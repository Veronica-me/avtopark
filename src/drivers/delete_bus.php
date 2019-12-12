<?php
require_once '../../load.php';

$busRepository = new \App\repositories\BusRepository();

if (isset($_GET['bus_id'])) {
    $id = $_GET['bus_id'];
    $bus = $busRepository->get($id);

}

if (!empty($bus)) {
    echo '<form name="delete" method="post" action="delete_bus.php">
    <input type="hidden" name="bus_id" value="'.$bus['bus_id'].'">
    Вы хотите удалить автобус: '.$bus['model'].'   
    <input type="hidden" name="bus_id" value="'.$bus['bus_id'].'" ><br>
    <input type="submit" value="delete">
    <form>';
} else {
    echo 'user is not exist<a href="show_buses.php">back</a>';
}

if (isset($_POST['bus_id'])) {
    $id = $_POST['bus_id'];
    $busRepository->deleteBus($id);
    header("Location: /src/drivers/show_buses.php");
}
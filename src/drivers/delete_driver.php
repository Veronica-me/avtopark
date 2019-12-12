<?php
require_once '../../load.php';

$driverRepository = new \App\repositories\DriversRepository();

if (isset($_GET['driver_id'])) {
    $id = $_GET['driver_id'];
    $driver = $driverRepository->get($id);

}

if (!empty($driver)) {
    echo '<form name="delete" method="post" action="delete_driver.php">
    <input type="hidden" name="driver_id" value="'.$driver['driver_id'].'">
    Вы хотите удалить водителя: '.$driver['name'].'   
    <input type="hidden" name="driver_id" value="'.$driver['driver_id'].'" ><br>
    <input type="submit" value="delete">
    <form>';
    echo '<br><a href="show_drivers.php">  back</a>';
} else {
    echo 'user is not exist<a href="show_drivers.php">  back</a>';
}

if (isset($_POST['driver_id'])) {
    $id = $_POST['driver_id'];
    $driverRepository->deleteDriver($id);
    header("Location: /src/drivers/show_drivers.php");
}
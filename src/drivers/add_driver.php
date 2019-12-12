<?php
require_once '../../load.php';

$driverRepository = new \App\repositories\DriversRepository();

if (isset($_POST['name']) && isset($_POST['birthday'])
    && isset($_POST['drive_skill']) && isset($_POST['drive_license']) && isset($_POST['tax'])) {
   /* $driver['driver_id'] = $_POST['driver_id']; */
    $driver['name'] = $_POST['name'];
    $driver['birthday'] = $_POST['birthday'];
    $driver['drive_skill'] = $_POST['drive_skill'];
    $driver['drive_license'] = $_POST['drive_license'];
    $driver['tax'] = $_POST['tax'];

    $driverRepository->create($driver);

    header("Location: /src/drivers/show_drivers.php");
}

echo '<form name="create" method="post" action="add_driver.php">
      
    <input type="text" name="name" value="" placeholder="ФИО"><br>
    <input type="date" name="birthday" value="" placeholder="дата рождения"><br>
    <input type="text" name="drive_skill" value="" placeholder="стаж"><br>
     <input type="text" name="drive_license" value="" placeholder="права"><br>
      <input type="text" name="tax" value="" placeholder="$$/час"><br>
    <input type="submit" value="save">
    <form>';
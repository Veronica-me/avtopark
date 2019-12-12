<?php
require_once '../../load.php';

$busRepository = new \App\repositories\BusRepository();

if (isset($_POST['model']) && isset($_POST['spaciousness'])&& isset($_POST['bus_number']) && isset($_POST['consumption']) && isset($_POST['bus_tax'])) {

    $buses['model'] = $_POST['model'];
    $buses['spaciousness'] = $_POST['spaciousness'];
    $buses['bus_number'] = $_POST['bus_number'];
    $buses['consumption'] = $_POST['consumption'];
    $buses['bus_tax'] = $_POST['bus_tax'];


    $busRepository->create($buses);

    header("Location: /src/drivers/show_buses.php");
    }

echo '<form name="create" method="post" action="add_bus.php">
    
    
    <input type="text" name="model" value="" placeholder="модель"><br>
    <input type="text" name="spaciousness" value="" placeholder="вместительность"><br>
    <input type="text" name="bus_number" value="" placeholder="р/номер(только цифры)"><br>
     <input type="text" name="consumption" value="" placeholder="расход"><br>
      <input type="text" name="bus_tax" value="" placeholder="$$/час"><br>
    <input type="submit" value="save">
    <form>';

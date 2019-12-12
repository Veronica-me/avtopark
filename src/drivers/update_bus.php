<?php
require_once '../../load.php';

$busRepository = new \App\repositories\BusRepository();

if (isset($_GET['bus_id'])) {
    $id = $_GET['bus_id'];

    $bus = $busRepository->get($id);

    echo '<form name="update" method="post" action="update_bus.php">
         <input type="hidden" name="bus_id" value="'.$bus['bus_id'].'" ><br>
    <input type="text" name="model" value="'.$bus['model'].'" placeholder="модель"><br>
    <input type="text" name="spaciousness" value="'.$bus['spaciousness'].'" placeholder="вместительность"><br>
    <input type="text" name="bus_number" value="'.$bus['bus_number'].'" placeholder="р/номер(только цифры)"><br>
     <input type="text" name="consumption" value="'.$bus['consumption'].'" placeholder="расход"><br>
      <input type="text" name="bus_tax" value="'.$bus['bus_tax'].'" placeholder="$$/час"><br>
    <input type="submit" value="update">
    <form>';

}



if (isset($_POST['bus_id']))
{

    $id = $_POST['bus_id'];

    $busChange = $_POST;

    $busRepository->update($busChange);

    header("Location: /src/drivers/show_buses.php");
    }



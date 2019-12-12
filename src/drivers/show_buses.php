<?php
require_once '../../load.php';

$bTable = new \App\repositories\BusRepository();
$buses = $bTable->getBusData();

echo '<h2>Авобусы</h2>';
echo '<table>';
echo '<tr>';
echo '<th>ID</th>';
echo '<th>  модель  </th>';
echo '<th>  вместительность  </th>';
echo '<th>  р/номер  </th>';
echo '<th>  расход   </th>';

echo '<th>  $$/час</th>';
echo '<th>Действие</th>';
echo '<th>Выбрать автобус</th>';
echo '</tr>';

foreach ($buses as $bus){
    echo '<tr>';
    echo '<td>' .$bus['bus_id'].'</td>';
    echo '<td>' .$bus['model'].'</td>';
    echo '<td>' .$bus['spaciousness'].'</td>';
    echo '<td>' .$bus['bus_number'].'</td>';
    echo '<td>' .$bus['consumption'].'</td>';
    echo '<td>' .$bus['bus_tax'].'</td>';
    echo '<td><a href="update_bus.php?bus_id=' .$bus['bus_id'].'">update </a><a href="delete_bus.php?bus_id=' .$bus['bus_id'].'"> delete </a></td>';
    echo '<td><a href="bus_route_list.php?bus_id=' .$bus['bus_id'].'">выбрать </a></td>';
    echo '</tr>';

}

echo '</table>';

echo '<a href="add_bus.php">Добавить автобус</a><br>';

echo '<a href="show_drivers.php">Водители</a>';
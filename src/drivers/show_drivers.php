<?php
require_once '../../load.php';

$dTable = new \App\repositories\DriversRepository();
$drivers = $dTable->getDriversData();
echo '<h2>Водители</h2>';

echo '<table>';
echo '<tr>';
echo '<th>ID</th>';
echo '<th>ФИО</th>';
echo '<th>дата рождения</th>';
echo '<th>стаж</th>';
echo '<th>удостоверение</th>';

echo '<th>$$/час</th>';
echo '<th>Действие</th>';
echo '<th>Выбрать водителя</th>';
echo '</tr>';

foreach ($drivers as $driver){
    echo '<tr>';
    echo '<td>' .$driver['driver_id'].'</td>';
    echo '<td>' .$driver['name'].'</td>';
    echo '<td>' .$driver['birthday'].'</td>';
    echo '<td>' .$driver['drive_skill'].'</td>';
    echo '<td>' .$driver['drive_license'].'</td>';
    echo '<td>' .$driver['tax'].'</td>';
    echo '<td><a href="update_driver.php?bus_id=' .$driver['driver_id'].'">update </a>
<a href="delete_driver.php?driver_id=' .$driver['driver_id'].'"> delete </a></td>';
    echo '<td><a href="bus_route_list.php?bus_id=' .$driver['driver_id'].'">выбрать </a></td>';


    echo '</tr>';

}

echo '</table>';
echo '<a href="add_driver.php">Новый водитель</a><br>';
echo '<a href="show_buses.php">Автобусы</a>';
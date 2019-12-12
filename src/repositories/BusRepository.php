<?php
namespace App\repositories;
use \App\database\Connection;

class BusRepository
{
    /**
     * @var \PDO
     */
    private $pdo;

    public function __construct()
    {
        $this->pdo = Connection::createConnect();
    }

    public function get (int $id)
    {
        $stmt = $this->pdo->prepare('select * from bus where bus_id = :bus_id');
        $stmt->bindValue('bus_id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }



    public function getBusData()
    {
        $stmt = $this->pdo->query('select * from bus');
        return $stmt->fetchAll();
    }

    public function create (array $buses)
    {
        $stmt = $this->pdo->prepare('insert into bus (bus_id, model, spaciousness, bus_number, consumption, bus_tax) values (?, ?, ?, ?, ?, ?)');
        $stmt->execute([
            $buses['bus_id'],
            $buses['model'],
            $buses['spaciousness'],
            $buses['bus_number'],
            $buses['consumption'],
            $buses['bus_tax']
        ]);

    }

    public function update (array $busChange)
    {
        $id = $busChange['bus_id'];

        $stmt= $this->pdo->prepare('update bus set 
            `model` = :model;
            spaciousness = :spaciousness;
            bus_number = :bus_number;
            consumption = :consumption;
            bus_tax = :bus_tax;
            where bus_id = :id');




        $busModel = $busChange ['model'];
        $busSpaciousness = $busChange ['spaciousness'];
        $busNumber = $busChange['bus_number'];
        $busConsumption = $busChange['consumption'];
        $busTax = $busChange['bus_tax'];



        $stmt->bindValue('model', $busModel, \pdo::PARAM_STR);
        $stmt->bindValue('spaciousness', $busSpaciousness, \pdo::PARAM_INT);
        $stmt->bindValue('bus_number', $busNumber, \pdo::PARAM_INT);
        $stmt->bindValue('consumption', $busConsumption, \pdo::PARAM_INT);
        $stmt->bindValue('bus_tax', $busTax, \pdo::PARAM_INT);
        $stmt->bindValue('id', $id, \pdo::PARAM_INT);
        $stmt->execute();

    }

    public function deleteBus(int $id)
    {
        $stmt = $this->pdo->prepare('delete from bus where bus_id = :id');
        $stmt->bindValue('id', $id);
        $stmt->execute();

    }

}
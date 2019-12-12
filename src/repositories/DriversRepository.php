<?php
namespace App\repositories;
use App\database\Connection;

class DriversRepository
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
        $stmt = $this->pdo->prepare('select * from drivers where driver_id = :driver_id');
        $stmt->bindValue('driver_id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getDriversData(){
        $stmt = $this->pdo->query('select * from drivers');
        return $stmt->fetchAll();
    }

    public function create(array $driver){

        $stmt = $this->pdo->prepare('insert into drivers (name, birthday, drive_skill, drive_license, tax) values ( ?, ?, ?, ?, ?)');
        $stmt->execute([
                $driver['name'],
                $driver['birthday'],
                $driver['drive_skill'],
                $driver['drive_license'],
                $driver['tax']

          ]
        );
    }

    public function deleteDriver (int $id)
    {
        $stmt = $this->pdo->prepare('delete from drivers where driver_id = :id');
        $stmt->bindValue('id', $id);
        $stmt->execute();
    }
}
<?php
class RifasVendidas
{
    private $DB;
    function __construct()
    {
        $this->DB = new Database();
    }
    public function search($IDRifa)
    {
        $query = $this->DB->connect()->prepare("SELECT IDRifa, Nombres, Codigo FROM rifasvendidas WHERE IDRifa=:IDRifa");
        $query->bindParam(":IDRifa", $IDRifa, PDO::PARAM_STR);
        $query->execute();
        $query = $query->fetchAll(PDO::FETCH_CLASS);
        $this->DB->disConnect();
        if (count($query) == 0) {
            return false;
        }
        return $query[0];
    }
    public function listParticipantes()
    {
        $query = $this->DB->connect()->prepare("SELECT IDRifa, Nombres, Codigo FROM rifasvendidas");
        $query->execute();
        $query = $query->fetchAll(PDO::FETCH_CLASS);
        $this->DB->disConnect();
        return $query;
    }
    public function save($params)
    {
        $query = $this->DB->connect()->prepare("INSERT INTO rifasvendidas ( Nombres , Codigo ) VALUES ( :Nombre , :Codigo )");
        $query->bindParam(":Nombre", $params['Nombre'], PDO::PARAM_STR);
        $query->bindParam(":Codigo", $params['Codigo'], PDO::PARAM_INT);
        $query->execute();
        $query = $this->DB->connect()->prepare("SELECT IDRifa, Nombres, Codigo FROM rifasvendidas ORDER BY IDRifa DESC LIMIT 1");
        $query->execute();
        $query = $query->fetchAll(PDO::FETCH_CLASS);
        $this->DB->disConnect();
        $idTemp = $query[0]->IDRifa;
        $query[0]->IDRifa = "RCCFF-2022-" . $idTemp;
        return $query[0];
    }
    public function update($params)
    {
        $IDRifa = explode("-", $params['IDRifa'])[2];
        $query = $this->DB->connect()->prepare("UPDATE rifasvendidas SET Nombres = :Nombre, Codigo = :Codigo WHERE IDRifa= :IDRifa");
        $query->bindParam(":Nombre", $params['Nombre'], PDO::PARAM_STR);
        $query->bindParam(":Codigo", $params['Codigo'], PDO::PARAM_INT);
        $query->bindParam(":IDRifa", $IDRifa, PDO::PARAM_INT);
        $query->execute();
        $query = $this->DB->connect()->prepare("SELECT IDRifa, Nombres, Codigo FROM rifasvendidas WHERE IDRifa= :IDRifa");
        $query->bindParam(":IDRifa", $IDRifa, PDO::PARAM_INT);
        $query->execute();
        $query = $query->fetchAll(PDO::FETCH_CLASS);
        return "{'status':true,'mensage':'Ticket actualizado: " . json_encode($query[0]) . "'}";
    }
    public function delete($params)
    {
        $IDRifa = explode("-", $params['IDRifa'])[2];
        $query = $this->DB->connect()->prepare("DELETE FROM rifasvendidas WHERE IDRifa= :IDRifa");
        $query->bindParam(":IDRifa", $IDRifa, PDO::PARAM_INT);
        $query->execute();
        return "{'status':true,'mensage':'Ticket eliminado ID: " . $params['IDRifa'] . "'}";
    }
}

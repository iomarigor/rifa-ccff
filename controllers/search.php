<?php
require_once 'models/rifasVendidas.php';
class Search extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function render()
    {
        $rifa = new RifasVendidas();
        $this->view->listaPaticipantes = $rifa->listParticipantes();
        $this->view->render('search/index');
    }
    function searchRifa($params)
    {
        $temp = explode("-", $params['id']);
        $rifa = new RifasVendidas();
        $status = [];
        if ($temp[0] !== "RCCFF" || $temp[1] !== "2022" || count($temp) != 3) {
            $status['status'] = false;
            $status['mensage'] = 'Ticket aun no registrado';
            echo json_encode($status);
            return;
        }
        $response = $rifa->search($temp[2]);
        if ($response) {
            $status['status'] = true;
            $status['mensage'] = 'Ticket registrado';
            $status['IDRifa'] = $response->IDRifa;
            $status['Nombres'] = $response->Nombres;
            $status['DNI'] = $response->DNI;
        } else {
            $status['status'] = false;
            $status['mensage'] = 'Ticket aun no registrado';
        }
        echo json_encode($status);
    }
    function save($params)
    {
        $rifa = new RifasVendidas();
        echo json_encode($rifa->save($params));
    }
    function update($params)
    {
        $temp = explode("-", $params['IDRifa']);
        if ($temp[0] !== "RCCFF" || $temp[1] !== "2022" || count($temp) != 3) {
            $status['status'] = false;
            $status['mensage'] = 'ID de Ticket invalido';
            echo json_encode($status);
            return;
        }
        $rifa = new RifasVendidas();
        echo json_encode($rifa->update($params));
    }
    function delete($params)
    {
        $temp = explode("-", $params['IDRifa']);
        if ($temp[0] !== "RCCFF" || $temp[1] !== "2022" || count($temp) != 3) {
            $status['status'] = false;
            $status['mensage'] = 'ID de Ticket invalido';
            echo json_encode($status);
            return;
        }
        $rifa = new RifasVendidas();
        echo json_encode($rifa->delete($params));
    }
}

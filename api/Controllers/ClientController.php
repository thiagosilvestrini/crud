<?php

namespace Controllers;

use Models\Client;

class clientController {
    public function index() {}

    public function addClient() {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
        $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
        $data_nascimento = filter_input(INPUT_POST,'data_nascimento');
        $sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);

        $c = new Client();
        if($c->addClient($nome, $sobrenome, $email, $rg, $cpf, $data_nascimento, $sexo)) {
            echo 'SUCCESS';
            exit;
        } else {
            echo 'ERRO';
            exit;
        }
    }

    public function updateClient() {
        $cliente = filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_STRING);
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
        $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
        $data_nascimento = filter_input(INPUT_POST,'data_nascimento');
        $sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);

        $c = new Client();
        if($c->updateClient($cliente, $nome, $sobrenome, $email, $rg, $cpf, $data_nascimento, $sexo)) {
            echo 'SUCCESS';
            exit;
        } else {
            echo 'ERRO';
            exit;
        }
    }

    public function getAllClients() {
        $c = new Client();
        $getAllClients = $c->getAllClients();
        echo json_encode($getAllClients);
    }

    public function getClientPerId() {
        $cliente = filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_STRING);
        $c = new Client();
        $getClientPerId = $c->getClientPerId($cliente);
        echo json_encode($getClientPerId);
    }

    public function deleteClient() {
        $cliente = filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_STRING);
        $c = new Client();
        if($c->deleteClient($cliente)) {
            echo 'SUCCESS';
            exit;
        } else {
            echo 'ERRO';
            exit;
        }
    }
}

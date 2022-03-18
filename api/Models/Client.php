<?php

namespace Models;

use Core\Model;
use PDOException;

class Client extends Model {
	public function __construct() {
		parent::__construct ();
	}

	public function addClient($nome, $sobrenome, $email, $rg, $cpf, $data_nascimento, $sexo) {
		try {
			$sql = $this->db->prepare ( "
				INSERT INTO cliente (nome, sobrenome, email, sexo, rg, cpf, data_nascimento)
				VALUES (:nome, :sobrenome, :email, :sexo, :rg, :cpf, :data_nascimento)
			" );
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":sobrenome", $sobrenome);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":sexo", $sexo);
			$sql->bindValue(":rg", $rg);
			$sql->bindValue(":cpf", $cpf);
			$sql->bindValue(":data_nascimento", $data_nascimento);
			if ($sql->execute ()) {
				return true;
			} else {
				return false;
			}
		} catch ( PDOException $err ) {
			echo $err->getMessage ();
		}
	}

	public function getAllClients() {
		try {
			$sql = $this->db->prepare ( "
				SELECT	id,
						nome, 
						sobrenome,
						email, 
						sexo, 
						rg, 
						cpf,
						data_nascimento
				FROM 	cliente
			" );
			$sql->execute();
			if ($sql->rowCount() > 0) {
				return $sql->FetchAll();
			} else {
				return false;
			}
		} catch ( PDOException $err ) {
			echo $err->getMessage ();
		}
	}

	public function getClientPerId($cliente) {
		try {
			$sql = $this->db->prepare ( "
				SELECT	id,
						nome, 
						sobrenome,
						email, 
						sexo, 
						rg, 
						cpf,
						data_nascimento
				FROM 	cliente
				WHERE	id = :id
			" );
			$sql->bindValue(':id', $cliente);
			$sql->execute();
			if ($sql->rowCount() > 0) {
				return $sql->Fetch();
			} else {
				return false;
			}
		} catch ( PDOException $err ) {
			echo $err->getMessage ();
		}
	}

	public function deleteClient($id) {
		try {
			$sql = $this->db->prepare ( "
				DELETE FROM cliente
				WHERE id = :id
			" );
			$sql->bindValue(':id', $id);
			if ($sql->execute()) {
				return true;
			} else {
				return false;
			}
		} catch ( PDOException $err ) {
			echo $err->getMessage ();
		}
	}

	public function updateClient($cliente, $nome, $sobrenome, $email, $rg, $cpf, $data_nascimento, $sexo) {
		try {
			$sql = $this->db->prepare ( "
				UPDATE cliente
				SET nome = :nome,
					sobrenome = :sobrenome,
					email = :email,
					rg = :rg,
					cpf = :cpf,
					sexo = :sexo,
					data_nascimento = :data_nascimento
				WHERE id = :id
			" );
			$sql->bindValue(":id", $cliente);
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":sobrenome", $sobrenome);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":sexo", $sexo);
			$sql->bindValue(":rg", $rg);
			$sql->bindValue(":cpf", $cpf);
			$sql->bindValue(":data_nascimento", $data_nascimento);
			if ($sql->execute ()) {
				return true;
			} else {
				return false;
			}
		} catch ( PDOException $err ) {
			echo $err->getMessage ();
		}
	}
}

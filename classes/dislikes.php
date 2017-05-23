<?php

	class Dislikes{

		private $pdo;

		public function __construct($pdo){
			$this->pdo = $pdo;
		}


		public function insertDislike($pid){
			$statment = $this->pdo->prepare(
				"INSERT INTO votes (pid, dislikes)
				VALUES (:pid, :dislikes)"
			);

			$statment->execute([
				":pid" => $pid,
				":dislikes" => 1
			]);
		}


		public function uppdateDislike($id){
			$statment = $this->pdo->prepare(
				"UPDATE votes dislikes
				SET dislikes = dislikes + 1
				WHERE pid = :pid"
			);

			$statment->execute([
				":pid" => $id,
			]);
		}


		public function getDislikesByPid($pid){
			$statement = $this->pdo->prepare("SELECT dislikes FROM votes WHERE pid = $pid");
			$statement->execute();
			return $statement->fetchAll();
		}
	}
?>

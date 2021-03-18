<?php

namespace app\engine;

use PDO;
use app\config\AppConfiguration;

class Database
{

      	protected $db;

      	public function __construct()
        {
      		$config = AppConfiguration::$db_config;
      		$this->db = new PDO(
            'mysql:host='.$config['hostname'].';dbname='.$config['database'].'', $config['username'], $config['password']
          );
          $this->db->exec('set names '.$config['charset']);
      	}

      	public function query(string $sql, array $params = [])
        {
      		$stmt = $this->db->prepare($sql);
      		if (!empty($params)) {
      			foreach ($params as $key => $val) {
      				$stmt->bindValue(':'.$key, $val);
      			}
      		}
      		$stmt->execute();
      		return $stmt;
      	}

      	public function row(string $sql, array $params = [])
        {
      		$result = $this->query($sql, $params);
      		return $result->fetchAll(PDO::FETCH_ASSOC);
      	}

      	public function column(string $sql, array $params = [])
        {
      		$result = $this->query($sql, $params);
      		return $result->fetchColumn();
      	}

        public function prepareParams(array $data): array
        {
          return [
            'columns' => '`' . implode('`, `', array_keys($data)) . '`',
            'params'  => ':' . implode(', :', array_keys($data))
          ];
        }

        public function insert(string $table, array $data)
        {
          $prepare = $this->prepareParams($data);
          $result = $this->query('INSERT INTO '.$table.' ('.$prepare['columns'].') VALUES ('.$prepare['params'].')', $data);
          return $result;
        }

        public function fetchAll(string $table, array $data)
        {
          $prepare = $this->prepareParams($data);
          $result = $this->row('SELECT * FROM '.$table.' WHERE '.$prepare['columns'].' = '.$prepare['params'].'', $data);
          return $result;
        }


}

?>

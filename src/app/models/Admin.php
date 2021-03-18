<?php

namespace app\models;

use app\engine\Model;
use app\config\AppConfiguration;

class Admin extends Model
{

        public $error;

        public function valData(array $post): bool
        {
          $config = AppConfiguration::$admin;
          if ($config['login'] != $post['login'] or $config['password'] != $post['password']) {
  	         $this->error = 'Login or password is incorrect!';
             return false;
          }
          return true;
        }

        public function getAllUrl(): array
        {
      		$arr = [];
      		$result = $this->db->row('SELECT * FROM i_url_data ORDER BY id ASC');
      		if (!empty($result)) {
      			foreach ($result as $key => $val) {
      				$arr[$key] = $val;
      			}
      		}
      		return $arr;
        }

        public function checkExists(int $id)
        {
          if (count($this->db->FetchAll('i_url_data', ['id' => $id])) > 0) {
            return true;
          } else {
            return false;
          }
        }

        public function validateUrl(array $post): bool
        {
          if (empty($post['url'])) {
            return false;
          } elseif (empty($post['short_code'])) {
            return false;
          } else {
            return true;
          }
        }

        public function getData(int $id): array
        {
          $arr = [];
      		$result = $this->db->row('SELECT * FROM i_url_data WHERE id = :id', ['id' => $id]);
      		if (!empty($result)) {
      			foreach ($result as $key => $val) {
      				$arr[$key] = $val;
      			}
      		}
      		return $arr;
        }

        public function edit(int $id, array $post): void
        {
          $params = [
            'id' => $id,
            'url' => $post['url'],
            'short_code' => $post['short_code']
          ];
          $this->db->query('UPDATE i_url_data SET url = :url, short_code = :short_code WHERE id = :id', $params);
        }

        public function delete(int $id): void
        {
          $this->db->query('DELETE FROM i_url_data WHERE id = :id', ['id' => $id]);
        }

}

 ?>

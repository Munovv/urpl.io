<?php

namespace app\models;

use app\engine\Model;

class Main extends Model
{

        public function checkUrl(string $url): bool
        {
          $params = [
            'url' => $url
          ];
          if (count($this->db->FetchAll('i_url_data', $params)) > 0) {
            return false;
          } else {
            return true;
          }
        }

        public function genUrlCode(): string
        {
          return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyz', 5)), 0, 5);
        }

        public function getUrl(array $params): array
        {
          return $this->db->fetchAll('i_url_data', $params);
        }

        public function checkCodeExists(string $url_code)
        {
          $params = [
            'short_code' => $url_code
          ];
          return $this->db->column("SELECT id FROM i_url_data WHERE short_code = :short_code LIMIT 1", $params);
        }

        public function createShortLink(string $url): bool
        {
          $params = [
            'url' => $url,
            'short_code' => $this->genUrlCode(),
            'date_time' => time()
          ];
          $this->db->insert('i_url_data', $params);
          return true;
        }

}

 ?>

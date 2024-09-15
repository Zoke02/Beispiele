<?php
namespace PICS\BEISPIEL\DataBanking\Model;

use PICS\BEISPIEL\DataBanking\Mysql;
use PICS\BEISPIEL\DataBanking\Model\Row\Genre;

class Genres {

    public function all_genres(): array
    {
        $all_genres = array();
        $db = Mysql::getInstanz();
        $result = $db->query("SELECT * FROM genre ORDER BY id ASC");
        
        // print_r($result);
        // exit;

        while ($row = $result->fetch_assoc()) 
        {   

            // print_r($row);
            // exit;

            $all_genres[] = new Genre($row);
        }
        return $all_genres;
    }
}
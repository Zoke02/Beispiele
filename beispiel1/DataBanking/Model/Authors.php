<?php
namespace PICS\BEISPIEL\DataBanking\Model;

use PICS\BEISPIEL\DataBanking\Mysql;
use PICS\BEISPIEL\DataBanking\Model\Row\Author;

class Authors {

    public function all_authors(): array
    {
        $all_authors = array();
        $db = Mysql::getInstanz();
        $result = $db->query("SELECT * FROM author ORDER BY name ASC");
        
        // print_r($result);
        // exit;

        while ($row = $result->fetch_assoc()) 
        {   

            // print_r($row);
            // exit;

            $all_authors[] = new Author($row);
        }
        return $all_authors;
    }
}
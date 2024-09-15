<?php
namespace WIFI\JWE23\DataBanking\Model;

use WIFI\JWE23\DataBanking\Mysql;
use WIFI\JWE23\DataBanking\Model\Row\Categorie;

class Categories {

    public function all_categories(): array
    {
        $all_categories = array();
        $db = Mysql::getInstanz();
        $result = $db->query("SELECT * FROM categories ORDER BY categorie_name ASC");
        
        // print_r($result);
        // exit;

        while ($row = $result->fetch_assoc()) 
        {   

            // print_r($row);
            // exit;

            $all_categories[] = new Categorie($row);
        }
        return $all_categories;
    }
    public function get_all_categories(): array
    {
        $all_categories = array();
        $db = Mysql::getInstanz();
        $result = $db->query("SELECT * FROM categories ORDER BY categorie_name ASC");
        
        // print_r($result);
        // exit;

        while ($row = $result->fetch_assoc()) 
        {   

            // print_r($row);
            // exit;

            $all_categories[] = $row;
        }
        return $all_categories;
    }


}
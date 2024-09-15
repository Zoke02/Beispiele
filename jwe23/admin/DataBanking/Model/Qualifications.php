<?php
namespace WIFI\JWE23\DataBanking\Model;

use WIFI\JWE23\DataBanking\Mysql;
use WIFI\JWE23\DataBanking\Model\Row\Qualification;

class Qualifications {

    public function all_qualifications(): array
    {
        $all_qualifications = array();
        $db = Mysql::getInstanz();
        $result = $db->query("SELECT * FROM qualifications ORDER BY id ASC");
        
        // print_r($result);
        // exit;

        while ($row = $result->fetch_assoc()) 
        {   

            // print_r($row);
            // exit;

            $all_qualifications[] = new Qualification($row);
        }
        return $all_qualifications;
    }
    public function get_all_qualifications(): array
    {
        $all_qualifications = array();
        $db = Mysql::getInstanz();
        $result = $db->query("SELECT * FROM qualifications ORDER BY id ASC");
        
        // print_r($result);
        // exit;

        while ($row = $result->fetch_assoc()) 
        {   

            // print_r($row);
            // exit;

            $all_qualifications[] = $row;
        }
        return $all_qualifications;
    }


}
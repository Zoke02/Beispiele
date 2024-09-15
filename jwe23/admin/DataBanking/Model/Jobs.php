<?php
namespace WIFI\JWE23\DataBanking\Model;

use WIFI\JWE23\DataBanking\Mysql;
use WIFI\JWE23\DataBanking\Model\Row\Job;

class Jobs {

    // get all visible jobs and create on abject
    public function all_jobs(): array
    {
        $all_jobs = array();
        $db = Mysql::getInstanz();
        $result = $db->query("SELECT * FROM jobs WHERE status = 'Visible' ORDER BY id DESC");
        while ($row = $result->fetch_assoc()) 
        {   
            $all_jobs[] = new Job($row);
        }
        return $all_jobs;
    }

    // get all jobs both visible and hidden for admin
    public function all_jobs_admin(): array
    {
        $all_jobs = array();
        $db = Mysql::getInstanz();
        $result = $db->query("SELECT * FROM jobs ORDER BY id DESC");
        while ($row = $result->fetch_assoc()) 
        {   
            $all_jobs[] = new Job($row);
        }
        return $all_jobs;
    }

    // get all jobs from a specific company
    public function all_jobs_from_user($sql_id): array
    {
        $all_jobs = array();
        $db = Mysql::getInstanz();
        $result = $db->query("SELECT * FROM jobs WHERE user_id = $sql_id ORDER BY id DESC");
        while ($row = $result->fetch_assoc()) 
        {   
            $all_jobs[] = new Job($row);
        }
        return $all_jobs;
    }

    public function get_job_by_id($sql_id): array
    {
        $all_jobs = array();
        $db = Mysql::getInstanz();
        $result = $db->query("SELECT * FROM jobs WHERE id = $sql_id");
        while ($row = $result->fetch_assoc()) 
        {   
            $all_jobs[] = new Job($row);
        }
        return $all_jobs;
    }

    // Get all jobs from a specific categorie.
    public function all_jobs_from_categorie($sql_id): array
    {
        $all_jobs = array();
        $db = Mysql::getInstanz();
        $result = $db->query("SELECT * FROM jobs WHERE categorie_id = $sql_id ORDER BY id DESC");
        while ($row = $result->fetch_assoc()) 
        {   
            $all_jobs[] = new Job($row);
        }
        return $all_jobs;
    }

    // Show last 5 visible jobs from Database in HomePage.
    public function last_jobs_vissible(): array
    {
        $last_jobs = array();
        $db = Mysql::getInstanz();
        $result = $db->query("SELECT *
        FROM jobs WHERE status = 'Visible' 
        ORDER BY id DESC LIMIT 5");
        while ($row = $result->fetch_assoc()) 
        {   
            $last_jobs[] = new Job($row);
        }
        return $last_jobs;
    }

    // Get all visible jobs as array for JSON
    public function get_all_jobs(): array
    {
        $all_jobs = array();
        $db = Mysql::getInstanz();
        $result = $db->query("SELECT * FROM jobs
        INNER JOIN categories ON jobs.categorie_id = categories.id
        INNER JOIN qualifications ON jobs.qualification_id = qualifications.id
        WHERE status = 'Visible'
        ORDER BY jobs.id ASC
        ");

        while ($row = $result->fetch_assoc()) 
        {   
            $all_jobs[] = $row;
        }
        return $all_jobs;
    }

    // Get all categories as array for JSON
    public function get_all_categories(): array
    {
        $all_categories = array();
        $db = Mysql::getInstanz();
        $result = $db->query("SELECT * FROM categories ORDER BY id ASC");
        while ($row = $result->fetch_assoc()) 
        {   
            $all_categories[] = $row;
        }
        return $all_categories;
    }
    
    // Get all categories by id as array for JSON
    public function get_all_categories_by_id($sql_id, $sql_table): array
    {
        $all_categories = array();
        $db = Mysql::getInstanz();
        $result = $db->query("SELECT * FROM $sql_table 
        INNER JOIN categories ON jobs.categorie_id = categories.id
        INNER JOIN qualifications ON jobs.qualification_id = qualifications.id
        WHERE categorie_id = $sql_id");
        while ($row = $result->fetch_assoc()) 
        {   
            $all_categories[] = $row;
        }
        return $all_categories;
    }

    // Get row from table for JSON
    public function get_row_from_id($sql_id, $table): array
    {
        $job = array();
        $db = Mysql::getInstanz();
        $result = $db->query("SELECT * FROM $table WHERE id = $sql_id ");
        while ($row = $result->fetch_assoc()) 
        {   
            $job[] = $row;
        }
        return $job;
    }
}
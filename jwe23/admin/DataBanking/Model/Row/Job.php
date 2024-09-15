<?php
namespace WIFI\JWE23\DataBanking\Model\Row;

class Job extends RowAbstract
{
    protected string $tabel = "jobs";

    public function get_categorie(): Categorie 
    {
        return new Categorie($this->categorie_id);
    }
    public function get_qualification(): Qualification 
    {
        return new Qualification($this->qualification_id);
    }
}
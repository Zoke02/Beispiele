<?php
namespace WIFI\JWE23\DataBanking\Model\Row;

class Categorie extends RowAbstract
{
    protected string $tabel = "categories";

    public function get_name() 
    {
        return $this->categorie_name;
    }
}
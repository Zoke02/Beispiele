<?php
namespace PICS\BEISPIEL\DataBanking\Model\Row;

class Author extends RowAbstract
{
    protected string $tabel = "author";

    public function get_name() 
    {
        return $this->name;
    }
}
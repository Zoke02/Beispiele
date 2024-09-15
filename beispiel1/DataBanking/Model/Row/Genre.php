<?php
namespace PICS\BEISPIEL\DataBanking\Model\Row;

class Genre extends RowAbstract
{
    protected string $tabel = "genre";

    public function get_name()
    {
        return $this->name;
    }
}
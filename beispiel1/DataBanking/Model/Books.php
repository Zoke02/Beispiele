<?php
namespace PICS\BEISPIEL\DataBanking\Model;

use PICS\BEISPIEL\DataBanking\Mysql;
use PICS\BEISPIEL\DataBanking\Model\Row\Book;

class Books {
    public function all_books(): array
    {
        $all_books = array();
        $db = Mysql::getInstanz();
        $result = $db->query("SELECT * FROM book ORDER BY id DESC");
        while ($row = $result->fetch_assoc()) 
        {   
            $all_books[] = new Book($row);
        }
        return $all_books;
    }
}
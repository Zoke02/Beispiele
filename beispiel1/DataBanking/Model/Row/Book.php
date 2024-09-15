<?php
namespace PICS\BEISPIEL\DataBanking\Model\Row;

class Book extends RowAbstract
{
    protected string $tabel = "book";

    public function get_author(): Author
    {
        return new Author($this->author_id);
    }
    public function get_genre(): Genre
    {
        return new Genre($this->genre_id);
    }
}
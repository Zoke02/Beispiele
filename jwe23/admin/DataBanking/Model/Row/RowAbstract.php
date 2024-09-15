<?php
namespace WIFI\JWE23\DataBanking\Model\Row;

use WIFI\JWE23\DataBanking\Mysql;


abstract class RowAbstract 
{
    protected string $tabel;
    private array $data = array();
    public function __construct(array|int $id_or_data)
    {
        if (is_array($id_or_data))
        {
            $this->data = $id_or_data;
        } else {
            $db = Mysql::getInstanz();
            $sql_id = $db->escape($id_or_data);
            $result = $db->query("SELECT * FROM {$this->tabel} WHERE id = '{$sql_id}'");
            $this->data = $result->fetch_assoc();
        }
    }

    public function __get(string $eigenschaft):mixed
    {
        if (!array_key_exists($eigenschaft, $this->data))
        {
            throw new \Exception("The collumn {$eigenschaft} does not exist in the Table {$this->tabel}");
        }

        return $this->data[$eigenschaft];
    }

    public function delete(): void {
        $db = Mysql::getInstanz();
        $sql_id = $db->escape($this->id);
        $db->query("DELETE FROM {$this->tabel} WHERE id = '{$sql_id}'");
    }

    public function save():void 
    {
        $db = Mysql::getInstanz();
        $sql_fields = "";
        foreach ($this->data as $collumn_name => $value) {
            if ($collumn_name == "id") continue; // Collumn name "id" never update or insert.
            $sql_value = $db->escape($value);
            $sql_fields .= "{$collumn_name} = '{$sql_value}', ";
        }
        // Letztes Komma entfernen.
        $sql_fields = rtrim($sql_fields, ", ");
        // echo $sql_fields;
        // exit;
        if (!empty($this->data["id"]))
        {
            // Change in Data-Bank
            $sql_id = $db->escape($this->data["id"]);
            $db->query("UPDATE {$this->tabel} SET {$sql_fields} WHERE id = '{$sql_id}' ");
        } else {
            // Add in Data-Bank
            $db->query("INSERT into {$this->tabel} SET {$sql_fields} ");
        }
    }
}
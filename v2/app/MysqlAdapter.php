<?php


class MysqlAdapter
{
    /**
     * @var mysqli
     */
    private $connection;

    public function __construct()
    {
        $config = require __DIR__ . '/config/database.php';
        $host = $config['host'];
        $user = $config['user'];
        $password = $config['password'];
        $database = $config['database'];

        $this->connection = new mysqli($host, $user, $password, $database);
//        $this->connection = new \PDO("mysql:dbname={$database};host={$host}", $user, $password);
    }

    public function getList($tableName)
    {
        $result = $this->connection->query("SELECT * FROM {$tableName}");
        $items = [];

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $items[] = $row;
            }
        }

        return $items;
    }

    public function getById($tableName, $id)
    {
        $result = $this->connection->query("SELECT * FROM {$tableName} WHERE `id` = '{$id}'");

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }

        return null;
    }

    public function insert($tableName, $properties)
    {
        // on properties ['name'=>'djuro', 'lastname'=>'djuric'] gives ['name','lastname']
        $attributes = array_keys($properties);

        // on properties ['name'=>'djuro', 'lastname'=>'djuric'] gives ['djuro','djuric']
        $values = array_values($properties);

        // on properties ['name','lastname'] gives `'name'`,`'lastname'`
        $attributesSql = "`'" . implode("'`,`'", $attributes) . "`'";
        // on properties ['djuro','djuric'] gives `'djuro'`,`'djuric'`
        $valuesSql = "`'" . implode('`,`', $values) . "`'";

        $sql = "INSERT INTO `{$tableName}` ({$attributesSql}) VALUES ({$valuesSql})";

        if ($this->connection->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($tableName, $id, $properties)
    {
        $sqlUpdateSequences = [];

        // on properties ['name'=>'djuro', 'lastname'=>'djuric'] gives ["`name` = 'djuro'", "`lastname` = 'djuric'"]
        foreach ($properties as $attribute => $value) {
            $sqlUpdateSequences[] = "`{$attribute}` = '{$value}'";
        }

        // on properties ["`name` = 'djuro'", "`lastname` = 'djuric'"] gives `name` = 'djuro', `lastname` = 'djuric'
        $updates = implode(', ', $sqlUpdateSequences);

        $sql = "UPDATE {$tableName} SET {$updates}   WHERE `id`='{$id}'";

        if ($this->connection->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($tableName, $id)
    {
        $sql = "DELETE FROM {$tableName} WHERE id='{$id}'";

        if ($this->connection->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
}

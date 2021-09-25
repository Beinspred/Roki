<?php
require_once __DIR__ . '/MysqlAdapter.php';

abstract class Model
{
    protected static $tableName;
    /**
     * @var MysqlAdapter
     */
    private $mysqlAdapter;

    public function __construct()
    {
        $this->mysqlAdapter = new MysqlAdapter();
    }

    public function all()
    {
        return $this->mysqlAdapter->getList(static::$tableName);
    }

    public function find($id)
    {
        return $this->mysqlAdapter->getById(static::$tableName, $id);
    }

    public function update($id, $properties)
    {
        if (!$this->mysqlAdapter->update(static::$tableName, $id, $properties)) {
            throw new \Exception('update unsuccessful');
        }
    }

    public function create($properties)
    {
        if (!$this->mysqlAdapter->insert(static::$tableName, $properties)) {
            throw new \Exception('create unsuccessful');
        }
    }

    public function delete($id)
    {
        if (!$this->mysqlAdapter->delete(static::$tableName, $id)) {
            throw new \Exception('delete unsuccessful');
        }
    }
}

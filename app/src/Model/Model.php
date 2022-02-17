<?php
require_once __DIR__ . '/../DatabaseAdapter.php';

abstract class Model
{
    protected $tableName;
    protected $relevantColumns;

    public function __construct()
    {
        $this->db = new DatabaseAdapter;
    }

    public function getAll()
    {
        $modelAll = $this->db->selectAll($this->tableName);
        return $modelAll;
    }

    public function getById($id)
    {
        $modelUpdate = $this->db->select($this->tableName, $id);
        return $modelUpdate;
    }

    public function create($podaciPOST)
    {
        $filterPost = [];
        foreach ($this->relevantColumns as $relevantColumn) {
            $filterPost[$relevantColumn] = $podaciPOST[$relevantColumn];
        }
        $modelCreate = $this->db->insert($this->tableName, $filterPost);
        return $modelCreate;
    }

    public function update($podaciPost, $id)
    {
        $filterUpdate = [];
        foreach ($this->relevantColumns as $relevantUpdate) {
            $filterUpdate[$relevantUpdate] = $podaciPost[$relevantUpdate];
        }
        $modelUpdate = $this->db->update($this->tableName, $id, $filterUpdate);
        return $modelUpdate;
    }

    public function delete($id)
    {
        $modelDelete = $this->db->delete($this->tableName, $id);
        return $modelDelete;
    }

}
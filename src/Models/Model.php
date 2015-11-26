<?php namespace Models;
class Model{
	protected $pdo;
	protected $table;
	protected $order = "id";

	public function __construct(){
		if( !class_exists('\Connect')) throw new \RuntimeException("class Connect doesen't exists");
		$this ->pdo = \Connect::$pdo;
	}

    /**
     * @param string|array $args
     * @return $this
     */
    public function select($args = '*')
    {
        if (is_array($args)) {
            $this->select = "`" . implode('`,`', $args) . "`";

            return $this;
        } elseif ($args == '*') {
            $this->select = '*';

            return $this;
        }

        die(sprintf('method select Model invalid argument method %s', $args));
    }

    /**
     * @param $field
     * @param $operator
     * @param $value
     * @return $this
     */
    public function where($field, $operator, $value)
        {
     
            if (!is_numeric($value)) {
                $value = $this->pdo->quote($value);
            }
     
            $operators = ['=', '>', '<', '!=', '<>', '>=', '<='];
            if (!in_array($operator, $operators)) {
                die(sprintf('invalid SQL operator, %s', $operator));
            }
            if (sizeof($this->where) == 0) {
                $this->where [] = $field . $operator . $value;
                return $this;
            } else {
                $this->where [] = "AND " . $field . $operator . $value;
                return $this;
            }
        }

    public function count()
    {
        if (empty($this->table)) die('table name is null, you must set a table name');

        $where = $this->buildWhere();

        $res = $this->pdo->query(sprintf(
            'SELECT count(*) as c FROM %s WHERE %s',
            "`" . $this->table . "`",
            $where
        ));

        return $res->fetchColumn();
    }

    /**
     * @return PDOStatement
     */
    public function get()
    {
        if (empty($this->table)) die('table name is null, you must set a table name');

        $where = $this->buildWhere();
        $select = $this->select;

        $this->select = '';
        $this->whereAnd = [];

        $sql = sprintf(
            'SELECT %s FROM %s WHERE %s ORDER BY %s',
            $select,
            "`" . $this->table . "`",
            $where,
            $this->order);

        return $this->pdo->query($sql);

    }

    /**
     * @return string
     */
    private function buildWhere()
    {
        $where = ' 1=1 ';

        if (!empty($this->whereAnd))
            $where .= "AND " . implode(' AND ', $this->whereAnd);

        return $where;
    }

    public function all($arg='*')
    {
    	$stmt = $this-> select($arg)->get();

    	return $stmt->fetchAll();
    }

    public function find($table , $id){

        $sql =sprintf("SELECT * FROM %s WHERE `id` = %d ",
            $table,
            $id);

        $stmt = $this->pdo->query($sql);
        
        return $stmt->fetchAll();
    }
}
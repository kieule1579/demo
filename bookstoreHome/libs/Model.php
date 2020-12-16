<?php
class Model
{
	protected $connect;
	protected $database;
	protected $table;
	protected $resultQuery;

	// CONNECT DATABASE -- ket noi database
	public function __construct($params = null)
	{
		if ($params == null) {
			$params['server']   = DB_HOST;
			$params['username'] = DB_USERS;
			$params['password'] = DB_PASS;
			$params['database'] = DB_NAME;
			$params['table']    = DB_TABLE;
		}
		$link = mysqli_connect($params['server'], $params['username'], $params['password']);
		if (!$link) {
			die('Fail connect: ' . mysqli_errno($link));
		} else {
			$this->connect 	= $link;
			$this->database = $params['database'];
			$this->table 	= $params['table'];
			$this->setDatabase();
			$this->query("SET NAMES 'utf8'");
			$this->query("SET CHARACTER SET 'utf8'");
		}
	}

	// SET CONNECT -- thiet lap lai server can ket noi
	public function setConnect($connect)
	{
		$this->connect = $connect;
	}

	// SET DATABASE --Thiet lap lai database can ket noi
	public function setDatabase($database = null)
	{
		if ($database != null) {
			$this->database = $database;
		}
		mysqli_select_db($this->connect, $this->database);
	}

	// SET TABLE -- thiet lap lai table can ket noi
	public function setTable($table)
	{
		$this->table  = $table;
	}

	// DISCONNECT DATABASE -- dong ket noi 
	public function __destruct()
	{
		mysqli_close($this->connect);
	}

	// INSERT -- them moi
	public function insert($data, $type = 'single')
	{
		if ($type == 'single') {
			$newQuery 	= $this->createInsertSQL($data);
			$query 		= "INSERT INTO `$this->table`(" . $newQuery['cols'] . ") VALUES (" . $newQuery['vals'] . ")";
			$this->query($query);
		} else {
			foreach ($data as $value) {
				$newQuery = $this->createInsertSQL($value);
				$query = "INSERT INTO `$this->table`(" . $newQuery['cols'] . ") VALUES (" . $newQuery['vals'] . ")";
				$this->query($query);
			}
		}
		return $this->lastID();
	}

	// CREATE INSERT SQL $data = array('name'=>'Admin 1', 'status' => 0, 'ordering' => 9),
	public function createInsertSQL($data)
	{
		$cols = '';
		$vals = '';
		$newQuery = array();
		if (!empty($data)) {
			foreach ($data as $key => $value) {
				$cols .= ", `$key`";
				$vals .= ", '$value'";
			}
		}
		$newQuery['cols'] = substr($cols, 2);
		$newQuery['vals'] = substr($vals, 2);
		return $newQuery;
	}

	// LAST ID (in ra id duoc them vao bang)
	public function lastID()
	{
		return mysqli_insert_id($this->connect);
	}

	// QUERY -- $query -> cau query 
	public function query($query)
	{
		$this->resultQuery = mysqli_query($this->connect, $query);
		return $this->resultQuery;
	}

	// UPDATE -- du lieu can up va dieu kien
	public function update($data, $where)
	{
		$newSet 	= $this->createUpdateSQL($data);
		$newWhere 	= $this->createWhereUpdateSQL($where);
		$query = "UPDATE `$this->table` SET " . $newSet . " WHERE $newWhere";
		return $this->affectedRows();
	}

	// CREATE UPDATE SQL (truong upload)
	public function createUpdateSQL($data)
	{
		$newQuery = "";
		if (!empty($data)) {
			foreach ($data as $key => $value) {
				$newQuery .= ", `$key` = '$value'";
			}
		}
		$newQuery = substr($newQuery, 2);
		return $newQuery;
	}

	// CREATE WHERE UPDATE SQL (tao dieu kien upload)
	public function createWhereUpdateSQL($data)
	{
		//$newWhere = '';
		if (!empty($data)) {
			foreach ($data as $value) {
				$newWhere[] = "`$value[0]` = '$value[1]'";
				$newWhere[] = $value[2];
			}

			$newWhere = implode(" ", $newWhere);
		}
		return $newWhere;
	}

	// AFFECTED ROWS (tong so dong vua thuc hien)
	public function affectedRows()
	{
		return mysqli_affected_rows($this->connect);
	}

	// DELETE --dk xoa
	public function delete($where)
	{
		$newWhere 	= $this->createWhereDeleteSQL($where);
		 $query 		= "DELETE FROM `$this->table` WHERE `id` IN ($newWhere)";
		$this->query($query);
		return $this->affectedRows();
	}

	// CREATE WHERE DELTE SQL -- tao moi cau dieu kien
	public function createWhereDeleteSQL($data)
	{
		$newWhere = '';
		if (!empty($data)) {
			foreach ($data as $id) {
				$newWhere .= "'" . $id . "', ";
			}
			$newWhere .= "'0'";
		}
		return $newWhere;
	}

	// LIST RECORD (hien thi danh sach phan tu thoa cau query)
	public function listRecord($resultQuery = null)
	{
		$result = [];
		$resultQuery = ($resultQuery == null) ? $this->resultQuery : $resultQuery;

		$resultQuery = mysqli_query($this->connect, $resultQuery);// tu them vao
		if (mysqli_num_rows($resultQuery) > 0) {
			while ($row = mysqli_fetch_assoc($resultQuery)) {
				$result[] = $row;
			}
			mysqli_free_result($resultQuery); //giai phong bo nho 
		}

		return $result;
	}

	// SINGLE RECORD (hien thi dong dau tien thoa cau query)
	public function singleRecord($resultQuery = null)
	{
		$result = array();
		$resultQuery = ($resultQuery == null) ? $this->resultQuery : $resultQuery;
		if (mysqli_num_rows($resultQuery) > 0) {
			$result = mysqli_fetch_assoc($resultQuery);
		}
		mysqli_free_result($resultQuery);
		return $result;
	}

	//EXIT 
	public function isExist($query)
	{
		if ($query != null) {
			$this->resultQuery = $this->query($query);
		}
		if (mysqli_num_rows($this->resultQuery) > 0) return true;
		return false;
	}
}

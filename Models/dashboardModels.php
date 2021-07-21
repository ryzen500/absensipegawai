<?php 
namespace App\Models;

use CodeIgniter\Model;

class dashboardModels extends Model{

public function get_all_categories(){
		
		$sql="SELECT COUNT(id) as total FROM users";
		$query=$this->db->query($sql);
		
		
		$row= $query->getRow();
		return $row;
		// dd($row);	
}

public function get_data_from_log_cuti(){
	$sql1="SELECT COUNT(id) as masuk FROM log_cuti";
	$query=$this->db->query($sql1);

	$try =$query->getRow();
	return $try;
	// dd($try);
}


public function get_data_log_cuti_sakit(){
	// $sql="SELECT log_cuti.id,category.name,category_id, COUNT(*) as sakit FROM log_cuti JOIN category ON category.id=log_cuti.id GROUP BY category_id";
	$sql="SELECT log_cuti.id,category.name,category_id, COUNT(*) as sakit FROM log_cuti JOIN category ON category.id=log_cuti.category_id WHERE category.id=1";
	$query=$this->db->query($sql);

	$row =$query->getRow();
	return $row;
	// dd($row);
}

public function get_data_log_cuti_hamil(){
	$sql="SELECT log_cuti.id,category.name,category_id, COUNT(*) as hamil FROM log_cuti JOIN category ON category.id=log_cuti.category_id WHERE category.id=2";
	// $sql="SELECT category_id ,COUNT(category_id) AS hamil FROM log_cuti GROUP BY category_id";
	$query=$this->db->query($sql);

	$row =$query->getRow();
	return $row;
	// dd($row);
}

public function get_data_log_cuti_penting(){
	$sql="SELECT log_cuti.id,category.name,category_id, COUNT(*) as urgent FROM log_cuti JOIN category ON category.id=log_cuti.category_id WHERE category.id=3";
	// $sql="SELECT category_id ,COUNT(category_id) AS hamil FROM log_cuti GROUP BY category_id";
	$query=$this->db->query($sql);

	$row =$query->getRow();
	return $row;
	// dd($row);
}

public function getData()
{
	// $sql ="SELECT c.name , count(l.id) as jml , month(l.dates) as bulan FROM `category` c LEFT JOIN log_cuti l on c.id = l.category_id group by c.id,month(l.dates) order by l.dates ASC";

	$sql="SELECT c.name , count(l.id) as jml , month(l.dates) as bulan FROM `category` c JOIN log_cuti l on c.id = l.category_id WHERE  month(l.dates)>=1 AND month(l.dates)<=12 group by c.id,month(l.dates) order by l.dates ASC";
	// $sql="SELECT c.name , count(l.id) as jml , month(l.dates) as bulan FROM `category` c JOIN log_cuti l on c.id = l.category_id WHERE month(l.dates)>=1 AND month(l.dates)<=12 group by c.id,month(l.dates) order by l.dates ASC";
	// $sql="SELECT c.name , count(l.id) as jml , month(l.dates) as bulan FROM `category` c JOIN log_cuti l on c.id = l.category_id WHERE month(l.dates)=04 group by c.id,month(l.dates) order by l.dates ASC";
	$query=$this->db->query($sql);

	$row =$query->getResult();
	return $row;

}


// Function Query 

public function get_data_Detail_penting()
{
	$sql="SELECT c.name , count(l.id) as jml , month(l.dates) as moon FROM `category` c JOIN log_cuti l on c.id = l.category_id WHERE category_id=03";
	$query=$this->db->query($sql);
	$result=$query->getRow();
	return $result;
}

public function get_data_Detail_sakit()
{
	$sql="SELECT c.name , count(l.id) as jml , month(l.dates) as Bulan FROM `category` c JOIN log_cuti l on c.id = l.category_id WHERE category_id=01";

	$query=$this->db->query($sql);
	$result=$query->getRow();
	return $result;
}



public function data_bulan_april()
{
	// $sql="SELECT MONTH(dates) AS bulan, COUNT(*) AS data_bulanan FROM log_cuti GROUP BY MONTH(dates)";
	// $sql="SELECT MONTH(dates) AS bulan, COUNT(*) AS data_bulanan FROM log_cuti WHERE  MONTH(dates)=04";
	
	// $sql="SELECT MONTH(dates) as bulan,  COUNT(*) AS April FROM log_cuti WHERE  MONTH(dates)=04";

	$sql="SELECT COUNT(MONTH(dates=04)) AS April FROM log_cuti WHERE category_id=2";


	// SELECT MONTH(dates) AS bulan, COUNT(*) AS data_bulanan FROM log_cuti WHERE  MONTH(dates)=04
	// $sql="SELECT category_id ,COUNT(category_id) AS hamil FROM log_cuti GROUP BY category_id";
	$query=$this->db->query($sql);

	$row =$query->getRow();
	return $row;
}
public function data_bulan_juni()
{
	// $sql="SELECT MONTH(dates) AS bulan, COUNT(*) AS data_bulanan FROM log_cuti GROUP BY MONTH(dates)";
	// $sql="SELECT MONTH(dates) AS bulan, COUNT(*) AS data_bulanan FROM log_cuti WHERE  MONTH(dates)=06";
	// $sql="SELECT COUNT(*) AS data_bulanan FROM log_cuti WHERE  MONTH(dates)=06";

	$sql="SELECT COUNT(MONTH(dates=04)) AS April FROM log_cuti WHERE category_id=3";

	// SELECT MONTH(dates) AS bulan, COUNT(*) AS data_bulanan FROM log_cuti WHERE  MONTH(dates)=04
	// $sql="SELECT category_id ,COUNT(category_id) AS hamil FROM log_cuti GROUP BY category_id";
	$query=$this->db->query($sql);

	$row =$query->getRow();
	return $row;
}
}
?>
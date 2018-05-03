<?php
	include_once 'Session.php';
	include 'Database.php';
	include 'connectdb.php';
	
class User{
	private $db;
	
	
	public function __construct(){
		$this->db = new Database();
		
	}
	
	public function getUserId(){
		$result = Session::get("id");
		if($result){
			return $result;
		}
	}	
		
	
	
	public function insertDis($data){
		$distname = $data['name'];
		$sql = "INSERT INTO districts(name) VALUES(:name)";
		$query = $this->db->pdo->prepare($sql) ;
		$query->bindValue(':name',$distname);		
		$result = $query->execute();
		if($result){
			$msg = "<div class='alert alert-success'>Data has been Inserted</div>";
			return $msg;
		}else{
			$msg = "<div class='alert alert-danger'><strong>Sorry !</strong> There has been problem inserting details!</div>";
			return $msg;
		}
	}	
	
	
	public function emailCheck($email){
		$sql = "SELECT email FROM admin WHERE email = :email";
		$query = $this->db->pdo->prepare($sql) ;
		$query -> bindValue(':email',$email);
		$query -> execute();
		if($query -> rowCount() > 0 ){
			return true;			
		}else{
			return false;
		}
	}
	public function getLoginUser($email, $password){
		$sql = "SELECT * FROM admin WHERE email = :email AND password =  :password ";
		$query = $this->db->pdo->prepare($sql) ;
		$query -> bindValue(':email', $email);
		$query -> bindValue(':password', $password);
		$query -> execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		return $result;
	}
	public function getFamily(){			
		
		$sql = "SELECT * FROM family";
		$query = $this->db->pdo->prepare($sql) ;		
		$query -> execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		return $result;
	}
	public function getUserdata(){			
		
		$sql = "SELECT * FROM registration";
		$query = $this->db->pdo->prepare($sql) ;		
		$query -> execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		return $result;
	}
	
	
	public function userLogin($data){	
			$email = $data['email'];
			$password = $data['password'];
		$chk_email = $this->emailCheck($email);
		
		if($email == "" OR $password == "") {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong> Field must not be empty...</div>";
			return $msg;
		}
		
		if(filter_var($email, FILTER_VALIDATE_EMAIL) === false ){
			$msg = "<div class='alert alert-danger'><strong>Error !</strong> Email address is not valid!</div>";
			return $msg;
		}
		if($chk_email == false){
			$msg = "<div class='alert alert-danger'><strong>Error !</strong> Email address does not exist!</div>";
			return $msg;
		}
		$result = $this->getLoginUser($email, $password);
		
		if($result){
			Session::init();
			Session::set("login", true);
			Session::set("id", $result->id);
			Session::set("fname", $result->fname);			
			Session::set("lname", $result->lname);
			Session::set("phone", $result->phone);
			Session::set("email", $result->email);
			Session::set("loginmsg", "<div class='alert alert-success'><strong>Welcome !</strong> You are logged in!</div>");
			header("Location: index.php");
		}else{
			$msg = "<div class='alert alert-danger'><strong>Error !</strong> Data not found!</div>";
			return $msg;
		}
	}	
	public function getDistrict(){
		$sql = "SELECT * FROM districts";
		$query = $this->db->pdo->prepare($sql) ;		
		$query -> execute();
		$result = $query->fetchAll();
		return $result;
	}
	public function districtPosts($data){
		$i= 0;
		$disid = $data;
		$sql="SELECT * FROM family WHERE districts = '$disid'";
		$query = $this->db->pdo->prepare($sql) ;		
		$query -> execute();
		$result = $query->fetchAll();
					
					if($result){	
							$i= 0;
						foreach($result as $data) {
							$i++;
						}
					}
		$j= 0;			
		$sql="SELECT * FROM student WHERE districts = '$disid'";
		$query = $this->db->pdo->prepare($sql) ;		
		$query -> execute();
		$result = $query->fetchAll();					
					if($result){	
							$j= 0;
						foreach($result as $data) {
							$j++;
						}
					}			
		return $result = $i + $j;
	}
	
	public function insertUpozilla($data){
		$distId = $data['district'];
		$upozilla = $data['uponame'];
		$sql = "INSERT INTO upozilla(uponame, districtid) VALUES(:uponame, :districtid)";
		$query = $this->db->pdo->prepare($sql) ;
		$query->bindValue(':uponame',$upozilla);
		$query->bindValue(':districtid',$distId);		
		$result = $query->execute();
		if($result){
			$msg = "<div class='alert alert-success'><strong>Data Inserted Successfully !</strong> </div>";
			return $msg;
		}else{
			$msg = "<div class='alert alert-danger'><strong>Sorry !</strong> There has been problem inserting details!</div>";
			return $msg;
		}
		
	}
	public function upozillaPosts($data){
		
		$i= 0;
		$upoId = $data;
		$sql="SELECT * FROM family WHERE upozillas = '$upoId'";
		$query = $this->db->pdo->prepare($sql) ;		
		$query -> execute();
		$result = $query->fetchAll();
					
					if($result){	
						foreach($result as $data) {
							$i++;
						}
					}
		$j= 0;			
		$sql="SELECT * FROM student WHERE upozillas = '$upoId'";
		$query = $this->db->pdo->prepare($sql) ;		
		$query -> execute();
		$result = $query->fetchAll();					
					if($result){	
							
						foreach($result as $data) {
							$j++;
						}
					}			
		return $result = $i + $j;
	}
	public function getDistrictName($data){
		global $dbhandle;
		$distId = $data;	
		$sql = "SELECT name FROM districts WHERE id = '$distId'";
			// $query = $this->db->pdo->prepare($sql) ;
			// $query->bindValue('product_name',$product_name);
			// $query ->execute();
			// $result = $query ->fetch(); 
			$result=mysqli_query($dbhandle, $sql);
			list($name)=mysqli_fetch_row($result);
			return $name;
	}
	
}
?>
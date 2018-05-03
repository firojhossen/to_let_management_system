<?php
	include_once 'Session.php';
	include 'Database.php';
	
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
		
	
	public function userRegistration($data){
		$fname = $data['fname'];
		$lname = $data['lname'];
		$phone = $data['phone'];
		$email = $data['email'];
		$password = $data['password'];
		
		$chk_email = $this->emailCheck($email);
		
		if($fname == "" OR $lname == "" OR $phone == "" OR $email == "" OR $password == "") {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong> Field must not be empty...</div>";
			return $msg;
		}
		
		if(strlen($fname) <3){
			$msg = "<div class='alert alert-danger'><strong>Error !</strong> First name must be greater than three character... </div>";
			return $msg;
		}elseif(strlen($lname) <3){
			$msg = "<div class='alert alert-danger'><strong>Error !</strong> Last name must be greater than three character... </div>";
			return $msg;
		}elseif(preg_match('/[^a-z0-9_-]+/i',$fname)){
			$msg = "<div class='alert alert-danger'><strong>Error !</strong> First name must only contain alphanumerical, dashes or underscore!</div>";
			return $msg;
		}elseif(preg_match('/[^a-z0-9_-]+/i',$lname)){
			$msg = "<div class='alert alert-danger'><strong>Error !</strong> Last name must only contain alphanumerical, dashes or underscore!</div>";
			return $msg;
		}
		
		if(filter_var($email, FILTER_VALIDATE_EMAIL) === false ){
			$msg = "<div class='alert alert-danger'><strong>Error !</strong> Email address is not valid!</div>";
			return $msg;
		}
		if($chk_email == true){
			$msg = "<div class='alert alert-danger'><strong>Error !</strong> Email address already exist!</div>";
			return $msg;
		}
		
		$sql = "INSERT INTO registration(fname, lname, phone, email, password) VALUES(:fname, :lname, :phone, :email, :password)";
		$query = $this->db->pdo->prepare($sql) ;
		$query->bindValue(':fname',$fname);
		$query->bindValue(':lname',$lname);
		$query->bindValue(':phone',$phone);
		$query->bindValue(':email',$email);
		$query->bindValue(':password',$password);
		$result = $query->execute();
		if($result){
			$msg = "<div class='alert alert-success'><strong>Thank you !</strong> , you have been registered.</div>";
			return $msg;
		}else{
			$msg = "<div class='alert alert-danger'><strong>Sorry !</strong> There has been problem inserting details!</div>";
			return $msg;
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
		$sql = "SELECT email FROM registration WHERE email = :email";
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
		$sql = "SELECT * FROM registration WHERE email = :email AND password =  :password ";
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
	public function insertFamily($data){
		$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "db_home";

			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
				
		$districts = $data['district'];		
		$upozillas = $data['uponame'];		
		$regions = $data['region'];
		$ranges = $data['range'];
		$descriptions = $data['description'];
		$mobiles = $data['mobile'];
		$emails = $data['email'];
		$user_ids = $this->getUserId();	
		
		$sql = "INSERT INTO family(districts, upozillas, regions, ranges, descriptions, mobiles, emails, user_ids) VALUES ('$districts', '$upozillas', '$regions', '$ranges', '$descriptions','' '$mobiles', '$emails', '$user_ids')";
		$result = $conn->query($sql) === TRUE;
		if ($result){
			$msg = "<div class='alert alert-success'>Data has been Inserted</div>";
			return $msg;
		}else{
			$msg = "Error: " . $sql . "<br>" . $conn->error;;
			return $msg;
		}
				
		
	}
	public function insertStudent($data){
		$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "db_home";

			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
				
		$districts = $data['district'];		
		$upozillas = $data['uponame'];		
		$regions = $data['region'];
		$ranges = $data['range'];
		$descriptions = $data['description'];
		$genders = $data['gender'];
		$mobiles = $data['mobile'];
		$emails = $data['email'];
		$user_ids = $this->getUserId();	
		
		$sql = "INSERT INTO student(districts, upozillas, regions, ranges, descriptions, genders, mobiles, emails, user_ids) VALUES ('$districts', '$upozillas', '$regions', '$ranges', '$descriptions', '$genders', '$mobiles', '$emails', '$user_ids')";
		
		$result = $conn->query($sql) === TRUE;
		if ($result){
			$msg = "<div class='alert alert-success'>Data has been Inserted</div>";
			echo $msg;
		}else{
			$msg = "Error: " . $sql . "<br>" . $conn->error;;
			echo $msg;
		}
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
	

	public function readById($id){
			$user_id = $this->getUserId();
			$sql = "SELECT * FROM family WHERE id=:id AND user_id = '$user_id'";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':id', $id);
			$query->execute();
			return $query->fetch();
	}
	public function Delete_id($id){
			$sql ="DELETE FROM family WHERE id=:id";
			$query = $this->db->pdo->prepare($sql) ;			
			$query->bindValue(':id', $id);	
			return $query->execute();
			
		}
		
		public function Delete_student($id){
			$sql ="DELETE FROM student WHERE id=:id";
			$query = $this->db->pdo->prepare($sql) ;			
			$query->bindValue(':id', $id);	
			return $query->execute();
			
		}
}
?>
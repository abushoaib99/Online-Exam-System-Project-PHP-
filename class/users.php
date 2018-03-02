<?php
session_start();
class users{
	public $host="localhost";
	public $username="root";
	public $pass="";
	public $db_name="online_quiz";
	public $conn;
	public $data;
	public $cat;
	public $qus;
	public $fm;
	public $db;
	public $rem_cat;
	
	public function __construct()
	{
		$this->conn=new mysqli($this->host,$this->username,$this->pass, $this->db_name);
		if($this->conn->connect_errno)
		{
			die("database connection failed".$this->conn->connect_errno);
		}
	}
	
	public function signup($data)
	{
		$this->conn->query($data);
		return true;
	}
	
	public function signin($email,$pass)
	{
		$query=$this->conn->query("select email,pass,status from signup where email='$email' and pass='$pass'");
		$row=$query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0)
		{
			$_SESSION['email']=$email;
			return $row;
		}
		else
		{
			return false;
		}
	}
	
	public function users_profile($email)
	{
		$query=$this->conn->query("select * from signup where email='$email'");
		$row=$query->fetch_array(MYSQLI_ASSOC);
		
		if($query->num_rows>0)
		{
			$this->data[]=$row;
		}
		return $this->data;
	}
	
	public function users_profile_foruser()
	{
		$query=$this->conn->query("select * from signup");
		while($row=$query->fetch_array(MYSQLI_ASSOC))
		{
			if($query->num_rows>0)
			{
				$this->data[]=$row;
			}
		}
		
		return $this->data;
	}
	
	public function users_profile_foradmin()
	{
		$query=$this->conn->query("select * from admin");
		while($row=$query->fetch_array(MYSQLI_ASSOC))
		{
			if($query->num_rows>0)
			{
				$this->data[]=$row;
			}
		}
		
		return $this->data;
	}
	
	public function cat_show()
	{
		$query=$this->conn->query("select * from category");
		while($row=$query->fetch_array(MYSQLI_ASSOC))
		{
			if($query->num_rows>0)
			{
				$this->cat[]=$row;
			}
		}
		return $this->cat;
	}
	
	public function qus_show($qus)
	{
		
		$query=$this->conn->query("select * from question where cat_id='$qus'");
		while($row=$query->fetch_array(MYSQLI_ASSOC))
		{
			if($query->num_rows>0)
			{
				$this->qus[]=$row;
			}
		}
		return $this->qus;
	}
	
	public function answer($data)
	{
		$ans=implode("",$data);
		$right=0;
		$wrong=0;
		$no_answer=0;
		$query=$this->conn->query("select id,answer from question where cat_id='".$_SESSION['cat']."'");
		while($qust=$query->fetch_array(MYSQLI_ASSOC))
		{
			if($qust['answer']===$_POST[$qust['id']])
			{
				$right++;
			}
			
			elseif($_POST[$qust['id']]==="no_attempt")
			{
				$no_answer++;
			}
			else
			{
				$wrong++;
			}
		}
		$array=array();
		$array['right']=$right;
		$array['wrong']=$wrong;
		$array['no_answer']=$no_answer;
		return $array;
	}
	
	public function add_quiz($rec)
	{
		$add=$this->conn->query($rec);
		return true;
		
	}
	
	public function add_category($catrec)
	{
		$addcat=$this->conn->query($catrec);
		return true;
		
	}
	
	public function disableUser($userid)
	{
		
		
		$que=$this->conn->query("select status from signup where id='$userid'");
		$row=$que->fetch_array(MYSQLI_ASSOC);
		if($row['status']==1)
		{
			$query=$this->conn->query("update signup set status='2' where id='$userid'");
		}
		else
		{
			$query=$this->conn->query("update signup set status='1' where id='$userid'");
		}			
		if($query)
		{
			$msg=$row['status'];
			return $msg;
		}
		
	}
	
	public function disableAdmin($userid)
	{
		
		
		$que=$this->conn->query("select status from admin where id='$userid'");
		$row=$que->fetch_array(MYSQLI_ASSOC);
		if($row['status']==1)
		{
			$query=$this->conn->query("update admin set status='2' where id='$userid'");
		}
		else
		{
			$query=$this->conn->query("update admin set status='1' where id='$userid'");
		}			
		if($query)
		{
			$msg=$row['status'];
			return $msg;
		}
		
	}
	
	public function add_admin($data)
	{
		$this->conn->query($data);
		return true;
	}
	public function adminsignin($email,$pass)
	{
		$query=$this->conn->query("select email,pass,status from admin where email='$email' and pass='$pass'");
		$row=$query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0)
		{
			$_SESSION['email']=$email;
			return $row;
		}
		else
		{
			return false;
		}
	}
	
	
	public function adminEmail($email)
	{
		$query=$this->conn->query("select email from admin where email='$email'");
		$row=$query->fetch_array(MYSQLI_ASSOC);
		
		return $row['email'];
	}
	
	
	
	public function url($url)
	{
		header("location:".$url);
	}
	
	
}
?>
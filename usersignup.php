<?php

class SignUp extends Connection{
	

	public function __construct($params){

		$this->params['freeusername'] = $params['freeusername'];
		$this->params['freelastname'] = $params['freelastname'];
		$this->params['freeemail'] = $params['freeemail'];
		$this->params['freepass']  = $params['freepass'];
		$this->params['premiumfirstname'] = $params['premiumfirstname'];
		$this->params['premiumlastname'] = $params['premiumlastname'];
		$this->params['premiumemail'] = $params['premiumemail'];
		$this->params['premiumpass'] = $params['premiumpass'];
 	}

	public function UserExists(){
		$sql = "SELECT * FROM `free_user` where `freeemail`= '".$this->params['freeemail']."'" ;
		$result = mysqli_query($this->connect(),$sql);

		if(!$result)
		{
			die("Error in query:".mysqli_error($this->connect())) ;
		}

		if(mysqli_num_rows($result) > 0)
		{
			return 0;
		} else{
			return 1;

		}
	}


	public function Signin(){
	   if($this->UserExists() == 1)
	   {
	   	 $sql = "INSERT INTO `free_user`(`freeusername`,`freelastname`,`freepass`,`freeemail`)
	   	         VALUES('".$this->params['freeusername']."', '".$this->params['freelastname']."', '"
	   	         .$this->params['freepass']."', '".$this->params['freeemail']."')" ;
	   	 $result = mysqli_query($this->connect(),$sql);
        
	   	   if(!$result)
		    {
			die("Error in query:".mysqli_error($this->connect())) ;
		    }
		   	 
	   }
	   else{
	   	 echo "User already exists";
	   }
		
	}
}


?>
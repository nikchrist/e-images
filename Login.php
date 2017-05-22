<?php

class Login extends Connection
{
	private $conn;
	public  function __construct($params){
		$this->params["confemail"] = $params['confemail'];
		$this->params["confpass"] = $params['confpass'];
		$this->params["confpremiumemail"] = $params['confpremiumemail'];
		$this->params["confpremiumpass"] = $params['confpremiumpass'];
	}


		public function login(){

			if($this->params['confemail'] !="" && $this->params['confpass'] != "")
			{
				$this->conn = $this->connect();

				$stmt = $this->conn->prepare("SELECT * FROM `free_user` WHERE  `freeemail` = ?");
				$stmt->bind_param('s',$this->params["confemail"]);
                $stmt->execute();
				if(!$stmt->execute())
				{
					echo $stmt->error;
				} else {
                    $result = $stmt->get_result();
					while($row = $result->fetch_assoc())
					{
						if($row['freeemail'] == $this->params['confemail'] 
						   && hash_equals($row['freepass'],
						   crypt($this->params['confpass'],$row['freepass'])))
						{
							$_SESSION['freeusername'] = $row['freeusername'];
							$_SESSION['freelastname'] = $row['freelastname'];
							$_SESSION['freeemail'] = $row['freeemail'];
							$_SESSION['freeid'] = $row['freeid'];
							
						} else {
							echo "User does not exist";
							?>
							<a href="index.php">GO BACK</a>
							<?php
						  }
					}
				 }
			}

			$stmt->close();
			mysqli_close($this->conn);
			
		}
	
}

?>
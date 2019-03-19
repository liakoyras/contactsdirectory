<?php
Class Connection {
	
	private  $server = "mysql:host=localhost;dbname=contactdirectory;charset=utf8";
	private $user = "admin";
	private $pass = "password";
	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES, false);
	
	protected $connection;
 
    public function openConnection(){
    	try{
			
			$this->connection = new PDO($this->server, $this->user,$this->pass,$this->options);
			
          	return $this->connection;
			
            }catch(PDOException $error){
			
                     echo "<p id='connerror'>An error has occured.<br>Please contact us.<br>Error code: </p>" . $error->getMessage();
             }
 	}
	
	public function closeConnection() {
    	$this->connection = null;
  	}
}
?>
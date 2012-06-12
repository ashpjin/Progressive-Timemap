<?php
class phpToJs{
	
	//connection information
	private $database;	// twitter
	private $username;	// root
	private $password;	// adam17
	private $host;		// localhost

	// db connection
	private $conn;

	// open the db connection
	public function __construct($sethost, $setuser, $setpass, $setdatabase){
		
		$this->host = $sethost;
		$this->username = $setuser;
		$this->password = $setpass;
		$this->database = $setdatabase;

		$this->conn = mysql_connect($this->host, $this->username, $this->password)
			or die('ERROR: Could not connect to host: ' . mysql_error());
		
		mysql_select_db($this->database)
			or die ('ERROR: Could not enter database.');
	}

	// close the db connection
	public function __destruct() {
		mysql_close($this->conn);
	}

	// want to get all data in time range. NOT all data at once
	// this function is used in "run-script" which was for testing purposes.
	public function getTweetsInRange($beginLimit, $endLimit){
		$query = "SELECT message_text, longitude, latitude, created FROM messages WHERE longitude != 0 AND latitude != 0;";
		$res = mysql_query($query);
	/*	while($db_field = mysql_fetch_assoc($res)){
			echo $db_field['message_text'] . "\n";
		}*/
		/* get longitude and latitudes NOT NULL
			created at (time/date)
			message text */



		if(!$res) {
			echo "ERROR (Query): " . mysql_error() . "\n";
			return false;
		}
		else {
			/** testing **/
			return $res; 
			// do something with result
			// change to js readable format
		}
	}


        // used in the array generator and the progressive loader
        public function getTweetsInInterval($beginLimit, $endLimit){
                $query = "SELECT message_text_clean, longitude, latitude, created FROM search_result WHERE longitude != 0 AND latitude != 0 AND created > " . $beginLimit . " AND created < " . $endLimit . " LIMIT 25;";
                $res = mysql_query($query);

                if(!$res) {
                        echo "ERROR (Query): " . mysql_error() . "\n";
                        return false;
                }
                else { return $res; }
        } 

}
?>

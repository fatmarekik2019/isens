<?php
#######################################################################################
# Class Name : PHP-MySQL Class
# Author : Antoine Bourget
# Last Mofidy Date : 06-05-2009
# Contact
# 	E-Mail : Zubi@supinfo.com
#######################################################################################
# Function List
# 	1.connection	 -->	function connection()
# 	2.disconnect	 -->	function disconnect()
# 	3.insert		 -->	function insert($tb_name,$cols,$val,$astriction)
# 	4.update		 -->	function update($tb_name,$string,$astriction)
# 	5.delete		 -->	function del($tb_name,$astriction)
# 	6.query			 -->	function query($string)
#	7.assoc		 	 -->	function assoc($string="",$qid="")
# 	8.num_rows		 -->	function nums($string="",$qid="")
# 	9.objects		 -->	function objects($string="",$qid="")
#	10.qarray		 -->	function qarray($string="",$qid="")
# 	11.insert_id	 -->	function insert_id($qid="")
#	12.quote_smart	 -->	function quote_Smart($value)
#	13.format_Args	 -->	function format_Args([arguments]...) 
#	14.rand_str		 -->	function rand_str($length="", $chars="")
#######################################################################################

class mod_db{
	var $setting_file = "config.php";
	var $sql_link;
	var $db_link;
	var $query_id;
	var $serverAdresse;
	var $total;
	var $pagecut_query;
	var $conn_type = "0"; // 0: mysql_connect ; 1: mysql_pconnect
	var $debug     = "0"; // If your code can't work well just change it to 1, you can see the sql string.
	
	function connection(){
		// Check if SQL is connect or not
		if(!$this->sql_link){
			// Define SQL Variables
			if(@!$this->db_host || !$this->db_name || !$this->db_user || !$this->db_pass){
				include_once("$this->setting_file");
				global $sql_host,$sql_name,$sql_user,$sql_pass,$serverAdresse;
					$this->db_host = $sql_host;
					$this->db_name = $sql_name;
					$this->db_user = $sql_user;
					$this->db_pass = $sql_pass;
				// Define other variables
					$this->serverAdresse = $serverAdresse;
			}
			// SQL Connection
				if($this->conn_type == 0){
					$this->sql_link = mysql_connect($this->db_host,$this->db_user,$this->db_pass);
				}elseif($this->conn_type == 1){
					$this->sql_link = mysql_pconnect($this->db_host,$this->db_user,$this->db_pass);
				}

				if($this->debug == 1){
					echo "Connect to MySQL Server Success<br>ServerHost=$this->db_host<br>";
				}

				if(!$this->sql_link){
					echo "Connect to mysql Server Error";
				}


			// Select Database
			$this->db_link = mysql_select_db($this->db_name);
			
			if($this->debug == 1){
				echo "Connect to MySQL DB:$this->db_name Success<br>";
			}

			if(!$this->db_link){
				echo "Connect to DB Error , DBName = $this->db_name";
			}

			mysql_query("SET NAMES 'utf8'");

			return;
		}else{
			exit;
		}
	}

	function disconnect(){
		if($this->debug == 1){
			echo "Disconnect to MySQL Server<br>";
		}
		mysql_close($this->sql_link);
	}

	function insert($tb_name,$cols,$val,$astriction=""){
		if(empty($this->sql_link)){
			$this->connection();
		}

		// Check cols is empty or not
		if(!$cols){
			$cols = "";
		}elseif($cols != ""){
			$cols = "(".$cols.")";
		}

		// Check astriction is empty or not
		if(!$astriction){
			$ast = "";
		}elseif($astriction != ""){
			$ast = " WHERE ".$astriction;
		}
		
		$string = "INSERT INTO $tb_name $cols VALUES($val) $ast";

		$insert = mysql_query($string,$this->sql_link);
			
		if($this->debug == 1){
			echo "Insert String = Insert into $tb_name $cols Values($val) $ast<br>";
			echo mysql_error();
			if(!$insert){
				echo "<script>alert('Unable to Perform the insert:$string');</script>";
				return false;
			}
		}

		return $insert;
	}

	function insertMultiple($tb_name,$cols,$val,$astriction=""){
		if(empty($this->sql_link)){
			$this->connection();
		}

		// Check cols is empty or not
		if(!$cols){
			$cols = "";
		}elseif($cols != ""){
			$cols = "(".$cols.")";
		}

		// Check astriction is empty or not
		if(!$astriction){
			$ast = "";
		}elseif($astriction != ""){
			$ast = " WHERE ".$astriction;
		}

		$values = array();
		foreach($val as $row) {
			$values[] = '('.implode(',', $row).')';
		}

		$string = "INSERT INTO $tb_name $cols VALUES ".implode(',', $values)." $ast";

		$insert = mysql_query($string,$this->sql_link);
			
		if($this->debug == 1){
			echo "Insert String = \"$string\"<br>";
			echo mysql_error();
			if(!$insert){
				echo "<script>alert('Unable to Perform the insert:$string');</script>";
				return false;
			}
		}

		return $insert;
	}

	function update($tb_name,$string,$astriction){
		if(empty($this->sql_link)){
			$this->connection();
		}

		// Check astriction is empty or not
		if(!$astriction){
			$ast = "";
		}elseif($astriction != ""){
			$ast = " WHERE ".$astriction;
		}
		
		$update = mysql_query("UPDATE $tb_name SET $string $ast",$this->sql_link);
		
		if($this->debug == 1){
			echo "Update String = Update $tb_name Set $string $ast<br>";
			if(!$update){
				echo "'<script>alert('Update Data Error');</script>";
			}
		}

		return $update;
	}

	function del($tb_name,$astriction){
		if(empty($this->sql_link)){
			$this->connection();
		}

		// Check astriction is empty or not
		if(!$astriction){
			$ast = "";
		}elseif($astriction != ""){
			$ast = " WHERE ".$astriction;
		}
		$del = mysql_query("DELETE FROM $tb_name $ast",$this->sql_link);

		if($this->debug == 1){
			echo "Delete String = Delete From $tb_name $ast<br>";
			if(!$del){
				echo "<script>alert('Delete Data Error');</script>";
			}
		}

		return $del;
	}

	function query($string)
	{
		if(empty($this->sql_link))
			$this->connection();

		$this->query_id = mysql_query($string,$this->sql_link);

		if($this->debug == 1) {
			echo "Query String = $string <br>";
			if(!$this->query_id)
				echo "<script>alert('Unable to Perform the query:$string');</script>";
		}

		return $this->query_id;

	}
	
	function farray($string="", $qid="")
	{
		$this->array_result = array();
		if($string != "")
		{
			$this->query($string);
			while ($data = mysql_fetch_array($this->query_id)) 
			{
				array_push($this->array_result, $data);	
			}
		}
		elseif($qid != "")
		{
			while ($data = mysql_fetch_array($qid)) 
			{
				array_push($this->array_result, $data);	
			}
		}
		elseif(empty($string) && empty($qid))
		{
			while ($data = mysql_fetch_array($this->query_id)) 
			{
				array_push($this->array_result, $data);	
			}
		}
		return $this->array_result;
	}
	
	function assoc($string="", $qid="")
	{
		$this->assoc_result = array();
		if($string != "")
		{
			$this->query($string);
			while ($data = mysql_fetch_assoc($this->query_id)) 
			{
				array_push($this->assoc_result, $data);	
			}
		}
		elseif($qid != "")
		{
			while ($data = mysql_fetch_assoc($qid)) 
			{
				array_push($this->assoc_result, $data);	
			}
		}
		elseif(empty($string) && empty($qid))
		{
			while ($data = mysql_fetch_assoc($this->query_id)) 
			{
				array_push($this->assoc_result, $data);	
			}
		}
		return $this->assoc_result;
	}

	function nums($string="",$qid="")
	{
		if($string != ""){
			$this->query($string);
			$this->total = mysql_num_rows($this->query_id);
		}elseif($qid != ""){
			$this->total = mysql_num_rows($qid);
		}elseif(empty($string) && empty($qid)){
			$this->total = mysql_num_rows($this->query_id);
		}
		if($this->debug == 1){
			echo "Number = ".$this->total."<br>";
		}
		return $this->total;
	}

	function objects($string="",$qid=""){
		if($string != ""){
			$this->query($string);
			$objects = mysql_fetch_object($this->query_id);
				if($this->debug == 1){
					echo "qid = ".$qid."<br>";
					//echo "obj = ".$objects."<br><br>";
				}
		}elseif($qid != ""){
			$objects = mysql_fetch_object($qid);
				if($this->debug == 1){
					echo "qid = ".$qid."<br>";
					echo "obj = ".$objects."<br><br>";
				}
		}elseif(empty($string) && empty($qid)){
			$objects = mysql_fetch_object($this->query_id);
				if($this->debug == 1){
					echo "qid = ".$qid."<br>";
					echo "obj = ".$objects."<br><br>";
				}
		}
		return $objects;
	}
	
	function insert_id($qid=""){
		if($qid){
			$insert_id = mysql_insert_id($qid);
		}elseif(!$qid){
			$insert_id = mysql_insert_id();
		}
		
		//if($this->debug == 1){
		//	echo "Insert ID = ".$insert_id."<br>";
		//}
		return $insert_id;
	}
	
	function quote_smart($value){
		if(empty($this->sql_link))
			$this->connection();
			
	    if (get_magic_quotes_gpc())
	    {
	        $value = stripslashes($value);
	    }
	    if ($value == '')
	    {
	        $value = 'NULL';
	    }
	    if (!is_numeric($value) || $value[0] == '0')
	    {
	        $value = "'".mysql_real_escape_string($value)."'";
	    }
	    return $value;
	}
	
	function format_Args()
	{
		$_return = "";
		$myArgs = func_get_args();
		
		// pour chaque arguments on ajoute la chaine ", " 
		for($i=0; $i < func_num_args(); $i++)
		{
			$_return .= $myArgs[$i].", ";
		}
		
		// on coupe les deux derniers charactères de la chaine
		$_return = substr($_return, 0, -2);
		
		return $_return;
	}
	
	function rand_str($length = 32, $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789')
	{
		// Length of character list
		$chars_lenght = (strlen($chars) - 1);
		
		// Start string
		$string = $chars{rand(0, $chars_lenght)};
		
		// Generate random string
		for($i = 1; $i < $length; $i = strlen($string))
		{
			// Get a random character
			$r = $chars{rand(0, $chars_lenght)};
			
			// Make sure the same two characters don't appear next to each other
			if($r != $string{$i - 1}) 
				$string .= $r;
		}
		return $string;
	}
}
?>
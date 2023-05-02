<?php

class Database{

		private $db_host = "localhost";  // Change as required
		private $db_user = "root";       // Change as required
		private $db_pass = "";   // Change as required
		private $db_name = "news_site";   // Change as required

		private $result = array(); // Any results from a query will be stored here
		private $mysqli = ""; // This will be our mysqli object
		private $myQuery = "";// used for debugging process with SQL return

		private $conn = false;

		public function __construct(){

			if(!$this->conn){

                
				$this->mysqli = new PDO("mysql:host=$this->db_host;dbname=$this->db_name",$this->db_user,$this->db_pass);
                $this->mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				// Check connection
				if ($this->mysqli->errorCode()) {
				 	array_push($this->result,$this->mysqli->errorCode());
	                return false; // Problem selecting database return FALSE
				}

			}else{
				return true;
			}
		}


		// Function to insert into the database
    public function insert($table,$params=array()){
    	// Check to see if the table exists
    	 if($this->tableExists($table)){

    	 	$table_columns = implode('`,`',array_keys($params));
    	 	$table_value =implode("', '", $params);
    	 	// echo $arr_value; exit;

				$sql="INSERT INTO $table (`$table_columns`) VALUES ('$table_value')";

    	 	$this->myQuery = $sql; // Pass back the SQL
          // Make the query to insert to the database
          if($this->mysqli->query($sql)){
          	array_push($this->result,$this->mysqli->lastInsertId());
              //return true; // The data has been inserted
          }else{
          	array_push($this->result,$this->mysqli->errorCode());
              return false; // The data has not been inserted
          }
        }else{
        	return false; // Table does not exist
        }
    }

    // Function to update row in database
    public function update($table,$params=array(),$where = null){
    	if($this->tableExists($table)){
	        $args=array();
					foreach($params as $key=>$value){
						$args[]="`$key`='$value'";
					}
					$sql="UPDATE `$table` SET " . implode(',',$args);
					if($where != null){
		                $sql .= " WHERE $where";
					}

					$this->myQuery = $sql; 
          if($query = $this->mysqli->query($sql)){
          	array_push($this->result,$query->rowCount());
          	return true; 
          }else{
          	array_push($this->result,$this->mysqli->errorCode());
              return false; 
          }
        }else{
            return false;
        }
    }

		//Function to delete table or row(s) from database
    public function delete($table,$where = null){
    	 if($this->tableExists($table)){
          $sql = "DELETE FROM $table"; 
         	if($where != null){
	        	$sql .= " WHERE $where";
					}
          if($stmt=$this->mysqli->query($sql)){
          	array_push($this->result,$stmt->rowCount());
              return true; 
          }else{
          	array_push($this->result,$this->mysqli->errorCode());
             	return false; 
          }
        }else{
            return false; 
        }
    }

  // Function to SELECT from the database
	public function select($table, $rows = '*', $join = null, $where = null, $order = null, $limit = null){
		// Check to see if the table exists
    if($this->tableExists($table)){ 
			// Create query from the variables passed to the function
			$sql = "SELECT $rows FROM  `$table` ";
			if($join != null){
				$sql .= ' JOIN '.$join;
			}
	    if($where != null){
	    	$sql .= ' WHERE '.$where;
			}
	    if($order != null){
	        $sql .= ' ORDER BY '.$order;
			}
	    if($limit != null){
	    	  if(isset($_GET["page"])){
			    	$page = $_GET["page"];
					}
					else{
					  $page = 1;
					}
					$start = ($page-1) * $limit;

	        $sql .= ' LIMIT '.$start.','.$limit;
	    } 
			
	    	// The table exists, run the query
	    	$query = $this->mysqli->query($sql);   

				if($query){
					$this->result = $query->fetchAll();
					return true; // Query was successful
				}else{
					array_push($this->result,$this->mysqli->errorCode());
					return false; // No rows where returned
				}
    }else{
    	return false; // Table does not exist
  	}
  }

  public function pagination($table, $join = null, $where = null, $limit,$address=null){
    // Check to see if table exists
    if($this->tableExists($table)){
        //If no limit is set then no pagination is available
        if( $limit != null){
            // select count() query for pagination
      $sql = " SELECT COUNT(*) FROM $table ";
      if($join != null){
        $sql .= " JOIN $join ";
    }
      if($where != null){
            $sql .= " WHERE $where";
              }
              
             // echo $sql; exit;
        $query = $this->mysqli->query($sql);
      
        $total_record = $query->fetch(PDO::FETCH_NUM);
        $total_record = $total_record[0];
        $total_page = ceil( $total_record / $limit);

      $url = basename($_SERVER['PHP_SELF']);

          if(isset($_GET["page"])){
                  $page = $_GET["page"];
                  }
                  else{
                    $page = 1;
                  }

      // show pagination
      $output =   "<ul class='pagination'>";
      if($page>1){
          $output .="<li><a href='$url?{$address}page=".($page-1)."' class='page-link'>Prev</a></li>";
      }
      if($total_record > $limit){
        for ($i=1; $i<=$total_page ; $i++) {
          if($i == $page){
             $cls = "class='active'";
          }else{
             $cls = '';
          }
            $output .="<li $cls><a class='page-link' href='$url?{$address}page=$i'>$i</a></li>";
        }
      }
      if($total_page>$page){
        $output .="<li> <a class='page-link' href='$url?{$address}page=".($page+1)."'>Next</a></li>";
      }
      $output .= "</ul>";

      return $output;
        }

    }else{
      return false; // Table does not exist
    }
}
	

	// Private function to check if table exists for use with queries
	private function tableExists($table){
		$tablesInDb = $this->mysqli->query("SHOW TABLES FROM  $this->db_name LIKE '$table'");
        if($tablesInDb){
        	if($tablesInDb->rowCount() == 1){
                return true; // The table exists
            }else{
            	array_push($this->result,$table." does not exist in this database");
                return false; // The table does not exist
            }
        }
    }
	   
    // Public function to return the data to the user
    public function getResult(){
        $val = $this->result;
        $this->result = array();
        return $val;
    }

    // Escape your string
    public function realEscapeString($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data= $this->mysqli->quote($data);
        return substr($data, 1, -1);
    }

     //Pass the SQL back for debugging
     public function getSql(){
        $val = $this->myQuery;
        $this->myQuery = array();
        return $val;
    }

    // close connection
		public function __destruct(){
			if($this->conn){
				if($this->mysqli->close()){
					$this->conn = false;
					return true;
				}else{
					return false;
				}
			}
		}
	}


?>
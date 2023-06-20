<?php 
    class dbConnect {  
        private $db;
        function __construct() { 
            $DB_HOST='localhost';  
            $DB_USER='root';  
            $DB_PASSWORD='';  
            $DB_DATABSE='library';   
                $this->db=new PDO("mysql:host={$DB_HOST};dbname={$DB_DATABSE}",$DB_USER,$DB_PASSWORD); 
                if(!$this->db)// testing the connection  
                {  
                    echo "Cannot connect to the database";  
                }      
        }  
        public function isUserExist($email,)
        {
            try {
                $sql = "SELECT * FROM `user` WHERE `Email`=?";
                $query = $this->db->prepare( $sql );
                $query->execute( array($email));
                $results = $query->fetchAll();
                if(count($results) > 0)
                {
                    return true;
                }
                else{
                    return false;
                }
            } catch (PDOException $e) {
                echo "There is some problem in connection: " . $e->getMessage();
            }
        } 
        public function admin($email, $password)
        {
            try {
                $sql = "SELECT * FROM `user` WHERE `Email`= ? AND `Admin`=1";
                $query = $this->db->prepare( $sql );
                $query->execute( array($email));
                $results = $query->fetchAll(PDO::FETCH_ASSOC);
                if($results)
                {
                    if(password_verify($password,$results[0]["Password"]))
                    {
                        return true;
                    }
                }
                else{
                    return false;
                }
            } catch (PDOException $e) {
                echo "There is some problem in connection: " . $e->getMessage();
            }
        } 
        public function signin($email, $password)
        {
            session_start();
            try {
                $sql = "SELECT * FROM `user` WHERE `Email`= ?";
                $query = $this->db->prepare( $sql );
                $query->execute( array($email));
                $results = $query->fetchAll(PDO::FETCH_ASSOC);
                if($results)
                {
                    if(password_verify($password,$results[0]["Password"]))
                    {
                        $_SESSION["email"]=$results[0]["Email"];
                        $_SESSION["admin"]=$results[0]["Admin"];
                        return true;
                    }
                }
                else{
                    return false;
                }
            } catch (PDOException $e) {
                echo "There is some problem in connection: " . $e->getMessage();
            }
        } 
        public function signup($name,$password,$adresse,$email)
        {
            try {
                $pass=password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `user`(`Name`, `Password`, `Admin` , `Address`, `Email` ,`Penalty_Count`) VALUES (?,?,?,?,?,?)";
                $query = $this->db->prepare( $sql );
                $query->execute( array($name,$pass,0,$adresse,$email,0));
                return $query;
            } catch (PDOException $e) {
                echo "There is some problem in connection: " . $e->getMessage();
            }
        } 
        public function logout() {
            session_start();
            session_destroy();
            header("Location: signin.php");
            exit();
        }
        public function Insert($table, $data) {
            $columns = implode(', ', array_keys($data));
            $placeholders = implode(', ', array_fill(0, count($data), '?'));
            $query="INSERT INTO $table ($columns) VALUES ($placeholders)";
            $stmt = $this->db->prepare($query);
            $stmt->execute(array_values($data));
            $lastInsertId = $this->db->lastInsertId();
            return $lastInsertId;

        }
        public function Updat($table, $data,$id, $idname) {
            $columns = array();
            $values = array();
            foreach ($data as $key => $value) {
                $columns[] = $key . ' = ?';
                $values[] = $value;
            }
            $values[] = $id;
            $sql = 'UPDATE ' . $table . ' SET ' . implode(', ', $columns) . ' WHERE '.$idname .' = ?';
            $stmt = $this->db->prepare($sql);
            $stmt->execute($values);
            return $stmt;
        }
        public function Delete($table,$idname, $id) {
            $sql = "DELETE FROM $table WHERE  $idname = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            return $stmt;
        }
        public function Select($table, $rows="*", $where=null) {
            $params = array();
            $query = "SELECT $rows FROM $table";
            if ($where != null) {
                $query .= " WHERE $where";
            }
            $stmt = $this->db->prepare($query);
            $stmt->execute($params);
            $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return array(
                'query'=> $query,
                'result' => $result,
            );
        }
        public function selectWithPagination($table, $rows="*", $where=null, $perPage=1) {
            $params = array();
            $query = "SELECT $rows FROM $table";
            if ($where != null) {
                $query .= " WHERE $where";
            }
            $countQuery = "SELECT COUNT(*) as count FROM $table";
            if ($where != null) {
                $countQuery .= " WHERE $where";
            }
            $countStmt = $this->db->prepare($countQuery);
            $countStmt->execute($params);
            $countResult = $countStmt->fetch(PDO::FETCH_ASSOC);
            $totalCount = $countResult['count'];
            $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
            // Calculate the offset and limit for the current page
            $offset = ($currentPage - 1) * $perPage;
            $limit = $perPage;
            $query .= " LIMIT $limit OFFSET $offset";
        
            $stmt = $this->db->prepare($query);
            $stmt->execute($params);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            // Calculate the total number of pages
            $totalPages = ceil($totalCount / $perPage);
        
            return array(
                'query'=>$query,
                'result' => $result,
                'currentpage'=>$currentPage,
                'totalCount' => $totalCount,
                'totalPages' => $totalPages
            );
        }
        
    }
?>
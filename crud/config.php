<?php

class Database{
    public  $db_host='localhost';
    public  $db_user='root';
    public  $db_pass='';
    public  $db_name='userdata';

    public $link;
    public $error;
        public function __construct(){
            $this->connectDB();
        }
        private function connectDB(){
            $this->link=mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);

            if(!$this->link){
            $this->error="connection fail".$this->link->connect_error;
            return false;
            }
        }
        public function select($query){
            $result= $this->link->query($query) or die ($this->link->error.__LINE__);
            if($result->num_rows > 0){
                return $result;
            }else {
                return false;
            }
        }
        public function inserted($insert) {
            $insert_row = $this->link->query($insert) or die ($this->link->error.__LINE__);
            if($insert_row){
                header("location:Read.php?msg=".urlencode('Data inserted successfully.!!'));
                exit();
            }else {
                die("Error : (".$this->link->errno.")".$this->link->error);
            }
        }
        public function update($updated){
            $update_row = $this->link->query($updated) or die ($this->link->error.__LINE__);
            if($update_row){
                header("location:Read.php?msg=".urlencode('Data updated successfully.!!'));
                exit();
                return false;
            }else {
                die("Error : (".$this->link->errno.")".$this->link->error);
            }
        }
        public function delete($delete){
            $delete_row = $this->link->query($delete) or die ($this->link->error.__LINE__);
            if($delete_row){
                header("location:Read.php?msg=".urlencode('Data Delete successfully.!!'));
                exit();
                return false;
            }else {
                die("Error : (".$this->link->errno.")".$this->link->error);
            }
        }
    
    
}

?>

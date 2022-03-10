<?php 

class User

{
    public function get_userdata($id)
    {
        $query = "select * from users where userid = $id limit 1";
        $DB = new Database();
        $result = $DB->read($query);
        
        if($result)
        {
            $row = $result[0];
            return $row;
        }
        else
        {
            return false;
        }
    }
    public function get_user($id)
    {
        $query = "select * from users where userid = $id limit 1";
        $DB = new Database();
        $result = $DB->read($query);
         if($result)
        {
            $row = $result[0];
            return $row;
        }
        else
        {
            return false;
        }
    }
    public function get_users($id)
    {
        $query = "select * from users where userid != $id";
        $DB = new Database();
        $result = $DB->read($query);
         if($result)
        {
        
            return  $result;
        }
        else
        {
            return false;
        }
    }
    public function get_category($id,$category)
    {
        $query = "select * from users where (userid != $id) and (category like '%$category%')" ;
        $DB = new Database();
        $result = $DB->read($query);
         if($result)
        {
        
            return  $result;
        }
        else
        {
            return false;
        }
    }
}

?>
<?php

class Login

{   
    private $error = "";


    public function evaluate($data)
    {
        
        $email = addslashes($data['email']);
        $password = addslashes($data['password']);

        $query = "select * from users where email = '$email' limit 1";

        $DB = new Database();
        $result = $DB->read($query);

        if($result)
        {
            $row = $result[0];
            if($password == $row['password'])
            {
                $_SESSION['juan4hire_userid'] =  $row['userid'];
            }else
            {
                $this->error .= "Wrong password";
            }
        }else
        {
           $this->error .= "Email is not existing";
        }
            
        return  $this->error;
    
    }

    public function check_user($id)
    {
        if(is_numeric($id))
        {
            $query = "select * from users where userid = '$id' limit 1";
            $DB = new Database();
            $result = $DB->read($query);

            if($result)
            {
                $userdata = $result[0];
                return $userdata;
            }else
            {
                header("Location:index.php");
                die;
            }
        }
        else
        {
            header("Location:index.php");   
            die;
        }

    }
}

?>
<?php

class Signup
{
    private $error = "";
    function function_alert($message) 
    { 
        echo "<script>alert('$message');</script>";
    }

    public function evaluate($data)
    {
        foreach ($data as $key => $value)
        {
            if(empty($value))
            {
                $this->error = $this->error . $key . " is empty!" ;
            }

            if($key == "email")
            {
                if (!filter_var($value, FILTER_VALIDATE_EMAIL))
                {
                    $this->error = $this->error . "invalid email address!";
                }

            }
            if($key == "first_name")
            {
                if (is_numeric($value))
                {
                    $this->error = $this->error . "names can't be a number!";
                }

            }
            if($key == "last_name")
            {
                if (is_numeric($value))
                {
                    $this->error = $this->error . "names can't be a number!";
                }

            }
            if ($key == "password")
            {   
                if(strlen($value) < 6)
                {

					$this->error = $this->error . "Password must be atleast 6 characters long";
				}
                if ($_POST['password'] != $_POST['con_password'])
               {
                {
                    $this->error = $this->error . "The password confirmation does not match";
                }
               }
            }
        }
        
        if($this->error == "")
        {
        //no error
            $this->create_user($data);
            
        }else
        {
            return $this->error;
        }
    }

    public function create_user($data)
    {
        $first_name = ucfirst($data['first_name']);
        $last_name = ucfirst($data['last_name']);
        $email = $data['email'];
        $password = $data['password'];
        $url_address = strtolower($first_name) ."." . strtolower($last_name);
        $userid = $this->create_userid();
        $category = $data['category'];

        $query = "insert into users(userid, first_name , last_name, email, password, url_address, category)
                        values('$userid','$first_name','$last_name','$email','$password','$url_address', '$category')";

        $DB = new Database();
        $DB->save($query);

    }

    private function create_userid()
    {
            $length = rand(4,19);
            $number = "";
            for ($i=0; $i < $length; $i++)
            {
                $new_rand = rand(0,9);
                $number = $number . $new_rand;
            }
            return $number;
    }
}

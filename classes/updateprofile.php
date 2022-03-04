<?php 
class EditProf
{
    private $error = "";

public function evaluate($userid, $data)
    {
        foreach ($data as $key => $value)
        {
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
        }
        if($this->error == "")
        {
        //no error
            $this->edit_user($userid , $data);
            
        }else
        {
            return $this->error;
        }
    }
        
public function edit_user($userid,$data)
    {
        $first_name = ucfirst($data['first_name']);
        $last_name = ucfirst($data['last_name']);
        $email = $data['email'];
        $category = $data['category'];
        $description = $data['description'];

        $query = "update users set 
        first_name ='$first_name', 
        last_name ='$last_name', 
        email='$email',
        category ='$category',
        description='$description'
        where userid='$userid'"; 
       
        $DB = new Database(); 
        $DB->save($query);
    
    }
}
?>
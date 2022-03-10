<?php 

class Post
{
    private $error = "";
    public function create_post($userid, $data, $files)
    {
        if(!empty($data['post']) && !empty($files['file']['name']))
        {
            $myimage = "";
            $folder = "uploads/" . $userid. "/";
            if(!file_exists($folder))
            {
                mkdir($folder,8777,true);
            }
            $image_class = new Image();
            $myimage = $folder . $image_class->generate_filename(15).".jpg";
            move_uploaded_file($_FILES['file']['tmp_name'],$myimage);
            $post = addslashes($data['post']);
            $postid = $this->create_postid();
            $query = "insert into posts(userid,postid,post,image) values('$userid','$postid','$post','$myimage')";
            $DB = new Database();
            $DB->save($query);
            
        }
        else
        {
            function_alert("You need to post a photo with description.");
        }
  
            return $this->error;
    }

    public function get_posts($id)
    {
        $query = "select * from posts where userid = '$id' order by id desc limit 10";
        $DB = new Database();
        $result = $DB->read($query);

        if($result)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }
    public function get_one_post($postid)
    {

        if(!is_numeric($postid))
        {
            return false;
        }
        $query = "select * from posts where postid = '$postid' limit 1";
        $DB = new Database();
        $result = $DB->read($query);

        if($result)
        {
            return $result[0];
        }
        else
        {
            return false;
        }
    }
    public function delete_post($postid)
    {

        if(!is_numeric($postid))
        {
            return false;
        }
        $query = "delete from posts where postid = '$postid' limit 1";
        $DB = new Database();
        $DB->save($query);
        
    }

    private function create_postid()
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


?>


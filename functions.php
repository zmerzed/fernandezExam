<?php 

session_start();

function pathUrl($dir = __DIR__){

    $root = "";
    $dir = str_replace('\\', '/', realpath($dir));

    //HTTPS or HTTP
    $root .= !empty($_SERVER['HTTPS']) ? 'https' : 'http';

    //HOST
    $root .= '://' . $_SERVER['HTTP_HOST'];

    //ALIAS
    if(!empty($_SERVER['CONTEXT_PREFIX'])) {
        $root .= $_SERVER['CONTEXT_PREFIX'];
        $root .= substr($dir, strlen($_SERVER[ 'CONTEXT_DOCUMENT_ROOT' ]));
    } else {
        $root .= substr($dir, strlen($_SERVER[ 'DOCUMENT_ROOT' ]));
    }

    $root .= '/';

    return $root;
}


function dd($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

function login($data) 
{
    $mysqli = new mysqli("localhost", "root","","remz");

    if ($mysqli->connect_error) {
       die("Connection failed: " . $mysqli->connect_error);
    } 

    $result = $mysqli->query("SELECT * from users where email='{$data['email']}' and password='{$data['password']}'");
    $user = $result->fetch_object();
    if ($user) {
        $_SESSION['user'] = $user;

        return true;
    }

    $mysqli->close();

    return false;
}

function register($data)
{
     // Create connection
     $mysqli = new mysqli("localhost", "root","","remz");

     // validations 
    $result = $mysqli->query("SELECT * from users where email='{$data['email']}' OR username='{$data['username']}'");

    if ($result->fetch_object()) {
        return false;
    }

     // Check connection
     if ($mysqli->connect_error) {
        header('Location: ' . pathUrl() . 'logout.php');
     } 

     $sql = "INSERT INTO users (username, email, password) VALUES ('{$data['username']}', '{$data['email']}', '{$data['password']}')";

     if (mysqli_query($mysqli, $sql)) {

        $newRegistered = $mysqli->query("SELECT * from users where email='{$data['email']}' LIMIT 1");

        if ($newRegistered->fetch_object()) {
            $_SESSION['user'] = $newRegistered->fetch_object();
            header('Location: ' . pathUrl());
        }
       // echo "New record created successfully";
     } else {
        echo "Error: " . $sql . "" . mysqli_error($mysqli);
     }


     $mysqli->close();
}

function newPost($data, $userId) 
{
    $mysqli = new mysqli("localhost", "root","","remz");

    $createdBy = (int) $userId;
    $title = $data['title'];
    $content = $data['content'];
    $createdAt = date("Y-m-d H:i:s");

    $sql = "INSERT INTO posts (user_id, title, content, created_at) VALUES ({$createdBy}, '{$title}', '{$content}', '{$createdAt}')";
    
    if ($mysqli->query($sql) === TRUE) {
        header('Location: ' . pathUrl());
    } 
    
    return false;
}


function posts()
{
    $mysqli = new mysqli("localhost", "root","","remz");

    if ($mysqli->connect_error) {
       die("Connection failed: " . $mysqli->connect_error);
    } 

    $result = $mysqli->query("SELECT posts.id, posts.title, posts.content, posts.created_at, users.username, users.id as user_id FROM posts, users WHERE posts.`user_id` = users.`id` ORDER by id desc");
    if (mysqli_num_rows($result) > 0) {
       // dd(mysqli_fetch_all($result,MYSQLI_ASSOC));

        $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
        
        foreach ($posts as $key => $val) {
            $comments = [];
            
            $posts[$key]['comments'] = getPostComments($val['id']);
        }
    
        return $posts;
    }
    return [];
}

function getPost($postId) 
{
    $mysqli = new mysqli("localhost", "root","","remz");

    if ($mysqli->connect_error) {
       die("Connection failed: " . $mysqli->connect_error);
    } 

    $result = $mysqli->query("SELECT * from posts where id={$postId}");
    $post = $result->fetch_assoc();

    if ($post) {
        $mysqli->close();
        return $post;
    }

    return NULL;
}

function getPostComments($postId)
{
    $mysqli = new mysqli("localhost", "root","","remz");

    if ($mysqli->connect_error) {
       die("Connection failed: " . $mysqli->connect_error);
    } 

    $result = $mysqli->query("SELECT * from comments where post_id={$postId} ORDER by id desc");
    if (mysqli_num_rows($result) > 0) {
        $comments = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
        return $comments;
    }
    return [];
}

function updatePost($post)
{

}

function commentPost($comment, $postId, $userId) {

    $mysqli = new mysqli("localhost", "root","","remz");

    $createdBy = (int) $userId;
    $postId = (int) $postId;
    $comment = $comment;
    $commentedAt = date("Y-m-d H:i:s");


    $sql = "INSERT INTO comments (by_user, comment, commented_at, post_id) VALUES ({$createdBy}, '{$comment}', '{$commentedAt}', {$postId})";

    if ($mysqli->query($sql) === TRUE) {
        header('Location: ' . pathUrl());
    } 
    
    return false;
}

function deletePost($postId)
{
    $mysqli = new mysqli("localhost", "root","","remz");

    if ($mysqli->connect_error) {
       die("Connection failed: " . $mysqli->connect_error);
    } 

    $sql = $mysqli->query("DELETE FROM posts WHERE id={$postId}");
 
    if ($mysqli->query($sql) === TRUE) {
        $mysqli->close();
        return true;
    }

    return false;
}

function user() 
{
    if (isset($_SESSION['user'])) {
        return json_decode(json_encode($_SESSION['user']), true);
    }

    return NULL;
}

function isMyControl($post, $userId)
{
    if ($post['user_id'] == $userId) {
        return true;
    }

    return false;
}

?>
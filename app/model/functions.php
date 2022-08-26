<?php
require('connect.php');
#these extends to the database 
#and all functions/method(read,write,update,delete,view,)
#using prepare statement


#uncommnt this to be able view all functions
function show($value) #to be deleted
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";
    die();
}

function executeQuery($query, $data)
{
    global $conn;
    $stmt = $conn->prepare($query);
    $values = array_values($data); 
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    return $stmt;
}

#select all
function selectAll($table)
{
global $conn;
$query = "select * from $table";
$stmt = $conn->prepare($query);
$stmt->execute();
$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
return $records;
}


#select all with match given conditions

function selectWithCondition($table, $conditions=[])
{
global $conn;
$query = "SELECT * FROM $table";
if(empty($conditions))
{
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
} else {
    # get reocrds that match conditions...
    #we concatinate the quuery
    $i = 0;
    foreach ($conditions as $key => $value) 
    {
        if ($i === 0) {
            # code...
            $query = $query . " WHERE $key=?";
        }else {
            # code...
            $query = $query . " AND $key=?";
        }
        $i++;
    }
    $stmt = executeQuery($query, $conditions);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;

}

}


#select one user with an associative array
function selectOne($table, $conditions)
{
global $conn;
$query = "SELECT * FROM $table";
    # get reocrds that match conditions...
    #we concatinate the quuery
    $i = 0;
    foreach ($conditions as $key => $value) 
    {
        if ($i === 0) {
            # code...
            $query = $query . " WHERE $key=?";
        }else {
            # code...
            $query = $query . " AND $key=?";
        }
        $i++;
    }
    $query = $query . " LIMIT 1";
    $stmt = executeQuery($query, $conditions);
    $record = $stmt->get_result()->fetch_assoc();
    return $record;

}


#create method
function create($table, $data)
{
    global $conn;
    $query = "INSERT INTO $table SET ";
    $i = 0;
    foreach ($data as $key => $value) 
    {
        if ($i === 0) {
            # code...
            $query = $query . " $key=?";
        }else {
            # code...
            $query = $query . ", $key=?";
        }
        $i++;
    }
    // show($query);
    $stmt = executeQuery($query, $data);
    $id = $stmt->insert_id;
    return $id;
}


#update function
function update($table, $id, $data)
{
    global $conn;
    $query = "update $table set ";
    $i = 0;
    foreach ($data as $key => $value) 
    {
        if ($i === 0) {
            $query = $query . " $key=?";
        }else {
            $query = $query . ", $key=?";
        }
        $i++;
    }
    $query = $query . " where id=?";
    $data['id'] = $id;
    $stmt = executeQuery($query, $data);
    return $stmt->affected_rows;
}

#delete function
function delete($table, $id)
{
    global $conn;
    $query = "delete from $table where id=?";

    $stmt = executeQuery($query, ['id' => $id]);
    return $stmt->affected_rows;
}



#published post
function getPublishedPosts()
{
    global $conn;
    $query = "select p.*, c.category_name from blog_post as p join blog_category as c on p.category_id = c.id where p.post_published=? order by post_created_at limit 6";

    $stmt = executeQuery($query, ['post_published' => 1]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function getPublishedPost()
{
    global $conn;
    $query = "select p.*, c.category_name from blog_post as p join blog_category as c on p.category_id = c.id  where p.post_published=? order by post_created_at   limit 1";
    $stmt = executeQuery($query, ['post_published' => 1]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function getTrendingPosts()
{
    global $conn;
    $query = "select p.*, c.category_name from blog_post as p join blog_category as c on p.category_id = c.id where p.post_published=?  order by post_created_at desc limit 5";
    $stmt = executeQuery($query, ['post_published' => 1]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function getCategory()
{
    global $conn;
    if(isset($_GET['title']))
    {
    $category_slug = $_GET['title'];
    $query = "select c.*, p.post_title, post_slug, p.post_image, p.post_description, post_created_by, p.post_created_at from blog_category as c join blog_post as p on c.id = p.category_id where c.category_slug = ? order by category_date limit 10";
        $stmt = executeQuery($query, ['category_slug'=>$category_slug]);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}

function getComment()
{
    global $conn;
    if(isset($_GET['title']))
    {
        $query = "select * from comment where post_slug = ?";
        $stmt = executeQuery($query, ['post_slug'=>$_GET['title']]);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }

}

function getPost()
{
    global $conn;
    if(isset($_GET['title']))
    {
    $post_slug = $_GET['title'];
    $query = "select p.*, c.category_name from blog_post as p join blog_category as c on p.category_id = c.id where p.post_slug = ? order by post_created_at desc limit 1";
        $stmt = executeQuery($query, ['post_slug'=>$post_slug]);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}


function searchPosts($term)
{
    global $conn;
    $match = "%".$term."%";
    $query = "select 
    p.*, c.category_name 
    from blog_post as p 
    join blog_category as c 
    on p.category_id = c.id  
    where p.post_published=? 
    and  p.post_title like ? or p.post_description like ? ;
    ";
    $stmt = executeQuery($query, ['post_published' => 1, 'post_title' => $match, 'post_description' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}


// #examine conditions
// $conditions = 
// [
//     'category_name'=> 'c programming',

// ];
// $id = create('blog_category', $conditions);
// show($id);


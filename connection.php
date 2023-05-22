<?php
//Database cerdentials
$user = "a9968252_scpuser";
$db = "a9968252_scp";
$pw = "toiohomai1234";

//Database connection
$connection = new mysqli('localhost', $user, $pw, $db);

//Variable that returns all records in the database
$result = $connection->query("select * from scpfiles");


//create record
if(isset($_POST['submit']))
{
    // Create variables from form post data
    $item = $connection->real_escape_string($_POST['item']);
    $class = $connection->real_escape_string($_POST['class']);
    $containment = $connection->real_escape_string($_POST['containment']);
    $image = $connection->real_escape_string($_POST['image']);
    $description = $connection->real_escape_string($_POST['description']);

    // create a SQL insert command
    $insert = "insert into scpfiles(item, class, containment, image, description)
    values('$item', '$class', '$containment', '$image', '$description')";

    if($connection->query($insert) === TRUE)
    {
        echo "<h1>Successfully Added</h1>
        <p><a href= 'index.php'>Back to index page</a></p>";
    }
    else
    {
        echo "<h1>Error submiting record</h1>
        <p>{$connection->error}</p>
        <p><a href= 'index.php'>Back to index page</a></p>";
    }
}

// Update record

if(isset($_POST['update']))
{
    // Create variables based on form data
    $id = $_POST['id'];
    $item = $connection->real_escape_string($_POST['item']);
    $class = $connection->real_escape_string($_POST['class']);
    $containment = $connection->real_escape_string($_POST['containment']);
    $image = $connection->real_escape_string($_POST['image']);
    $description = $connection->real_escape_string($_POST['description']);
    
    // create  update a SQL insert command
    $update = "update scpfiles set item='$item', class='$class', image='$image', containment='$containment', description='$description' where id='$id'";
    
    if($connection->query($update) === TRUE)
    {
        echo "<h1>Successfully Updated</h1>
        <p><a href= 'index.php'>Back to index page</a></p>";
    }
    else
    {
        echo "<h1>Error updating record</h1>
        <p>{$connection->error}</p>
        <p><a href= 'index.php'>Back to index page</a></p>";
    }
    
}

// Delete record

if(isset($_GET['delete']))
{
       $id=$_GET['delete'];
       
       // Delete SQL command
       
       $del="delete from scpfiles where id=$id";
       
       if($connection->query($del) === TRUE)
    {
        echo "<h1>Successfully Deleted</h1>
        <p><a href= 'index.php'>Back to index page</a></p>";
    }
    else
    {
        echo "<h1>Error updating record</h1>
        <p>{$connection->error}</p>
        <p><a href= 'index.php'>Back to index page</a></p>";
    }
       
       
       
}



?>
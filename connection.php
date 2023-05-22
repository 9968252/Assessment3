<style>
@import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500&display=swap');

.added
{
    background-image: radial-gradient(rgb(199, 0, 0), rgb(146, 25, 25), rgb(133, 23, 25));
     
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    margin:20px;
    padding:10px;
    
}

.stylesDiv
{
    width:70vw;
    background-color:black;
    color:white;
    border-radius: 10px;
    border:3px solid white;
   font-size:3em;
   display:flex;
    justify-content:center;
    align-items:center;
    padding:10px;
    font-family: 'Orbitron', sans-serif;
}

.return
{
    width:20vw;
    border-radius: 10px;
    font-size:2em;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:10px;
    margin-top:20px;
    background-image: linear-gradient(315deg, #045de9 0%, #09c6f9 74%);
    
}

a{
    text-decoration:none;
    color:white;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}
</style>
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
        echo "<body class='added'>
        <div class='stylesDiv'<h1>File has been successfully CREATED</h1></div>
        <div class='return'> <a href= 'index.php'>Return to index page</a></div>
        <body>";
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
        echo "<body class='added'>
        <div class='stylesDiv'<h1>File has been UPDATED</h1></div>
        <div class='return'> <a href= 'index.php'>Return to index page</a></div>
        <body>";
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
        echo "<body class='added'>
        <div class='stylesDiv'<h1>File has been DELETED from database</h1></div>
        <div class='return'> <a href= 'index.php'>Return to index page</a></div>
        <body>";
    }
    else
    {
        echo "<h1>Error updating record</h1>
        <p>{$connection->error}</p>
        <p><a href= 'index.php'>Back to index page</a></p>";
    }
       
       
       
}



?>
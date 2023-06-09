<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SCP Files</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
  </head>
  
  <body>
  
   <div class="container bg-secondary rounded p-2">
    <div class="p-3 m-2 text-light bg-dark text-center rounded shadow-lg"><h1>Update a SCP file</h1></div>
    
    
    <?php
        
        include "connection.php";
        $id = $_GET['update'];
        $record = $connection->query("select * from scpfiles where id=$id ");
        $array = $record -> fetch_assoc();
    ?>
    
    <form method="post" action="connection.php" class="form-group p-4 m-4 bg-dark-subtle rounded shadow-lg" accept-charset="utf-8">
        <input type="hidden" name="id" value="<?php echo $array['id']; ?>">
        <label>Update SCP Item</label>
        <br>
        <br>
        <input type="text" name="item" value="<?php echo $array['item']; ?>" class="form-control">
        <br><br>
        <label>Update SCP Class</label>
        <br>
        <br>
        <input type="text" name="class" value="<?php echo $array['class']; ?>" class="form-control">
        <br>
        <br>
        <label>Update Containment info</label>
        <br>
        <br>
        <textarea name="containment" class="form-control"><?php echo $array['containment'] ?></textarea>
        <br>
        <br>
        <label>Update Description</label>
        <br>
        <br>
        <textarea name="description" class="form-control"><?php echo $array['description'] ?></textarea>
        <br>
        <br>
        <label>Update SCP image</label>
        <br>
        <br>
        <input type="text" name="image" value="<?php echo $array['image']; ?>" class="form-control">
        <br>
        <br>
        <div class="d-flex justify-content-between">
            
            <input type="submit" name="update" value="Update Record" class="btn btn-success shadow-lg ms-4 p-3">
            <a href="index.php" class="btn btn-danger shadow-lg align-self-center me-4 p-3">Back to index page</a>
            
        </div>
        
        
    </form>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
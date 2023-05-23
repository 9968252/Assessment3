<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SCP Files</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
    
  </head>
  <body class="">
      <div class="container bg-secondary rounded">
      <h1 class="text-center p-3">SCP FILES</h1>
    
    <?php include "connection.php"; ?>
    
     <div>
         <nav
        class="navbar navbar-expand-sm"
        data-bs-theme="dark"
        id="navbar"
      >
        <div class="container-fluid ">
          <a class="navbar-brand" href="">SCP Foundation</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          ><span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justifiy-content-end">
          
          
          
          <li class="nav-item dropdown ms-3">
          <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            SCP Files
          </a>
          <ul class="dropdown-menu">
              <!-- run php loop through table and display item field here-->
              <?php foreach($result as $link): ?>
            <li><a class="dropdown-item rounded p-2 m-2" href="index.php?link='<?php echo $link['item']; ?>'"><?php echo $link['item']; ?></a></li>
            <?php endforeach; ?>
          </ul>
        </li>
          
          
        
      </ul>
      <li class="nav-item rounded p-2 m-2"><a href="form.php" class="nav-link text-light">Add a new SCP item</a></li>

      </div>
       </div>
      </nav>
  </div>
 
  
  <!--  SCP Record from DB here -->
  <div>
      <?php 
      // Check if GET value has been passed if so, save as variable
        if(isset($_GET['link']))
        {
            //remove single quotes around GET value and save as PHP var 
            $item = trim($_GET['link'], "'");
            
            //echo $model;
            
            // run sql command to retrieve record based on GET value
            $record = $connection->query("select * from scpfiles where item='$item'");
            
            // turn record into an array we can use
            $array= $record->fetch_assoc();
            // get our id field from table and save value here
            $id = $array['id'];
            // Create get value based on id value
            $update = "update.php?update=" . $id;
            // Create delete value
            $delete = "connection.php?delete=" . $id;
            
            //echo out field data in HTML
            echo "
                <div class='text center m-2'>
                <h1 class='text-center m-3'><b>Item #: </b>{$array['item']}</h1>
                <h2 class='text-center m-3'><b>Object Class: </b>{$array['class']}</h2>
                </div>
                
                <div class='d-flex justify-content-center'><img src= '{$array['image']}'/></div>
                <div class='p-4 m-4 bg-dark-subtle rounded'>
                <div class='p-3 m-2 text-light bg-dark text-center rounded' id='header-div'><h3>Special Containment Procedures</h3></div>
                <div class='rounded shadow p-3 m-3'><p>{$array['containment']}</div>
                <div class='p-3 m-2 text-light bg-dark text-center rounded' id='header-div'><h3>Description</h3></div>
                <div class='rounded shadow p-3 m-3'>{$array['description']}</div>
                <p class='text-center'> <a href = '{$update}' class = 'btn update'>Update record</a> <a href ='{$delete}' class='btn delete'>Delete Record</a></p>
                </div>
                    
                </div>
            ";
        }
        else
        {
            echo "
            <div class='p-4 m-4 bg-dark-subtle rounded'>
            <div class='p-3 m-2 text-light bg-dark text-center rounded' id='header-div'><h1 class='text-center m-3'>Welcome to SCP Foundation</h1></div>
            <h3 class='text-center p-4'>Please click on SCP File to continue.</h3>
            <div class='d-flex justify-content-center'><img src='images/SCPlogo.png'/></div>
            </div>
            ";
        }
      ?>
  </div>
   </div>
  
  
  
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
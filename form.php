<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SCP Files</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body class="container">
    <h1>Enter a SCP item into the database</h1>
    <p><a href="index.php" class="btn btn-primary">Back to index page</a></p>
    <form method="post" action="connection.php" class="form-group" accept-charset="utf-8">
        <label>Enter SCP Item</label>
        <br>
        <br>
        <input type="text" name="item" placeholder="Item" class="form-control">
        <br><br>
        <label>Enter SCP Class</label>
        <br>
        <br>
        <input type="text" name="class" placeholder="Class" class="form-control">
        <br>
        <br>
        <label>Enter Containment info</label>
        <br>
        <br>
        <textarea name="containment" class="form-control" placeholder="Containment information..."></textarea>
        <br>
        <br>
        <label>Enter description</label>
        <br>
        <br>
        <textarea name="description" class="form-control" placeholder="Description Information..."></textarea>
        <br>
        <br>
        <label>Enter SCP image</label>
        <br>
        <br>
        <input type="text" name="img" placeholder="e.g. images/SCP002.jpg" class="form-control">
        <br>
        <br>
        <input type="submit" name="submit" value="Submit Record" class="btn btn-dark">
        
    </form>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
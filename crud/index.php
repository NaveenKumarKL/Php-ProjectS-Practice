<!DOCTYPE html>
<html lang="en">
<head>
  <title>Crud</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <form action="insert_users.php" method="POST">
        <div class="form-group">
            <label for="first">Firstname:</label>
            <input type="text" class="form-control" placeholder="First-name" name="firstname" required>
        </div>
        <div class="form-group">
            <label for="Last">Lastname:</label>
            <input type="text" class="form-control"  placeholder="Last-name" name="lastname" required>
        </div>
        <div class="form-group">
            <label for="Email">Email:</label>
            <input type="email" class="form-control"  placeholder="Email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="number" class="form-control"  placeholder="Phone-no" name="phone" required>
        </div>
        <div class="form-group">
            <label for="alt-phone">alt-Phone:</label>
            <input type="text" class="form-control"  placeholder="alt-Phone-no" name="alternate" required>
        </div>        
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea name="address" class="form-control" id="" cols="30" rows="8"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>

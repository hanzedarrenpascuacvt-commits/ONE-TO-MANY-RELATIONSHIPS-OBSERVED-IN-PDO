<?php require_once 'core/dbConfig.php'; require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Publishing System</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h1>Welcome To Publishing System. Add new Authors!</h1>
  <form action="core/handleForms.php" method="POST">
    <p><label>Username</label> <input type="text" name="username"></p>
    <p><label>First Name</label> <input type="text" name="firstName"></p>
    <p><label>Last Name</label> <input type="text" name="lastName"></p>
    <p><label>Date of Birth</label> <input type="date" name="dateOfBirth"></p>
    <p><label>Genre Focus</label> <input type="text" name="genreFocus">
       <input type="submit" name="insertAuthorBtn"></p>
  </form>

  <?php foreach (getAllAuthors($pdo) as $row) { ?>
  <div class="container" style="border-style: solid; margin-top: 20px;">
    <h3>Username: <?php echo $row['username']; ?></h3>
    <h3>Name: <?php echo $row['first_name'] . ' ' . $row['last_name']; ?></h3>
    <h3>Date of Birth: <?php echo $row['date_of_birth']; ?></h3>
    <h3>Genre Focus: <?php echo $row['genre_focus']; ?></h3>
    <div class="editAndDelete" style="float: right; margin-right: 20px;">
      <a href="viewbooks.php?author_id=<?php echo $row['author_id']; ?>">View Books</a>
      <a href="editauthor.php?author_id=<?php echo $row['author_id']; ?>">Edit</a>
      <a href="deleteauthor.php?author_id=<?php echo $row['author_id']; ?>">Delete</a>
    </div>
  </div>
  <?php } ?>
</body>
</html>
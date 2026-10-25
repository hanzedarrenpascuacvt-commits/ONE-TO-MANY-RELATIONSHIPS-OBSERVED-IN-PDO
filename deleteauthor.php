<?php require_once 'core/models.php'; require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Delete Author</title><link rel="stylesheet" href="styles.css"></head>
<body>
  <h1>Are you sure you want to delete this author?</h1>
  <?php $a = getAuthorByID($pdo, $_GET['author_id']); ?>
  <div class="container" style="border-style: solid; height: 400px;">
    <h2>Username: <?php echo $a['username']; ?></h2>
    <h2>First Name: <?php echo $a['first_name']; ?></h2>
    <h2>Last Name: <?php echo $a['last_name']; ?></h2>
    <div class="deleteBtn" style="float: right; margin-right: 10px;">
      <form action="core/handleForms.php?author_id=<?php echo $_GET['author_id']; ?>" method="POST">
        <input type="submit" name="deleteAuthorBtn" value="Delete">
      </form>
    </div>
  </div>
</body>
</html>
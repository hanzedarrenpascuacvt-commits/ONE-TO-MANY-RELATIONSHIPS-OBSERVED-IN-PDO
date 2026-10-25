<?php require_once 'core/handleForms.php'; require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Edit Author</title><link rel="stylesheet" href="styles.css"></head>
<body>
  <?php $a = getAuthorByID($pdo, $_GET['author_id']); ?>
  <h1>Edit the author!</h1>
  <form action="core/handleForms.php?author_id=<?php echo $_GET['author_id']; ?>" method="POST">
    <p><label>First Name</label> <input type="text" name="firstName" value="<?php echo $a['first_name']; ?>"></p>
    <p><label>Last Name</label> <input type="text" name="lastName" value="<?php echo $a['last_name']; ?>"></p>
    <p><label>Date of Birth</label> <input type="date" name="dateOfBirth" value="<?php echo $a['date_of_birth']; ?>"></p>
    <p><label>Genre Focus</label> <input type="text" name="genreFocus" value="<?php echo $a['genre_focus']; ?>">
       <input type="submit" name="editAuthorBtn"></p>
  </form>
</body>
</html>
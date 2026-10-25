<?php require_once 'core/models.php'; require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Edit Book</title><link rel="stylesheet" href="styles.css"></head>
<body>
  <a href="viewbooks.php?author_id=<?php echo $_GET['author_id']; ?>">View The Books</a>
  <h1>Edit the book!</h1>
  <?php $b = getBookByID($pdo, $_GET['book_id']); ?>
  <form action="core/handleForms.php?book_id=<?php echo $_GET['book_id']; ?>&author_id=<?php echo $_GET['author_id']; ?>" method="POST">
    <p><label>Book Title</label> <input type="text" name="bookTitle" value="<?php echo $b['book_title']; ?>"></p>
    <p><label>Genre</label> <input type="text" name="genre" value="<?php echo $b['genre']; ?>">
       <input type="submit" name="editBookBtn"></p>
  </form>
</body>
</html>
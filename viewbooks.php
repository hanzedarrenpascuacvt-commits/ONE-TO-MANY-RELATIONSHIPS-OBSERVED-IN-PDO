<?php require_once 'core/dbConfig.php'; require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>View Books</title><link rel="stylesheet" href="styles.css">
<body>
  <a href="index.php">Return to Home</a>
  <h1>Books of this Author</h1>
  <form action="core/handleForms.php?author_id=<?php echo $_GET['author_id']; ?>" method="POST">
    <p><label>Book Title</label> <input type="text" name="bookTitle"></p>
    <p><label>Genre</label> <input type="text" name="genre">
       <input type="submit" name="insertNewBookBtn"></p>
  </form>

  <table style="width:100%; margin-top: 50px;">
    <tr><th>Book ID</th><th>Title</th><th>Genre</th><th>Author</th><th>Date Added</th><th>Action</th></tr>
    <?php foreach (getBooksByAuthor($pdo, $_GET['author_id']) as $row) { ?>
    <tr>
      <td><?php echo $row['book_id']; ?></td>
      <td><?php echo $row['book_title']; ?></td>
      <td><?php echo $row['genre']; ?></td>
      <td><?php echo $row['book_author']; ?></td>
      <td><?php echo $row['date_added']; ?></td>
      <td>
        <a href="editbook.php?book_id=<?php echo $row['book_id']; ?>&author_id=<?php echo $_GET['author_id']; ?>">Edit</a>
        <a href="deletebook.php?book_id=<?php echo $row['book_id']; ?>&author_id=<?php echo $_GET['author_id']; ?>">Delete</a>
      </td>
    </tr>
    <?php } ?>
  </table>
</body>
</html>
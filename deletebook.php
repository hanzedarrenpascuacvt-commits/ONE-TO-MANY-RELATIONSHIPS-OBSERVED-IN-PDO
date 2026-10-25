<?php require_once 'core/dbConfig.php'; require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Delete Book</title><link rel="stylesheet" href="styles.css"></head>
<body>
  <?php $b = getBookByID($pdo, $_GET['book_id']); ?>
  <h1>Are you sure you want to delete this book?</h1>
  <div class="container" style="border-style: solid; height: 400px;">
    <h2>Title: <?php echo $b['book_title']; ?></h2>
    <h2>Genre: <?php echo $b['genre']; ?></h2>
    <h2>Author: <?php echo $b['book_author']; ?></h2>
    <h2>Date Added: <?php echo $b['date_added']; ?></h2>
    <div class="deleteBtn" style="float: right; margin-right: 10px;">
      <form action="core/handleForms.php?book_id=<?php echo $_GET['book_id']; ?>&author_id=<?php echo $_GET['author_id']; ?>" method="POST">
        <input type="submit" name="deleteBookBtn" value="Delete">
      </form>
    </div>
  </div>
</body>
</html>
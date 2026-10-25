<?php
require_once 'dbConfig.php';
require_once 'models.php';

// PARENT
if (isset($_POST['insertAuthorBtn'])) {
    $query = insertAuthor($pdo, $_POST['username'], $_POST['firstName'],
        $_POST['lastName'], $_POST['dateOfBirth'], $_POST['genreFocus']);
    if ($query) { header("Location: ../index.php"); }
    else { echo "Insertion failed"; }
}

if (isset($_POST['editAuthorBtn'])) {
    $query = updateAuthor($pdo, $_POST['firstName'], $_POST['lastName'],
        $_POST['dateOfBirth'], $_POST['genreFocus'], $_GET['author_id']);
    if ($query) { header("Location: ../index.php"); }
    else { echo "Edit failed"; }
}

if (isset($_POST['deleteAuthorBtn'])) {
    $query = deleteAuthor($pdo, $_GET['author_id']);
    if ($query) { header("Location: ../index.php"); }
    else { echo "Deletion failed"; }
}

// CHILD
if (isset($_POST['insertNewBookBtn'])) {
    $query = insertBook($pdo, $_POST['bookTitle'], $_POST['genre'], $_GET['author_id']);
    if ($query) { header("Location: ../viewbooks.php?author_id=" . $_GET['author_id']); }
    else { echo "Insertion failed"; }
}

if (isset($_POST['editBookBtn'])) {
    $query = updateBook($pdo, $_POST['bookTitle'], $_POST['genre'], $_GET['book_id']);
    if ($query) { header("Location: ../viewbooks.php?author_id=" . $_GET['author_id']); }
    else { echo "Update failed"; }
}

if (isset($_POST['deleteBookBtn'])) {
    $query = deleteBook($pdo, $_GET['book_id']);
    if ($query) { header("Location: ../viewbooks.php?author_id=" . $_GET['author_id']); }
    else { echo "Deletion failed"; }
}
?>
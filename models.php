<?php

function insertAuthor($pdo, $username, $first_name, $last_name, $date_of_birth, $genre_focus) {
    $sql = "INSERT INTO authors (username, first_name, last_name, date_of_birth, genre_focus) VALUES (?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$username, $first_name, $last_name, $date_of_birth, $genre_focus]);
}

function getAllAuthors($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM authors");
    if ($stmt->execute()) { return $stmt->fetchAll(); }
}

function getAuthorByID($pdo, $author_id) {
    $stmt = $pdo->prepare("SELECT * FROM authors WHERE author_id = ?");
    if ($stmt->execute([$author_id])) { return $stmt->fetch(); }
}

function updateAuthor($pdo, $first_name, $last_name, $date_of_birth, $genre_focus, $author_id) {
    $sql = "UPDATE authors SET first_name = ?, last_name = ?, date_of_birth = ?, genre_focus = ? WHERE author_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$first_name, $last_name, $date_of_birth, $genre_focus, $author_id]);
}

// Buburahin muna ang mga books ng author bago ang author mismo
function deleteAuthor($pdo, $author_id) {
    $deleteBooks = $pdo->prepare("DELETE FROM books WHERE author_id = ?");
    if ($deleteBooks->execute([$author_id])) {
        $stmt = $pdo->prepare("DELETE FROM authors WHERE author_id = ?");
        return $stmt->execute([$author_id]);
    }
}

// ===== CHILD: BOOKS =====
function getBooksByAuthor($pdo, $author_id) {
    $sql = "SELECT books.book_id AS book_id,
                   books.book_title AS book_title,
                   books.genre AS genre,
                   books.date_added AS date_added,
                   CONCAT(authors.first_name,' ',authors.last_name) AS book_author
            FROM books
            JOIN authors ON books.author_id = authors.author_id
            WHERE books.author_id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$author_id])) { return $stmt->fetchAll(); }
}

function insertBook($pdo, $book_title, $genre, $author_id) {
    $stmt = $pdo->prepare("INSERT INTO books (book_title, genre, author_id) VALUES (?,?,?)");
    return $stmt->execute([$book_title, $genre, $author_id]);
}

function getBookByID($pdo, $book_id) {
    $sql = "SELECT books.book_id AS book_id,
                   books.book_title AS book_title,
                   books.genre AS genre,
                   books.date_added AS date_added,
                   CONCAT(authors.first_name,' ',authors.last_name) AS book_author
            FROM books
            JOIN authors ON books.author_id = authors.author_id
            WHERE books.book_id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$book_id])) { return $stmt->fetch(); }
}

function updateBook($pdo, $book_title, $genre, $book_id) {
    $stmt = $pdo->prepare("UPDATE books SET book_title = ?, genre = ? WHERE book_id = ?");
    return $stmt->execute([$book_title, $genre, $book_id]);
}

function deleteBook($pdo, $book_id) {
    $stmt = $pdo->prepare("DELETE FROM books WHERE book_id = ?");
    return $stmt->execute([$book_id]);
}
?>
<?php
require 'connection.php';

if ($_GET['limit']) {
    $limitSQL = ' limit 0, ' . $_GET['limit'];
} else {
    $limitSQL = '';
}

$query = "SELECT * FROM books" . mysqli_real_escape_string($mysqli ,$limitSQL);

$books =
    [
        'info' => [
            'name' => 'Heinrich Mei',
            'description' => 'Raamatud'
        ],
    ];

if ($result = $mysqli->query($query)) {
    while ($book = $result->fetch_array()) {
        $books['data'][] =
            [
                'id' => $book['id'],
                'title' => $book['title'],
                'description' => $book['description'],
                'image' => $book['image'],
                'topic1'=> $book['author'],
                'topic2' => $book['genre']
        ];
    }
    $result->close();
}
header('Content-Type: application/json');
echo json_encode($books);
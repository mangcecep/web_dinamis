<?php

$servername = "localhost";
$username = "root";
$password = "Awaslupa1234";
$dbname = "php_native";

$conn = new mysqli($servername, $username, $password, $dbname);
$message = '';


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function getTodos()
{
    global $conn;
    $sql = "SELECT * FROM todos";
    $result = $conn->query($sql);

    $todos = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $todos[] = $row;
        }
    }
    return $todos;
}

function addTodo($task)
{
    // var_dump($task);
    global $conn;
    $sql = "INSERT INTO todos (task) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $task);
    $stmt->execute();
    $stmt->close();
}

function deleteTodo($id)
{
    global $conn;
    $sql = "DELETE FROM todos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['task'])) {
        if ($_POST['task'] == '') {
            $message = 'Input tidak boleh kosong';
            $todos = getTodos();
            return;
        }
        addTodo($_POST['task']);
    } elseif (isset($_POST['delete_id'])) {
        deleteTodo($_POST['delete_id']);
    }
    // elseif (isset($_POST['toggle_id'])) {
    //     toggleTodo($_POST['toggle_id']);
    // }
}

$todos = getTodos();

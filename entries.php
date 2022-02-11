<?php
require "models/data.php";
$data = new Data();

switch($_GET['action']) {

    case "add":
        $data->setData($_POST);
        $data->addEntry();
    break;

    case "delete":
        $data->deleteEntry($_GET['id']);
    break;

    case "update":
        $data->setData($_POST);
        $data->updateById($_POST['id']);
    break;
}

header("Location: index.php");
?>
<?php
require_once "autoload.php";

/* This takes the current page from the session variable and shows
    the page to the user accordingly */
session_start();
if(!isset($_GET["page"])) {
    $current_page = $_SESSION["current_page"] = 1;
} else {
    $current_page = $_SESSION["current_page"] = $_GET["page"];
}


try {
    $exam = new Exam();
    if ($current_page == $exam->getQuestion_number()+1) {
        include_once("views/End.php");
        $_SESSION["current_page"] = 1;
        exit();
    } else {
        $current_question = $exam->load_exam_page($current_page);
    }
} catch (Exception $ex) {
    if (mode === "production") {
        include("views/error.php");
        exit();
    } else {
        echo $ex->getMessage();
        echo $ex->getTraceAsString();
        exit();
    }
}
?>

<html>
    <?php include "views/header.php"; ?>
    <body>
        <?php include "views/questions.php"; ?>
    </body>
</html>
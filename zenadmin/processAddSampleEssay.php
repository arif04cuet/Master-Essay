<?php

include('check.php');
include('../crud/class/mysql_crud.php');
$db = new Database();
$db->connect();

$topic = $_POST['topic'];
$type_document = $_POST['type_document'];
$urgency = $_POST['urgency'];
$level = $_POST['level'];
$number_of_pages = $_POST['number_of_pages'];
$subject_area = $_POST['subject_area'];
$academic_level = $_POST['academic_level'];
$style = $_POST['style'];
$no_sources = $_POST['no_sources'];

//upload pdf
//Сheck that we have a file
$msg = "";
if ((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0))
{
    //Check if the file is JPEG image and it's size is less than 350Kb
    $filename = basename($_FILES['uploaded_file']['name']);
    //Determine the path to which we want to save this file
    $newname = dirname(__FILE__) . '/upload/sample_essay/' . $filename;
    //Check if the file with the same name is already exists on the server
    if (!file_exists($newname))
    {
	//Attempt to move the uploaded file to it's new place
	if (!(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $newname)))
	{
	    $msg = "Error: A problem occurred during file upload!";
	}
    }
}
else
{
    $msg = "Error: No file uploaded";
}

$record = $db->insert('sample_essay', array('topic' => $topic,
    'type_document' => $type_document,
    'urgency' => $urgency, 'level' => $level,
    'number_of_pages' => $number_of_pages,
    'subject_area' => $subject_area,
    'academic_level' => $academic_level,
    'style' => $style,
    'update_date' => date("Y-m-d H:i:s"),
    'pdf_file' => $filename,
    'no_sources' => $no_sources));  // Table name, column names and respective values
if ($record)
{
    header('Location: sample-essay-list.php?msg=' . $msg);
    exit;
}
else
{
    header('Location: add-sample-essay.php?action=failed');
    exit;
}
exit;
?>

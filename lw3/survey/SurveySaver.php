<?php

function ReadDataFromFile($filename)
{
    $file = fopen("$dataPath$filename", "r");
    $firstName = fgets($file);
    $lastName = fgets($file);
    $age = fgets($file);
    fclose($file);
    return array("firstName" => $firstName, "lastName" => $lastName, "age" => $age);
}

function SaveDataToFile($filename, $data)
{
    $file = fopen("$dataPath$filename", "wr");
    fwrite($file, $data['firstname']);
    fwrite($file, $data['lastname']);
    fwrite($file, $data['age']);
    fclose($file);
}

$dataPath = getcwd();
$dataPath = "$dataPath\data\\";

$email = $_GET['email'];
$filename = "$email.txt";
$firstName = "";
$lastName = "";
$age = 0;
if (file_exists("$dataPath$filename"))
{   
    $fileContent = ReadDataFromFile($filename);
    $firstName = (isset($_GET['firstname']) ? $_GET['firstname'] : $fileContent['firstName']);
    $lastName = (isset($_GET['lastname']) ? $_GET['lastname'] : $fileContent['lastName']);
    $age = (isset($_GET['age']) ? $_GET['age'] : $fileContent['age']);
}
else
{
    $firstName = (isset($_GET['firstname']) ? $_GET['firstname'] : "");
    $lastName = (isset($_GET['lastname']) ? $_GET['lastname'] : "");
    $age = (isset($_GET['age']) ? $_GET['age'] : 0);
}
$data = array("firstName" => $firstName, "lastName" => $lastName, "age" => $age);
SaveDataToFile($filename, $data);

echo "$dataPath$filename";
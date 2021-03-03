<?php

if (!isset($_GET['text']))
{
    die("set text");
}

if (strlen($_GET['text']) < 1)
{
    die("text must have value");
}

$whitespace = false;
$result = "";
$trimmedText = trim($_GET['text']);

for ($i = 0; $i < strlen($trimmedText); $i++)
{
    $symbol = $trimmedText[$i];
    if ($symbol != " ")
    {
        if ($whitespace)
        {
            $result = "$result ";
        }
        $result = "$result$symbol";
        $whitespace = false;
    }
    else
    {
        $whitespace = true;
    }
}

echo $result;
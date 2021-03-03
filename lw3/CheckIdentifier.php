<?php

if (!isset($_GET['identifier']))
{
    die("set the identifier");
}

if (strlen($_GET['identifier']) < 1)
{
    die("identifier must have value");
}

$isIdentifier = true;
$errorList = "";

if (!ctype_alpha($_GET['identifier'][0]))
{
    $isIdentifier = false;
    $errorList = "$errorList <br> identifier must begin with letter";
}

for ($i = 1; $i < strlen($_GET['identifier']); $i++)
{
    if (!( (ctype_alpha($_GET['identifier'][$i])) || (ctype_digit($_GET['identifier'][$i])) ))
    {
        $isIdentifier = false;
        $symbol = $_GET['identifier'][$i];
        $errorList = "$errorList <br> $symbol is not a letter or digit";
    }
}

if ($isIdentifier)
{
    echo "yes";
}
else
{
    echo "no $errorList";
}

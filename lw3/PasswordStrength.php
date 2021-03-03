<?php

if (!isset($_GET['password']))
{
    die("set password");
}

if (strlen($_GET['password']) < 1)
{
    die("password must have value");
}

$symbolAppearances = array_fill(0, 62, 0);

$reliability = 0;
$numbers = 0;
$upperSymbols = 0;
$lowerSymbols = 0;
$collisions = 0;

for ($i = 0; $i < $_GET['password']; $i++)
{
    if (ctype_digit($_GET['password'][$i]))
    {
        $symbolAppearances[ord($_GET['password'][$i]) - 48]++;
    }
    if (ctype_lower($_GET['password'][$i]))
    {
        $symbolAppearances[ord($_GET['password'][$i]) - 61]++;
    }
    if (ctype_upper($_GET['password'][$i]))
    {
        $symbolAppearances[ord($_GET['password'][$i]) - 55]++;
    }
}

$i = 0;
for ( ; $i < 10; $i++)
{
    $numbers += $symbolAppearances[$i];
    if ($symbolAppearances[$i] > 1)
    {
        $reliability -= $symbolAppearances[$i];
    }
}
for ( ; $i < 36; $i++)
{
    $upperSymbols += $symbolAppearances[$i];
    if ($symbolAppearances[$i] > 1)
    {
        $reliability -= $symbolAppearances[$i];
    }
}
for ( ; $i < 62; $i++)
{
    $lowerSymbols += $symbolAppearances[$i];
    if ($symbolAppearances[$i] > 1)
    {
        $reliability -= $symbolAppearances[$i];
    }
}

$reliability += 4 * strlen($_GET['password']);
$reliability += 4 * $numbers;
$reliability += (strlen($_GET['password']) - $upperSymbols) * 2;
$reliability += (strlen($_GET['password']) - $lowerSymbols) * 2;
if ($numbers == 0)
{
    $reliability -= strlen($_GET['password']);
}
if (($upperSymbols == 0) && ($lowerSymbols == 0))
{
    $reliability -= strlen($_GET['password']);
}

echo "$reliability";
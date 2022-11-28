<?php
$todaysDate = date("l");
echo "Today is $todaysDate. Here is the news" ;
?>

<br>

<?php
$author = "Brandon Scott";

echo "<br>";
echo <<<_END
Debugging is twice as hard as writing the code in the first place.
Therefore, if you write the code as cleverly as possible, you are,
by definition, not smart enough to debug it.
- $author."
_END;
?>

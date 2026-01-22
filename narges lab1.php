<?php
echo "<h3>1 array_push()</h3>";
$colors = ["red", "green"];
array_push($colors, "blue");
foreach ($colors as $c) {
    echo $c . "<br>";
}

echo "<hr><h3>2 array_pop()</h3>";
$nums = [1, 2, 3];
array_pop($nums);
foreach ($nums as $n) {
    echo $n . "<br>";
}

echo "<hr><h3>3 array_shift()</h3>";
$letters = ["A", "B", "C"];
array_shift($letters);
foreach ($letters as $l) {
    echo $l . "<br>";
}

echo "<hr><h3>4 array_unshift()</h3>";
$letters2 = ["B", "C"];
array_unshift($letters2, "A");
foreach ($letters2 as $l) {
    echo $l . "<br>";
}

echo "<hr><h3>5 count()</h3>";
$fruits = ["apple", "banana", "orange"];
echo "عدد العناصر: " . count($fruits);

echo "<hr><h3>6 array_merge()</h3>";
$a = [1, 2];
$b = [3, 4];
$merged = array_merge($a, $b);
foreach ($merged as $m) {
    echo $m . "<br>";
}

echo "<hr><h3>7 array_reverse()</h3>";
$nums2 = [1, 2, 3];
$rev = array_reverse($nums2);
foreach ($rev as $r) {
    echo $r . "<br>";
}

echo "<hr><h3>8 array_unique()</h3>";
$nums3 = [1, 2, 2, 3, 3, 4];
$unique = array_unique($nums3);
foreach ($unique as $u) {
    echo $u . "<br>";
}

echo "<hr><h3>9 sort()</h3>";
$nums4 = [5, 1, 8, 2];
sort($nums4);
foreach ($nums4 as $s) {
    echo $s . "<br>";
}

echo "<hr><h3>10 in_array()</h3>";
$foods = ["rice", "meat", "fish"];
if (in_array("meat", $foods)) {
    echo "meat<br>موجودة في المصفوفة";
} else {
    echo "غير موجودة";
}
?>





<?php
$text = "Hello PHP World";

echo "<h3>1 strlen()</h3>";
echo strlen($text);

echo "<hr><h3>2 strtoupper()</h3>";
echo strtoupper($text);

echo "<hr><h3>3 strtolower()</h3>";
echo strtolower($text);

echo "<hr><h3>4 ucfirst()</h3>";
echo ucfirst("php language");

echo "<hr><h3>5 ucwords()</h3>";
echo ucwords("php is easy");

echo "<hr><h3>6 str_replace()</h3>";
echo str_replace("PHP", "Java", $text);

echo "<hr><h3>7 substr()</h3>";
echo substr($text, 6, 3);

echo "<hr><h3>8 strpos()</h3>";
echo strpos($text, "PHP");

echo "<hr><h3>9 trim()</h3>";
echo trim("   Hello PHP   ");

echo "<hr><h3>10 strrev()</h3>";
echo strrev($text);
?>

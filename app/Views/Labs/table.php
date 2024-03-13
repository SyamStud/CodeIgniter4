<?php

$table = new \CodeIgniter\View\Table();

echo "STATIC TABLE";
$data = [
    ['Name', 'Color', 'Size'],
    ['Fred', 'Blue', 'Small'],
    ['Mary', 'Red', 'Large'],
    ['John', 'Green', 'Medium'],
];

echo $table->generate($data);

echo "<br>";
echo "<br>";

echo "DYNAMIC TABLE";
$db = new mysqli('localhost', 'root', '', 'pbf-week1');

$query = $db->query('SELECT * FROM categories');

$table->setHeading('ID', 'NAME');

foreach ($query->fetch_all() as $row) {
    $table->addRow($row);
}
echo $table->generate();
<?php

function showNurses($db)
{
    $statement = $db->distinct("name");
    foreach ($statement as $data) {
        echo "<option value='$data'>$data</option>";
    }
}

function showDepartments($db)
{
    $statement = $db->distinct("department");
    foreach ($statement as $data) {
        echo "<option value='$data'>$data</option>";
    }
}

function findWards($db, $nurse)
{
    $statement = $db->distinct("ward", ["name"=>$nurse]);
    echo "<div id='download'><b>Nurse:</b>$nurse<br>";
    foreach ($statement as $data) {
        echo "Ward: $data<br>";
    }
    echo "</div>";
}

function findNurses($db, $department)
{
    $statement = $db->distinct("name", ["department"=>$department]);
    echo "<div id='download'><b>Department: </b>$department<br>";
    foreach ($statement as $data) {
        echo "Nurse: $data<br>";
    }
    echo "</div>";
}

function findShift($db, $shift, $department)
{
    $statement = $db->find(['$and' => [['shift'=>$shift],['department'=>$department]]]);
    echo "<div id='download'>";
    foreach ($statement as $data) {
        echo "Duty: Name - {$data['name']} ::: Shift - {$data['shift']} ::: Ward - {$data['ward']}<br>";
    }
    echo "</div>";
}
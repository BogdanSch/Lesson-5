<?php

$students = [
    [
  "name" => "Joan",
  "surname" => "Joanson",
  "year" => 2005,
  "marks" => [
          "PHP" => 4,
          "JS" => 3,
          "HTML" => 5
          ]
    ],
    [
  "name" => "Jack",
  "surname" => "Smith",
  "year" => 2003,
  "marks" => [
          "PHP" => 3,
          "JS" => 3,
          "HTML" => 4
          ]
    ],
    [
  "name" => "Martin",
  "surname" => "Miller",
  "year" => 2004,
  "marks" => [
          "PHP" => 4,
          "JS" => 4,
          "HTML" => 5
          ]
    ]
];
function try_walk($students, $key_student, $data){
  static $i = 1;
  echo "<br><strong>".$data.$i."</strong> <br>";
  print "<div style=\"color: #000; border: 3px #000 solid; background: #e6e6e6;\">";
  foreach ($students as $key => $value) {
    if (!is_array($value))
      echo "$key:$value\t<br>";
    else {
        echo "$key: ";
        foreach ($value as $k => $v)
          echo "{$k} - $v; <br>";
        }
  }
    print "</div>";
    $i++;
}
function try_walk_student($student, $key_student){
  print "<div style=\"color: #000; border: 3px #000 solid; background: #e6e6e6;\">";

  if (!is_array($key_student)){
    $value = $student[$key_student];
    echo "$key_student:$value\t<br>";
  }
  else {
        echo "$key_student: ";
        foreach ($student[$key_student] as $k => $v)
          echo "{$k} - $v; <br>";
    }
  // foreach ($student as $key => $value) {
    
  // }
}
function cmp_name($a, $b){
  return $a["name"] <=> $b["name"];
}
function cmp_surname($a, $b){
  return $a["surname"] <=> $b["surname"];
}
function cmp_age($a, $b){
  return $a["year"] <=> $b["year"];
}
function cmp_average_marks($a, $b){
  return array_sum($a["marks"]) / count($a["marks"]) <=> array_sum($b["marks"]) / count($b["marks"]);
}
//Task 1
//1 Names
echo "<h4>№ Name\tSurname\tYear\tMarks</h4>\n\n";
uasort($students, "cmp_name");
array_walk($students, "try_walk", "№");

//2 Surnames
echo "<h4>№ Name\tSurname\tYear\tMarks</h4>\n";
uasort($students, "cmp_surname");
array_walk($students, "try_walk", "№");

//3 Age
echo "<h4>№ Name\tSurname\tYear\tMarks</h4>\n";
uasort($students, "cmp_age");
array_walk($students, "try_walk", "№");

//4 Average marks
echo "<h4>№ Name\tSurname\tYear\tMarks</h4>\n";
uasort($students, "cmp_average_marks");
array_walk($students, "try_walk", "№");

//Task2
for($i = 0; $i < count($students); $i++){
  $number = $i+1;
  print "№$number";
  array_walk($students[$i], "try_walk_student");
}

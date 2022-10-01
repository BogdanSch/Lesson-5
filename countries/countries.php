<?php

$countries = [
	[
		"name" => "France",
		"capital" => "Paris",
		"area" => 640679,
		"population" => [
		  "2000" => 59278000,
		  "2010" => 59278000
	        ]
	],
	[
		"name" => "England",
		"capital" => "London",
		"area" => 130395,
		"population" => [
		  "2000" => 58800000,
		  "2010" => 63200000
	        ]
	],
        [
            "name" => "Deutschland",
            "capital" => "Berlin",
            "area" => 357021,
            "population" => [
              "2000" => 82260000,
              "2010" => 81752000
            ]
        ]
];

function try_walk($country, $key_country, $data){
    static $i = 1;
    echo "<br><strong>".$data.$i."</strong> <br>";
    print "<div style=\"color: #000; border: 3px #000 solid; background: #e6e6e6;\">";
    foreach ($country as $key => $value) {
      if (!is_array($value))
        echo "$key:$value\t<br>";
      else {
          echo "$key: ";
          foreach ($value as $k => $v)
            echo "[{$k} рік. - $v]; <br>";
          }
    }
    print "</div>";
      echo "Average population: ". array_sum($country['population']) / count($country['population']);
      echo "\n";
      $i++;
  }

function print_countries($countries){
    foreach ($countries as $country) {
        foreach ($country as $key => $value)
        {
          if (!is_array($value))
            echo "$key: $value; ";
          else {
            echo "$key: ";
            foreach ( $value as $k => $v )
              echo "[$k year - $v]; ";
            }
        }
        echo "\n\n";
    }
}
function cmp_capital($a, $b){
  return $a <=> $b;
  // if ($a["capital"] < $b["capital"])
  //  return -1;
  // elseif ($a["capital"] == $b["capital"]) 
  //   return 0;
  // else 
  //   return 1;
}
function cmp_name($a, $b){
    return $a <=> $b;
    // if ($a["name"] < $b["name"])
    //  return -1;
    // elseif ($a["name"] == $b["name"]) 
    //   return 0;
    // else 
    //   return 1;
}
function cmp_population_2010($a, $b){
  return $a["population"]["2010"] <=> $b["population"]["2010"];
    // if ($a["population"]["2010"] < $b["population"]["2010"])
    //  return -1;
    // elseif ($a["population"]["2010"] == $b["population"]["2010"]) 
    //   return 0;
    // else 
    //   return 1;
}
function cmp_population_sum($a, $b){
  return array_sum($a["population"]) <=> array_sum($b["population"]);
    // if (array_sum($a["population"]) < $b["population"]["2010"] + $b["population"]["2000"])
    //  return -1;
    // elseif ($a["population"]["2010"] + $a["population"]["2000"] == array_sum($b["population"])) 
    //   return 0;
    // else 
    //   return 1;
}
function cmp_area($a, $b){
  return $a["area"] <=> $b["area"];
}
function cmp_population_average($a, $b){
  return array_sum($a["population"]) / count($a["population"]) <=> array_sum($b["population"]) / count($b["population"]);
    // if (array_sum($a["population"]) / count($a["population"]) < array_sum($b["population"]) / count($b["population"]))
    //  return -1;
    // elseif (array_sum($a["population"]) / count($a["population"]) == array_sum($b["population"]) / count($b["population"]))
    //   return 0;
    // else 
    //   return 1;
}

echo "\n<h4>№ Назва\tСтолиця\tПлоща\tНаселення</h4>\n\n";
uasort($countries, "cmp_capital");
array_walk($countries, "try_walk", "№");

echo "\n<h4>№ Назва\tСтолиця\tПлоща\tНаселення</h4>\n\n";
uasort($countries, "cmp_name");
array_walk($countries, "try_walk", "№");

echo "\n<h4>№ Назва\tСтолиця\tПлоща\tНаселення</h4>\n\n";
uasort($countries, "cmp_area");
array_walk($countries, "try_walk", "№");

echo "\n<h4>№ Назва\tСтолиця\tПлоща\tНаселення</h4>\n\n";
uasort($countries, "cmp_population_average");
array_walk($countries, "try_walk", "№");

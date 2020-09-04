<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

  <?php
  $data = [
      [0, 'Dolphin', 'Mammal', 'Aquatic'],
      [1, 'Frog', 'Reptile', 'Amphibian'],
      [2, 'Lion', 'Mammal', 'Terrestrial'],
      [3, 'Gecko', 'Reptile', 'Terrestrial'],
      [4, 'Penguin', 'Bird', 'Amphibian'],
      [5, 'Rattlesnake', 'Reptile', 'Terrestrial'],
      [7, 'Eagle', 'Bird', 'Terrestrial'],
      [8, 'Salmon', 'Fish', 'Aquatic'],
      [9, 'Elephant', 'Mammal', 'Terrestrial'],
      [10, 'Sea Turtle', 'Reptile', 'Aquatic'],
      [11, 'Shark', 'Fish', 'Aquatic'],
  ];

  // Animals that can live in water
  echo 'These animals can live in water : <br>';
  foreach ($data as $key => $animal) {
      if ($animal[3] == 'Aquatic' || $animal[3] == 'Amphibian') {
          echo $animal[1] . '<br>';
      }
  }

  // Reptiles that can live in water
  echo '-----------------<br>';
  echo 'Reptiles that can live in water : <br>';
  foreach ($data as $key => $animal) {
      if (
          ($animal[2] == 'Reptile' && $animal[3] == 'Aquatic') ||
          ($animal[2] == 'Reptile' && $animal[3] == 'Amphibian')
      ) {
          echo $animal[1] . '<br>';
      }
  }

  // Animals that are either a bird or are terrestrial but not both
  echo '-----------------<br>';
  echo 'Animals that are either a bird or are terrestrial but not both : <br>';
  foreach ($data as $key => $animal) {
      if ($animal[2] == 'Bird' xor $animal[3] == 'Terrestrial') {
          echo $animal[1] . '<br>';
      }
  }

  // Create arrays, for each of the class type : Mammals, Reptiles, Birds, Fish.
  // Use a for loop and if/elseif/else statements to populate the arrays with the correct animals names
  echo '-----------------<br>';
  echo 'Animals based on class type : <br>';
  $mammals = [];
  $reptiles = [];
  $birds = [];
  $fish = [];

  foreach ($data as $key => $animal) {
      if ($animal[2] == 'Mammal') {
          array_push($mammals, $animal[1]);
      } elseif ($animal[2] == 'Reptile') {
          array_push($reptiles, $animal[1]);
      } elseif ($animal[2] == 'Bird') {
          array_push($birds, $animal[1]);
      } elseif ($animal[2] == 'Fish') {
          array_push($fish, $animal[1]);
      }
  }

  echo 'Mammals: ';
  var_dump($mammals);
  echo '<br>';
  echo 'Reptiles: ';
  var_dump($reptiles);
  echo '<br>';
  echo 'Birds: ';
  var_dump($birds);
  echo '<br>';
  echo 'Fish: ';
  var_dump($fish);
  echo '<br>';

  // Create arrays, for each of the class type : Aquatic, Amphibian, Terrestrial.
  // Use a for loop and switch statements to populate the arrays with the correct animals names
  echo '-----------------<br>';
  echo 'Animals based on habitat type : <br>';
  $aquatic = [];
  $amphibian = [];
  $terrestrial = [];

  foreach ($data as $key => $animal) {
      switch ($animal[3]) {
          case 'Aquatic':
              array_push($aquatic, $animal[1]);
              break;
          case 'Amphibian':
              array_push($amphibian, $animal[1]);
              break;
          case 'Terrestrial':
              array_push($terrestrial, $animal[1]);
              break;
      }
  }

  echo 'Aquatic: ';
  var_dump($aquatic);
  echo '<br>';
  echo 'Amphibian: ';
  var_dump($amphibian);
  echo '<br>';
  echo 'Terrestrial: ';
  var_dump($terrestrial);
  echo '<br>';
  ?>



</body>
</html>
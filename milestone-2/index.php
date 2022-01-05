<?php 

include_once __DIR__. './php/database.php';

$filteredMatches = [];

if (isset($_GET['city'])) {
  foreach($matches as $match){
    if (($_GET['city'] === 'Boston') && in_array('Boston', $match )) {
      $filteredMatches[] = $match;
    }elseif (($_GET['city'] === 'Brooklyn') && in_array('Brooklyn', $match )) {
      $filteredMatches[] = $match;
    }elseif(($_GET['city'] === 'Cleveland') && in_array('Cleveland', $match)){
      $filteredMatches[] = $match;
    }elseif (($_GET['city'] === 'Denver') && in_array('Denver', $match)){
      $filteredMatches[] = $match;
    }elseif (($_GET['city'] === 'Detroit') && in_array('Detroit', $match)){
      $filteredMatches[] = $match;
    }elseif(($_GET['city'] === 'Phoenix') && in_array('Phoenix', $match)){
      $filteredMatches[] = $match;
    }
  }
}else{
  $filteredMatches = $matches;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!--Font-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Exo&family=Poppins&display=swap" rel="stylesheet"> 

  <!--Css-->
  <link rel="stylesheet" href="css/style.css?ts=<?=time()?>&quot">

  <title>NBA</title>
</head>
<body>

  <header>

    <div class="header-left">
      <h1>NBA</h1>
      <div class="home-select d-flex align-items-center ">
        <span class="mx-2">Home</span>
        <select class="form-select" aria-label="Default select example">
          <option selected>Seleziona una città</option>
          <option value="Boston">Boston</option>
          <option value="Brooklyn">Brooklyn</option>
          <option value="Cleveland">Cleveland</option>
          <option value="Denver">Denver</option>
          <option value="Detroit">Detroit</option>
          <option value="Phoenix">Phoenix</option>
        </select> 
      </div>
    </div>

  </header>

  <main>
    <div class="container-mdg">

      <?php foreach($filteredMatches as $match): ?>
        <div class="box-game">
        
          <div class="home-player">

            <div class="name">
              <?php
              echo 
              "
                <h4>{$match['home_team']['city']} {$match['home_team']['nickname']}</h4>
              ";
              ?>
            </div>

            <?php 
            echo 
            "
            <img src='img/{$match['home_team']['logo']}' alt=''>
            
            ";
            ?>

            <div class="points">
            <?php 
            echo 
            "
            <h2>{$match['home_team']['score']}</h2>
            ";
            ?>
            </div>

          </div>

          <div class="stadium">
            <?php
                echo
                "
                  <p> {$match['arena']}</p>
                  <span> {$match['city']}</span>
                ";
            ?>
          </div>
      
          <div class="away-player">

            <div class="points">
            <?php 
            echo 
            "
            <h2>{$match['away_team']['score']}</h2>
            ";
            ?>
            </div>

            <?php 
            echo 
            "
            <img src='img/{$match['away_team']['logo']}' alt=''>
            
            ";
            ?>

            <div class="name">
              <?php
              echo 
              "
                <h4>{$match['away_team']['city']} {$match['away_team']['nickname']}</h4>
              ";
              ?>
            </div>


          </div>

        </div>
      <?php endforeach; ?>
    </div>
  </main>
  
</body>
</html>
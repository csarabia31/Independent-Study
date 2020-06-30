<?php 

        header('Content-Type: text/html; charset=utf-8');
        include 'db_connection.php';
        

        /*
        $curl = curl_init();

        curl_setopt_array($curl, array(
	    CURLOPT_URL => "https://api-football-v1.p.rapidapi.com/v2/teams/league/891",
	    CURLOPT_RETURNTRANSFER => true,
	    CURLOPT_ENCODING => "",
	    CURLOPT_MAXREDIRS => 10,
	    CURLOPT_TIMEOUT => 30,
	    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	    CURLOPT_CUSTOMREQUEST => "GET",
	    CURLOPT_HTTPHEADER => array(
		                "x-rapidapi-host: api-football-v1.p.rapidapi.com",
		                "x-rapidapi-key: c64a318be9msh2202f3e27f9ee3dp12b36djsna90cf16289c0"
	                    ),
        ));

      $response = curl_exec($curl);
      $err = curl_error($curl);
      //$result = json_decode($response, true);
      curl_close($curl);

      $fp = fopen('SerieA.json', 'w');
      fwrite($fp, json_encode($response));
      fclose($fp);
      

      $json = file_get_contents('SerieA.json');
      $json_data = json_decode($json,true);
      

      while (is_string($json_data)){ //if is still string
        $json_data = json_decode($json_data,true);
    
      }
      
      //var_dump($json_data);
      
      $curl = curl_init();

      curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api-football-v1.p.rapidapi.com/v2/leagues/league/891",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
                      "x-rapidapi-host: api-football-v1.p.rapidapi.com",
                      "x-rapidapi-key: c64a318be9msh2202f3e27f9ee3dp12b36djsna90cf16289c0"
                      ),
      ));
 
      $response2 = curl_exec($curl);
      $err = curl_error($curl);
      //$result2 = json_decode($response2, true);
      curl_close($curl);

      $fp = fopen('SerieA2.json', 'w');
      fwrite($fp, json_encode($response2));
      fclose($fp);

      
      $json2 = file_get_contents('SerieA2.json');
      $json_data2 = json_decode($json2,true);
      

      while (is_string($json_data2)){ //if is still string
        $json_data2 = json_decode($json_data2,true);
    
      }


      

      for($i=0;$i<20;$i++)
      {
        $teamName = $json_data['api']['teams'][$i]['name'];
        $teamCountry = $json_data2['api']['leagues'][0]['country'];
        $leagueName = $json_data2['api']['leagues'][0]['name'];

        
        //echo $teamName;

        $sql = "INSERT INTO teams (teamname, country, league) values ('$teamName', '$teamCountry', '$leagueName')";

        if (mysqli_query($db, $sql)) 
        {
            echo "New record created successfully";

        }
        else{
            echo "Error: " . $sql . "" . mysqli_error($db);
            } 
        
        
    }

    
    
    $curl = curl_init();

    curl_setopt_array($curl, array(
	CURLOPT_URL => "https://api-football-v1.p.rapidapi.com/v2/leagueTable/891",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"x-rapidapi-host: api-football-v1.p.rapidapi.com",
		"x-rapidapi-key: c64a318be9msh2202f3e27f9ee3dp12b36djsna90cf16289c0"
	    ),
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    $fp = fopen('SerieATable.json', 'w');
    fwrite($fp, json_encode($response));
    fclose($fp);

    */

    $json = file_get_contents('SerieATable.json');
    $json_data = json_decode($json,true);
    

      while (is_string($json_data)){ //if is still string
        $json_data = json_decode($json_data,true);
    
      }

    $numTeams = count($json_data['api']['standings'][0]);
    $i=0;
    

    
?>

    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <title>Camilo's Soccer Stats</title>
</head>


    <body>
        
        <!-- http://127.0.0.1:5500/index.html -->  
        <header class="w3-border" >
            <link rel="stylesheet" href="styles.css">

            <div class="home">
                <a href="table.php">
                    Home
                </a>  
            </div>

            <div class="stats"> 
                <a href="stats.php">
                Player Stats
                </a>  
            </div>

            <div class ="logo">
                <a href="table.php">
                    Juventus Logo
                </a>
            </div>

            <div class="profile">
                <a href="myprofile.php"> 
                    My profile
                </a> 
            </div>

            <div class="signout">
                <a href = "signout.php">
                    Sign Out
                </a>
            </div>
        
    </header>
    <section class="w3-container"> 
        <!--<figure>
            <img src="images/Pele.jpg" alt="pele and maradona" class="pele"> 
            <figcaption>Maradona & Pele</figcaption> 
        </figure>-->
         
        <table style="width:50%" class="w3-table-all w3-hoverable w3-small">
                <tr class="header w3-khaki">
                    <th>Teams</th>
                    <th>MP</th>
                    <th>W</th>
                    <th>D</th>
                    <th>L</th>
                    <th>GF</th>
                    <th>GA</th>
                    <th>GD</th>
                    <th>Pts</th>
                </tr>
        <?php while($i<$numTeams) 
              {
            
                
                $team = $json_data['api']['standings'][0][$i]['teamName'];
                $mp = $json_data['api']['standings'][0][$i]['all']['matchsPlayed'];
                $w = $json_data['api']['standings'][0][$i]['all']['win'];
                $d = $json_data['api']['standings'][0][$i]['all']['draw'];
                $l = $json_data['api']['standings'][0][$i]['all']['lose'];
                $gf = $json_data['api']['standings'][0][$i]['all']['goalsFor'];
                $ga = $json_data['api']['standings'][0][$i]['all']['goalsAgainst'];
                $gd = $json_data['api']['standings'][0][$i]['goalsDiff'];
                $pts = $json_data['api']['standings'][0][$i]['points'];
                $i+=1;
        ?>

                <tr>
                    <td><?php echo $team?></td>
                    <td><?php echo $mp?></td>
                    <td><?php echo $w?></td>
                    <td><?php echo $d  ?></td>
                    <td><?php echo $l  ?></td>
                    <td><?php echo $gf  ?></td>
                    <td><?php echo $ga  ?></td>
                    <td><?php echo $gd  ?></td>
                    <td><?php echo $pts  ?></td>
                </tr>
        <?php        
              }
        ?>
        
        
        </table>
        
        <figure class = "ronaldo">
            <img src="images/DybalaMask.jpg" alt="Ronaldo and Messi" class="ronaldo w3-round" style="width:50%">
            <!--<figcaption>Ronaldo & Messi</figcaption> -->
        </figure>
    </section>
    
    <footer>h</footer>
</body>
</html>

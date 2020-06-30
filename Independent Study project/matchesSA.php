<?php
header('Content-Type: text/html; charset=utf-8');
include 'db_connection.php';

    $curl = curl_init();

    curl_setopt_array($curl, array(
	    CURLOPT_URL => "https://api-football-v1.p.rapidapi.com/v2/fixtures/league/891?timezone=Europe%2FLondon",
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

    curl_close($curl);

    if ($err) {
	    echo "cURL Error #:" . $err;
    } 

    $fp = fopen('SerieAmatches.json', 'w');
    fwrite($fp, json_encode($response));
    fclose($fp);
      

    $json = file_get_contents('SerieAmatches.json');
    $json_data = json_decode($json,true);
      

    while (is_string($json_data)){ //if is still string
        $json_data = json_decode($json_data,true);
    
      }

    $numMatches = count($json_data['api']['fixtures']);
    $str1 = "FT";
    
    
        
    
    
    
    for($i=0;$i<$numMatches;$i++)
        {
            $statusShort = $json_data['api']['fixtures'][$i]['statusShort'];
            if(strcmp($str1,$statusShort)==0)
            {
                $team1 = $json_data['api']['fixtures'][$i]['homeTeam']['team_name'];
                $team2 = $json_data['api']['fixtures'][$i]['awayTeam']['team_name'];
                $team1goals = $json_data['api']['fixtures'][$i]['goalsHomeTeam'];
                $team2goals = $json_data['api']['fixtures'][$i]['goalsAwayTeam'];
                $date = $json_data['api']['fixtures'][$i]['event_date'];

                $sql = "INSERT INTO games (Team1Id, Team2Id, team1goals, team2goals, gameDate) values ((SELECT TeamId from teams WHERE TeamName = '$team1'), (SELECT TeamId from teams WHERE TeamName = '$team2'), '$team1goals', '$team2goals', '$date')";

                if (mysqli_query($db, $sql)) 
                {
                    echo "New record created successfully";

                }
                else{
                    echo "Error: " . $sql . "" . mysqli_error($db);
                }
            } 
        }
    


?>
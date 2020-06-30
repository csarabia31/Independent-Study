<?php 

        include 'db_connection.php';
        header('Content-Type: text/html; charset=utf-8');

        $curl = curl_init();

        curl_setopt_array($curl, array(
	    CURLOPT_URL => "https://api-football-v1.p.rapidapi.com/v2/players/team/720/2019-2020",
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

        $result = json_decode($response, true);
        $numPlayers = count($result['api']['players']);
        //echo $numPlayers;

        for($i=0;$i<$numPlayers;$i++)
        {
            $firstName = $result['api']['players'][$i]['firstname'];
            $lastName = $result['api']['players'][$i]['lastname'];
            $position = $result['api']['players'][$i]['position'];
            $teamName = $result['api']['players'][$i]['team_name'];

            $sql = "INSERT INTO players (firstname, lastname, PlayInId, position) values ('$firstName', '$lastName', (SELECT TeamId from teams WHERE TeamName = '$teamName'), '$position')";

            if (mysqli_query($db, $sql)) 
            {
                echo "New record created successfully";

            }
            else{
                echo "Error: " . $sql . "" . mysqli_error($db);
            } 
        }
        
?>
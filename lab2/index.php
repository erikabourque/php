<head>
	<style>
		table {border-collapse:collapse; table-layout:fixed; width:600px;}
		table td {border:solid 1px #fab; width:100px; word-wrap:break-word;}
	</style>
</head>
<body>
    <?php
        $events = fopen("events.txt", "r");
        $line = fgets($events);
        $monthYear = strtotime($line);
        
        echo "<h1>".date('F', $monthYear).' '.date('Y', $monthYear)."</h1>";
        echo "<table><tr>"
        . "<th>Sunday</th>"
        . "<th>Monday</th>"
        . "<th>Tuesday</th>"
        . "<th>Wednesday</th>"
        . "<th>Thursday</th>"
        . "<th>Friday</th>"
        . "<th>Saturday</th></tr>";
        
        $firstDayOfWeek = date('N', $monthYear);
        $numDaysInMonth = date('t',$monthYear);
        
        while (!feof($events)){
            $line = fgetcsv($events);
            $eventArray[$line[0]] = $line[1];
        }
        
        fclose($events);
        
        echo "<tr>";
        $countDay = 0;
        
        # Writing the first week, adding empty cells until 
        # we reach the first day of the month.
        for ($i = 0; $i < 7; $i++){
            # Make sure we haven't started writing the day of month yet
            if ($countDay == 0)
            {
                # Check if it starts with Sunday, as Sunday
                # is represented by 7 instead of 0
                if ($firstDayOfWeek == 7)
                {
                    $countDay++;
                    echo "<td>".$countDay;
                    
                    if (isset($eventArray[$countDay]))
                    {
                        echo "<br>".$eventArray[$countDay];
                    }
                    
                    echo "</td>";
                    
                }
                elseif ($firstDayOfWeek == $i)
                {
                    # Check if current day of week corresponds 
                    # to current cell 
                    $countDay++;
                    echo "<td>".$countDay;
                    
                    if (isset($eventArray[$countDay]))
                    {
                        echo "<br>".$eventArray[$countDay];
                    }
                    
                    echo "</td>";
                }
                else
                {
                    # Fill with empty cells if doesn't correspond yet
                    echo "<td></td>";
                }
            }
            else
            {
                # Continue writing day of month
                $countDay++;
                echo "<td>".$countDay;

                if (isset($eventArray[$countDay]))
                {
                    echo "<br>".$eventArray[$countDay];
                }

                echo "</td>";
            }
        }
        
        # Filling in the rest of the month
        echo "</tr>";        
        while ($countDay < $numDaysInMonth)
        {
            # Start each row
            echo "<tr>";
            for ($i = 0; $i < 7; $i++)
            {
                # Make sure days remain in the month
                if ($countDay < $numDaysInMonth)
                {
                    $countDay++;
                    echo "<td>".$countDay;

                    if (isset($eventArray[$countDay]))
                    {
                        echo "<br>".$eventArray[$countDay];
                    }

                    echo "</td>";
                }
                else
                {
                    # If no more days in month, fill with
                    # empty cells
                    echo "<td></td>";
                }                
            }
            echo "</tr>";
        }
        
        echo "</table>";
            
    ?>
</body>
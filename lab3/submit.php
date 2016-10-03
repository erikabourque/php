<html>
    <head>
        <style>
            span {
                background-color: pink;
            }
        </style>
    </head>
    <body>        
        <?php
        include 'commonArrays.php';

        if (!empty($_POST['name'])) {
            $name = htmlentities($_POST['name']);
            echo "Welcome, $name.";
            echo "<br>";
        } else {
            echo "<span>Please enter a name.</span>";
            echo "<br>";
        }

        if (isset($_POST['gender'])) {
            $gender = $_POST['gender'];

            if ($gender === 'male' || $gender === 'female') {
                echo "Your gender is $gender";
                echo "<br>";
            } else {
                echo "<span>Invalid gender.</span>";
                echo "<br>";
            }
        } else {
            echo "<span>Please choose a gender.</span>";
            echo "<br>";
        }

        if (isset($_POST['interests'])) {
            $chosenInterests = $_POST['interests'];

            if (array_diff($chosenInterests, $interests)) {
                echo "<span>Invalid interests.</span>";
                echo "<br>";
            } else {
                sort($chosenInterests, SORT_STRING);
                echo "Your interests include ";
                for ($i = 0; $i < count($chosenInterests); $i++) {
                    if ($i != 0) {
                        if ($i == (count($chosenInterests) - 1)) {
                            echo " and ";
                        } else {
                            echo ", ";
                        }
                    }

                    echo "$chosenInterests[$i]";
                }
                echo ".<br>";
            }
        } else {
            echo "You don't have any interests.";
            echo "<br>";
        }

        if (isset($_POST['country'])) {
            $country = $_POST['country'];

            if (!in_array($country, $countries)) {
                echo "<span>Invalid country</span>";
                echo "<br>";
            } else {
                echo "You are from $country";
                echo "<br>";
            }
        }
        include 'index.php';
        ?>
    </body>

</html>


<html>
    <body>
        <form action='submit.php' method='POST'>
            <table>
                <tr>
                    <td>
                        Name:
                    </td>
                    <td>
                        <input type='text' name='name'/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Gender:
                    </td>
                    <td>
                        <input type='radio' name='gender' value='male'/>Male
                        <br>
                        <input type='radio' name='gender' value='female' />Female
                    </td>
                </tr>
                <tr>
                    <td>
                        Interests:
                    </td>
                    <td>
                        <?php
                        include 'commonArrays.php';
                        for ($i = 0; $i < count($interests); $i++) {
                            echo "<input type='checkbox' name='interests[]' value='$interests[$i]'/>$interests[$i]";
                            echo "<br>";
                        }
                        ?>                    
                    </td>
                </tr>
                <tr>
                    <td>
                        Country:
                    </td>
                    <td>
                        <select name='country'>
                            <?php
                            for ($i = 0; $i < count($countries); $i++) {
                                echo "<option value='$countries[$i]'/>$countries[$i]";
                                echo "<br>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
            <input type='submit' value='Submit'/>
        </form>
    </body>
</html>
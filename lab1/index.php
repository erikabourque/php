<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<h1>Multiplication Table</h1>
		<table>
			<?php
				for($i = 0; $i < 10; $i++){
					echo "<tr>";
					for ($j = 0; $j < 10; $j++){
						$num = ($i + 1) * ($j + 1);
						echo "<td>";
							echo $num;
						echo "</td>";
					}
					echo "</tr>";
				}
			?>
		</table>
	</body>
</html>
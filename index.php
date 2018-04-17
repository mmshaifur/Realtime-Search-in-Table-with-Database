<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="my.css">
</head>
<body>

	<h2>My Customers</h2>

	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

	<table id="myTable">
		<tr class="header">
					<th style="width:20%;">ID</th>
					<th style="width:50%;">Name</th>
					<th style="width:30%;">Country</th>
				</tr>
		<?php 
		require_once 'connect.php';
		$sql = ("SELECT * FROM info ");
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
    // output data of each row
			while($row = $result->fetch_assoc()) {

				?>	
				
				<tr>
					<?php
					echo "<td>" .$row["id"] ."</td> <td>" .$row["name"] ."</td><td>". $row["country"]. "</td>"; ?>
				</tr>
				<?php
			}
		} else {
			echo "0 results";
		}
		$con->close();
		?>
	</table>

<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>


</body>
</html>

<?php
$path = './';
require $path . '../../../../dbConnect.inc';
?>


<head>
	<meta charset="utf-8">
	<title>Search Results</title>
	<meta name="author" content="Dev Bhatt & Steve Morrissey">
	<meta name="description" content="Faculty Research Database">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../Front-End/css/style.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css">
</head>

<div class="page-search">
	<?php
	//-----------------------------------------------------------

	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}


	// Get the user's Information
	$interest =  test_input($_POST['searchInterest']);
	$filter = test_input($_POST['filter']);
	?>

	<div class="blck2 cntr"> Search Results </div>

	<table class="table-fill">

		<thead>
			<t>
				<th class="text-left">Name</th>
				<th class="text-left">Keyword</th>
				<th class="text-left">Description</th>
				<th class="text-left">Type</th>
				<th class="text-left">Email</th>
			</t>
		</thead>

		<tbody class="table-hover">




			<?php


			if ($filter == "None") {
				$sql = "SELECT Name, Keyword, Description, Type, Email FROM InterestBase Join UserBase on InterestBase.UserID = UserBase.UserID where Name LIKE '%$interest%' OR Keyword LIKE '%$interest%' or Description LIKE '%$interest%'";
			} else {
				$sql = "SELECT Name, Keyword, Description, Type, Email FROM InterestBase Join UserBase on InterestBase.UserID = UserBase.UserID where Type = '$filter' AND (Name LIKE '%$interest%' OR Keyword LIKE '%$interest%' or Description LIKE '%$interest%')";
			}
			$res = mysqli_query($mysqli, $sql);



			if ($res->num_rows > 0) {
				// output data of each row
				while ($row = $res->fetch_assoc()) {
			?>

					<tr>
						<td><?php echo $row['Name']; ?></td>
						<td><?php echo $row['Keyword']; ?></td>
						<td><?php echo $row['Description']; ?></td>
						<td><?php echo $row['Type']; ?></td>
						<td><?php echo $row['Email']; ?></td>
					</tr>
			<?php
				}
			}
			?>

		</tbody>
	</table>
</div>





<?php
mysqli_close($mysqli);
?>

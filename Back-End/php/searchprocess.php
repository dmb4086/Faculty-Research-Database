<?php
	$path = './';
	require $path.'../../dbConnect.inc';
?>
<h2>Search Results</h2>



<?php
//-----------------------------------------------------------

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}


// Get the user's Information
$interest =  test_input($_POST['searchInterest']) ;





$sql = "SELECT * FROM InterestBase where Keyword=$interest";
$res = mysqli_query($mysqli, $sql);

if ($res->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "UserID: " . $row["UserID"]. " - Keyword: " . $row["Keyword"]. " -Description: " . $row["Description"]. " - Type: ". $row["Type"] ."<br>";
    }
} else {
    echo "0 results";
}



<?php
	
	mysqli_close($mysqli);
?>

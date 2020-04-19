<?php

$path = './';
require $path . '../../../../dbConnect.inc';

if ($mysqli) {


    if (isset($_GET['name'])) {

        $name = $_GET['name'];
        $email = $_GET['email'];
        $keyword = $_GET['keyword'];
        $description = $_GET['description'];
        $StudentFlag = $_GET['StudentFlag'];
        $type = $_GET['type'];
        $department = $_GET['department'];

        // setting the value for StudentFlag to correspond to the databse as the database accepts 
        // 1 or 0 for true or false
        if ($StudentFlag == "true") {
            $StudentFlag = 1;
        } else {
            $StudentFlag = 0;
        }


        // echo "name: ".$name." Email: ".$email." keyword: ".$keyword. "type: ".$type. "SF". $StudentFlag;

        $stmt = $mysqli->prepare("INSERT INTO UserBase (name, email, isStudent) VALUES (?,?,?)");
        $stmt->bind_param("ssi", $name, $email, $StudentFlag);

        $stmt->execute();
        $stmt->close();
    }
    // UserBase has been populated with the selected record. 

    /*
            @author Dev
            Now that we have populated UserBase we have to populate 
            associated tables, more specifically we have to determine whther the user is a 
            student or a faculty and then populate the associated table along with 
            Interest base. 

            Yellow Flags:
            Do a double check with the date. 
            because if person uses the same email ID again the script would kind of break so 
            if done something like 
            SLECT * from USER where emai like EMAIL and DATE = today's date 
            it would get the unique id all the time and no collisions. 

            Step 1 - 
            Get the UserID based on the email. 

            Step 2 -
            Determine whether the user is a student or a Faculty

            Step 2.5 -

            Add them to their respective tables 

            Step 3 (can be done before step 2) - 

            Add the user's shit to interest base


        */
    $sql = "SELECT * FROM UserBase where email='$email'";
    $res = mysqli_query($mysqli, $sql);
    while ($row = $res->fetch_assoc()) {
        $id = $row["UserID"];
        $name = $row['Name'];
        $StudentFlag = $row['isStudent'];
    }
    // echo "new echo: ID of ". $name. "is ". $id;

    // Step 2 

    // if($StudentFlag == 1){
    //     $stmt=$mysqli->prepare("INSERT INTO StudentBase (id) VALUES (?)");
    //     $stmt->bind_param("i", $id);

    // }

    // Step 3 
    $stmt = $mysqli->prepare("INSERT INTO InterestBase (UserID, Keyword, Description,Type) VALUES (?,?,?,?)");
    $stmt->bind_param("isss", $id, $keyword, $description, $type);
    $stmt->execute();
    $stmt->close();
}

<!DOCTYPE html>
<html>
    <head>
        <title>Untitled Document</title>
    </head>

    <body>
        <?php
        session_start();
        $UserName = $_POST['username'];
        $Password = $_POST['password'];
        $UserType = $_POST['cmbUser'];
         if ($UserType == "Admin") {
            $con = mysqli_connect("localhost", "root");
            mysqli_select_db( $con,"cms");
            $sql = "select * from Admin_Tbl where Admin_Name='" . $UserName . "' and Admin_Password='" . $Password . "'";
            $result = mysqli_query($con,$sql);
            $records = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result);
            if ($records == 0) {
                echo $records;
                echo '<script type="text/javascript">alert("Wrong UserName or Password");window.location=\'index.php\';</script>';
            } else {
                $_SESSION['Name'] = $row['Admin_Name'];
                header("location:Admin\index.php");
            }
            mysqli_close($con);
        }
         else if ($UserType == "Sub Admin") {
            $con = mysqli_connect("localhost", "root");
            mysqli_select_db( $con,"cms");
            $sql = "select * from Admin_Tbl where Admin_Name='" . $UserName . "' and Admin_Password='" . $Password . "'";
            $result = mysqli_query($con,$sql);
            $records = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result);
            if ($records == 0) {
                echo $records;
                echo '<script type="text/javascript">alert("Wrong UserName or Password");window.location=\'index.php\';</script>';
            } else {
                $_SESSION['Name'] = $row['Admin_Name'];
                header("location:Admin\index.php");
            }
            mysqli_close($con);
        }
        else if ($UserType == "Police") {
            $con = mysqli_connect("localhost", "root");
            mysqli_select_db($con,"cms");
            $sql = "select * from policestation_tbl
 where UserName='" . $UserName . "' and Password='" . $Password . "'";
            $result = mysqli_query($con,$sql);
            $records = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result);
            if ($records == 0) {
                echo $records;
                echo '<script type="text/javascript">alert("Wrong UserName or Password");window.location=\'index.php\';</script>';
            } else {
                $_SESSION['ID'] = $row['Station_Id'];
                $_SESSION['Name'] = $row['Station_Name'];
                header("location:PoliceStation\index.php");
            }
            mysqli_close($con);
        } else {
            $con = mysqli_connect("localhost", "root");
            mysqli_select_db($con,"cms");
            $sql = "select * from User_Tbl where UserName='" . $UserName . "' and Password='" . $Password . "'";
            $result = mysqli_query($con,$sql);
            $records = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result);
            if ($records == 0) {
                echo $records;
                echo '<script type="text/javascript">alert("Wrong UserName or Password");window.location=\'index.php\';</script>';
            } else {
                $_SESSION['ID'] = $row['User_Id'];
                $_SESSION['Name'] = $row['Name'];
                header("location:RegUser\index.php");
            }
            mysqli_close($con);
        }
        ?>
    </body>
</html>

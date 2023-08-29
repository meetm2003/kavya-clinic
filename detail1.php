<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="meet mistry" content="width=device-width, initial-scale=1.0">
  <title>Kavya Clinic</title>

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .contact {
      margin: 20px;
    }

    form {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    input[type="text"],
    input[type="number"] {
      margin: 15px 0;
      padding: 10px;
      width: 700px; /* Updated width */
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }
    input[type="date"],
input[type="file"] {
  margin: 15px 0;
  padding: 10px;
  width: 700px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
}

    .submitBtn {
      padding: 10px 20px;
      margin-top: 20px;
      background-color: rgb(86, 220, 95);
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    .submitBtn:hover {
      background-color: #45a049;
    }

    .diseaseList {
      margin-top: 20px;
      text-align: center;
    }

    .diseaseList button {
      margin: 5px;
    }
    .header {
        overflow: hidden;
        background-color: #f1f1f1;
        padding: 15px 10px;
        margin-top: 10px;
        margin-left: 10px;
        margin-right: 10px;
        margin-bottom: 10px;
      }
      .header a.font{
        color: #171FF6;
      }
      .header a {
        float: left;
        color:black;
        text-align: center;
        padding: 12px;
        text-decoration: none;
        font-size: 18px; 
        line-height: 25px;
        border-radius: 4px;
      }
      
      .header a.logo {
        font-size: 25px;
        font-weight: bold;
      }
      
      .header a:hover {
            background-color: #ddd;
            color: black;
        }
      
      .header a.active {
        background-color: rgb(86, 220, 95);
        color: white;
      }
      
      
      .header-right {
        float: right;
      }
      
      @media screen and (max-width: 500px) {
        .header a {
          float: none;
          display: block;
          text-align: left;
        }
        
        .header-right {
          float: none;
        }
      }

     </style>
    
    </head>
    <body>
    <?php
        $conn = mysqli_connect("localhost", "root", "", "kavyaclinic");
        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        $pname=$_GET["pname"];
        $dname=$_COOKIE["dname"];

        $result = mysqli_query($conn, "SELECT * FROM info where pname='$pname' AND dname='$dname'");
        
        $mobnum = ""; 
        $count= 1;
        while ($row = mysqli_fetch_array($result)) {
            if ($row['mobnum'] == $mobnum) {
                continue;
            } 
            else {
                $mobnum = $row['mobnum'];
    ?>

    <div class="header">
            <a href="#default" class="logo">Kavya Clinic</a>
            <div class="header-right">
              <a class="active" href="index.php" style="margin-right:20px;">Back</a>
            </div>
          </div>
  <div class="contact">
    <form name="submit-to-google-sheet"  action="info.php" method="post" enctype="multipart/form-data">
      <input type="text" id="patientName" name="patientName" placeholder="Patient Name" value="<?php echo $row['pname']; ?>" required>
      <input type="date" id="date" name="date" placeholder="date" value="<?php echo $row['date']; ?>" required>
      <input type="number" id="mobileNumber" name="mobileNumber" placeholder="Mobile Number" value="<?php echo $row['mobnum']; ?>" required maxlength="10">
      <input type="text" id="dname" name="dname" placeholder="Disease Name" list="dn" value="<?php echo $row['dname']; ?>" required>
      <input type="text" id="medicines" name="medicines" placeholder="medicines Name" value="<?php echo $row['medicines']; ?>" required>
      <datalist id="dn">
            <?php
                }   
                $count++;
            }

                $result1 = mysqli_query($conn,"SELECT dname FROM disease");
            ?>
            <?php  
                while($row = mysqli_fetch_array($result1))
                {
            ?>
            <option><?php echo $row['dname'];?></option>
            <?php }
                mysqli_close($conn);
		    ?>
        </datalist>
      <input type="file" id="images" name="images[]" accept="images/*" multiple required>
      <Button type="submit" name="submitBtn" class="submitBtn">Submit</Button>
    </form>
    <?php
                    
            
            // header("location: index.html");
    ?>
  </div>
</body>

</html>


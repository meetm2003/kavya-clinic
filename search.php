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
      table {
        table-layout: fixed;
    }

    th, td {
        text-align: center;
        vertical-align: middle;
    }
     </style>
    
    </head>
    <body>
        <div class="header">
            <a href="#default" class="logo">Kavya Clinic</a>
            <div class="header-right">
              <a class="active" href="index.php" style="margin-right:20px;">Back</a>
            </div>
            
        </div>
        
        <div class="contact">
            <form name="submit-to-google-sheet"  action="search1.php" method="post">
      
                <input type="text" class="search" placeholder="search customer details" name="pname" id="pname" required>
                <Button type="submit" name="submitBtn" class="submitBtn">Submit</Button>

            </form>
        </div>
        <br>
        <br>
        <?php
            $dname = $_POST['dname'];
            $dnamec = "dname";
            setcookie($dnamec, $dname, time() + (86400 * 30), "/");

            $conn = mysqli_connect("localhost", "root", "", "kavyaclinic");
            if ($conn === false) {
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }

            $result = mysqli_query($conn, "SELECT * FROM info where dname='$dname'");
        ?>
    <div class="box-body table-responsive no-padding">
        <table style="width: 100%;" align="center">
            <tr style="background: rgba(217,225,242,1.0);">
                <th class="text-center" name="p1">ID</th>
                <th class="text-center">Patient Name</th>
                <th class="text-center">Date</th>
                <th class="text-center">Mobile Number</th>
                <th class="text-center">Medicines</th>  
                <th class="text-center">View</th>
                <th class="text-center">Renew</th>   
            </tr>
            <?php
            $mobnum = ""; 
            $count= 1;
            while ($row = mysqli_fetch_array($result)) {
                if ($row['mobnum'] == $mobnum) {
                    continue;
                } 
                else {
                    $mobnum = $row['mobnum'];
              
                    ?>
                    <tr>
                        <td><?php echo $count ?></td>
                        <td><?php echo $row['pname']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['mobnum']; ?></td>
                        <td><?php echo $row['medicines']; ?></td>
                        <td><a href="patiant.php?pname=<?php echo $row['pname'];?>">View</a></td>
                        <td><a href="detail1.php?pname=<?php echo $row['pname'];?>">Renew</a></td>
                    </tr>
            <?php
                    
                }   
                $count++;
            }
            mysqli_close($conn);
            // header("location: index.html");
            ?>
        </table>
    </div>
    </body>

</html>


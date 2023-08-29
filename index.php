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
    <div class="header">
            <a href="#default" class="logo">Kavya Clinic</a>
            <div class="header-right">
              <a class="active" href="detail.php" style="margin-right:20px;">New</a>
            </div>
          </div>
  <div class="contact">
    <form name="submit-to-google-sheet"  action="search.php" method="post">
      
      <input type="text" id="dname" name="dname" placeholder="Disease Name" list="dn" required>
      <datalist id="dn">
            <?php $conn = mysqli_connect("localhost", "root", "", "kavyaclinic");
                if($conn === false){
                    die("ERROR: Could not connect. "
                        . mysqli_connect_error());
                }
                $result = mysqli_query($conn,"SELECT dname FROM disease");
            ?>
            <?php  
                while($row = mysqli_fetch_array($result))
                {
            ?>
            <option><?php echo $row['dname'];?></option>
            <?php }
                mysqli_close($conn);
		    ?>
        </datalist>
      <Button type="submit" name="submitBtn" class="submitBtn">Submit</Button>
    </form>
  </div>
</body>

</html>
<!-- ALTER TABLE info DROP id;

ALTER TABLE info ADD id BIGINT( 255 ) NOT NULL AUTO_INCREMENT FIRST ,ADD PRIMARY KEY (id) -->

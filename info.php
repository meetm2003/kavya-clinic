<html>
<body>
<style>
   body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    .image-row {
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }

    .image-wrapper {
        margin-right: 10px;
    }

    .image-wrapper img {
        width: 150px; /* Adjust the desired width */
        height: auto;
    }
    table {
        table-layout: fixed;
    }

    th, td {
        text-align: center;
        vertical-align: middle;
    }
</style>

    <table border="1" align="left">
        <br>
        <tr style="background: rgba(217,225,242,1.0);">
            <td colspan="4">
                <a href="index.html">Back</a>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <?php

$pname = $_POST['patientName'];
$mobnum = $_POST['mobileNumber'];
$dname = $_POST['dname'];
$date = $_POST['date'];
$medicines = $_POST['medicines'];

// Check if the file upload button is clicked
if (isset($_POST['submitBtn'])) {
    $images = $_FILES['images'];

    $conn = mysqli_connect("localhost", "root", "", "kavyaclinic");
    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // Get the total number of uploaded images
    $num_img = count($images['name']);

    for ($i = 0; $i < $num_img; $i++) {
        $image_name = $images['name'][$i];
        $tmp_name = $images['tmp_name'][$i];
        $error = $images['error'][$i];

        if ($error === 0) {
            $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $new_img_name = uniqid('IMG-', true) . '.' . $img_ex_lc;
            $img_upload_path = 'uploads/' . $new_img_name;

            if (move_uploaded_file($tmp_name, $img_upload_path)) {
                // File uploaded successfully, store the image name in the database
                $sql = "INSERT INTO info (pname, date, mobnum, dname, images, medicines) 
                        VALUES ('$pname', '$date', '$mobnum', '$dname', '$new_img_name', '$medicines')";
                mysqli_query($conn, $sql);
            } else {
                $em = "Error occurred while uploading the file.";
                // Handle the error as needed
            }
        } else {
            $em = "Error occurred while uploading the file.";
            // Handle the error as needed
        }
    }
}

$result = mysqli_query($conn, "SELECT * FROM info");
?>
<div class="box-body table-responsive no-padding">
    <table style="width: 100%;" align="center">
        <tr style="background: rgba(217,225,242,1.0);">
            <th class="text-center" name="p1">ID</th>
            <th class="text-center">Patient Name</th>
            <th class="text-center">Date</th>
            <th class="text-center">Mobile Number</th>
            <th class="text-center">Disease Name</th>
            <th class="text-center">Medicines</th>
            <th class="text-center">Images</th>
        </tr>
        <?php
        $mobnum = ""; // Variable to store the previous pname
        
        while ($row = mysqli_fetch_array($result)) {
            if ($row['mobnum'] == $mobnum) {
                    $images = explode(',', $row['images']);
                    foreach ($images as $image) {
                        echo '<tr>';
                        echo '<td>'.'</td>';
                        echo '<td>'.'</td>';
                        echo '<td>'.'</td>';
                        echo '<td>'.'</td>';
                        echo '<td>'.'</td>';
                        echo '<td>'.'</td>';
                        echo '<td><div class="image-wrapper"><img src="uploads/' . $image . '" alt="Image"></div></td>';
                        echo '</tr>';
                    }
            } 
            else {
                $mobnum = $row['mobnum'];
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['pname']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['mobnum']; ?></td>
                    <td><?php echo $row['dname']; ?></td>
                    <td><?php echo $row['medicines']; ?></td>
                    <div class="image-row">
                        <?php
                        $images = explode(',', $row['images']);
                        foreach ($images as $image) {
                            echo '<td><div class="image-wrapper"><img src="uploads/' . $image . '" alt="Image"></div></td>';
                        }
                        ?>
                    </div>
                </tr>
                <?php
            }
        }
        mysqli_close($conn);
        // header("location: index.html");
        ?>
    </table>
</div>
<script>
  window.location.href = "detail.php";
</script>
</body>
</html>

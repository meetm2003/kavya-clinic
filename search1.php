<?php
$conn = mysqli_connect("localhost", "root", "", "kavyaclinic");
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
    $pname=$_POST["pname"];
    $dname=$_COOKIE["dname"];

    $result = mysqli_query($conn, "SELECT * FROM info where pname='$pname' AND dname='$dname'");

?>
<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kavya Clinic</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 18px;
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
            height: 100px;
        }

        table {
            table-layout: fixed;
            margin-top: 10px;
            padding-left: 8px;
            padding-right: 9px;
            margin-bottom: 10px;
        }

        th,
        td {
            text-align: center;
            vertical-align: middle;
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

        .header a.font {
            color: #171FF6;
        }

        .header a {
            float: left;
            color: black;
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
            <a class="active" href="index.php" style="margin-right:20px;">Back</a>
        </div>
    </div>
    <div class="box-body table-responsive no-padding">
        <table style="width: 100%;" align="center">
            <tr style="background: rgba(217,225,242,1.0);">
                <th class="text-center" style="width: 5%;" name="p1">ID</th>
                <th class="text-center">Patient Name</th>
                <th class="text-center">Date</th>
                <th class="text-center">Mobile Number</th>
                <th class="text-center">Disease Name</th>
                <th class="text-center">Medicines</th>
                <th class="text-center">Images</th>
                <th class="text-center">Renew</th>
            </tr>
            <?php
            $prev_mobnum = "";
            $date="";
            $count= 1;
            while ($row = mysqli_fetch_array($result)) {
                if ($row['mobnum'] == $prev_mobnum && $row['date'] == $date) {
                    $images = explode(',', $row['images']);
                    foreach ($images as $image) {
                        echo '<tr>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td><div class="image-wrapper"><img src="uploads/' . $image . '" alt="Image" onclick="openImagePopup(this)"></div></td>';
                        echo '</tr>';
                    }
                } else {
                    $prev_mobnum = $row['mobnum'];
                    $date = $row['date'];
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $row['pname']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['mobnum']; ?></td>
                        <td><?php echo $row['dname']; ?></td>
                        <td><?php echo $row['medicines']; ?></td>
                        <div class="image-row">
                            <?php
                            $images = explode(',', $row['images']);
                            foreach ($images as $image) {
                                echo '<td><div class="image-wrapper"><img src="uploads/' . $image . '" alt="Image" onclick="openImagePopup(this)"></div></td>';
                            }
                            ?>
                        </div>
                        <td><a href="detail1.php?pname=<?php echo $row['pname'];?>">Renew</a></td>
                    </tr>
                    <?php
                    
                }
                $count++;
            }
            mysqli_close($conn);
            ?>
        </table>
    </div>

    <!-- JavaScript code for the image popup -->
    <script>
        function openImagePopup(image) {
            var imageUrl = image.src;
            var popupHtml = '<div class="image-popup">' +
                '<img src="' + imageUrl + '" alt="Popup Image">' +
                '</div>';
            var popupWindow = window.open("", "Image Popup", "width=900, height=500");
            popupWindow.document.write(popupHtml);
            popupWindow.document.close();
        }
    </script>

    <!-- CSS styles for the image popup -->
    <style>
        .image-popup {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .image-popup img {
            max-width: 90%;
            max-height: 90%;
        }
    </style>
</body>

</html>

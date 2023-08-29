
<?php

$conn = mysqli_connect("localhost", "root", "", "kavyaclinic");
    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

$result = mysqli_query($conn, "SELECT * FROM disease");
?>
<div class="box-body table-responsive no-padding">
    <table style="width: 100%;" align="center">
        <tr style="background: rgba(217,225,242,1.0);">
            <th class="text-center">Disease Name</th>
            
        </tr>
        <?php
        $mobnum = ""; // Variable to store the previous pname
        
        while ($row = mysqli_fetch_array($result)) {
           
                
                ?>
                <tr>
                    
                    <td><?php echo $row['dname']; ?></td>
                    
                </tr>
                <?php
            }
        mysqli_close($conn);
        // header("location: index.html");
        ?>
    </table>

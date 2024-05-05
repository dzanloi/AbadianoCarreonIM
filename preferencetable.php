<?php
      include 'php/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css\preftable.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preferences</title>

</head>
<body>
   

  
    <div class="dashboard">
    <Table>
        <th>userid</th>
        <th>Prefered gender</th>
       
        <th>age range</th>
        <th>prefered course</th>
        
        <?php
        
        
         $sql = "SELECT * FROM tblpreference";
         $result = mysqli_query($connection,$sql);  
         while($row = mysqli_fetch_assoc($result))
         {
        ?>
        <tr>
            <td><a href="profilepage.php?data=<?php echo $row['userid'];?>"><?php echo $row['userid'];?></a></td>
            <td><?php echo $row['preferedgender'];?>    </td>
            <td><?php echo $row['preferedminimumage'];?> to <?php echo $row['preferedmaximumage'];?></td>
            <td><?php echo $row['preferedcourse'];?></td>
            </tr>
        <?php
        }
        ?>
        
                
    </Table>

        
    </div>
   







</body>
</html>

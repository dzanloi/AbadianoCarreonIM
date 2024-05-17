<?php 

  include 'php/connect.php';
 
  $sql = "SELECT AVG(subquery.match_count) AS average_match_count
  FROM (
      SELECT p.userid, COUNT(u.userid) AS match_count
      FROM tbluser u
      INNER JOIN tblpreference p ON u.age >= p.preferedminimumage AND u.age <= p.preferedmaximumage AND p.userid != u.userid
      GROUP BY p.userid
  ) AS subquery
  INNER JOIN tbluser ON subquery.userid = tbluser.userid";


  $result = mysqli_query($connection, $sql);
  $row = mysqli_fetch_assoc($result);
  $average_match = $row['average_match_count'];



  $sql = "WITH match_counts AS (
      SELECT p.userid, COUNT(u.userid) AS match_count
      FROM tbluser u
      INNER JOIN tblpreference p ON u.age >= p.preferedminimumage AND u.age <= p.preferedmaximumage AND p.userid != u.userid
      GROUP BY p.userid
  ),
  average_match_count AS (
      SELECT AVG(match_count) AS avg_count
      FROM match_counts
  )
  SELECT COUNT(*) AS lesser_chance
  FROM match_counts
  WHERE match_count < (SELECT avg_count FROM average_match_count);";
  $result = mysqli_query($connection, $sql);
  $row = mysqli_fetch_assoc($result);
  $lesser_chance = $row['lesser_chance'];


  $sql =  "WITH match_counts AS (
      SELECT p.userid, COUNT(u.userid) AS match_count
      FROM tbluser u
      INNER JOIN tblpreference p ON u.age >= p.preferedminimumage AND u.age <= p.preferedmaximumage AND p.userid != u.userid
      GROUP BY p.userid
  ),
  average_match_count AS (
      SELECT AVG(match_count) AS avg_count
      FROM match_counts
  )
  SELECT COUNT(*) AS greater_chance
  FROM match_counts
  WHERE match_count > (SELECT avg_count FROM average_match_count);";
  $result = mysqli_query($connection, $sql);
  $row = mysqli_fetch_assoc($result);
  $greater_chance = $row['greater_chance'];




$sql =  "SELECT SUM(subquery.match_count) AS sum_of_matches
FROM (
SELECT p.userid, COUNT(u.userid) AS match_count
FROM tbluser u
INNER JOIN tblpreference p ON u.age >= p.preferedminimumage AND u.age <= p.preferedmaximumage AND p.userid != u.userid
GROUP BY p.userid
) AS subquery";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
$sum_of_matches = $row['sum_of_matches'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css\preftable.css?v=1">




        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Syncopate:wght@700&display=swap">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</head>
<body>

    <div class="dashboard">
        <div class="main">
            <div class="header">
                <div class="scrollable-table">
          
                    FOR AGE COUNT
                    <Table>
                        <th>Age</th>
                        <th>Count</th>
                    
                    
                        
                        <?php
                        
                        
                        $sql = "SELECT age, count(userid) FROM tbluser GROUP BY age";
                        $result = mysqli_query($connection,$sql);  
                        while($row = mysqli_fetch_assoc($result))
                        {
                        ?>
                        <tr>
                            <td><?php echo $row['age'];?>    </td>
                            <td><?php echo $row['count(userid)'];?></td>
                            </tr>
                        <?php
                        }
                        ?>
                        
                                
                    </Table>





                    FOR MATCH COUNT
                    <Table>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Match Counts</th>

                        <?php

                        $sql = "SELECT subquery.match_count, tbluser.firstname, tbluser.lastname
                        FROM (
                            SELECT p.userid, COUNT(u.userid) AS match_count
                            FROM tbluser u
                            INNER JOIN tblpreference p ON u.age >= p.preferedminimumage AND u.age <= p.preferedmaximumage AND p.userid != u.userid
                            GROUP BY p.userid
                        ) AS subquery
                        INNER JOIN tbluser ON subquery.userid = tbluser.userid;";


                        $result = mysqli_query($connection, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                    
                        ?>
                            <tr>
                                <td><?php echo $row['firstname'] ?></td>
                                <td><?php echo $row['lastname'] ?></td>
                                <td><?php echo $row['match_count']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </Table>

        Average Match Count
        <?php
        echo  $average_match;
        
        ?>

    <div class="canvas">
    <canvas id="matchgraph" width="30" height="30"></canvas>
    </div>
                    <script>
                        var ctx = document.getElementById('matchgraph').getContext('2d');
                        var taskChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: ['have lesser match chance', 'Have greater match chances'],
                                datasets: [{
                                    label: '# of Tasks',
                                    data: [<?php echo $lesser_chance;?>, <?php echo $greater_chance ;?>],
                                    backgroundColor: [
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(255, 182, 193, 1)'
                                    ],
                                    borderColor: [
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(255, 182, 193, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>


                  





        <?php
        echo "Sum of matches for all users";
        echo $sum_of_matches;
        ?>






                    FOR GENDER COUNT
                    <Table>
                        <th>Gender</th>
                        <th>Count</th>
                        
                        
                            
                        <?php
                            
                            
                        $sql = "SELECT gender, count(userid) FROM tbluser GROUP BY gender";
                        $result = mysqli_query($connection,$sql);  
                        while($row = mysqli_fetch_assoc($result))
                        {
                        ?>
                        <tr>
                        <td><?php echo $row['gender'];?>    </td>
                            <td><?php echo $row['count(userid)'];?>    </td>
                            
                            </tr>
                        <?php
                        }
                        ?>
                            
                                    
                    </Table>






                </div>
            </div>
        </div>
    </div>

    <div class="circle-1"></div>
    <div class="circle-2"></div>
    <div class="circle-3"></div>
</body>
</html>
<?php
session_start();
include('config.php');
include "header.php";



$sql = "SELECT * from tbldata";
$query = $dbh->prepare($sql);

$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

if ($query->rowCount() > 0) {
    foreach ($results as $result) { ?>


        <!DOCTYPE html>
        <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
        <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
        <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
        <!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
        <html>

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title></title>
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="">
            <style>
                table,
                th,
                td {
                    border: 1px solid black;
                    border-collapse: collapse;
                }
            </style>
        </head>

        <body>
            <center>

                <table style="width:80%; margin:20px">
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Blood sugar level before breakfast</th>
                        <th>Time</th>
                        <th>Breakfast</th>
                        <th>Time</th>
                        <th>Lunch</th>
                        <th>Time</th>
                        <th>Dinner</th>
                        <th>Blood Sugar level 2hrs after dinner</th>
                    </tr>
                    <tr>
                        <td><?php echo htmlentities($result->date); ?></td>
                        <td><?php echo htmlentities($result->time1); ?></td>
                        <td> <?php echo htmlentities($result->beforebreakfast); ?></td>

                        <td><?php echo htmlentities($result->time2); ?></td>
                        <td><?php echo htmlentities($result->breakfast); ?></td>

                        <td> <?php echo htmlentities($ppd = $result->time3); ?></td>
                        <td> <?php echo htmlentities($ppd = $result->lunch); ?></td>
                        <td> <?php echo htmlentities($ppd = $result->time4); ?></td>
                        <td> <?php echo htmlentities($ppd = $result->dinner); ?></td>
                        <td><?php echo htmlentities($result->afterdinner); ?></td>
                    </tr>

                </table>

        <?php }
} else {
}
        ?>

            </center>



        </body>

        </html>
<?php
ob_start();
require_once "config.php";
session_start();
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Master Bank</title>
        <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap-social.css"> 
    <link rel="stylesheet" href="styles.css">
     <style>
        body{
            backdrop-filter: blur(5px);
        }
    </style>
</head>
<body>
 <!-- NAVBAR START--> 
 <?php include("nav.php") ?>
<!-- NAVBAR END-->

<!-- ALLUSERS TABLE START-->
<div class="row row-content">
        <div class="col-12 offset-sm-1 col-sm-10">
            <h2 style="padding-top: 120px ;text-align: center; color:white;"><b>USER ACCOUNTS</b></h2>
            <div class="table-responsive ">
                <table class="table table-dark table-striped">
                    <thead class="thead-dark">
                      <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>EMAIL</th>
                      <th>CREDITS</th>
                      <th>VIEW</th>
                      </tr>
                    </thead>
                    <tbody> 
                      <tr>
                      <?php 
                       $stmt = $pdo->query("SELECT * FROM users");
                       $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                       if(count($rows)>0){
                         foreach($rows as $row ) { ?>
                         <td><?php echo htmlentities($row['user_id']); ?> </td>
                         <td><?php echo('<a href="profile.php?user_id='.$row['user_id'].'">'.htmlentities($row['user_name']).'</a> ');
                                         ?>  </td>
                         <td><?php echo htmlentities($row['email']); ?> </td>
                         <td><?php echo htmlentities($row['user_credits']); ?> </td>
                         <td><button><?php  echo('<a href="profile.php?user_id='.$row['user_id'].'">'."View".'</a> ');
        ?></button></td>
                         </tr>
                         <?php }
                              }
                          ?>
                    </tbody>
                </table>
            </div>
        </div>
 </div>                   
<!-- ALLUSERS TABLE END-->

 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>   
</body>
</html>



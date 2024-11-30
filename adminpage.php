<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Homepage</title>
  <link rel="icon" href="images/fab.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <style>
    body {
      font-family: "Lato", sans-serif;
      background-image: url(admin.jpg);
      background-size: cover;
    }
    
    @media screen and (max-height: 450px) {
      .sidebar a { font-size: 18px; }
    }
  </style>
</head>
<body class="bg-gray-900 text-white">



<?php include 'adminnav.php'; ?>

    <h3 class="text-white pl-5 mt-4">Admin Dashboard</h3>
    <br>
    <div class="container mx-auto">
      <div class="flex flex-wrap justify-center">
        <div class="w-full sm:w-1/2 lg:w-1/3 p-4">
          <div class="bg-blue-500 text-white p-4 rounded-lg shadow-md">
            <div class="panel-heading">

              <a class="link text-white" href="readjs.php">Total Items</a>
            </div>
            <div class="panel-body">
              <h3 class="text-center"><b>
                <?php
                  include 'dbconnect.php'; // Include the dbconnect.php to use the $connection variable
                  $query = "SELECT id FROM product ORDER BY name";
                  $query_run = mysqli_query($conn, $query);
                  $row = mysqli_num_rows($query_run);
                  echo "$row";
                ?>
              </b></h3>
            </div>
          </div>
        </div>


        <div class="w-full sm:w-1/2 lg:w-1/3 p-4">
          <div class="bg-blue-500 text-white p-4 rounded-lg shadow-md">
            <div class="panel-heading">
              <a class="link text-white" href="readjs.php">Glass Items</a>
            </div>
            <div class="panel-body">
              <h3 class="text-center"><b>
                <?php
                  $query = "SELECT id FROM product WHERE category='glass'";
                  $query_run = mysqli_query($conn, $query);
                  $row = mysqli_num_rows($query_run);
                  echo "$row";
                ?>
              </b></h3>
            </div>
          </div>
        </div>
        <div class="w-full sm:w-1/2 lg:w-1/3 p-4">
          <div class="bg-blue-500 text-white p-4 rounded-lg shadow-md">
            <div class="panel-heading">
              <a class="link text-white" href="#">Textile Items</a>
            </div>
            <div class="panel-body">
              <h3 class="text-center"><b>
                <?php
                  $query = "SELECT id FROM product WHERE category='textile'";
                  $query_run = mysqli_query($conn, $query);
                  $row = mysqli_num_rows($query_run);
                  echo "$row";
                ?>
              </b></h3>
            </div>
          </div>
        </div>
        <div class="w-full sm:w-1/2 lg:w-1/3 p-4">
          <div class="bg-blue-500 text-white p-4 rounded-lg shadow-md">
            <div class="panel-heading">
              <a class="link text-white" href="#">Scale Items</a>
            </div>
            <div class="panel-body">
              <h3 class="text-center"><b>
                <?php
                  $query = "SELECT id FROM product WHERE category='scale'";
                  $query_run = mysqli_query($conn, $query);
                  $row = mysqli_num_rows($query_run);
                  echo "$row";
                ?>
              </b></h3>
            </div>
          </div>
        </div>
        <div class="w-full sm:w-1/2 lg:w-1/3 p-4">
          <div class="bg-blue-500 text-white p-4 rounded-lg shadow-md">
            <div class="panel-heading">
              <a class="link text-white" href="#">Chemical Items</a>
            </div>
            <div class="panel-body">
              <h3 class="text-center"><b>
                <?php
                  $query = "SELECT id FROM product WHERE category='chemicals'";
                  $query_run = mysqli_query($conn, $query);
                  $row = mysqli_num_rows($query_run);
                  echo "$row";
                ?>
              </b></h3>
            </div>
          </div>
        </div>
        <div class="w-full sm:w-1/2 lg:w-1/3 p-4">
          <div class="bg-blue-500 text-white p-4 rounded-lg shadow-md">
            <div class="panel-heading">
              <a class="link text-white" href="#">Lab Items</a>
            </div>
            <div class="panel-body">
              <h3 class="text-center"><b>
                <?php
                  $query = "SELECT id FROM product WHERE category='lab'";
                  $query_run = mysqli_query($conn, $query);
                  $row = mysqli_num_rows($query_run);
                  echo "$row";
                ?>
              </b></h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
      }

      function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
      }
    </script>
  </div>
</body>
</html>

<?php
include 'dbconnect.php';

// Handling delete functionality
if (isset($_GET['delete'])) {
   $productId = $_GET['delete'];

   // Redirect to confirmation page
   header("Location: confirm_delete.php?id={$productId}");
   exit;
}

// Handling search functionality
if (isset($_GET['search'])) {
   $search = mysqli_real_escape_string($conn, $_GET['search']);

   $select = mysqli_query($conn, "SELECT id, name, origin, details, image FROM product WHERE name LIKE '%$search%' ORDER BY name ASC") or die('query failed');
} else {
   $select = mysqli_query($conn, "SELECT id, name, origin, details, image FROM product ORDER BY name ASC") or die('query failed');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Product List</title>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
   <link rel="icon" href="images/fab.png">
   <style>
      body {
         background-color: #FAF9D0;
      }
      .sidebar {
         transition: width 0.5s;
      }
      .sidebar-open {
         width: 250px;
      }
      .sidebar-closed {
         width: 0;
      }
   </style>
</head>
<body class="bg-gray-900 text-white">

<?php include 'adminnav.php'; ?>

         <div class="container mx-auto mt-6">
            <h1 class="text-center text-3xl font-bold mb-6 text-gray-50">Product List</h1>

            <!-- Search Form -->
            <form class="flex justify-center mb-6" action="" method="get">
               <input class="form-input mr-2 p-2 border border-gray-300 rounded text-black" type="text" name="search" placeholder="Search Product" aria-label="Search">
               <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded" type="submit">Search</button>
            </form>
         </div>

         <div class="container mx-auto px-4">
            <?php
            if (isset($message)) {
               echo '<div class="mb-4">';
               echo '<div class="alert alert-success">';
               echo $message;
               echo '</div>';
               echo '</div>';
            }

            echo '<div class="overflow-x-auto">';
            echo '<table class="min-w-full bg-gray-900 shadow-md rounded-lg">';
            echo '<thead class="bg-gray-800 text-white">';
            echo '<tr>';
            echo '<th class="py-2 px-4">Image</th>';
            echo '<th class="py-2 px-4">Name</th>';
            echo '<th class="py-2 px-4">Origin</th>';
            echo '<th class="py-2 px-4">Details</th>';
            echo '<th class="py-2 px-4">Actions</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while($row = mysqli_fetch_assoc($select)) {
               echo '<tr class="bg-gray-900 border-b border-gray-200">';
               echo '<td class="py-2 px-4"><img src="uploaded_img/'.$row['image'].'" class="h-16 w-16 object-cover" alt="Product Image"></td>';
               echo '<td class="py-2 px-4">'.$row['name'].'</td>';
               echo '<td class="py-2 px-4">'.$row['origin'].'</td>';
               echo '<td class="py-2 px-4">'.$row['details'].'</td>';
               echo '<td class="py-2 px-4"><a href="confirm_delete.php?id='.$row['id'].'" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded">Delete</a></td>';
               echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';

            mysqli_close($conn);
            ?>
         </div>
      </div>
   </div>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script>
      function openNav() {
         document.getElementById("mySidebar").classList.remove('sidebar-closed');
         document.getElementById("mySidebar").classList.add('sidebar-open');
         document.getElementById("mainContent").classList.add('ml-64');
      }

      function closeNav() {
         document.getElementById("mySidebar").classList.remove('sidebar-open');
         document.getElementById("mySidebar").classList.add('sidebar-closed');
         document.getElementById("mainContent").classList.remove('ml-64');
      }
   </script>
</body>
</html>

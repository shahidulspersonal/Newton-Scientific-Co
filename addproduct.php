

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Product Post</title>
   <link rel="icon" href="images/fab.png">
   <!-- Tailwind CSS CDN -->
   <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

   <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

      body {
         font-family: 'Poppins', sans-serif;
         background-image: url('abc.jpg');
         background-size: cover;
      }
   </style>
</head>
<body class="bg-gray-900 text-black">

<?php include 'adminnav.php'; ?>

  <div class="flex flex-1 items-center justify-center p-6">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-6">
      <div class="bg-orange-500 text-black text-center py-4 rounded-t-lg">
        <h3 class="text-xl font-semibold">Post a Product</h3>
      </div>

      <?php
      session_start();
      if (isset($_SESSION['message'])) {
         echo '<div id="notification" class="bg-blue-500 text-black text-center py-2 rounded my-4">' . $_SESSION['message'] . '</div>';
         unset($_SESSION['message']); // Clear the message after displaying
      }
      ?>

      <form id="postForm" action="addproduct.php" method="post" enctype="multipart/form-data" class="space-y-4">
        <input type="text" id="productName" name="name" placeholder="Enter Product Name" class="w-full p-3 border rounded" required>
        <textarea name="details" placeholder="Enter Product Details" class="w-full p-3 border rounded" required></textarea>
        <select name="category" class="w-full p-3 border rounded" required>
          <option value="">Select Category</option>
          <option value="glass">Glass</option>
          <option value="scale">Scale</option>
          <option value="chemicals">Chemicals</option>
          <option value="textile">Textile Testing Items</option>
          <option value="lab">Lab Instrument</option>
          <option value="lab">deetergent</option>
          <option value="lab">meter-tester</option>
        </select>
        <input type="text" name="origin" placeholder="Enter Product Origin" class="w-full p-3 border rounded" required>
        <input type="number" name="stock" placeholder="Enter Stock Quantity" class="w-full p-3 border rounded" required>
        <input type="file" name="image" class="w-full p-3 border rounded">
        
        <!-- Hidden pro_url field -->
        <input type="hidden" id="productUrl" name="pro_url">

        <input type="submit" name="submit" value="Post This Product" class="w-full bg-blue-500 text-white p-3 rounded cursor-pointer hover:bg-blue-700">
      </form>
    </div>
  </div>

<script>
document.getElementById('postForm').addEventListener('submit', function(event) {
   const productName = document.getElementById('productName').value;
   const productUrl = productName.toLowerCase() // Convert to lowercase
                                  .replace(/\s+/g, '-') // Replace spaces with hyphens
                                  .replace(/[^a-z0-9-]/g, ''); // Remove all non-alphanumeric characters except hyphens
   document.getElementById('productUrl').value = productUrl;
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
   let notification = document.getElementById('notification');
   if (notification) {
      setTimeout(function() {
         notification.style.display = 'none';
      }, 5000); // Hide notification after 5 seconds
   }
});
</script>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'dbconnect.php';

if (isset($_POST['submit'])) {
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $details = mysqli_real_escape_string($conn, $_POST['details']);
   $category = mysqli_real_escape_string($conn, $_POST['category']);
   $origin = mysqli_real_escape_string($conn, $_POST['origin']);
   $stock = intval($_POST['stock']); // Ensure stock is treated as an integer
   $pro_url = mysqli_real_escape_string($conn, $_POST['pro_url']); // Get the pro_url value

   // Uploading image
   $image = $_FILES['image']['name'];
   $tmpname = $_FILES['image']['tmp_name'];
   $uploc = 'uploaded_img/'.$image;

   $insert = "INSERT INTO `product` (name, details, category, origin, stock, image, pro_url) VALUES ('$name', '$details', '$category', '$origin', $stock, '$image', '$pro_url')";

   if (mysqli_query($conn, $insert)) {
      move_uploaded_file($tmpname, $uploc);
      $_SESSION['message'] = "Product posted successfully!";
      header("Location: addproduct.php"); // Redirect to addproduct.php
      exit;
   } else {
      $_SESSION['message'] = "Failed to post the product. Please try again.";
   }
}

mysqli_close($conn);
?>
</body>
</html>

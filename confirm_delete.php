<?php
include 'dbconnect.php';

if (isset($_GET['id'])) {
   $productId = $_GET['id'];

   // Fetch product details to display confirmation
   $query = "SELECT name FROM product WHERE id = '$productId'";
   $result = mysqli_query($conn, $query);

   if (mysqli_num_rows($result) == 1) {
      $product = mysqli_fetch_assoc($result);

      if (isset($_POST['confirm_delete'])) {
         // Delete the product from the database
         $deleteQuery = "DELETE FROM product WHERE id = '$productId'";
         $deleteResult = mysqli_query($conn, $deleteQuery);

         if ($deleteResult) {
            $message = "Product '{$product['name']}' deleted successfully!";
            header("Location: delete.php"); // Redirect to delete.php after successful deletion
            exit;
         } else {
            $message = "Failed to delete the product. Please try again.";
         }
      }
   } else {
      $message = "Product not found.";
   }
} else {
   header("Location: index.php");
   exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Delete Product</title>
   <!-- Add Bootstrap CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
   <div class="container mt-5">
      <h1 class="text-center mb-4">Confirm Deletion</h1>

      <?php if (isset($message)): ?>
         <div class="alert alert-info"><?php echo $message; ?></div>
      <?php else: ?>
         <div class="alert alert-warning">
            <p>Are you sure you want to delete the product '<?php echo $product['name']; ?>'?</p>
            <form method="post">
               <button type="submit" name="confirm_delete" class="btn btn-danger mr-2">Yes, Delete</button>
               <a href="delete.php" class="btn btn-secondary">Cancel</a> <!-- Adjusted redirect link -->
            </form>
         </div>
      <?php endif; ?>
   </div>

   <!-- Add Bootstrap JS -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

<?php
mysqli_close($conn);
?>

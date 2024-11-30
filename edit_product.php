<?php
session_start(); // Start the session
include 'dbconnect.php';

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM product WHERE id = '$productId'") or die('query failed');
    $product = mysqli_fetch_assoc($result);
}

if (isset($_POST['update_product'])) {
    $productId = $_POST['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $origin = mysqli_real_escape_string($conn, $_POST['origin']);
    $details = mysqli_real_escape_string($conn, $_POST['details']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    // Generate pro_url by converting the name to lowercase, removing brackets, and replacing spaces with hyphens
// Convert the name to lowercase, remove non-alphanumeric characters, and replace spaces with hyphens
$pro_url = strtolower($name); // Convert to lowercase
$pro_url = preg_replace('/[^a-z0-9 ]/', '', $pro_url); // Remove non-alphanumeric characters except spaces
$pro_url = str_replace(' ', '-', $pro_url); // Replace spaces with hyphens



    // Handle price field: if empty, set to NULL
    if (empty($price)) {
        $price = "NULL";
    } else {
        $price = "'$price'";
    }

    if ($image) {
        move_uploaded_file($image_tmp, "uploaded_img/$image");
        $updateQuery = "UPDATE product SET name='$name', origin='$origin', details='$details', price=$price, image='$image', pro_url='$pro_url' WHERE id='$productId'";
    } else {
        $updateQuery = "UPDATE product SET name='$name', origin='$origin', details='$details', price=$price, pro_url='$pro_url' WHERE id='$productId'";
    }

    if (mysqli_query($conn, $updateQuery)) {
        $_SESSION['message'] = "Product updated successfully!";
        header("Location: edit_product_list.php");
        exit();
    } else {
        $message = "Failed to update product!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="images/fab.png">
    <style>
        body {
            background-color: #FAF9D0;
            color: white;
        }
    </style>
</head>
<body class="bg-gray-900 text-white">
    <?php include 'adminnav.php'; ?>
    <div class="container mx-auto mt-4 px-12">
        <h1 class="text-center text-2xl font-bold mb-2">Edit Product</h1>

        <?php if (isset($message)): ?>
            <div class="mb-6">
                <div class="alert alert-success">
                    <?php echo $message; ?>
                </div>
            </div>
        <?php endif; ?>

        <form class="w-full max-w-3xl mx-auto p-8 bg-gray-800 rounded-lg" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            <div class="mb-6">
                <label class="block text-lg font-bold mb-2 text-white" for="name">Product Name</label>
                <input class="form-input w-full text-black p-4 rounded-lg" type="text" name="name" value="<?php echo $product['name']; ?>" required>
            </div>
            <div class="mb-6">
                <label class="block text-lg font-bold mb-2" for="origin">Origin</label>
                <input class="form-input w-full text-black p-4 rounded-lg" type="text" name="origin" value="<?php echo $product['origin']; ?>" required>
            </div>
            <div class="mb-6">
                <label class="block text-lg font-bold mb-2" for="details">Details</label>
                <textarea class="form-textarea w-full text-black p-4 rounded-lg h-48" name="details" required><?php echo $product['details']; ?></textarea>
            </div>
            <div class="mb-6">
                <label class="block text-lg font-bold mb-2" for="price">Price</label>
                <input class="form-input w-full text-black p-4 rounded-lg" type="text" name="price" value="<?php echo $product['price']; ?>"> <!-- Removed required attribute -->
            </div>
            <div class="mb-6">
                <label class="block text-lg font-bold mb-2 text-white" for="image">Product Image</label>
                <input class="form-input w-full p-4 rounded-lg" type="file" name="image">
                <img src="uploaded_img/<?php echo $product['image']; ?>" class="h-32 w-32 object-cover mt-4" alt="Product Image">
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg" type="submit" name="update_product">Update Product</button>
                <a href="product_list.php" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-3 px-6 rounded-lg">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
    <link rel="icon" href="../images/fab.png">
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  
    

    <?php
    include 'dbconnect.php';

    $pro_url = $_GET['pro_url'];
    $query = "SELECT * FROM product WHERE pro_url = '$pro_url'";
    $result = mysqli_query($conn, $query) or die('Query failed');

    if ($row = mysqli_fetch_assoc($result)) {
        // Prepare structured data for the product
        $productName = $row['name'];
        $productPrice = !empty($row['price']) && $row['price'] > 0 ? $row['price'] : "0";
        $productDetails = $row['details'];
        $productImage = "../uploaded_img/" . $row['image'];
        $productUrl = "https://yourwebsite.com/product/" . $pro_url;
    ?>
     <title><?php echo isset($productName) ? $productName : 'Product Details'; ?></title>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Product",
      "name": "<?php echo $productName; ?>",
      "image": "<?php echo $productImage; ?>",
      "description": "<?php echo $productDetails; ?>",
      "offers": {
        "@type": "Offer",
        "url": "<?php echo $productUrl; ?>",
        "priceCurrency": "BDT",
        "price": "<?php echo $productPrice; ?>",
        "itemCondition": "https://schema.org/NewCondition",
        "availability": "<?php echo ($row['stock'] > 0) ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock'; ?>"
      }
    }
    </script>
    <?php
    }
    ?>
    
<style>
        .zoom-image-container {
  overflow: hidden;
  position: relative;
}
.product-title {
  font-size: 24px;
  color: #0D47A1;
  margin: 20px 0;
  font-weight: bold;
}

.zoom-image-container img {
  transition: transform 0.3s ease;
  width: 100%;
  height: auto;
}

.zoom-image-container:hover img {
  transform: scale(1.2);
}

.thumbnail-container {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
}

.thumbnail-container img {
  width: 50px;
  height: auto;
  cursor: pointer;
  border: 2px solid transparent;
}

.thumbnail-container img:hover {
  border: 2px solid #000;
}

.contact-info {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  margin-top: 1rem;
}

.contact-info img {
  width: 24px;
  height: 24px;
}

.hover-bg-white:hover {
  background-color: white;
  color: black;
  border-radius: 4px;
  margin-bottom: 0px;
}

.bottom-link {
  background-color: #2345a0;
  padding: 0.5rem 1rem;
  border-radius: 0.25rem;
  text-align: center;
}

/* Add animation for the related products section */
.product-card {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.product-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

    </style>

</head>

<body>
    <?php include 'config.php'; ?>
    <?php include 'nav.php'; ?>

    <div class="min-h-screen bg-gray-100 flex flex-col items-center">
        <div class="bg-white p-6 md:p-8 rounded-lg shadow-lg w-full max-w-6xl">
            <?php if ($row) { ?>
                <!-- Main product image with zoom effect -->
                <div class="flex flex-col md:flex-row">
                    <div class="flex flex-col md:w-2/5">
                        <div class="zoom-image-container bg-gray-200 p-4 rounded mb-4 md:mb-0">
                            <img id="product-image" src="../uploaded_img/<?php echo $row['image']; ?>" alt="Product Image" class="rounded">
                        </div>
                        <div class="thumbnail-container mx-auto md:mx-0 md:mt-4">
                            <img src="../uploaded_img/<?php echo $row['image']; ?>" alt="Thumbnail">
                        </div>
                    </div>

                    <div class="md:w-3/5 p-4 md:p-8  ">
                        <h1 class="text-2xl md:text-3xl font-bold mb-4"><?php echo $row['name']; ?></h1>
                        <p class="text-lg mb-2"><strong>Origin:</strong> <?php echo $row['origin']; ?></p>

                        <!-- Display price only if it exists and is greater than zero -->
                        <?php if (!empty($row['price']) && $row['price'] > 0) : ?>
                            <p class="text-lg mb-2 text-blue-500"><strong>Price:</strong> <?php echo $row['price']; ?> BDT</p>
                        <?php endif; ?>

                        <?php if ($row['stock'] == 0) : ?>
                            <p class="text-lg mb-4 text-red-500"><strong>Stock:</strong> Unavailable</p>
                        <?php else : ?>
                            <p class="text-lg mb-4 text-green-500"><strong>Stock Available</strong></p>
                        <?php endif; ?>

                        <p class="text-lg mt-4 font-bold">For buy contact us:</p>
                        <div class="contact-info">
                            <img src="../images/whatsapp.png" alt="WhatsApp">
                            <a href="https://wa.me/+8801815491313" class="text-blue-500 hover:underline">01815491313</a>
                        </div>
                        <div class="contact-info">
                            <img src="../images/gmail.png" alt="Email">
                            <a href="mailto:newtonscientificco@gmail.com" class="text-blue-500 hover:underline">newtonscientificco@gmail.com</a>
                        </div>

                        <button onclick="history.back()" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50">Back</button>
                    </div>
                </div>

                <!-- Separate details section -->
                <div class="mt-8 bg-white p-6 md:p-8 rounded-lg w-full">
                    <h2 class="text-xl font-bold mb-4 ">Product Details</h2>
                    <p class="text-justify border-t-2 border-blue-900 pt-2"><?php echo $row['details']; ?></p>
                </div>

                <!-- Related Products Section -->
                <div class="mt-8 " data-nosnippet>
                    <h2 class="text-xl md:text-2xl font-bold mb-4 ">Related Products</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 border-t-2 border-blue-900 pt-2 ">
                        <?php
                        // Query to fetch related products based on the same category
                        $category = $row['category']; // Assuming you have a category column
                        $related_query = "SELECT * FROM product WHERE category = '$category' AND pro_url != '$pro_url' LIMIT 4";
                        $related_result = mysqli_query($conn, $related_query) or die('Query failed');

                        while ($related_row = mysqli_fetch_assoc($related_result)) {
                            echo '<div class="bg-gray-200 rounded border-green-700 border-spacing-2 p-2 product-card">';
                            echo '<div class="card custom-card">';
                            echo '<div class="container">';
                            echo '<a href="' . $related_row['pro_url'] . '">';
                            echo '<div class="relative w-full h-60 overflow-hidden">';
                            echo '<img src="../uploaded_img/' . $related_row['image'] . '" alt="Product Image" class="absolute inset-0 w-full h-full object-cover">';
                            echo '</div>';
                            echo '</a>';
                            echo '<div class="middle mt-2">';
                            
                            // Truncate product name to a maximum of 3 lines
                            echo '<div class="text-sm font-bold text-center overflow-hidden" style="height: 4.5em; line-height: 1.5em; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">' . $related_row['name'] . '</div>';
                            
                            // Check if price is available
                            if (!empty($related_row['price'])) {
                                echo '<p class="text-center"><strong>Price:</strong> ' . $related_row['price'] . '</p>';
                            } else {
                                echo '<p class="text-center">';
                                echo '<a href="tel:+880815491313" class="inline-block bg-blue-500 text-white text-xs sm:text-sm py-1 px-4 rounded hover:bg-blue-600"><span role="img" aria-label="Phone">📞</span> +880815491313</a>';
                                echo '</p>';
                            }

                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            <?php } else { ?>
                <p class="text-2xl">Product not found.</p>
            <?php } ?>

        </div>
    </div>
    <?php mysqli_close($conn); ?>
    <?php include 'footer.php'; ?>
</body>
</html>

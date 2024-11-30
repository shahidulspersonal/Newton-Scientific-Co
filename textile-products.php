<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Textiles & Garments testing product in BD</title>

    <meta name="description" content="Discover a wide range of high-Quality textile testing products in Bangladesh, including Non Phosphate detergents, Phosphate detergent, pH meters, GSM cutters, fabric thickness tester, and more. Feel free to Contact us at 01815491313.">

    <meta name="author" content="Newton Scientific Co.">
    <meta property="og:title" content="Textiles & Garments testing product in BD">
    <meta property="og:description" content="Discover a wide range of high-Quality textile testing products in Bangladesh, including Non Phosphate detergents, Phosphate detergent, pH meters, GSM cutters, fabric thickness tester, and more. Feel free to Contact us at 01815491313.">
    <meta property="og:url" content="https://newtonscientificbd.com/textile-products">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://newtonscientificbd.com/images/textiles-garments.webp">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
    <!-- Canonical Tag -->
    <link rel="canonical" href="https://newtonscientificbd.com/textile-products" />

    
    <link rel="icon" href="images/fab.png">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <?php include 'nav.php'; ?>


    <h1 class="text-2xl font-bold container mx-auto pt-2 text-blue-600">
        Textiles & Garments testing product in BD
    </h1>
    <br>
    <p class="text-base container mx-auto text-justify">
        Discover our comprehensive range of high-quality textile testing products and detergents. We provide fabric weight testing equipment, textile testing and quality control products, moisture meters, fabric testing machines, and also SDC, James Heal non-phosphate detergents, and phosphate detergents. Trust Newton Scientific as your go-to supplier in Bangladesh for all your textile testing equipment.
    </p>

    <div class="container mx-auto mt-8">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            <?php
            include 'dbconnect.php';

            $query = "
            SELECT * FROM product 
            WHERE category = 'textile'
            ORDER BY name ASC
        ";
        

            $select = mysqli_query($conn, $query) or die('Query failed');

            while ($row = mysqli_fetch_assoc($select)) {
                echo '<div class="bg-gray-200 rounded border-green-700 border-spacing-2 p-2 product-card">';
                echo '<div class="card custom-card">';
                echo '<div class="container">';
                echo '<a href="products/' . $row['pro_url'] . '">';
                echo '<div class="relative w-full h-56 overflow-hidden">';
                echo '<img src="uploaded_img/' . $row['image'] . '" alt="' . htmlspecialchars($row['name']) . '" class="absolute inset-0 w-full h-full object-cover">';
                echo '</div>';
                echo '</a>';
                echo '<div class="middle mt-2">';
                
                // Truncate product name to a maximum of 3 lines
                echo '<div class="text-sm font-bold text-center overflow-hidden" style="height: 4.5em; line-height: 1.5em; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">' . htmlspecialchars($row['name']) . '</div>';
                
                // Check if price is available
                if (!empty($row['price'])) {
                    echo '<p class="text-center"><strong>BDT</strong> ' . htmlspecialchars($row['price']) . '</p>' ;
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

            mysqli_close($conn);
            ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
 <title>Lab Instruments BD</title>
    <meta name="description" content="Discover our lab instruments for Chemistry lab, Pharmaceutical lab, Textiles Lab etc. Shop now for reliable lab equipment at Newton Scientific.">

    <meta name="author" content="Newton Scientific Co.">
    <meta property="og:title" content="Lab Instruments BD">
    <meta property="og:description" content="Discover our lab instruments for Chemistry lab, Pharmaceutical lab, Textiles Lab etc. Shop now for reliable lab equipment at Newton Scientific.">
   
    <meta property="og:type" content="website">
    <link rel="icon" href="images/fab.png">
    <link rel="stylesheet" href="css/main.css">
 <!-- Canonical Tag -->
   <link rel="canonical" href="https://newtonscientificbd.com/lab-instruments" />

</head>

<body>
    <?php include 'nav.php'; ?>

<h1 class="text-xl sm:text-2xl md:text-3xl font-bold px-4 sm:px-0 container mx-auto pt-2 text-blue-600">
   Lab Instruments
</h1>
<br>
<p class="text-base px-4 sm:px-0 container mx-auto text-justify">
  Discover our best quality lab instruments for Chemistry lab, Pharmaceutical lab, Textiles Lab etc.We provide  chemistry lab equipment, biochemistry lab apparatus, and microbiology lab apparatus and more. Our products meet the highest standards for performance and reliability.
</p>

<div class="container mx-auto mt-8">
    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
        <?php
        include 'dbconnect.php';

        $query = "
            SELECT * FROM product 
            WHERE category = 'lab' 
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

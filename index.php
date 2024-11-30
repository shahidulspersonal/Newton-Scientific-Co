<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Newton Scientific Co.</title>
     <meta name="description" content=" Newton Scientific is your Trusted lab equipment wholesaler in Bangladesh. We offer top-tier instruments, chemicals, balances, and textile testing items.">
    <link rel="icon" href="images/fab.png">
    <!-- Add Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KyZXEAg3QhqLMpG8r+Knujsl5/1hb7U6Q6ssnD5TvRaJkMGaklcs5x1o5i/M7yGMCNGwI8MCq7h7O5uCnhVRiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/main.css">
</head>


<body class="font-sans">
    <?php include 'nav.php'; ?>

   <style>
.carousel-section, .carousel-container, .carousel-slide, .carousel-item {
    margin: 0; /* Remove any margin */
    padding: 0; /* Remove any padding */
}

.carousel-container {
    width: 100%;
    height: 100%;
}

.carousel-item img {
    display: block; /* Ensure the image doesn't have any space around it */
    width: 100%; 
    height: 100%; 
    object-fit: cover; /* Ensure the image covers the container fully */
}
.df{
    display: flex;
}

    @media (min-width: 1024px) {
        .lg-custom-width-1 {
            width: 50%; /* Slightly smaller for the left div */
            
        }
        .lg-custom-width-2 {
            width: 50%; /* Slightly larger for the right div */
              
        }
    }
</style>

<div class="df">
    <div class="flex flex-col lg:flex-row justify-between items-start w-full">
        <!-- Carousel Section: Visible on all screen sizes -->
        <div class="w-full ">
            <div class="carousel-section h-full">
                <div class="carousel-container relative">
                    <div class="carousel-slide">
                        <div class="carousel-item">
                            <img src="images/balance.webp" alt="Digital Balance" class="w-full h-full object-cover">
                        </div>
                        <div class="carousel-item">
                            <img src="images/chelmicals.webp" alt="Chemicals and reagents" class="w-full h-full object-cover">
                        </div>
                        <div class="carousel-item">
                            <img src="images/textiles.webp" alt="Textile Products" class="w-full h-full object-cover">
                        </div>
                        <div class="carousel-item">
                            <img src="images/instruments.webp" alt="Lab Instruments" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="carousel-buttons absolute inset-y-0 flex justify-between items-center">
                        <button class="carousel-button" id="prevButton">&lt;</button>
                        <button class="carousel-button" id="nextButton">&gt;</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Section with Image -->
      
    </div>
</div>


<div class="container mx-auto">
<p class="text-center mt-4 font-bold text-xl sm:text-3xl bg-blue-900 p-2 text-white">
    আমরা সব ধরনের ল্যাবরেটরি পণ্য সরবরাহ করে থাকি
</p>
</div>


<div class="container mx-auto mt-8 " data-nosnippet>
    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
        <?php
        include 'dbconnect.php';

        $query = "
            SELECT * FROM product 
            WHERE name LIKE '%Hanna%' 
               OR name LIKE '%SDC%' 
               OR name LIKE '%Refractometer%' 
               OR name LIKE '%GSM%' 
               OR name LIKE '%Munsell%' 
               OR name LIKE '%Cylinder%' 
               OR name LIKE '%Flask%' 
               OR name LIKE '%Agar%' 
               OR name LIKE '%Zinc%' 
               OR name LIKE '%600g/0.01g%' 
               OR name LIKE '%Analogue Kitchen%' 
            ORDER BY FIELD(name, 'Hanna', 'SDC', 'Refractometer', 'GSM', 'Munsell', 'Cylinder', 'Flask', 'Agar', 'Zinc', '600g/0.01g', 'Analogue Kitchen')
            LIMIT 10
        ";

        $select = mysqli_query($conn, $query) or die('query failed');

        while ($row = mysqli_fetch_assoc($select)) {
            echo '<div class="bg-gray-200 rounded border-green-700 border-spacing-2 p-2 product-card">';
            echo '<div class="card custom-card">';
            echo '<div class="container">';
            echo '<a href="products/' . $row['pro_url'] . '">';
            echo '<div class="relative w-full h-60 overflow-hidden">';
            echo '<img src="uploaded_img/' . $row['image'] . '" alt="' . htmlspecialchars($row['name']) . '" class="absolute inset-0 w-full h-full object-cover">';
            echo '</div>';
            echo '</a>';
            echo '<div class="middle mt-2">';
            
            // Truncate product name to a maximum of 3 lines
            echo '<div class="text-sm font-bold text-center overflow-hidden" style="height: 4.5em; line-height: 1.5em; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">' . htmlspecialchars($row['name']) . '</div>';
            
            // Check if price is available
            if (!empty($row['price'])) {
                echo '<p class="text-center"><strong>BDT</strong> ' . htmlspecialchars($row['price']) . '</p>';
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
<br>
<br>
<h1 class="text-xl sm:text-2xl md:text-3xl font-bold px-4 sm:px-0 container mx-auto pt-2 text-blue-900">
    Largest Lab Products Supplier in Bangladesh - Chemistry, Biochemistry, Textile, and More
</h1>


<br>
<p class="text-base px-4 sm:px-0 container mx-auto text-justify">
    Welcome to Newton Scientific, your trusted partner in supplying high-quality chemistry lab instruments, biochemistry equipment, and laboratory chemicals across Bangladesh. Since our establishment in 2019, we have rapidly grown to become one of the leading suppliers in the industry, recognized for our commitment to excellence, customer satisfaction, and a comprehensive product range. Whether you are outfitting a textile lab, equipping a university research center, or sourcing chemicals for a pharmaceutical lab, Newton Scientific has you covered with the best lab instruments and equipment.
</p>


<br>
<h1 class="text-xl sm:text-2xl md:text-3xl font-bold px-4 sm:px-0 container mx-auto pt-2 text-blue-900">
Our Goal - Empowering Laboratories with Advanced Lab Instruments
</h1>
<p class="text-base px-4 sm:px-0 container mx-auto text-justify">
At Newton Scientific, our mission is to empower laboratories and educational institutions with the best tools and resources available, including cutting-edge chemistry and biochemistry lab instruments. We understand the critical role that accurate and reliable lab equipment plays in research, education, and industrial applications. Our goal is to ensure that our clients have access to the most advanced, dependable, and cost-effective solutions, from digital balances to laboratory glassware, to meet their specific needs.
</p>
<h1 class="text-xl sm:text-2xl md:text-3xl font-bold px-4 sm:px-0 container mx-auto pt-2 text-blue-900">
Our Product Range - From Digital Balances to Textile Testing Equipment
</h1>
<p class="text-base px-4 sm:px-0 container mx-auto text-justify">
We offer an extensive range of products tailored to a variety of lab environments. Our catalog includes textile testing products, essential for ensuring the quality and compliance of fabrics in the textile industry. We also supply a wide array of laboratory instruments for schools, colleges, and universities, including chemistry and biochemistry lab equipment, helping to foster the next generation of scientists and researchers. Additionally, our selection of lab glassware and chemicals is designed to meet the diverse needs of chemical, pharmaceutical, and industrial labs.
</p>

<h1 class="text-xl sm:text-2xl md:text-3xl font-bold px-4 sm:px-0 container mx-auto pt-2 text-blue-900">
Quality You Can Trust - Lab Instruments Built to Last
</h1>
<p class="text-base px-4 sm:px-0 container mx-auto text-justify">
Newton Scientific prides itself on offering only the highest quality products, including digital balances, electronic weighing scales, and specialized lab instruments. We work with reputable manufacturers and suppliers to ensure that every item in our inventory meets stringent quality standards. Our dedication to quality is what has earned us the trust of our clients across Bangladesh, making us a preferred supplier for numerous educational institutions, research facilities, and industries.
</p>
<h1 class="text-xl sm:text-2xl md:text-3xl font-bold px-4 sm:px-0 container mx-auto pt-2 text-blue-900">
Nationwide Reach - Supplying Lab Instruments Across Bangladesh
</h1>
<p class="text-base px-4 sm:px-0 container mx-auto text-justify">
From our inception in 2019, we have expanded our operations to supply products across the entire country. No matter where you are in Bangladesh, Newton Scientific is committed to delivering your orders promptly and efficiently. Our strong logistics network ensures that our products, from lab glassware to electronic precision balances, reach you in perfect condition, ready for immediate use in your lab.
</p>
<h1 class="text-xl sm:text-2xl md:text-3xl font-bold px-4 sm:px-0 container mx-auto pt-2 text-blue-900">
Our Customer-Friendly Policies - Ensuring Your Satisfaction
</h1>
<p class="text-base px-4 sm:px-0 container mx-auto text-justify">
We believe that our relationship with our customers extends far beyond the point of sale. That's why we have developed a customer-friendly return policy that makes the process as hassle-free as possible. If for any reason you are not satisfied with your purchase, whether it's a digital balance or lab chemicals, we are here to assist you with returns or exchanges, ensuring that you always receive the product that best meets your needs.
</p>


<div class="container mx-auto py-8">
    <img src="images/newton-scientific-address.webp" alt="Details Image" class="block sm:hidden">
</div>


    <?php include 'footer.php'; ?>

    <script src="//code.tidio.co/lwti145od7qa7ywsah1mwzznor3txctr.js" async></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script>
        const carouselSlide = document.querySelector('.carousel-slide');
        const carouselItems = document.querySelectorAll('.carousel-item');
        const prevButton = document.getElementById('prevButton');
        const nextButton = document.getElementById('nextButton');

        let counter = 0;

        function showSlide() {
            if (counter >= carouselItems.length) {
                counter = 0;
            } else if (counter < 0) {
                counter = carouselItems.length - 1;
            }
            carouselSlide.style.transform = `translateX(${-counter * 100}%)`;
        }

        function nextSlide() {
            counter++;
            showSlide();
        }

        function prevSlide() {
            counter--;
            showSlide();
        }

        nextButton.addEventListener('click', nextSlide);
        prevButton.addEventListener('click', prevSlide);

        setInterval(nextSlide, 5000); // Change slide every 5 seconds
    </script>

</body>

</html>

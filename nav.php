
<?php include 'config.php'; ?>

<head>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/nav.css">
</head>
<?php include 'mobile-nav.php'; ?>
<nav class="na hidden lg:block">
    <div class="flex items-center justify-center space-x-6 text-gray-600">
        <!-- Phone Number -->
        <div class="flex items-center space-x-2">
            <a href="tel:+8801815491313">📞 +8801815491313</a>
        </div>

        <!-- Email -->
        <div class="flex items-center space-x-2">
            <span>📧 newtonscientificco@gmail.com</span>
        </div>

        <!-- Office Hours -->
        <div class="flex items-center space-x-2">
            <span>⏱︎ 10AM-7PM (Friday Off)</span>
        </div>
    </div>

    <div class="container mx-auto flex justify-between items-center">
        <a href="<?php echo BASE_URL; ?>">
            <img src="<?php echo BASE_URL; ?>images/logo.png" alt="Logo" class="h-16">
        </a>

        <!-- Desktop Search Form -->
        <div class="flex space-x-4">
    <div class="relative flex justify-center search-container">
        <form id="searchForm" action="<?php echo BASE_URL; ?>search" method="GET" class="flex w-full max-w-lg">
            <input type="text" name="search" id="searchInput" placeholder="Search products..." class="navbar-search-input w-full px-6 py-2 text-lg" style="width: 400px; border: 1px solid #ccc;">
            <button type="submit" class="px-6 bg-blue-500 text-white text-sm py-2 ml-2 rounded hover:bg-blue-600" style="border: 1px solid #ccc;">Search</button>
        </form>
        <div id="searchResults" class="w-full max-w-lg"></div>
    </div>
</div>
        
        <!-- Desktop Menu -->
        <div class="hidden lg:flex space-x-4">
            <a href="<?php echo BASE_URL; ?>" class="text-black hover-bg-white font-bold">HOME</a>
            <a href="<?php echo BASE_URL; ?>categories" class="text-black hover-bg-white font-bold">CATEGORIES</a>
            <a href="<?php echo BASE_URL; ?>contact_us" class="text-black hover-bg-white font-bold">Contact Us</a>
        </div>
    </div>

    <!-- New Bottom Links Section -->
    <div id="bottom-links-container" class="hidden lg:block mt-2">
        <div id="bottom-links" class="flex justify-center items-center border-t-2 border-white pt-2 space-x-2 flex-wrap">
            <div class="hidden lg:flex justify-between items-center">

                <!-- Existing Dropdown Menu -->
                <div class="dropdown relative w-full lg:w-auto text-white z-50">
                    <button class="sm:mr-2 text-white font-bold bg-black hover:bg-white hover:text-black p-2 flex items-center justify-between w-full lg:w-auto bottom-link px-4 py-2 text-sm mb-2 sm:mb-0">
                        <span class="text-s font-bold">TEXTILES & GARMENTS</span>
                        <svg class="w-4 h-4 transform transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="dropdown-links absolute top-full left-0 w-full lg:w-auto bg-white shadow-md hidden">
                        <div class="flex flex-wrap justify-start">
                            <a href="<?php echo BASE_URL; ?>textile-products" class="px-4 py-2 text-black border-b border-gray-200 hover:bg-gray-200 w-full">Textiles & Garments</a>
                            <a href="<?php echo BASE_URL; ?>detergents" class="px-4 py-2 text-black border-b border-gray-200 hover:bg-gray-200 w-full">Detergents</a>
                        </div>
                    </div>
                </div>

                <!-- Other links -->
                <a href="<?php echo BASE_URL; ?>meter-tester" class="text-white font-bold hover:bg-white hover:text-black bottom-link px-4 py-2 text-sm mb-2 sm:mb-0 sm:mr-2 rounded-md">METER & TESTER</a>

               

                <a href="<?php echo BASE_URL; ?>lab-instruments" class="text-white font-bold hover:bg-white hover:text-black bottom-link px-4 py-2 text-sm mb-2 sm:mb-0 sm:mr-2 rounded-md">LAB INSTRUMENTS</a>
                <a href="<?php echo BASE_URL; ?>chemical-products" class="text-white font-bold hover:bg-white hover:text-black bottom-link px-4 py-2 text-sm mb-2 sm:mb-0 sm:mr-2 rounded-md">CHEMICALS</a>

                 <!-- Dropdown 2 -->
                 <div class="dropdown relative w-full lg:w-auto text-white z-50">
                    <button class="sm:mr-2 text-white font-bold bg-black hover:bg-white hover:text-black p-2 flex items-center justify-between w-full lg:w-auto bottom-link px-4 py-2 text-sm mb-2 sm:mb-0">
                        <span class="text-s font-bold">LAB GLASSWARES</span>
                        <svg class="w-4 h-4 transform transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="dropdown-links absolute top-full left-0 w-full lg:w-auto bg-white shadow-md hidden">
                        <div class="flex flex-wrap justify-start">
                            <a href="<?php echo BASE_URL; ?>glasswares" class="px-4 py-2 text-black border-b border-gray-200 hover:bg-gray-200 w-full">Lab Glasswares</a>
                            <a href="<?php echo BASE_URL; ?>link2" class="px-4 py-2 text-black hover:bg-gray-200 w-full">Lab Plasticwares</a>
                        </div>
                    </div>
                </div>
                
                <a href="<?php echo BASE_URL; ?>surgical-products" class="text-white font-bold hover:bg-white hover:text-black bottom-link px-4 py-2 text-sm mb-2 sm:mb-0 sm:mr-2 rounded-md">SURGICAL</a>
                <a href="<?php echo BASE_URL; ?>balance" class="text-white font-bold hover:bg-white hover:text-black bottom-link px-4 py-2 text-sm mb-2 sm:mb-0 sm:mr-2 rounded-md">BALANCE</a>
            </div>
        </div>
    </div>
</nav>

<!-- WhatsApp Floating Icon -->
<a href="https://wa.me/8801815491313" target="_blank">
    <img src="<?php echo BASE_URL; ?>images/whatsapp.png" 
         alt="WhatsApp" 
         class="fixed bottom-16 right-4 sm:bottom-12 sm:right-5 w-12 h-12 sm:w-16 sm:h-16 z-40 cursor-pointer transition-transform duration-300 hover:scale-110 hover:shadow-lg">
</a>
<!-- Add jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
const baseURL = 'http://localhost/Company/';  // Adjust this to your actual base URL if necessary
$(document).ready(function () {
    

    // Live Search Feature
    $('#searchInput').on('focus', function () {
        // Clear previous search results when the input gains focus
        $('#searchResults').hide();
    });

    $('#searchInput').on('input', function () {
        let query = $(this).val();
        if (query.length > 1) {
            $.ajax({
                url: `${baseURL}/live_search`,
                method: 'GET',
                data: { search: query },
                success: function (response) {
                    // Only show results if there are suggestions
                    if (response.trim()) {
                        $('#searchResults').html(response).show();
                    } else {
                        $('#searchResults').hide(); // Hide if no results
                    }
                }
            });
        } else {
            $('#searchResults').html('').hide();
        }
    });

    // Hide the dropdown when clicking outside of it
    $(document).on('click', function (e) {
        if (!$(e.target).closest('#searchInput, #searchResults').length) {
            $('#searchResults').hide();
        }
    });

    // Ensure the search form works when hitting the "Search" button
    $('#searchForm').on('submit', function (e) {
        if ($('#searchInput').val().trim() === '') {
            e.preventDefault();  // Prevent the form submission if the search input is empty
        }
    });

    // Toggle mobile menu and hide search results if mobile menu is open
    $('#mobile-menu-button').on('click', function () {
        if ($('#searchResults').is(':visible')) {
            $('#searchResults').hide();
        }
    });
});

// JavaScript to toggle the mobile menu
document.getElementById('mobile-menu-button').addEventListener('click', function () {
    var mobileMenu = document.getElementById('mobile-menu');
    mobileMenu.classList.toggle('hidden');
});

// JavaScript to toggle dropdown content visibility
document.querySelectorAll('.dropbtn').forEach(function (btn) {
    btn.addEventListener('click', function () {
        var dropdownContent = this.nextElementSibling;
        dropdownContent.classList.toggle('hidden');
    });
});

// Close dropdown when clicking outside
window.addEventListener('click', function (e) {
    document.querySelectorAll('.dropdown-content').forEach(function (dropdown) {
        if (!dropdown.contains(e.target) && !dropdown.previousElementSibling.contains(e.target)) {
            dropdown.classList.add('hidden');
        }
    });

    // Close mobile menu when clicking outside
    var mobileMenu = document.getElementById('mobile-menu');
    var mobileMenuButton = document.getElementById('mobile-menu-button');
    if (!mobileMenu.contains(e.target) && !mobileMenuButton.contains(e.target)) {
        mobileMenu.classList.add('hidden');
    }
});


window.addEventListener('scroll', function() {

    var bottomLinksContainer = document.getElementById('bottom-links-container');
    var bottomLinks = document.getElementById('bottom-links');
    var logoLink = document.createElement('a'); // Create an anchor element
    var logo = document.createElement('img'); // Create the image element

    if (window.scrollY > bottomLinksContainer.offsetTop) {
        bottomLinks.classList.add('sticky');
        
        if (!document.getElementById('sticky-logo')) {
            logo.src = `${baseURL}/images/logow.png`;
            logo.alt = "Logo";
            logo.className = "h-10";
            logo.id = "sticky-logo";

            logoLink.href = `${baseURL}`; // Set the href for the anchor element
            logoLink.appendChild(logo); // Append the logo to the anchor
            
            bottomLinks.insertBefore(logoLink, bottomLinks.firstChild); // Insert the link before the first child
        }
    } else {
        bottomLinks.classList.remove('sticky');

        if (document.getElementById('sticky-logo')) {
            bottomLinks.removeChild(document.getElementById('sticky-logo').parentNode); // Remove the parent (link) of the logo
        }
    }
});


// Toggle dropdown on hover
const dropdownBtn = document.getElementById('dropdown-btn');
const dropdownLinks = document.getElementById('dropdown-links');
const dropdownIcon = document.getElementById('dropdown-icon');

// Show dropdown when hovering over the button
dropdownBtn.addEventListener('mouseenter', () => {
    dropdownLinks.classList.remove('hidden');
    dropdownIcon.classList.add('rotate-180'); // Rotate arrow when hovered
});

// Keep the dropdown open while hovering over the dropdown itself
dropdownLinks.addEventListener('mouseenter', () => {
    dropdownLinks.classList.remove('hidden');
});

// Hide dropdown when mouse leaves both the button and the dropdown links
dropdownBtn.addEventListener('mouseleave', () => {
    setTimeout(() => {
        if (!dropdownLinks.matches(':hover')) { // Check if not hovering over dropdown
            dropdownLinks.classList.add('hidden');
            dropdownIcon.classList.remove('rotate-180');
        }
    }, 100); // Delay to allow for smoother hover transitions
});

dropdownLinks.addEventListener('mouseleave', () => {
    dropdownLinks.classList.add('hidden');
    dropdownIcon.classList.remove('rotate-180');
});
</script>

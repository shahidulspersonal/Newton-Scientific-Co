<!-- mobile-nav.php -->

<?php include 'config.php'; ?>

<nav class="mbg p-4 lg:hidden">
    <div class="flex flex-col items-center justify-center space-y-1 text-xs">
        <!-- Phone Number and Email (Same Row) -->
        <div class="flex items-center justify-center space-x-6">
            <!-- Phone Number -->
            <a href="tel:+8801815491313">📞 +8801815491313</a>

            <!-- Email -->
            <span>📧 newtonscientificco@gmail.com</span>
        </div>

        <!-- Office Hours (Next Row) -->
        <div class="flex items-center justify-center">
            <span>⏱︎ 10AM-7PM (Friday Off)</span>
        </div>
    </div>
    <div class="container mx-auto flex justify-between items-center pb-2">
    <a href="<?php echo BASE_URL; ?>">
    <img src="<?php echo BASE_URL; ?>images/logo.png" alt="Logo" class="h-16">
</a>


        <!-- Mobile Menu Button -->
        <button id="mobile-menu-button" class="s focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke="black" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden">
        <div class="px-4 py-2 space-y-2">
            <a href="<?php echo BASE_URL; ?>" class="block">HOME</a>
            <a href="<?php echo BASE_URL; ?>categories" class="block">CATEGORIES</a>
            <a href="<?php echo BASE_URL; ?>contact_us" class="block">CONTACT US</a>
        </div>
    </div>
    <?php include 'search-box.php'; ?>
  
</nav>

<!-- Mobile Bottom Navigation -->
<div id="mobile-bottom-nav" class="lg:hidden fixed bottom-0 left-0 right-0 bg-gray-900 border-t border-gray-300 shadow z-50">
    <div class="flex justify-around items-center">
        <a href="<?php echo BASE_URL; ?>" class="flex flex-col items-center text-white">
            <img src="<?php echo BASE_URL; ?>images/home.png" alt="Home" class="w-7 h-7">
            <span class="font-bold">Home</span>
        </a>
        <a href="<?php echo BASE_URL; ?>search" class="flex flex-col items-center text-white">
            <img src="<?php echo BASE_URL; ?>images/search.png" alt="Search" class="w-7 h-7">
            <span class="text-xs font-bold">Search</span>
        </a>
        <a href="<?php echo BASE_URL; ?>categories" class="flex flex-col items-center text-white">
            <img src="<?php echo BASE_URL; ?>images/categories.png" alt="Categories" class="w-7 h-7">
            <span class="text-xs font-bold">CATEGORIES</span>
        </a>
        <a href="<?php echo BASE_URL; ?>contact_us" class="flex flex-col items-center text-white">
            <img src="<?php echo BASE_URL; ?>images/contact.png" alt="Contact" class="w-7 h-7">
            <span class="text-xs font-bold">Contact</span>
        </a>
    </div>
</div>

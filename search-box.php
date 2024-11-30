  <!-- Mobile Search Form -->
  <div class="relative flex justify-center search-container text-white">
        <!-- Search Form -->
        <form id="searchForm" action="<?php echo BASE_URL; ?>search" method="GET" class="flex w-full max-w-lg">
            <input type="text" name="search" id="searchInput" placeholder="Search products..." class="navbar-search-input w-full px-4 py-2 text-base sm:text-lg sm:px-6 sm:py-2" style="width: 100%; border: 1px solid #ccc;" />
            <button type="submit" class="px-4 sm:px-6 bg-blue-500 text-sm py-2 ml-2 rounded hover:bg-blue-600">Search</button>
        </form>

        <!-- Live Search Results (Dropdown) -->
        <div id="searchResults" class="w-full max-w-lg"></div>
    </div>
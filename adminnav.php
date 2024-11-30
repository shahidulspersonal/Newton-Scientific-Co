<div id="mySidebar" class="fixed h-full w-0 top-0 left-0 bg-gray-800 overflow-x-hidden transition-width duration-500 pt-16 z-10">
  <div class="side-header ml-8 mb-2">
    <img src="uploaded_img/admin1.jpg" width="120" height="120" class="rounded-full">
    <h5 class="mt-2 text-white">Hello, Admin</h5>
  </div>
  <a href="javascript:void(0)" class="absolute top-0 right-10 text-3xl mt-4 text-white" onclick="closeNav()">×</a>
  <div class="mt-8">
    <a href="adminpage.php" class="block py-2.5 px-6 text-white hover:bg-gray-700"><i class="fa fa-dashboard text-lg mr-2"></i>DASHBOARD</a>
    <a href="delete.php" class="block py-2.5 px-6 text-white hover:bg-gray-700"><i class="fa fa-user text-lg mr-2"></i>DELETE Product</a>
    <a href="addproduct.php" class="block py-2.5 px-6 text-white hover:bg-gray-700"><i class="fa fa-telegram text-lg mr-2"></i>ADD Product</a>
     <a href="edit_product_list.php" class="block py-2.5 px-6 text-white hover:bg-gray-700"><i class="fa fa-telegram text-lg mr-2"></i>Edit Product</a>
  </div>
</div>
<nav class="bg-gray-800 p-4 flex items-center justify-between">
  <div class="flex items-center">
    <button class="openbtn bg-gray-800 text-white py-2 px-4 focus:outline-none" onclick="openNav()">☰</button>
    <a class="ml-4 text-white text-xl font-bold" href="#">NSC</a>
  </div>
  <ul class="flex items-center space-x-4">
    <li><a class="text-white hover:text-gray-300" href="adminpage.php">Home</a></li>
    <li><a href="logout.php" class="btn btn-danger bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded">Logout</a></li>
  </ul>
</nav>

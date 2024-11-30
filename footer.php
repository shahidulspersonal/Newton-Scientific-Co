<style>
footer {
  display: block;
}

@media (max-width: 640px) {  /* For small screens */
  footer {
    padding: 16px;
  }
  
  footer img {
    width: 24px;  /* Adjust image size for mobile */
    height: 24px;
  }
}


</style>

<?php include 'config.php'; // Include config.php for base URL ?>
<footer class="bg-gray-900 text-white p-8 text-center">
  <div>
    <p class="text-sm lg:hidden">&#169; All rights reserved by Newton Scientific Co.</p>
    <p class="text-sm hidden lg:block">&#169; All rights reserved by Newton Scientific Co.</p>
  </div>
  <div class="flex justify-center items-center mt-4">
    <a href="https://www.facebook.com/newtonscientificbd/" target="_blank" class="text-white">
      <img src="<?php echo $BASE_URL; ?>images/fb.png" alt="Facebook" class="w-6 h-6">
    </a>
    <a href="https://www.instagram.com/your-instagram-account" target="_blank" class="text-white ml-4">
      <img src="<?php echo $BASE_URL; ?>images/insta.png" alt="Instagram" class="w-6 h-6">
    </a>
    <a href="https://wa.me/+8801766426553" target="_blank" class="text-white ml-4">
      <img src="<?php echo $BASE_URL; ?>images/whatsapp2.png" alt="WhatsApp" class="w-6 h-6">
    </a>
  </div>
  <!-- Tidio Chat Script
  <script src="//code.tidio.co/6fyrkpgnf6mpq5safto7zzlmucxdhwwe.js" async></script>
  -->
</footer>

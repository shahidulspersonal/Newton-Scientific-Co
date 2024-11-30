<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Information - Newton Scientific Co.</title>
    <link rel="icon" href="images/fab.png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <?php include 'nav.php'; ?>
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md mt-6">
        <h1 class="text-3xl font-bold text-center mb-4">Contact Information</h1>
        <p class="text-center mb-4">Don't hesitate to give us a call. We are 24/7 available for you.</p>
        <div class="text-center mb-6">
            <p><span class="inline-block mr-2">📍</span>Newton Scientific Co., 32/1 Hatkhola Road, <br>Tikatuli, Dhaka</p>
            <p><a href="tel:+8801915491313" class="text-blue-500 hover:underline">📞 +880815491313</a></p>

            <p><a href="https://wa.me/8801766426553" class="text-blue-500 hover:underline">
                <img src="images/whatsapp.png" alt="WhatsApp Icon" class="inline-block w-4 h-4 mr-2">8801766426553</a></p>

                <p><a href="mailto:newtonscientificco@gmail.com" class="text-blue-500 hover:underline">
                <img src="images/gmail.png" alt="Email Icon" class="inline-block w-4 h-4 mr-2">newtonscientificco@gmail.com</a></p>
        </div>
        <div class="mb-6">
            <div class="w-full">
                <iframe class="w-full h-96" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Newton%20Scientific%20Tikatuli&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <script>
        document.getElementById('contactForm').addEventListener('submit', async function(event) {
            event.preventDefault();
            const name = document.getElementById('cname').value;
            const email = document.getElementById('cemail').value;
            const message = document.getElementById('cmessage').value;

            try {
                const response = await fetch('https://your-backend-endpoint.com/send-message', { // Replace with actual API endpoint
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ name, email, message })
                });

                const result = await response.json();
                const msgSubmit = document.getElementById('cmsgSubmit');

                if (response.ok) {
                    msgSubmit.innerText = 'Message sent successfully!';
                    msgSubmit.classList.remove('hidden');
                    msgSubmit.classList.add('text-green-500');
                } else {
                    msgSubmit.innerText = 'Error sending message: ' + (result.error || 'Unknown error');
                    msgSubmit.classList.remove('hidden');
                    msgSubmit.classList.add('text-red-500');
                }
            } catch (error) {
                const msgSubmit = document.getElementById('cmsgSubmit');
                msgSubmit.innerText = 'Error sending message: ' + error.message;
                msgSubmit.classList.remove('hidden');
                msgSubmit.classList.add('text-red-500');
            }
        });
    </script>
</body>
</html>

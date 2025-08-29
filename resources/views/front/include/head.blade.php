<meta charset="utf-8">
<title>Fyll - Shift toward mindful living.</title>

<meta name="author" content="blueleaf">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description"
    content="Fyll description">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{ asset('js/api/init.js') }}"></script>
<!-- font -->
<link rel="stylesheet" href="{{ asset('fonts/fonts.css') }}">
<link rel="stylesheet" href="{{ asset('fonts/font-icons.css') }}">
<!-- css -->
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">

<!-- Favicon and Touch Icons  -->
<link rel="shortcut icon" href="{{ asset('images/logo/favicon.png') }}">
<link rel="apple-touch-icon-precomposed" href="{{ asset('images/logo/favicon.png') }}">
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const accountIcon = document.getElementById("account-icon");

        // Check if user is logged in using PHP auth directly in JS
        const isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};

        if (isLoggedIn) {
            accountIcon.href = "{{ route('account-details') }}";
            accountIcon.removeAttribute("data-bs-toggle");
        } else {
            accountIcon.href = "#login";
            accountIcon.setAttribute("data-bs-toggle", "offcanvas");
        }

        accountIcon.addEventListener("click", function(e) {
            if (isLoggedIn) {
                console.log("User is logged in, redirecting to account details");
            } else {
                console.log("Showing login popup");
            }
        });
    });
</script>
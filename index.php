<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conditional Navigation Bar</title>
</head>
<body>
    <!-- Container for navigation bar -->
    <div id="navbarContainer"></div>

    <!-- JavaScript to dynamically load navigation bar -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var isLoggedIn = localStorage.getItem('isLoggedIn');

            // Define the paths to your navigation bar HTML files
            var userNavbarPath = 'Sale.php';
            var adminNavbarPath = 'Navbar.php';

            // Function to include HTML file into an element
            function includeHTML(url, elementId) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById(elementId).innerHTML = this.responseText;
                    }
                };
                xhttp.open('GET', url, true);
                xhttp.send();
            }

            // Determine which navbar to include based on login status
            if (isLoggedIn) {
                includeHTML(adminNavbarPath, 'navbarContainer');
            } else {
                includeHTML(userNavbarPath, 'navbarContainer');
            }
        });
    </script>
</body>
</html>

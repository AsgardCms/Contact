<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Contact Request</title>
</head>
<body>
<h1>Someone contacted you</h1>

<ul>
    <li><strong>From:</strong> {{ $contactRequest->name }}</li>
    <li><strong>Email:</strong> {{ $contactRequest->email }}</li>
    <li><strong>Phone:</strong> {{ $contactRequest->phone }}</li>
    <li><strong>Company:</strong> {{ $contactRequest->company }}</li>
</ul>
<strong>Message:</strong>
{{ $contactRequest->message }}

<hr>
You can reply to this email to contact {{ $contactRequest->name }}.
</body>
</html>

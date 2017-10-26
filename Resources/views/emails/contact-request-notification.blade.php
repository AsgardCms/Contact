<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ trans('contact::contactrequests.email.new contact request') }}</title>
</head>
<body>
<h2>{{ trans('contact::contactrequests.email.someone contacted you') }}</h2>

<ul>
    <li><strong>{{ trans('contact::contactrequests.email.from') }}:</strong> {{ $contactRequest->name }}</li>
    <li><strong>{{ trans('contact::contact.email') }}:</strong> {{ $contactRequest->email }}</li>
    <li><strong>{{ trans('contact::contact.phone') }}:</strong> {{ $contactRequest->phone }}</li>
    <li><strong>{{ trans('contact::contact.company') }}:</strong> {{ $contactRequest->company }}</li>
</ul>
<strong>{{ trans('contact::contact.message') }}:</strong>
{{ $contactRequest->message }}

<hr>
{{ trans('contact::contactrequests.email.reply to contact') }} {{ $contactRequest->name }}.
</body>
</html>

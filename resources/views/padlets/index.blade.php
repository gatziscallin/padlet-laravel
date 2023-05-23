<!DOCTYPE html>
<html>
<head>

    <title>Laravel - nur für Testzwecke</title>

</head>
<body>
<h1>Laravel Padlets</h1>

<ul>
    @foreach ($padlets as $padlet)
        <li><a href="padlets/{{ $padlet->id }}">
                {{ $padlet->name }}</a></li>
    @endforeach
</ul>
</body>
</html>

<html>
    <head>
        <title>Hello/Index</title>
        <style>
            body {font-size: 16pt; color:#999; }
            h1 {font-size: 100pt; text-align: right; color:#f6f6f6; margin: -50px 0px -100px 0px;}
        </style>
    </head>

    <body>
        <h1>Blade/Index</h1>
        <p>{{ $msg }}</p>
        <form action="/hello" method="POST">
            @csrf
            <input type="text" name="msg">
            <input type="submit">
        </form>
    </body>
</html> 
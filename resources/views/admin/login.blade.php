<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ url('admin/login') }}" method="post">
        @csrf
        <p>Username : </p>
        <input type="text" name="username" id="username" placeholder="Masukan Username...">
        <p>Password</p>
        <input type="password" name="password" id="username" placeholder="Masukan Password.."><br>
        <input type="checkbox" name="remember" id="remember">
        <h3>Remember Me!</h3>
        <button>Kirim</button>
    </form>
</body>
</html>
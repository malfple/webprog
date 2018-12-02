<html>
<head>
<link rel = "stylesheet" type="text/css" href="css/style.css">
</head>
<body class="login">
<div class="login-page">
    <div class="form">
        <h3>LOGIN</h3>
        <p style="color: red">{{$error}}</p>
        <form class="login-form" action="/doLogin" method="POST">
            {{csrf_field()}}
            <input type="text" placeholder="email" name="email">
            <input type="password" placeholder="password" name="password">
            <button>login</button>
            <p class="message">Not registered? <a href="/register">Create an account</a></p>
        </form>
    </div>
</div>
</body>
</html>
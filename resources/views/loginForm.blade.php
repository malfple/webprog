<html>
<head>
<link rel = "stylesheet" type="text/css" href="style.css">
</head>
<body class="login">
<div class="login-page">
    <div class="form">
        <h3>LOGIN</h3>
        <form class="login-form" action="/doLogin" method="POST">
            {{csrf_field()}}
            <input type="text" placeholder="email" name="user_name">
            <input type="password" placeholder="password" name="password">
            <button>login</button>
            <p class="message">Not registered? <a href="/register">Create an account</a></p>
        </form>
    </div>
</div>
</body>
</html>
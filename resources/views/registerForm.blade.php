<html>
<head>
<link rel = "stylesheet" type="text/css" href="style.css">
</head>
<body class="register">
<div class="register-page">
    <div class="form">
        <h3>REGISTER</h3>
        <p style="color: red">{{$error}}</p>
      <form class="register-form" action="/doRegister" method="POST">
        {{csrf_field()}}
        <input type="text" placeholder="Name" name="name">
        <input type="text" placeholder="Email Address" name="email">
        <input type="password" placeholder="Password" name="password">
        <input type="password" placeholder="Confirm Password" name="confirmPassword">
        <select name="gender">
          <option disabled="disabled" selected="selected">Gender</option>
          <option>Male</option>
          <option>Female</option>
        </select>
        <input type="file" name="picture">
      <button type="submit">Create</button>
      <p class="message">Already registered? <a href="loginForm.html">Sign In</a></p>
        </form>
    </div>
</body>
</html>
<html>
<head>
<link rel = "stylesheet" type="text/css" href="css/stylesheet.css">
</head>
<body class="register">
    <div class="navbar">
            <div class="navbar-left">
                <ul>
                    <a class="logo">Pintester</a>
                    <input class="input" type="text"   placeholder="Search here">
                </ul>
            </div>
            <div class="navbar-right">
                <ul>
                    <a href = "home.html">Home</a>
                    <a href = "#">My Post</a>
                    <a href = "#">Post Detail</a>
                    <a href = "loginForm.html">Login</a>
                    <a href = "registerForm.html">Register</a>
                </ul>
            </div>
        </div>
        <div class="register-page">
            <div class="form">
                <div class="profile">
                    <div class="profilepic">
                        <img src="img/Illya.jpg" alt="profile pic">
                    </div>
                    <div class="profiledetail">
                        <p>Profile Name</p>
                        <p>profile@profile.com</p>
                    </div>
                </div>
                
                <form class="register-form">
                    <input type="text" placeholder="UserID"/>
                    <input type="text" placeholder="Name"/>
                    <input type="text" placeholder="Email Address"/>
                    <input type="password" placeholder="Password"/>
                    <select name="gender">
                        <option disabled="disabled" selected="selected">Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                <button>Save Changes</button>
                <button>Discard Changes</button>
                </form>
            </div>
</body>
</html>
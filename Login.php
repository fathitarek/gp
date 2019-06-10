
<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login page</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/login-page_demo.css">
    <link rel="stylesheet" href="css/login-page_style.css">
    <link rel="stylesheet" href="css/login-page_responsive.css">
</head>

<body>

    <div class="login-page_container">

        <!--       Sign in Side      -->

        <div class="login-section page-side section-ope">
            <div class="section-page_intro">
                <img src="images/signin-icon-black.png" alt="signin-icon">
                <p class="section-page-intro_title">Sign In Under Grade</p>
            </div>

            <div class="login-form-area">
                <p class="form-title">Sign In</p>
                <div class="section-form">
                    <form class="login-form" method="post" action="index.php">
                        <label class="login-page_label">
                            <input class="login-page_input" type="text" name="username">
                            <span class="login-page_placeholder ">Username</span>
                        </label>
                        <label class="login-page_label">
                            <input class="login-page_input" type="password" name="password">
                            <span class="login-page_placeholder ">Password</span>
                        </label>
                        <div class="login-section_submit">
                            <div class="login-page-submit-btn">
                                <input type="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


    <script src="js/jquery-1.12.1.min.js"></script>
    <script src="js/login-page_script.js"></script>
    <script>
    
    
    // $('.signIn').on('click',function () {
    //     var username = $('input.username').val();
    //     var password = $('input.password').val();
    //     console.log(username);
    //     console.log(password);
        
    //     $.ajax({
    //         "url": "index.php",
    //         "method": "POST",
    //         "data": {
    //             username: username,
    //             password: password,
    //         },
    //         success: function (response) {
    //             console.log(response);
                
    //         }
    //     });

    // });
</script>


        <!--       Sign up Side      -->

        <div class="signup-section page-side section-clos">
            <div class="section-page_intro">
                <img src="images/signup-icon.png" alt="signup-icon">
                <p class="section-page-intro_title">Sign In Post Grade</p>
            </div>

         <div class="login-form-area">
                <p class="form-title">Sign In</p>
                <div class="section-form">
                    <form class="login-form">

                        <label class="login-page_label">
                            <input class="login-page_input" type="text" name="text">
                            <span class="login-page_placeholder">Registeration number</span>
                        </label>
                        <label class="login-page_label">
                            <input class="login-page_input" type="password" name="password">
                            <span class="login-page_placeholder">Pin Code</span>
                        </label>
                        <div class="login-section_submit">
                            <label class="checkbox checkerlogin" for="checkbox1">
                                        <span class="icons"><span class="first-icon fui-checkbox-unchecked"></span><span class="second-icon fui-checkbox-checked"></span></span><input name="rrme" type="checkbox" id="rrme" data-toggle="checkbox">
                                        Remember Me
                                    </label>
                            <div class="login-page-submit-btn">
                                <input type="submit" name="submit-login" value="submit">
                            </div>
                        </div>
                        <div class="login-page_forget">
                            <a href="">Forget Your Password ?</a>
                        </div>
                    </form>

                    <form class="forget-form">
                        <p class="forget-title">Forget Your Password</p>
                        <label class="login-page_label">
                            <input class="login-page_input" type="email" name="email" autocomplete="off">
                            <span class="login-page_placeholder">Email</span>
                        </label>
                        <div class="login-section_submit">
                            <div class="login-page-submit-btn"><input type="submit" name="submit-login" value="submit"></div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>


    <script src="js/jquery-1.12.1.min.js"></script>
    <script src="js/login-page_script.js"></script>


</body>
</html>
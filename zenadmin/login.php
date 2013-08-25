<html lang="en"><head>
        <meta charset="utf-8">
        <title>Admin Panel - login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- styles -->
        <link href="theme/css/bootstrap.css" rel="stylesheet">
        <link href="theme/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="theme/css/style.css" rel="stylesheet">

        <!-- js -->
        <script src="theme/js/jquery.min.js" type="text/javascript"></script>
        <script src="theme/js/bootstrap.min.js" type="text/javascript"></script>

        <style type="text/css">
            .form-signin {
                max-width: 300px;
                padding: 19px 29px 29px;
                margin: 0 auto 20px;
                background-color: #fff;
                border: 1px solid #e5e5e5;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
            }
        </style>
    </head>

    <body>
        <div class="container">

            <form class="form-signin" action="processLogin.php" method="post">
                <?php if (isset($_GET['action']) and $_GET['action'] = 'failed'): ?>
                    <div class="alert alert-error">  
                        <a class="close" data-dismiss="alert">×</a>  
                        Sorry,User does not exist with provided credentials.
                    </div>
                <?php endif; ?>
                <h2 class="form-signin-heading">Please sign in</h2>
                <input autocomplete="off" type="text" class="input-block-level" placeholder="Username" name="username" id="username">
                <input autocomplete="off" type="password" class="input-block-level" placeholder="Password" name="password" id="password">
                <label class="checkbox">
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
                <button class="btn  btn-primary" type="submit">Sign in</button>
            </form>

        </div>

        <script src="theme/js/jquery.validate.js" type="text/javascript"></script>
        <script src="theme/js/jquery.form.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.form-signin').validate(
                {
                    rules: {
                        username: {
                            minlength: 2,
                            required: true
                        },
                        password: {
                            minlength: 2,
                            required: true
                        }
                    },
                    messages: {
                        username: {
                            required: "Username can not be empty",
                            minlength: "Username must be minimum 2 char. long"
                        },
                        password: {
                            required: "Password can not be empty",
                            minlength: "Password must be minimum 2 char. long"
                        }
                    }
                    
                });
                
            }); // end document.ready
        </script>

    </body>
</html>
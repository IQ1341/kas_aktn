<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 mt-5">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="proses_login.php" method="post">
                            <div class="form-floating">
                                <input class="form-control" id="username" name="username" type="text" placeholder=" ">
                                <label for="username">Username</label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="password" name="password" type="password" placeholder=" ">
                                <label for="password">Password</label>
                            </div>
                            <div class="form-floating">
                                <select class="form-select" id="role" name="role">
                                    <option value="kas">Kas</option>
                                    <option value="hrd">HRD</option>
                                </select>
                                <label for="role">Role</label>
                            </div>
                            <?php if(isset($error)): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $error; ?>
                                </div>
                            <?php endif; ?>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <div class="small"><a href="#">Forgot Password?</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

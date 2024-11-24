<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ログイン画面だにょ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.1.0/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">
</head>
<body class="login-page" style="min-height: 330.4px;">
    <div class="login-box">
        <div class="login-logo">
            ログイン画面だにょ
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <form action="https://admin.kohakohatech.com/login" method="post">
                    <input type="hidden" name="_token" value="wMq2nxHyUVwgzF8FuKk4cf8kpInD2qcyp0oRa0dP"
                        autocomplete="off"> <label for="small">Email</label>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control " placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <label for="small">Password</label>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control " placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="offset-8 col-4">
                            <button type="submit" class="btn btn-primary btn-block">ログイン</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>
</body>
</html>

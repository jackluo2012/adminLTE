<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin | Login</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="_token" content="<?php echo e(csrf_token()); ?>"/>
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo e(asset('admin-lte/bootstrap/css/bootstrap.min.css')); ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo e(asset('admin-lte/font-awesome/css/font-awesome.min.css')); ?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo e(asset('admin-lte/ionicons/2.0.1/css/ionicons.min.css')); ?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo e(asset('admin-lte/dist/css/AdminLTE.min.css')); ?>">
    </head>
    <body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="/admin"><b>AdminLTE</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Login</p>

            <form action="<?php echo e(route('admin.doLogin')); ?>" method="post">
                <div class="form-group has-feedback">
                    <input type="input" class="form-control" placeholder="Username" name="username" value="">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password" value="">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <?php if($errors->has('login_fail')): ?>
                    <div class="form-group has-feedback">
                        <div class="err-info"><?php echo e($errors->first('login_fail')); ?></div>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-4 col-md-offset-4">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
    </body>
</html>
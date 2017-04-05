<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php $__env->startSection('title'); ?> adminLTE <?php echo $__env->yieldSection(); ?> <?php echo $__env->make('admin.layouts.partials.title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="_token" content="<?php echo e(csrf_token()); ?>"/>
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo e(asset('admin-lte/bootstrap/css/bootstrap.min.css')); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('admin-lte/font-awesome/css/font-awesome.min.css')); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo e(asset('admin-lte/ionicons/2.0.1/css/ionicons.min.css')); ?>">
    <!-- nestable -->
    <link rel="stylesheet" href="<?php echo e(asset('package/nestable/nestable.css')); ?>">
    <!-- select2 -->
    <link rel="stylesheet" href="<?php echo e(asset('admin-lte/plugins/select2/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('package/fontawesome-iconpicker-1.2.2/css/fontawesome-iconpicker.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('admin-lte/dist/css/AdminLTE.min.css')); ?>">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="<?php echo e(asset('admin-lte/dist/css/skins/skin-blue.min.css')); ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?php echo e(asset('admin-lte/html5shiv/3.7.3/html5shiv.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin-lte/respond/1.4.2/respond.min.js')); ?>"></script>
    <![endif]-->
    <?php echo $__env->yieldContent('style'); ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <?php echo $__env->make('admin.layouts.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php echo $__env->make('admin.layouts.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="pjax-container">

        <?php echo $__env->make('admin.layouts.partials.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- Content Header (Page header) -->
        <?php echo $__env->make('admin.layouts.partials.content-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- Main content -->
        <section class="content">
            <?php echo $__env->yieldContent('content'); ?>
            <!-- Your Page Content Here -->
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <?php echo $__env->make('admin.layouts.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="<?php echo e(asset('admin-lte/plugins/jQuery/jQuery-2.1.4.min.js')); ?>"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo e(asset('admin-lte/bootstrap/js/bootstrap.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('admin-lte/dist/js/app.min.js')); ?>"></script>

<!-- <script src="<?php echo e(elixir('js/app.js')); ?>"></script> -->
<script src="<?php echo e(asset('package/jquery.pjax/1.9.6/jquery.pjax.min.js')); ?>"></script>

<!-- menu -->
<script src="<?php echo e(asset('package/nestable/jquery.nestable.js')); ?>"></script>
<script src="<?php echo e(asset('admin-lte/plugins/select2/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('package/fontawesome-iconpicker-1.2.2/js/fontawesome-iconpicker.min.js')); ?>"></script>

<script src="<?php echo e(asset('js/admin/common.js')); ?>"></script>
<script>
    var Ilongx = {
        init: function() {
            var self = this;

            $(document).pjax('a:not(a[no-pjax],a[target="_blank"])', '#pjax-container', {timeout:8000});
            $(document).on("pjax:timeout", function(event) {
                // 阻止超时导致链接跳转事件发生
                event.preventDefault()
            });
            $(document).on('pjax:end', function() {
                self.siteBootUp();
            });
            self.siteBootUp();
        },
        siteBootUp: function() {
            var self = this;
            self.nestable();
            self.select2Default();
            self.iconpicker();
        },
        nestable: function() {
            //树形菜单
            $('#nestable').nestable({
                group: 1
            });
            $('.menu-tools').on('click', function(e) {
                var target = $(e.target),
                        action = target.data('action');
                if (action === 'expand-all') {
                    $('.dd').nestable('expandAll');
                }
                if (action === 'collapse-all') {
                    $('.dd').nestable('collapseAll');
                }
            });
            $('.menu-save').on('click', function() {
                var list = $('#nestable').nestable('serialize');
                var obj = new Object();
                obj.list = list;
                var ajaxUpdateSortParentUrl = '<?php echo e(route('admin.menu.ajaxUpdateSortParent')); ?>';
                ajaxConfirm(obj, ajaxUpdateSortParentUrl, function(data) {
                    alert(data.msg);
//                    location.reload();
                });
            })
        },
        select2Default: function() {
            $(".select2-hidden-accessible").select2({
                language: "zh-CN", //设置 提示语言
                width: "100%", //设置下拉框的宽度
                placeholder: "请选择",
                allowClear: true
            });
        },
        iconpicker: function() {
            $('.iconpicker-input').iconpicker();
        }
    };
    $(document).ready(function()
    {
        Ilongx.init();
    });

</script>
<?php echo $__env->yieldContent('script'); ?>
</body>
</html>

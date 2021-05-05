<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE = edge">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">
    <title><?php echo $title; ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?php echo Asset::css('toastr.css'); ?>
    <?php echo Asset::js('toastr.min.js'); ?>
</head>

<body>
<nav class = "navbar navbar-inverse navbar-fixed-top">
    <div class = "container">
        <div class = "navbar-header">
            <button type = "button" class = "navbar-toggle collapsed"
                    datatoggle = "collapse" data-target = "#navbar"
                    aria-expanded = "false" ariacontrols = "navbar">
                <span class=  "sr-only">Toggle navigation</span>
                <span class = "icon-bar"></span>
                <span class = "icon-bar"></span>
                <span class = "icon-bar"></span>
            </button>
            <a class = "navbar-brand" href = "#">FuelPHP Sample</a>
        </div>

        <div id = "navbar" class = "collapse navbar-collapse">
            <ul class = "nav navbar-nav">
                <li class = "active"><a href = "/book/index">Home</a></li>
                <li><a href = "/book/add">Add book</a></li>
                <li><a href="/login/logout">Log out</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class = "container">
    <div class="col-md-12" style = "margin: 70px 0 0 0;">
        <h1><?php echo $title; ?></h1>
        <hr>
        <?php if (Session::get_flash('success')): ?>
            <div class="alert alert-success alert-dismissible show" role="alert">
                <p>
                    <?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
                    <span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </span>
                </p>
            </div>
        <?php endif; ?>
        <?php if (Session::get_flash('error')): ?>
            <div class="alert alert-danger alert-dismissible show" role="alert">
                <p>
                    <?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
                    <span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </span>
                </p>
            </div>
        <?php endif; ?>
    </div>
    <div class = "starter-template" style = "padding: 20px 0 0 0;">
        <?php echo $content; ?>
    </div>

</div><!-- /.container -->
</body>

</html>
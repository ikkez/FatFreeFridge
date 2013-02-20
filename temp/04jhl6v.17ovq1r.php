<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?php echo viewHelper::getBaseUrl(); ?>" />
    <meta charset="utf-8">
    <title><?php echo $page['title']; ?> | Fat-Free Fridge</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="F3-Junkies">
    <link href="<?php echo $UI; ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo $UI; ?>css/main.css" rel="stylesheet">
    <link href="<?php echo $UI; ?>css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo $UI; ?>css/syntax.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo $UI; ?>img/f3f_icon_32.ico">
    <link rel="apple-touch-icon" href="<?php echo $UI; ?>img/f3f_icon_57.png">
</head>

<body>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">Fat-Free Fridge</a>
            <iframe class="pull-right" style="margin-top:10px;" src="http://ghbtns.com/github-btn.html?user=ikkez&repo=fatfreefridge&type=fork&count=true" allowtransparency="true" frameborder="0" scrolling="0" width="95px" height="20px"></iframe>
            <iframe class="pull-right" style="margin-top:10px;" src="http://ghbtns.com/github-btn.html?user=ikkez&repo=fatfreefridge&type=watch&count=true" allowtransparency="true" frameborder="0" scrolling="0" width="95px" height="20px"></iframe>
            <div class="nav-collapse">
                <ul class="nav">
					<?php foreach (($menu?:array()) as $page): ?>
                    <li <?php echo ($page['url_path'] == $current_page_path)?'class="active"':''; ?>>
                        <a href="<?php echo $page['url_path']; ?>"><?php echo $page['title']; ?></a>
                    </li>
					<?php endforeach; ?>
                </ul>
                <form id="nav-search" action="" class="form-search">
                  <input type="text" spellcheck="false" autocomplete="off" name="q" placeholder="Search" id="search-query" class="search-input" />
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <?php echo $content; ?>

    <hr>

    <footer>
        <p>&copy; F3-Junkies 2012</p>
    </footer>
</div>
<!--/.fluid-container-->

<!-- javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo $UI; ?>js/jquery-1.7.1.min.js"></script>
<script src="<?php echo $UI; ?>js/bootstrap.min.js"></script>
<script src="<?php echo $UI; ?>js/jquery.quicksearch.js"></script>
<script src="<?php echo $UI; ?>js/main.js"></script>
<!--[if lte IE 8]>
<script type="text/javascript">
    $(document).ready(function () {
        $('ul.tree li:last-child').addClass('last');
     });
</script>
<![endif]-->
</body>
</html>


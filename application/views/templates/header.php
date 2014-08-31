<?php echo strtolower( doctype( 'html5' ) ) . "\n"; ?>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title><?php echo $this->sTitle; ?></title>
        <?php foreach( $this->arMetas as $k => $v ): ?>
        <meta name="<?php echo $v['name']; ?>" content="<?php echo $v['content']; ?>" />
        <?php endforeach; ?>
        <?php foreach( $this->arCSS as $k => $v ): ?>
        <link rel="stylesheet" href="<?php echo $v; ?>.css?v=<?php echo $this->sVersion; ?>" />
        <?php endforeach; ?>
        <?php foreach( $this->arLinks as $k => $v ): ?>
        <link rel="<?php echo $v['rel']; ?>" href="<?php echo $v['href']; ?>" />
        <?php endforeach; ?>
        <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-54276750-1', 'auto');
          ga('send', 'pageview');

        </script>
        <script src="http://gdc.indeed.com/ads/apiresults.js"></script>
    </head>
    <body>
        <div id="wrapper">            
            <header id="main-header">
                <div id="branding">                
                    <div>
                        <a href="/">Waiter careers</a>
                    </div>
                </div><!--#/branding-->
            </header><!--#main-header-->
            <nav id="main-nav">
                <ul class="clearfix">
                    <li><a href="/">All careers</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </nav><!--#main-nav-->
            <section id="main-content" class="clearfix">
                <div id="primary-content" class="pull-left">
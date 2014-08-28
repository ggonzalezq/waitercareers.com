<?php echo strtolower( doctype( 'html5' ) ) . "\n"; ?>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title><?php echo $this->sTitle; ?></title>
        <?php foreach( $this->arCSS as $k => $v ): ?>
        <link rel="stylesheet" href="<?php echo $v; ?>.css?v=<?php echo $this->sVersion; ?>" />
        <?php endforeach; ?>
        <?php foreach( $this->arLinks as $k => $v ): ?>
        <link rel="<?php echo $v['rel']; ?>" href="<?php echo $v['href']; ?>" />
        <?php endforeach; ?>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-54276750-1', 'auto');
          ga('send', 'pageview');

        </script>
        <script src="http://gdc.indeed.com/ads/apiresults.js"></script>
        <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
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
                    <li><a href="">Post a career</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </nav><!--#main-nav-->
            <section id="main-content" class="clearfix">
                <div id="primary-content" class="pull-left">
                    <div id="job-types-nav">
                        <ul class="clearfix">
                            <li class="active"><a href="">All types</a></li>
                            <li><a href="">Full time</a></li>
                            <li><a href="">Part time</a></li>
                            <li><a href="">Contract</a></li>
                            <li><a href="">Internship</a></li>
                            <li><a href="">Temporary</a></li>
                        </ul>
                    </div><!--#job-types-nav-->
                    <?php if( $sHeader !== '' ): ?>
                    <header id="primary-content-header">
                        <h1><?php echo $sHeader; ?></h1>
                    </header><!--#/primary-content-header-->
                    <?php endif; ?>
                    <div id="jobs-buffer">
                        <?php foreach( $arJobs->results->result as $oJob  ): ?>
                        <article id="<?php echo $oJob->jobkey; ?>" class="job">
                            <a href="<?php echo $oJob->url; ?>" rel="nofollow" target="_blank">
                                <h2 class="job-title">
                                    <?php echo $oJob->jobtitle; ?>
                                </h2>
                                <ul class="job-metadata clearfix">
                                    <li class="job-company"><?php echo $oJob->company; ?></li>
                                    <li class="job-city"><b><?php echo $oJob->city; ?> <?php echo $oJob->state; ?></b></li>
                                    <li class="job-time"><time><?php echo $oJob->formattedRelativeTime; ?></time></li>
                                </ul>
                                <p class="job-description"><?php echo $oJob->snippet; ?></p>
                            </a>
                        </article>
                        <?php endforeach; ?>    
                    </div><!--#jobs-buffer-->
                    
                    <?php echo $sPagination . "\n"; ?>
                    <?php echo $sPaginationSummary . "\n"; ?>
                    
                </div><!--#primary-content-->
                <div id="secondary-content" class="pull-right">
                    <aside id="jobs-by-state">
                        <h3>Jobs by state</h3>
                        <ul>
                        <?php foreach( $arStates as $arState ): ?>
                        <li><a href="<?php echo $arState['state_url']; ?>"><?php echo $arState['state_name']; ?></a></li>
                        <?php endforeach;?>
                        </ul>
                    </aside><!--#/jobs-by-state-->
                </div><!--#secondary-content-->
            </section><!--#main-content-->
            <footer id="main-footer">
                <p>&copy; <?php echo date( 'Y' ); ?> wwww.waitercareers.com</p>
            </footer>
        </div><!--#wrapper-->
    </body>
</html>

<?php require_once APPPATH . 'views/templates/header.php'; ?>
<div id="job-types-nav">
    <ul class="clearfix">
        <li<?php if( ! in_array( $sJobType, $arJobsTypes ) ): ?> class="active"<?php endif; ?>><a href="<?php echo $sCurrentPath; ?>">All types</a></li>
        <li<?php if( $sJobType === 'fulltime' ): ?> class="active"<?php endif; ?>><a href="<?php echo $sCurrentPath; ?>?jt=fulltime">Full time</a></li>
        <li<?php if( $sJobType === 'parttime' ): ?> class="active"<?php endif; ?>><a href="<?php echo $sCurrentPath; ?>?jt=parttime">Part time</a></li>
        <li<?php if( $sJobType === 'contract' ): ?> class="active"<?php endif; ?>><a href="<?php echo $sCurrentPath; ?>?jt=contract">Contract</a></li>
        <li<?php if( $sJobType === 'temporary' ): ?> class="active"<?php endif; ?>><a href="<?php echo $sCurrentPath; ?>?jt=temporary">Temporary</a></li>
    </ul>
</div><!--#job-types-nav-->
<?php if( $sHeader !== '' ): ?>
<header id="primary-content-header">
    <h1><?php echo $sHeader; ?></h1>
</header><!--#/primary-content-header-->
<?php endif; ?>

<?php if( sizeof( $arJobs->results->result ) ): ?>
<div id="jobs-buffer">
    
    
    <div id="leaderboard">    
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <ins class="adsbygoogle" style="display:inline-block;width:728px;height:90px" data-ad-client="ca-pub-2243402807454337" data-ad-slot="1902400001"></ins>
        <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
    </div>
    
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

<?php elseif( in_array( $sJobType, $arJobsTypes ) ): ?>
<div id="zero-jobs">
    <p>Currently we don't have any open career with the filters selected</p>
</div><!--#/zero-jobs-->
<?php endif; ?>

<?php require_once APPPATH . 'views/templates/footer.php'; ?>

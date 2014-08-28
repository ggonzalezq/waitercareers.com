<?php require_once APPPATH . 'views/templates/header.php'; ?>
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
<?php require_once APPPATH . 'views/templates/footer.php'; ?>

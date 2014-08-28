<?php require_once APPPATH . 'views/templates/header.php'; ?>
<header id="primary-content-header">
    <h1>Contact</h1>
</header><!--#/primary-content-header-->
<div id="contact">
    <?php if( $bSent ): ?>
    <p class="success-message">Thank you for contacting Waiter Careers.</p>
    <?php else: ?>
        <?php echo form_open( '/contact' ) . "\n"; ?>
            <div class="form-item">
                <?php echo form_label( 'Your name', 'name' ) . "\n"; ?>
                <?php echo form_input( array( 'name' => 'name', 'value' => $bSent ? '' : set_value( 'name' ),  'placeholder' => '', 'class' => 'form-text', 'id' => 'name' ) ) . "\n"; ?>
            </div>
            <div class="form-item">
                <?php echo form_label( 'Your email address <span title="This field is required" class="form-required">*</span>', 'email' ) . "\n"; ?>
                <?php echo form_input( array( 'name' => 'email', 'value' => $bSent ? '' : set_value( 'email' ),  'placeholder' => '', 'class' => 'form-text', 'id' => 'email' ) ) . "\n"; ?>
                <?php echo form_error( 'email' ) . "\n"; ?>
            </div>
            <div class="form-item">
                <?php echo form_label( 'Subject <span title="This field is required" class="form-required">*</span>', 'subject' ) . "\n"; ?>
                <?php echo form_input( array( 'name' => 'subject', 'value' => $bSent ? '' : set_value( 'subject' ), 'class' => 'form-text', 'id' => 'subject' ) ) . "\n"; ?>
                <?php echo form_error( 'subject' ) . "\n"; ?>
            </div>
            <div class="form-item">
                <?php echo form_label( 'Comments', 'comments' ) . "\n"; ?>
                <?php echo form_textarea( array( 'name' => 'comments', 'value' => $bSent ? '' : set_value( 'comments' ), 'class' => 'form-textarea', 'id' => 'comments' ) ) . "\n"; ?>
            </div>
            <div class="form-item">
                <div class="form-label">Are you human? <span title="This field is required" class="form-required">*</span></div>
                <?php echo $sRecaptchaHTML; ?>
                <?php if( $sRecaptchaError !== '' ): ?>
                <div class="form-error"><?php echo $sRecaptchaError; ?></div>
                <?php endif; ?>
            </div>
            <div class="form-item">
                <?php echo form_button( array( 'type' => 'submit', 'content' => 'Submit', 'class' => 'form-submit' ) ) . "\n"; ?>
            </div>
        <?php echo form_close() . "\n"; ?>
    <?php endif; ?>
</div><!--#/contact-->
<?php require_once APPPATH . 'views/templates/footer.php'; ?>
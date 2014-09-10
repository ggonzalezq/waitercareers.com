                </div><!--#primary-content-->
                <div id="secondary-content" class="pull-right">
                    <aside id="jobs-by-state">
                        <h3>Jobs by state</h3>
                        <ul>
                            <?php foreach( $arStates as $k => $v ): ?>
                            <li><a href="<?php echo $arStates[$k]['state_url']; ?>"><?php echo $arStates[$k]['state_name']; ?></a></li>
                            <?php endforeach;?>
                        </ul>
                        <?php echo form_dropdown( 'states', $arStatesDropdown, isset( $arState ) ? $arState['state_url'] : '', 'class="none" id="states"' ) . "\n"; ?>
                    </aside><!--#/jobs-by-state-->
                    <aside id="popular-careers">
                        <h3>Popular waiter careers<?php if( isset( $arState ) ): ?> in <?php echo $arState['state_name']; ?><?php endif; ?></h3>
                        <div id="large-skyscraper">                        
                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <ins class="adsbygoogle" style="display:inline-block;width:300px;height:600px" data-ad-client="ca-pub-2243402807454337" data-ad-slot="8520683204"></ins>
                            <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
                        </div><!--#/large-skyscraper-->
                    </aside><!--#/popular-careers-->
                    <aside id="about">
                        <h3>About us</h3>
                        <p>We are dedicated to offering you the very best waiter careers opportunities available in the United States.</p>
                    </aside><!--#/about-->
                </div><!--#secondary-content-->
            </section><!--#main-content-->
            <footer id="main-footer">
                <p>&copy; <?php echo date( 'Y' ); ?> wwww.waitercareers.com</p>
            </footer>
        </div><!--#wrapper-->        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="/js/vendor/chosen.jquery.js"></script>
        <script src="/js/main.js"></script>
    </body>
</html>
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
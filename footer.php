<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fspo_theme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class="container">
				<div class="row">
						<div class=" col-12 col-sm-6 col-md-6">
							<h4>Зв'язатися з нами</h4>
							<div class="contact">
							<div class="wrapper">
							
								<div class="icon">
									<i class="fas fa-phone"></i>
								</div>
								<p>
									Вул. Садова, 28, м. Умань, Черкаська область, Україна, 20300, УДПУ, ауд. 211
								</p>
							</div>

							<div class="wrapper">
							
								<div class="icon">
									<i class="fas fa-map-marked-alt"></i>
								</div>
								<p>
									Тел.: (04744) 3-53-08
								</p>
							</div>

							<div class="wrapper">
							
								<div class="icon">
									<i class="fas fa-envelope"></i>
								</div>
								<p>	
									Е-mail: <a href="mailto:fspo@ukr.net">fspo@ukr.net</a>
								</p>
							</div>
							
							</div>
						</div>
						<div class=" col-12 col-sm-6 col-md-6">
							<h4>Корисні посилання</h4>
							<?php 
								wp_nav_menu( array(
									'theme_location' => 'menu-footer-2',
									'container' => '',
									'menu_id'        => 'second-menu-2'
								) );
							?>
						</div>
						
						<div class="col-md-12 copyrights">
							<p><?php echo comicpress_copyright();echo " "; echo bloginfo( "name" ); ?>.  Всі права захищені.</p>
							<p>
								Created by <a href="https://www.facebook.com/Valik.Maystrenko">Valik Maystrenko</a>
							</p>
							<p style="float: right;">
								<!--LiveInternet counter--><script type="text/javascript">
document.write("<a href='//www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t17.6;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";h"+escape(document.title.substring(0,150))+";"+Math.random()+
"' alt='' title='LiveInternet: number of pageviews for 24 hours,"+
" of visitors for 24 hours and for today is shown' "+
"border='0' width='88' height='31'><\/a>")
</script><!--/LiveInternet-->

							</p>
						</div>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


</body>
</html>

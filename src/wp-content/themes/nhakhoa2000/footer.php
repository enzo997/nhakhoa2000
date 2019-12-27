<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>
<?php wp_footer(); ?>
<body>
	<footer class="footer">
		<div class="container">
			<?php
			$footer = get_field('footer_1', 'option');
				$Location1 = $footer['location_1'];
					$title1 = $Location1['title'];
					$address1 = $Location1['address'];
					$Email1 =  $Location1['email'];
				$Location2 = $footer['location_2'];
					$title2 = $Location2['title'];
					$address2 = $Location2['address'];
					$hotline2= $Location2['hotline'];
					$Email2 =  $Location2['email'];
				$QuickAccess = $footer['quick_access'];
					$title3 = $QuickAccess['title'];
			?>
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12">
					<div class="foo-content">
						<h3 class="title-h3"><?php echo	$title1;?></h3>
						<div class="address"><?php echo	$address1 ;?></div>
						<?php	
						$Hotline1 = $Location1['hotline'];
						$i =0;
						foreach($Hotline1 as $item):
							$i++;
							$hotline = $item['phone'];
						?>
							<div class="hotline-<?php echo $i;?>">
								<?php echo $hotline; ?>
							</div>
						<?php endforeach;?>
						<div class="email"><?php echo $Email1;?></div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12">
					<div class="foo-content">
						<h3 class="title-h3"><?php echo	$title2;?></h3>
						<div class="address"><?php echo	$address2;?></div>
						<?php	
						$Hotline2 = $Location2['hotline'];
						$i =0;
						foreach($Hotline2 as $item):
							$i++;
							$hotline = $item['phone'];
						?>
							<div class="hotline-<?php echo $i;?>">
								<?php echo $hotline; ?>
							</div>
						<?php endforeach;?>
						<div class="email"><?php   echo $Email2;?></div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12">
					<div class="foo-content">
						<h3 class="title-h3"><?php echo	$title3;?></h3>
						<div class="menu-footer">
						<?php 
							wp_nav_menu(
								array(
									'menu' => 'Menu Bottom',
									'container' => 'false',
									'menu_class' => 'footer-menu d-flex'
								)
							);
						?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="copyright">
			<div class="contanier">
			<?php $footer1= get_field('footer_2','option'); ?>
				<div class="col-left">
					<div class="copyright">
						<?php echo $footer1['copyright'];?>
					</div>
				</div>
				<div class="col-right">
					<img src="<?php echo $footer1['icon_youtube']['url']?>" alt="icon-youtube">
					<img src="<?php echo $footer1['icon_facebook']['url']?>" alt="icon-facebook">
				</div>
			</div>	
		</div>
	</footer>
</body>

<?php wp_footer(); ?>
</body>
</html>

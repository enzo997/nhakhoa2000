<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"></a>
		<header class="header">
			<div class="header-desktop">
				<div class="header-top">
					<div class="container">
						<div class="content">
							<?php 
								$header = get_field('header_1', 'option');
									$iconFacebook = $header['icon_facebook']['url'];
									$iconYoutube = $header['icon_youtube']['url'];
									$groupHotline = $header['group_hotline'];
										$iconPhone = $groupHotline['icon_phone']['url'];	
										$TitleHotline = $groupHotline['title'];								
									$GroupSchedule = $header['group_schedule'];
										$iconClock = $GroupSchedule['icon_clock']['url'];
										$TitlSchedule = $GroupSchedule['title'];
										$Schedule = $GroupSchedule['schedule'];
									$btnBook = $header['button_book'];
							?>
							<div class="col-left">
								<a href="https://www.facebook.com/nhakhoa2000/"><img src="<?php echo $iconFacebook?>" alt="icon-Facebook"></a>
								<img src="<?php echo $iconYoutube?>" alt="icon-Youtube">
							</div>
							<div class="col-right">
								<div class="col-cont hotline">
									<img src="<?php  echo $iconPhone; ?>" alt="icon-phone">
									<div class="cont">
										<h4 class="title-h4"><?php echo $TitleHotline; ?></h4>
										<?php	

										$PhonNumberGroup = $groupHotline['phone_number_group'];
										$i =0;
										foreach($PhonNumberGroup as $item):
											$i++;
											$PhoneNumberHotline = $item['phone_number'];
											$delete = array(
												' ',
												'(',
												')'
											);
											$realPhone = str_replace($delete,'',$PhoneNumberHotline);
										?>
											<a href="<?php echo 'tel:' .$realPhone;?>" class="phone phone-<?php echo $i?>" title='Call to <?php echo $PhoneNumberHotline;?>'><?php echo $PhoneNumberHotline;?></a>
										<?php endforeach;?>
									</div>								
								</div>
								<div class="col-cont time">
									<img src="<?php  echo $iconClock; ?>" alt="icon-phone">
									<div class="cont">
										<h4 class="title-h4"><?php echo $TitlSchedule; ?></h4>
										<div class="description">
											<?php echo $Schedule; ?>
										</div>
									</div>		
								</div>
								<a href="<?php echo $btnBook; ?>" class="btn-make-appointment">ĐẶT LỊC TƯ VẤN</a>
							</div>
						</div>
					</div>	
				</div>
				<div class="main-header">
					<div class="container">
						<div class="content">
							<?php 
							$header2= get_field('header_2', 'option');
								$iconLogo = $header2['main_logo']['url'];
								$iconlanguageVN = $header2['icon_language_vn']['url'];
								$iconlanguageEN = $header2['icon_language_en']['url'];
							?>
							<div class="col-left">
								<a href="<?php echo home_url(); ?>">
									<img src="<?php echo $iconLogo;?>" alt="icon-LOGO">
								</a>
							</div>
							<div class="main-menu">
								<?php
									wp_nav_menu(
										array(
											'menu' => 'Menu Top',
											'container' => 'false',
											'menu_class' => 'header-menu d-flex'
										)
									);
								?>
							</div>
							<div class="col-right">
								<a href="##">
									<img src="<?php echo $iconlanguageVN; ?>" alt="icon-VN">
								</a>
								<a href="###">
									<img src="<?php echo $iconlanguageEN;?>" alt="icon-EN">
								</a>
							</div>
						</div>
					</div>
					
				</div>
				
			</div>
		</header><!-- #masthead -->
</div>



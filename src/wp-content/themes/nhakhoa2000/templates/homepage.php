<?php /* Template Name: Home page*/
$id = get_queried_object()->ID;
get_header(); //cau lenh khac phuc tinh trang khong nhan duoc get_field, do id trong field khac voi page?>
<!--**********************************************************************************************************-->
<div class="home-page">
    <?php $BannerTop = get_field('banner_top');?>
    <div class="section sec-banner-top" style="background-image: url('<?php echo $BannerTop['image_banner_top']['url']; ?>');background-repeat: no-repeat; ">
        <div class="container">
            <div class="cont">
                <h1 class="title-h1"><?php echo $BannerTop['title'];?></h1>
                <div class="description"><?php echo $BannerTop['description'];?></div>
                <div class="note"><?Php echo $BannerTop['note']; ?></div>
                <a href="<?php echo $BannerTop['btn']; ?>>" class="btn-see-service">xem các dịch vụ</a>
            </div>
        </div>
    </div>
    <div class="section sec-about">
        <div class="container">
            <?php 
                $SecAbout = get_field('about_section');

                    $imageDoctor = $SecAbout['doctor_image']['url'];
                    $Present = $SecAbout['present']; ?>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 row-left">
                    <div class="col-left">
                        <div class="frame-cont">
                            <img src="<?php echo $imageDoctor; ?>" alt="img-doctor">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="col-right">
                        <h2 class="title-h2">
                            <?php echo $Present['title']; ?>
                        </h2>
                        <?php	

                            $descriptionRepeater = $Present['description_group'];
                            $i =0;
                            foreach($descriptionRepeater as $item):
                                $i++;
                                $description = $item['description'];
                            ?>
                                <div class="description description-<?php echo $i;?>">
                                    <?php echo $description; ?>
                                </div>
                            <?php endforeach;?>
                        <a href="<?php echo $Present['btn']; ?>" class="btn-See-more">xem thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="section sec-Featured-Services">
        <div class="container">
            <div class="sec-Feature-Services--post-list ">
                <h2 class="title-h2">
                    <?php echo get_field('featured_services'); ?>
                </h2>
            </div>
            <div class="row">
            <?
                    $args=array(
                        'parent'=>get_query_var('cat'),
                        'orderby' => 'id',
                        'order' => 'ASC',
                    );
                    $terms = get_terms( 'categories_service' , $args);
                    if(!empty($terms)){
                        foreach($terms as $term){
                           // echo '<pre>';
                           // var_dump($term);
                           // echo '</pre>';
                            $image = get_field('image',$term)['url'];
                            ?>
                                <div class="list col-lg-4 col-md-4 col-sm-12 sec-row-service">
                                    <div class="text-content">
                                        <div class="text-content--image">
                                            <img src="<?php echo $image; ?>" alt="<?php echo $term->name; ?>">
                                        </div>
                                        <h3 class="h3-title"><?PHP ECHO $term->name; ?></h3>
                                        <div class="description"><?php echo $term->description; ?></div>
                                        <div class="cont-button">
                                            <a href="<?php echo get_term_link($term->term_id); ?>" class="button">xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <?php 
        
        $GroupbannerMid = get_field('group_banner_mid', $id); //do nhan feild khong duoc nen id duoc dua vao de nhan dang chinh xac trang page!!!!!!!!!!!!!!

        $imageBannerMid = $GroupbannerMid['image']['url'];
        $Note = $GroupbannerMid['note']; 
        $ButtonSeeHere = $GroupbannerMid['btn'];
        ?>
    <div class="section sec-banner-mid" style="background-image: url('<?php echo $imageBannerMid; ?>');background-repeat: no-repeat; background-size:cover; height:450px; ">
        <div class="container">
            <div class="col-content">
                <h2 class="title-h2">
                    <?php echo $GroupbannerMid['title']; ?>
                </h2>
                <div class="option option-1">
                    <?php echo $GroupbannerMid['option_1'];?>
                </div>
                <div class="option option-2">
                    <?php echo $GroupbannerMid['option_2'];?>
                </div>
                <div class="cont-note">
                    <?php echo $Note;?>
                </div>
                <div class="cont-button">
                    <a href="<?php echo $ButtonSeeHere; ?>" class="btn-see-here">ĐẶT LỊCH KHÁM</a>    
                </div>
            </div>  
        </div>
    </div>
    <div class="section sec-knowledge">
        <div class="container">
            <h2 class="title-h2">
                <?php echo get_field('knowledge', $id);?>
            </h2>

            <div class="row">     
                <?php
                    //$paged =  get_query_var('paged')?get_query_var('paged'):1;//code phan trang
                    $args = array(
                        'orderby'    => 'date',
                        'post_status' => 'publish',
                        "posts_per_page" => 5,//SO LUONG BAI POST
                        'order'    => 'DESC',
                        "paged"=>$paged,
                    );
                    $posts = get_posts($args);//ham truyen vao

                        foreach($posts as $key=>$post){
                            //var_dump($post);// hien thi toan bo nhung gia trij ma bai post co
                            if ($key==0)// neu no la bai post dau tien thi no se chiem 2 o trong tong so 3 o. co nghia la col-lg-4 
                            //tang len col-lg -8.
                                echo '<div class="col-lg-8 col-md-12 col-sm-12 first-child">';
                            else
                                echo '<div class="col-lg-4 col-md-6 col-sm-12 normal">';
                            ?>
                                    <div class=" bolg-post--box blog-post--box-<?php echo $key;?>">
                                        <div class="col-image">
                                            <a href="<?php echo get_permalink($post->ID); ?>">
                                                <img src="<?php echo get_the_post_thumbnail_url($post->ID);?>" alt="image-post">
                                            </a>
                                        </div>
                                        <div class="blog-post--content">
                                            <div class="cont">
                                                <div class="date">
                                                    <?php echo get_the_date( 'm/d/Y',$post->ID )?>
                                                </div>
                                                <h3 class="title-h3">
                                                    <a href="<?php echo get_permalink($post->ID); ?>" title="<?php echo $post->post_title; ?>"><?php echo $post->post_title; ?></a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            <?php
                        }
                    ?>
                <?php //Giong nhu danh sanh ul li, xem chi tiet tai inspect// phan trang
                //nt_pagination($args,array('posts_per_page'=>$args['posts_per_page'])); ?>
            </div>
        </div>
    </div>
    <div class="section sec-customer-comment">
        <div class="container">
            <?php $CustomerComment = get_field('customer_comment', $id);?>
            <h2 class="title-h2">
                <?php echo $CustomerComment['tite']; ?>
            </h2>
            <div class="row">
                
                    <?php	
                    $Feedback = $CustomerComment['feedback'];
                    $i =0;
                    foreach($Feedback as $item):
                        $i++;
                        $ContentGroup= $item['content_group'];
                        $customerimage = $ContentGroup['customer_image']['url'];
                        $customername = $ContentGroup['customer_name'];
                        $customer_comment = $ContentGroup['customer_comment'];
                    ?>
                    <div class="col-row col-row-<?php echo $i;?>">
                        <div class="col-image">
                                <img src="<?php echo $customerimage; ?>" alt=" <?php echo $CustomerComment['tite']; ?>">
                            </div>
                        <div class="col-content col-content-<?php echo $i;?>">
                            <div class="customer-name">
                                <?php echo $customername;?>
                            </div>
                            <div class="customer-comment">
                                <?php echo $customer_comment;?>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            
        </div>        
    </div>
    <div class="section sec-brand-logo">
    <?php	
        $BrandLoGo = get_field('brand_logo',$id);
        foreach($BrandLoGo as $key=>$item):
            $logoimage = $item['logo_image']['url'];
        ?>
            <div class="brand-logo brand-logo-<?php echo $key;?>">
                <img src="<?php echo $logoimage; ?>" alt="Brand-Logo">
            </div>
        <?php endforeach;?>
    </div>
    <div class="section sec-googlemap">
        <div class="cont-img" style="background-image: url('<?php echo get_field('google_maps', $id)['url']; ?>');background-repeat: no-repeat; background-size:cover; height:450px; " >
            
        </div>
    </div>
</div>
<!---**********************************************************************************************************-->
<?php 
get_footer();?>
<style type="text/css">
.carousel-inner img{
    width:100%;
}
</style>    
	<section class="main">
		<div class="container">
            <div class="index_list">
            	<div class="row">
                <!--促銷-->
                    <div class="col-sm-3">
                        <?php 
    					foreach($promote_product as $pk => $hotproduct){
	                    ?>
                            <div class="ad_box">
                                <a href="/index/product_detail/<?php echo $hotproduct->uniqid_id;?>" target="_blank" class="">
                                    <span class="discount">主打</span>
                                    <figure class="pic">
                                        <img src="<?php echo Upload."products/".$hotproduct->picture;?>" class="img-responsive">
                                    </figure>
                                    <h5 class="title"><?php echo $hotproduct->product_title;?>
                                    <span class=" pull-right"><?php echo $hotproduct->member_price;?>元</span></h5>									
                                 </a>
                            </div>
                        <?php
                        }
                        ?>
                        
                    </div>
                    <div class="col-sm-9">
                        <!--首頁banner-->
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                            <?php 
    						  foreach($advertising as $key => $row){
    						      if($key==0){
    						          echo "<li data-target='#carousel-example-generic'' data-slide-to='".$key."' class='active'></li>";
    						      }
                                  else{
                                    echo "<li data-target='#carousel-example-generic' data-slide-to='".$key."'></li>";
                                  }
                                }
                            ?>
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                            <?php 
    						  foreach($advertising as $key => $row){
    						      if($key==0){
    						          echo "<div class='item active'>";
    						      }
                                  else{
                                    echo "<div class='item '>";
                                  }
                            ?>
                                    <a href="#">
                                        <img src="<?php echo Upload."advertising/".$row->picture;?>" alt="<?php echo Upload."advertising/".$row->title;?>" class="img-responsive">
                                        <div class="carousel-caption"></div>
                                    </a>
                                </div>
                            <?php 	  
        					}
        					?>
                            </div>
                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <h4 class="title"><span class="glyphicon glyphicon-bullhorn"></span>
                        NEWS<small class="more"><a href="/index/news_list">more+</a></small></h4>
                        <ul class="list-unstyled news_list">
                            <?php 
                    		  foreach($news as $nk => $newrow){
                    		      echo "<li><a href='/index/news_detail/".$newrow->id."'><span class='date'>".date("Y/m/d",strtotime($newrow->create_time))."</span>".$newrow->title."</a></li>";
                                }
                            ?>
                            
                        </ul>
                    </div>
            	</div>
            </div>
            <div class="product_list index_list">
                <h3 class="title"><span class="glyphicon glyphicon-star"></span>
                產品 PRODUCT<small class="more"><a href="/index/product_list">more+</a></small></h3>
                <ul class="list-unstyled list-inline">
                    <?php 
                        /*
					  foreach($category as $key => $categoryrow){
					      echo "<li class='category'><a href='#'>".$categoryrow['title']."</a></li>";
                        }
                        */
                    ?>
                </ul>
                <div class="row">
                    <?php 
					  foreach($product as $pk => $product_row){
                    ?>
                    <div class="col-sm-3">
                        <div class="product_box">
                            <figure class="pic">
                                <a href="/index/product_detail/<?php echo $product_row->uniqid_id;?>">
                                <img src="<?php echo Upload."products/".$product_row->picture;?>" class="img-responsive">
                                </a>
                            </figure>
                            <h5 class="title"><?php echo $product_row->product_title;?>
                            <span class="price pull-right">
                                一般&nbsp;:&nbsp;
                                <?php 
                                    echo $product_row->price;
                                ?>元
                                &nbsp;&nbsp;
                                會員價&nbsp;:&nbsp;
                                <?php 
                                    echo $product_row->member_price;
                                ?>元
                            </span></h5>
                            <div class="text-center"><button type="button" class="btn btn-sm btn-default additem" data-product="<?php echo $product_row->uniqid_id;?>">加入購物車</button></div>
                        </div>
                    </div>
                    <?php 
					  }
                    ?>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="index_list">
                        <h3 class="title">
                        <span class="glyphicon glyphicon-thumbs-up"></span>SHARE
                        <small class="more"><a href="/index/share_list/">more+</a></h3>
                        <?php 
    					  foreach($share as $pk => $share_row){
                        ?>
                        <a href="/index/sharing_detail/<?php echo $share_row->uniqid_id;?>" class="share_box">
                            <h5 class="title"><?php echo $share_row->title;?></h5>
                            <p class="txt"><?php echo $share_row->content;?></p>
                        </a>
                        <?php 
    					  }
                        ?>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-7">
                    <div class="course_list index_list">
                        <h3 class="title "><span class="glyphicon glyphicon-book"></span>COURSE
                        <small class="more"><a href="/index/course_list">more+</a></small></h3>
                        <div class="row">
                            <?php 
                    		  foreach($course as $ck => $course_row){
                    		?>
                            <div class="col-sm-6">
                                <div class="course_box">
                                    <h5 class="title"><a href="/index/course_detail/<?php echo $course_row->uniqid_id;?>"><?php echo $course_row->product_title;?></a></h5>
                                    <p class="">會員價：<span class="price"><?php echo $course_row->member_price;?>元</span> / 
                                    一般價：<span class="price"><?php echo $course_row->product_price;?>元</span></p>
                                    <p class="txt">
                                        <?php 
                                            $content=strip_tags($course_row->product_content);
                                            echo mb_substr($content,0,100,"utf-8");
                                        ?>
                                    </p>
                                    <div class="text-center"><a class="btn btn-sm btn-default" href="/index/course_detail/<?php echo $course_row->uniqid_id;?>" role="button">詳細資訊</a></div>
                                </div>
                            </div>
                            <?php      
                                }
                            ?>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-5">
                    <div class="index_list">
                        <h3 class="title">
                        <span class="glyphicon glyphicon-globe"></span>FAQ
                        <small class="more"><a href="/index/faq_list">more+</a></small></h3>
                        <ul class="list-unstyled faq_list">
                            <?php 
                    		  foreach($faq as $fk => $faqrow){
                    		      echo "<li><a href='/index/faq_detail/".$faqrow->uniqid_id."'><span class='date'>".date("Y/m/d",strtotime($faqrow->create_time))."</span>".$faqrow->title."</a></li>";
                                }
                            ?>
                        </ul>
                    </div>
                </div>
                
                <div class="col-sm-5">
                    <div class="index_list">
                        <h3 class="title">
                        <span class="glyphicon glyphicon-globe"></span>粉絲團</h3>
                        <ul class="list-unstyled faq_list">
                            <div class="fb-page" data-href="https://www.facebook.com/vivisoap/?fref=ts" data-tabs="timeline" data-width="370" data-height="200" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/vivisoap/?fref=ts">
                            <a href="https://www.facebook.com/vivisoap/?fref=ts">亦然手工皂</a></blockquote></div></div>
                        </ul>
                    </div>
                </div>
            </div>
    	</div>
	</section>
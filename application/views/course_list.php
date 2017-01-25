	<section>
    	<div class="container">
            <ol class="breadcrumb">
              <li><a href="/index">首頁</a></li>
              <li class="active">課程資訊</li>
            </ol>
        </div>
    </section>
    <section class="main">
		<div class="container">
        	<div class="index_list">
                <h3>課程資訊</h3>
                <div class="row">   
                    <?php 
                      foreach($course as $ck => $course_row){
                    ?>
                    <div class="col-sm-4">
                        <div class="course_box">
                            <h5 class="title"><a href="/index/course_detail/<?php echo $course_row->uniqid_id;?>"><?php echo $course_row->product_title;?></a></h5>
                            <p class="">會員價：<span class="price"><?php echo $course_row->member_price;?>元</span> / 一般價：<span class="price"><?php echo $course_row->product_price;?>元</span></p>
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
	</section>
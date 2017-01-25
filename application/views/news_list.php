	<section>
    	<div class="container">
            <ol class="breadcrumb">
              <li><a href="/index">首頁</a></li>
              <li class="active">最新消息</li>
            </ol>
        </div>
    </section>
    <section class="main">
		<div class="container">
        	<div class="index_list">
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <h3>最新消息</h3>
                        <?php 
						foreach($news as $nk => $newrow){ ?>
                            <div class="news_box row">
                                <a href="/index/news_detail/<?php echo $newrow->id;?>">
                                    <p class="date col-sm-2"><?php echo date("Y/m/d",strtotime($newrow->create_time));?></p>
                                    <h5 class="title col-sm-8"><?php echo $newrow->title;?></h5>
                                    <p class="txt col-sm-2 text-right">more+</p>
                                </a>
                            </div>	  
						<?php 
						}
						?>   
                    </div>
                </div>
			</div>        
    	</div>
	</section>
    <section>
    	<div class="container">
            <ol class="breadcrumb">
              <li><a href="/index">首頁</a></li>
              <li class="active">商品一覽</li>
            </ol>
        </div>
    </section>
    <!---網站內容--->
	<section class="main">
		<div class="container">
			<div class="index_list">
            	<div class="row">
                    <!--
                    <div class="col-sm-3">
                        
                        <h3 class="title">分類</h3>
                        <ul class="list-unstyled ">
							<?php 
                                /*
                              foreach($category as $key => $categoryrow){
                                  echo "<li class=''><a href='product_list'>".$categoryrow->title."</a></li>";
                                }
                                */
                            ?>
                        </ul>
                    </div>
                    -->
                    <div class="col-sm-12">
                        <div class="product_list">
                            <h3 class="title">產品列表</h3>
                            <div class="row">
                                <?php 
                                  foreach($product as $pk => $product_row){
                                ?>
                                <div class="col-sm-3">
                                    <div class="product_box">
                                        <a href="/index/product_detail/<?php echo $product_row->uniqid_id; ?>">
                                            <figure class="pic">
                                                <img src="<?php if($product_row->picture!="") echo Upload."products/".$product_row->picture;?>" class="img-responsive">
                                            </figure>
                                            <h5 class="title"><?php echo $product_row->product_title;?><span class="price pull-right"><?php echo $product_row->price;?>元</span></h5>
                                        </a> 
                                    </div>
                                </div>
                                <?php }?>                          
                            </div>
                            <!--
                            <nav>
                              <ul class="pagination">
                                <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                                <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                                <li class=""><a href="#">2 <span class="sr-only"></span></a></li>
                                <li class=""><a href="#">3 <span class="sr-only"></span></a></li>
                                <li class=""><a href="#">4 <span class="sr-only"></span></a></li>
                                <li class="disabled"><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
                              </ul>
                            </nav>
                            -->
                        </div>    
                    </div>
                </div>         	
            </div>     
		</div>
	</section>
 <style type="text/css">
 .group_h4{
    color:rgb(86, 101, 2);
 }
 div.groupbox{
    border:#CCC 1px solid;
    margin-right:3px;
    min-height:130px;
 }

 div.group_name{
    float:left;
    line-height: 26px;
 }
/*
div.group_name::after { 
    content: " 個";
}
*/
 div.group_amount{
    float:left;
    line-height: 26px;
    padding-left:3px;
 }
 div.group_order_box{
    clear:both;
    width:100%;
 }
 </style>
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
                        <div class="product_list">
                            <?php 
                                $pid="";
                          		$pid=$product->uniqid_id;
                            ?>
                            <h3 class="title"></h3>
                            <div class="row">
                                <div class="col-sm-6">
                                    <figure class="pic">
                                        <img src="<?php if($product->picture!="") echo Upload."products/".$product->picture;?>" class="img-responsive">
                                    </figure>
                                </div>
                                <div class="col-sm-6">
                                	<h4 class="title"><?php echo $product->product_title;?></h4>
                                    <div class><?php echo $product->product_short;?></div>
                                	<div class="">
                                    價格：<span class="price" id="price"><?php echo $product->price;?>元</span>
                                    
                                    &nbsp;&nbsp;&nbsp;
                                    會員價：<span class="price" id="member_price"><?php echo $product->member_price;?>元</span>
                                    
                                    &nbsp;&nbsp;&nbsp;
                                    <?php 
                                    /*
                                    if(isset($discount_price) && $discount_price!=0){
                                        echo "特價：<span class='price'>".$discount_price."元</span>";
                                    }
                                    */
                                    ?>
                                    </div>
                                    <div class="pull-left">
                                    規格：
                                    <select name="product_detail" id="product_detail">
                                    <?php
                                    foreach($product_detail as $pdk => $pdv){
                                        echo "<option value='".$pdv->id."'>".$pdv->sub_title."</option>";
                                    }
                                    ?>
                                    </select>
                                    </div>
                                    <div class="pull-left">數量：
                                    <select name="number" id="number">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    庫存量( <span id="inventory"><?php echo $product->inventory;?></span> )
                                    </div>
                                    <div class="pull-right purchaseBtn">
                                    </div>
                                    <input type="hidden" id="productId" value="<?php echo $product->uniqid_id;?>"/>                                    
                                    <br />
                                    <br />
                                    <?php
                                        if($product->all_discount==0){
                                            echo "<span class='label label-danger'>不適用任何折扣方案</span>&nbsp;&nbsp;";
                                        }
                                        if($product->shipping_discount==0){
                                            echo "<span class='label label-danger'>不適用滿額免運</span>";
                                        }
                                    ?>
                                </div>
                            </div>
                            <div>
                                <?php echo $product->product_content;?>
                            </div>
                            <hr />
                 <div class="row">
                    <?php 
                      if(!empty($groups)){
					  foreach($groups as $pk => $group){
                    ?>
                    <div class="col-sm-3 groupbox">
                        <h4 class="group_h4"><?php echo $group['title'];?></h4>
                        <div class="group_name"><?php echo $group['name'];?></div>
                        <div class="group_amount"><?php echo $group['amount'];?></div>
                        <div class="group_order_box">
                        <span class="price">
                            促銷價&nbsp;:&nbsp;
                            <?php echo $group['price'];?>元
                            &nbsp;&nbsp;
                        </span>
                        <button type="button" class="btn btn-sm btn-default additem" data-product="<?php echo $group['uniqid_id'];?>">購買組合</button>
                        </div>
                    </div>
                    <?php 
					  }
                      }
                    ?>
                </div>
                            
                <div class="fb-like" data-href="http://soap.dapin.tw/index/product_detail/<?php echo $pid;?>" data-width="100%" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                <div class="fb-comments" data-href="http://soap.dapin.tw/index/product_detail/<?php echo $pid;?>" data-width="100%" data-numposts="5"></div>
                        </div>    
            </div>     
		</div>
	</section>
    <script>
    $(function(){
        $('#product_detail').change(function(){
            $.ajax({
        	  method: "POST",
        	  url: "/index/query_product_detail/",
        	  data:{
        		  id:$(this).val(),
        	  }
           }).success(function(res){
                let data = jQuery.parseJSON(res);
                $('#price').text(data.price);
                $('#member_price').text(data.member_price);
                $('#inventory').text(data.inventory);
                
                let purchaseBtn="";
                //data.inventory>0           
                if(true){
                    let pid=$('#productId').val();                                        
                    purchaseBtn+='<button type="button" class="btn btn-success additem" data-product="'+pid+'">加入購物車</button>';
                }else{
                    purchaseBtn="目前暫無庫存";
                }  
                $('.purchaseBtn').html(purchaseBtn);         
           });
        }).trigger('change');
    })
    </script>
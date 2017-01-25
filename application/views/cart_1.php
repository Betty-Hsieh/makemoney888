	<!---網站內容--->
    <section class="main">
		<div class="container">
            <form action="/index/cart2/" method="post" id="order_form">
			<div class="progress">
                <div class="progress-bar progress-bar-success" style="width: 35%">
                	<span class="sr-only">STEP 1 ：購物車</span>
                </div>
                	<div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 35%">
                <span class="sr-only">STEP 2 ：填寫購物資訊</span>
                </div>
                <div class="progress-bar progress-bar-danger" style="width: 30%">
                	<span class="sr-only">STEP 3 ：完成訂購</span>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                	<h3 class="panel-title">購物清單</h3>
                </div>
            	<div class="panel-body text-center">
                    <div class="">
                        <div class="row">
                            <div class="col-sm-offset-2 col-sm-4">產品</div>
                        <div class="col-sm-2">單價</div>
                        <div class="col-sm-2">數量</div>
                        <div class="col-sm-1">小計</div>
                        <div class="col-sm-1"></div>          
                        </div>	
                    </div>
                    <?php foreach($cart as $key=>$value){ 
					?>
                    <div class="">
                        <div class="row">
                            <div class="col-sm-2">
                                <?php if(!empty($value['pic'])){;?>
                                <figure class="">
                                    <img src="/upload/products/<?php echo $value['pic'];?>" class="img-responsive">
                                </figure>                
                                <?php }?>
                            </div>
                            <div class="col-sm-4">
                            <?php 
                                if(empty($value['sub_name'])){
                                    echo $value['name'];
                                }else{
                                    echo $value['name']."(".$value['sub_name'].")";
                                }
                            ;?>
                            </div>
                            <div class="col-sm-2"><?php echo $value['price'];?></div>
                            <div class="col-sm-2"><?php echo $value['qty'];?></div>
                            <div class="col-sm-1"><?php echo $value['qty']*$value['price'];?></div>        
                            <div class="col-sm-1">
                                <button type="button" class="btn btn-sm btn-default order_cancel" id="<?php echo $value['rowid'];?>">取消</button>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <hr />
                    <div class="row">
                        <div class="col-sm-offset-6 col-sm-6">
                        <?php
                            foreach($shipping as $sp =>$spv){
                                if($spv->fkey2!="shipping"){
                                    $fee=0;
                                    if($spv->fvalue2!=""){
                                        $fee=$spv->fvalue2;
                                    }
                                    echo "<input style='margin-left:6px;' type='radio' name='shipping' id='".$spv->fkey2."' class='shipping' value='".$fee."' />".$spv->fvalue."(".$fee.")";
                                }
                            }
                        ?>
                        </div>
                        <a href="http://e-kids.shop2000.com.tw/news/198104" target="_blank">代收付費用</a>                   
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-sm-4">
                            <textarea name="remark" rows="6" id="remark" cols="50" placeholder="備註欄位"></textarea>
                        </div>
                        <div class="col-sm-offset-4 col-sm-4">
                            <dl class="dl-horizontal">
                            	<dt>商品總金額</dt>
                              	<dd><div id="order_amount"><?php echo $total;?>元</div></dd>
                                <dt>運費</dt>
                              	<dd><div id="shippingfee" ></div></dd>
                                <!--
                                <dt>代收付</dt>
                              	<dd></dd>
                                -->
                              	<dt>應付總金額</dt>
                              	<dd><div id="total_amount"></div></dd>
                            </dl>
                        </div>                                   
                    </div>
                       
            	</div>
        	</div>
            <button type="button" class="btn btn-success  pull-right" id="next">進行結帳</button>
            &nbsp;&nbsp;
            <a class="btn btn-default pull-right" href="/index/product_list" role="button">繼續購物</a>
            
            </form>  
                  
    	</div>
	</section>
    <script>
    $(function(){
        let data={
            shipping:"",
            status:0
        };
        
        $('#next').click(function(){
           $.ajax({
        	  method: "GET",
        	  url: "/index/check_login/front"
           }).success(function(res){
               let obj = jQuery.parseJSON(res);
               if(obj.status==1){
                    checkout_procedure();
               }else{
                    alert("請先【註冊會員】或【登入會員】後再進行購物。謝謝");
                    $('#loginpanel').modal();
                    return false;
               }
           });
        });
        
        checkout_procedure=function(){
           if(data.shipping==""){
                alert("請選擇配送方式。");
           }else{
                let flag=1;
                let remark=$('#remark').val();
                if(data.shipping=="shfee_orversee" && remark==""){
                    flag=0;
                }else if(data.shipping=="shfee_store" && remark==""){
                    flag=0;
                }
                
                if(flag==1){
                    $('#order_form').submit();
                }else{
                    alert("請先詳細填寫備註欄位，再進行下一步。");
                    return false;
                }
           }
        }
        
        $('.shipping').click(function(){
            let fee=parseInt($(this).val());
            let itemkey=$(this).attr("id");
            data.shipping=itemkey;
            
            switch (itemkey){
                case "shfee_orversee":
                    alert("請於備註欄位中詳細填寫寄送資訊。");
                break;
                case "shfee_store":
                    alert("請於備註欄位中詳細填寫【分店名稱】。");
                break;
            }
            let order_amount=parseInt($('#order_amount').text());
            
            $('#shippingfee').text(fee+"元");
            let total=fee+order_amount;
            $('#total_amount').text(total+"元");
        });
    })
    </script>
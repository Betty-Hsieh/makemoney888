
<section>
	<div class="container">
        <ol class="breadcrumb">
          <li><a href="/index">首頁</a></li>
          <li class="active">訂購紀錄</li>
        </ol>
    </div>
</section>
<section class="main">
	<div class="container">
        <div class="row">
            <div class="col-xs-6 col-md-3">
            <?php include_once("member_menu.php");?>
            </div>
            <!--內容-->
            <div class="col-xs-12 col-md-9">
                <h3>訂購紀錄</h3>       
                <div class="editor">
<table class="table">
    <thead>
        <td>序號</td>
        <td>商品數量</td>
        <td>總額</td>
        <td>時間</td>
        <td>轉帳後五碼</td>
        <td>訂單狀態</td>
        <td>配送狀態</td>
    </thead>
    <tbody>
    <?php 
      foreach($order as $ck => $row){
    ?>
        <tr>
            <td><?php echo $row->id;?></td>
            <td><?php echo $row->total_items;?></td>
            <td><?php echo $row->total;?></td>
            <td><?php echo $row->create_time;?></td>
            <td>
                <?php 
                    if(empty($row->atm_code)){
                ?>
                    <input type="text" name="atm_code" class="atm_code" size="8"/>
                    <input type="button" class="btn btn-success btn-sm check_atm_code" id="<?php echo $row->uniqid_id;?>" value="確認"/>
                <?php
                    }
                    else{
                        echo $row->atm_code;
                    }
                ?>
            </td>
            <td>
                <?php 
                    if($row->status==1){
                        echo "訂單完成";
                    }
                    else{
                        echo "訂單審核中";
                    }
                ?>
            </td>
            <td>
                <?php 
                    if($row->delivery==1){
                        echo "配送完成";
                    }
                    else{
                        echo "備貨中";
                    }
                ?>
            </td>
            <td>
                <input type="button" class="btn btn-defalt btn-sm" onclick="location.href='/index/order_detail/<?php echo $row->uniqid_id;?>'" id="<?php echo $row->uniqid_id;?>" value="明細"/>
            </td>
        </tr>
    <?php      
        }
    ?>    
    </tbody>
</table>  
                </div>
            </div>
        </div>
	</div>
</section>

<script>
$(function(){
      $('.check_atm_code').click(function(){
        var idx=$(this).index(".check_atm_code");
        var atm_code=$(".atm_code").eq(idx).val();
        $.ajax({
    		method: "POST",
    		url: "/index/check_atm_code",
    		data:{
    			id:$(this).attr("id"),
                atm_code:atm_code
    		}
    	 }).success(function(res){
    		  console.log(res);
    	 });
      });
});
</script>
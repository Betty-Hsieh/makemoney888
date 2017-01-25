
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
        <td>商品</td>
        <td>價格</td>
        <td>數量</td>
        <td>總額</td>
        <td>時間</td>
    </thead>
    <tbody>
    <?php 
      foreach($order_detail as $ck => $row){
    ?>
        <tr>
            <td><?php echo $row->product_name;?></td>
            <td><?php echo $row->sale_price;?></td>
            <td><?php echo $row->ordernumber;?></td>
            <td><?php echo (int)$row->sale_price*$row->ordernumber;?></td>
            <td><?php echo $row->current_at;?></td>
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

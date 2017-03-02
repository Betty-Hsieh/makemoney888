  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
<?php include_once("top_bar.php");?>
<?php include_once("left_menu_bar.php");?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>訂單明細</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">訂單管理</a></li>
            <li class="active">訂單明細</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered table-striped data_table">
                    <thead>
                      <tr class="success">
                        <th>編號</th>
                        <th>訂購人</th>
                        <th>總價</th>
                        <th>運費</th>
                        <th>商品數</th>
                        <th>寄送地址</th>
                        <th>連絡電話</th>
                        <th>訂單時間</th>
                        <th>ATM後五碼</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
							  echo "<tr>";
							  echo "<td>".$order_info->id."</td>";
							  echo "<td>".$order_info->receiver."</td>";
							  echo "<td>".$order_info->total."</td>";
                              echo "<td>".$order_info->delivery_fee."</td>";
							  echo "<td>".$order_info->total_items."</td>";
                              echo "<td>".$order_info->send_address."</td>";
                              echo "<td>".$order_info->cellphone."</td>";
                              echo "<td>".$order_info->create_time."</td>";
							  echo "<td>".$order_info->atm_code."</td>";
							  echo "</tr>";
                    ?>
                    <tr class="success">
                        <th>發票型態</th>
                        <th>抬頭</th>
                        <th>統編</th>
                      </tr>
                    <?php
							  echo "<tr>";
                              if($order_info->invoicetype==3){
                                echo "<td>三聯式</td>";
                              }else{
                                echo "<td>二聯式</td>";
                              }
                              
							  echo "<td>".$order_info->companyname."</td>";
							  echo "<td>".$order_info->companyid."</td>";
							  echo "</tr>";
					  ?>
                    </tbody>
                  </table>
                  
                  <br />
                  <table class="table table-bordered table-striped data_table">
                    <thead>
                      <tr class="danger">
                        <th>編號</th>
                        <th>商品名稱</th>
                        <!--
                        <th>子商品</th>
                        -->
                        <th>單價</th>
                        <th>商品數</th>
                        <th>總價</th>
                      </tr>
                    </thead>
                    <tbody>
<?php 
foreach($SubOrder as $ok => $srow){
    echo "<tr>";
        echo "<td>".$srow['trans_id']."</td>";
        echo "<td>".$srow['product_name']."</td>";
        /*
        echo "<td>";
        if(!empty($srow['SubProduct'])){ 
            foreach($srow['SubProduct'] as $pk => $pv){
                echo $pv."&nbsp;&nbsp;";
                echo "售價：".$srow['SubProductPrice'][$pk]." 數量：".$srow['SubOrderNumber'][$pk]."<br/>";
                
            }
        }
        echo "</td>";
        */
        echo "<td>".$srow['sale_price']."</td>";
        if(is_numeric($srow['ordernumber'])){
            echo "<td>".$srow['ordernumber']."</td>";
        }else{
            echo "<td></td>";
        }
        
        echo "<td>".$srow['total_amount']."</td>";
    echo "</tr>";
}
?>
                    </tbody>
                  </table>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
      

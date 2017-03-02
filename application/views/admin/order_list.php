  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
<?php include_once("top_bar.php");?>
<?php include_once("left_menu_bar.php");?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>訂單管理</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">訂單</a></li>
            <li class="active">訂單管理</li>
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
                  <table class="table table-bordered table-striped dataTable">
                    <thead>
                      <tr>
                        <th>編號</th>
                        <th>訂購人</th>
                        <th>總價</th>
                        <th>運費</th>
                        <th>商品數</th>
                        <th>寄送地址</th>
                        <th>連絡電話</th>
                        <th>訂單時間</th>
                        <th>ATM後五碼</th>
                        <th>付款</th>
                        <th>配送</th>
                        <th>配送單號</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
						  foreach($order as $key => $row){ 
							  echo "<tr>";
							  echo "<td>".$row->id."</td>";
							  echo "<td><a href='/manager/order/order_detail/".$row->uniqid_id."'>".$row->receiver."</a></td>";
							  echo "<td>".$row->total."</td>";
                              echo "<td>".$row->delivery_fee."</td>";
							  echo "<td>".$row->total_items."</td>";
                              echo "<td><address><a href='http://maps.google.com/maps?q=".$row->country.$row->town.$row->send_address."' target='_blank'>".$row->country.$row->town.$row->send_address."</a></address></td>";
                              echo "<td>".$row->cellphone."</td>";
                              echo "<td>".$row->create_time."</td>";
							  echo "<td>".$row->atm_code."</td>";
                              
                              echo "<td>";
                              echo "<select class='status' id='".$row->uniqid_id."'>";
                              if($row->status==1){
								  echo "<option value='1' selected>付款完成</option>";
                                  echo "<option value='0'>未付款</option>";
							  }
							  else{
							      echo "<option value='1'>付款完成</option>";
								  echo "<option value='0' selected>未付款</option>";
							  }
                              echo "</select>";
							  echo "</td>";
                              
                              echo "<td>";
                              echo "<select class='delivery' id='".$row->uniqid_id."'>";
                              if($row->delivery==1){
								  echo "<option value='1' selected>已到貨</option>";
                                  echo "<option value='0'>已到貨</option>";
							  }
							  else{
							      echo "<option value='1'>已到貨</option>";
								  echo "<option value='0' selected>配送中</option>";
							  }
                              echo "</select>";
							  echo "</td>";
                              echo "<td>";
                              echo "<input type='text' class='delivery_number' id='".$row->uniqid_id."' value='".$row->delivery_number."' size='8'>";
                              echo "</td>";
							  //echo "<td><button type='button' class='btn btn-success' onclick=location.href='/manager/order/edit_order_page/".$row->uniqid_id."'>編輯</button></td>";
							  echo "<td><button type='button' class='btn btn-default' onclick=delete_member('".$row->uniqid_id."')>刪除</button></td>";
							  echo "</tr>";
						  }
					  ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
      
      
<!-- DataTables -->
<script src="<?php echo AdminPlugins?>datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo AdminPlugins?>datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo URL_JS?>/data_table_component.js"></script>
<!-- page script -->
<script language="javascript">
$(function(){
$(".dataTable").DataTable({
    "language": {
        "lengthMenu": "每頁顯示 _MENU_ 筆資料",
        "zeroRecords": "未查詢到資料 - 抱歉",
        "info": "顯示  _PAGE_ / _PAGES_",
        "infoEmpty": "沒有任何資料",
        "infoFiltered": "(filtered from _MAX_ total records)",
            paginate: {
            first:      "第一頁",
            previous:   "前一頁",
            next:       "下一頁",
            last:       "最後頁",
        },
        "bStateSave":true,
    },
    "order": [[0, "desc" ]]
});   
    
	delete_member=function(id){
		if(confirm("確定刪除此訂單嗎?")){
		   $.ajax({
			  method: "POST",
			  url: "/manager/Order/delete_order/"+id,
			  data:{
				  id:id
			  }
		   }).success(function(msg){
				//console.log(msg);
				if(msg!=0){
					  location.reload(); 
				}
		   });
		}
		else{
			return false;
		}
	}
    
   $(document.body).on("change",".status",function(){
        var status=$("option:selected", this).val();
        var id=$(this).attr("id");
        $.ajax({
            method: "POST",
            url: "/manager/Order/change_status",
            data:{
            	id:id,
                status:status
            }
        }).success(function(res){
            console.log(res);
        });
  });
  
  
  $(document.body).on("change",".delivery",function(){
        var status=$("option:selected", this).val();
        var id=$(this).attr("id");
        $.ajax({
            method: "POST",
            url: "/manager/Order/change_delivery",
            data:{
            	id:id,
                status:status
            }
        }).success(function(res){
            console.log(res);
        });
  });
  
  $(document.body).on("keypress",".delivery_number",function(){
        var delivery_number=$(this).val();
        var id=$(this).attr("id");
        if( event.which == 13 ) {
            $.ajax({
                method: "POST",
                url: "/manager/Order/delivery_number",
                data:{
                	id:id,
                    delivery_number:delivery_number
                }
            }).success(function(res){
                //console.log(res);
                alert("已填寫完成");
            });
        }
  });
  	
});
</script>

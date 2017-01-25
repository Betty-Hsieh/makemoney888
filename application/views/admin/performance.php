  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
		<?php include_once("top_bar.php");?>
      <?php include_once("left_menu_bar.php");?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>銷售數據</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">銷售</a></li>
            <li class="active">銷售數據</li>
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
                    <caption>
                    <form action="" method="post">
                        期間:<input  type="text" name="start" id="start"/>~<input  type="text" name="end" id="end"/>
                    	<button type="submit" class="btn btn-success">查詢</button>
                    </form>
                    </caption>
                    <thead>
                      <tr>
                        <th>編號</th>
                        <th>訂購人</th>
                        <th>總價</th>
                        <th>成本</th>
                        <th>商品數</th>
                        <th>寄送地址</th>
                        <th>連絡電話</th>
                        <th>訂單時間</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $total=0;
                      $cost=0;
						  foreach($performance as $key => $row){ 
							  echo "<tr>";
							  echo "<td>".$row->id."</td>";
							  echo "<td><a href='/manager/order/order_detail/".$row->uniqid_id."'>".$row->receiver."</a></td>";
							  echo "<td>".$row->total."</td>";
                              echo "<td>".$row->total_cost."</td>";
                              //echo "<td>".$row->ordernumber."</td>";
							  echo "<td>".$row->total_items."</td>";
                              echo "<td>".$row->country.$row->town.$row->send_address."</td>";
                              echo "<td>".$row->cellphone."</td>";
                              echo "<td>".$row->create_time."</td>";
							  echo "</tr>";
                              $total+=$row->total;
                              $cost+=$row->total_cost;
						  }
					  ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="8">
                                銷售總額&nbsp;:&nbsp;<?php echo $total;?>&nbsp;&nbsp;&nbsp;&nbsp;
                                成本&nbsp;:&nbsp;<?php echo $cost;?>
                            </td>
                        </tr>
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

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
<!-- page script -->
<script language="javascript">
$(function(){
    let opt={
        dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
        dayNamesMin:["日","一","二","三","四","五","六"],
        monthNames:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
        monthNamesShort:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
        prevText:"上月",
        nextText:"次月",
        weekHeader:"週",
        showMonthAfterYear:true,
        dateFormat:"yy-mm-dd",
        changeMonth: true,
     	changeYear: true,
    };
	$("#start,#end").datepicker(opt);
    
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
  	
});
</script>

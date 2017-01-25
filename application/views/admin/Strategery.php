  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
		<?php include_once("top_bar.php");?>      
      <?php include_once("left_menu_bar.php");?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>銷售組合方案</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首頁</a></li>
            <li><a href="#">銷售組合</a></li>
            <li class="active">銷售組合方案</li>
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
                    	<button type="button" class="btn btn-success" onClick="location.href='/manager/SaleStrategery/adding_strategry_page'">建立產品策略</button>
                    </caption>
                    <thead>
                      <tr>
                        <th>編號</th>
                        <th>產品名稱</th>
                        <th>促銷價</th>
                        <th>組合量</th>
                        <th>狀態</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
						  foreach($data as $key => $row){
							  echo "<tr>";
							  echo "<td>".$row['id']."</td>";
							  echo "<td>".$row['name']."</td>";
                              echo "<td>".$row['price']."</td>";
                              echo "<td>".$row['amount']."</td>";
                              
							  if($row['status']==1){
								  echo "<td>開放</td>";
							  }
							  else{
								  echo "<td>關閉</td>";
							  }
							  
							  echo "<td>".$row['create_time']."</td>";
							  echo "<td><button type='button' class='btn btn-sm btn-success' onclick=location.href='/manager/SaleStrategery/edit_strategery_page/".$row['uniqid_id']."'>編輯</button></td>";
							  echo "<td><button type='button' class='btn btn-sm btn-default' onclick=delete_strategery('".$row['uniqid_id']."')>刪除</button></td>";
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
      
      
      
<!-- DataTables -->
<script src="<?php echo AdminPlugins?>datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo AdminPlugins?>datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo URL_JS?>/data_table_component.js"></script>
<!-- page script -->
<script language="javascript">
$(function () {
   delete_strategery=function(id){
	  if(confirm("確定刪除此方案嗎?")){
		 $.ajax({
			method: "POST",
			url: "/manager/SaleStrategery/delete_strategery/"+id,
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
});
</script>

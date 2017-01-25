  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
		<?php include_once("top_bar.php");?>      
      <?php include_once("left_menu_bar.php");?>

      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            客戶見證
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">後台管理</a></li>
            <li class="active">客戶見證</li>
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
                  <table id="example1" class="table table-bordered table-striped">
                  	<caption>
                    	<button type="button" class="btn btn-success" onClick="location.href='/manager/Sharing/adding_sharing_page'">建立客戶見證</button>
                    </caption>
                    <thead>
                      <tr>
                        <th>序號</th>
                        <th>客戶名稱</th>
                        <th>時間</th>
                        <th>狀態</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
						  foreach($sharing as $key => $row){ 
							  echo "<tr>";
							  echo "<td>".($key+1)."</td>";
							  echo "<td>".$row->title."</td>";
                              echo "<td>".$row->create_time."</td>";
							  if($row->status==1){
								  echo "<td>開放</td>";
							  }
							  else{
								  echo "<td>關閉</td>";
							  }
							  
							  echo "<td><button type='button' class='btn btn-sm btn-success' onclick=location.href='/manager/sharing/edit_sharing_page/".$row->uniqid_id."'>編輯</button></td>";
							  echo "<td><button type='button' class='btn btn-sm btn-default' onclick=delete_product('".$row->uniqid_id."')>刪除</button></td>";
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
<!-- page script -->
<script language="javascript">
$(function () {
   delete_product=function(id){
	  if(confirm("確定刪除此客戶見證嗎?")){
		 $.ajax({
			method: "POST",
			url: "/manager/sharing/delete_sharing/"+id,
			data:{
				id:id
			}
		 }).success(function(msg){
			  console.log(msg);
			  if(msg!=0){
					location.reload(); 
			  }
		 });
	  }
	  else{
		  return false;
	  }
  }
  $("#example1").DataTable();
  
});
</script>

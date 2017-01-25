  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
		<?php include_once("top_bar.php");?>      
      <!-- Left side column. contains the logo and sidebar -->
      <?php include_once("left_menu_bar.php");?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            客服管理
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">客服</a></li>
            <li class="active">客服管理</li>
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
                  	
                    <thead>
                      <tr>
                        <th>編號</th>
                        <th>標題</th>
                        <th>姓名</th>
                        <th>信箱</th>
                        <th>信件內容</th>
                        <th>閱讀次數</th>
                        <th>日期</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
						  foreach($service as $key => $row){ 
							  echo "<tr>";
							  echo "<td>".($key+1)."</td>";
							  echo "<td>".$row->topic."</td>";
							  echo "<td>".$row->name."</td>";
                              echo "<td>".$row->email."</td>";
							  echo "<td>".$row->content."</td>";
							  if($row->status==1){
								  echo "<td>開放</td>";
							  }
							  else{
								  echo "<td>關閉</td>";
							  }
							  
							  echo "<td>".$row->create_time."</td>";
							  //echo "<td><button type='button' class='btn btn-success' onclick=location.href='/manager/Service/edit_service_page/".$row->id."'>編輯</button></td>";
							  echo "<td><button type='button' class='btn btn-default' onclick=delete_service(".$row->id.")>刪除</button></td>";
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
   delete_service=function(id){
	  if(confirm("確定刪除本篇文章嗎?")){
		 $.ajax({
			method: "POST",
			url: "/manager/Service/delete_service/"+id,
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
	  // 
  }
  $("#example1").DataTable();
  
});
</script>

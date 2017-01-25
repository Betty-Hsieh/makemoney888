
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
            廣告管理
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">課程</a></li>
            <li class="active">課程管理</li>
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
                    	<button type="button" class="btn btn-success" onClick="location.href='/manager/advertising/adding_advertising_page'">建立廣告橫幅</button>
                    </caption>
                    <thead>
                      <tr>
                        <th>編號</th>
                        <th>名稱</th>
                        <th>圖片</th>
                        <th>狀態</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
						  foreach($advertising as $key => $row){ 
							  echo "<tr>";
							  echo "<td>".$row->id."</td>";
							  echo "<td>".$row->title."</td>";
							  echo "<td><img src='". Upload."advertising/".$row->picture."' width='30%'/></td>";
							  if($row->status==1){
								  echo "<td>開放</td>";
							  }
							  else{
								  echo "<td>關閉</td>";
							  }
							  
							  echo "<td><button type='button' class='btn btn-success' onclick=location.href='/manager/advertising/advertising_edit_page/".$row->id."'>編輯</button></td>";
							  echo "<td><button type='button' class='btn btn-default' onclick=location.href='/manager/advertising/advertising_delete/".$row->id."'>刪除</button></td>";
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
<!-- page script -->
<script language="javascript">
$(function(){
	delete_member=function(id){
		if(confirm("確定刪除此學員嗎?")){
		   $.ajax({
			  method: "POST",
			  url: "/manager/Students/delete_student/"+id,
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

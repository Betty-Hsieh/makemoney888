
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
            教師管理
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">教師</a></li>
            <li class="active">教師管理</li>
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
                        <th>教師姓名</th>
                        <th>信箱</th>
                        <th>狀態</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
						  foreach($Lecturer as $key => $row){ 
							  echo "<tr>";
							  echo "<td>".$row->m_id."</td>";
							  echo "<td>".$row->m_name."</td>";
							  echo "<td>".$row->m_email."</td>";
							  if($row->status==1){
								  echo "<td>開放</td>";
							  }
							  else{
								  echo "<td>關閉</td>";
							  }
							  
							  //echo "<td><button type='button' class='btn btn-success' onclick=location.href='/manager/Lecturers/edit_Lecturer_page/".$row->m_id."'>編輯</button></td>";
							  //echo "<td><button type='button' class='btn btn-default' onclick=location.href='/manager/Lecturers/delete_Lecturer/".$row->m_id."'>刪除</button></td>";
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
		if(confirm("確定刪除此教師嗎?")){
		   $.ajax({
			  method: "POST",
			  url: "/manager/Lecturers/delete_Lecturer/"+id,
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

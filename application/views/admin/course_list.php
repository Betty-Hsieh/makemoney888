
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
		<?php include_once("top_bar.php");?>
      <?php include_once("left_menu_bar.php");?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            課程管理
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
                    	<button type="button" class="btn btn-success" onClick="location.href='/manager/Course/adding_course_page'">建立課程</button>
                    </caption>
                    <thead>
                      <tr>
                        <th>編號</th>
                        <th>課程名稱</th>
                        <th>售價</th>
                        <th>名額</th>
                        <th>地址</th>
                        <th>狀態</th>
                        <th>報名人數</th>
                        <th>編輯</th>
                        <th>刪除</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
						  foreach($course as $key => $row){ 
							  echo "<tr>";
							  echo "<td>".$row->products_id."</td>";
							  echo "<td>".$row->product_title."</td>";
							  echo "<td>".$row->product_price."</td>";
							  echo "<td>".$row->numbers."</td>";
                              echo "<td>".$row->address."</td>";
							  if($row->status==1){
								  echo "<td>開放</td>";
							  }
							  else{
								  echo "<td>關閉</td>";
							  }
							  echo "<td><a href='/manager/Course/applicant/".$row->products_id."'>報名人數</a></td>";
							  echo "<td><button type='button' class='btn btn-success' onclick=location.href='/manager/Course/edit_course_page/".$row->uniqid_id."'>編輯</button></td>";
							  echo "<td><button type='button' class='btn btn-sm btn-default' onclick=delete_course('".$row->uniqid_id."')>刪除</button></td>";
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
	delete_course=function(id){
		if(confirm("確定刪除此課程嗎?")){
		   $.ajax({
			  method: "POST",
			  url: "/manager/Course/delete_course/"+id,
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

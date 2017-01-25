  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
		<?php include_once ("top_bar.php"); ?>      
      <!-- Left side column. contains the logo and sidebar -->
      <?php include_once ("left_menu_bar.php"); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            電子報
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">電子報</a></li>
            <li class="active">電子報</li>
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
                    	<button type="button" class="btn btn-success" onClick="location.href='/manager/Epaper/epaper_adding_page'">建立電子報</button>
                    </caption>
                    <thead>
                      <tr>
                        <th>編號</th>
                        <th>標題</th>
                        <th></th>
                        <th>狀態</th>
                        <th>日期</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php 
						  foreach($epaper_list as $key => $row){ 
							  echo "<tr>";
							  echo "<td>".$row->eid."</td>";
							  echo "<td><a href='/manager/Course/applicant'>".$row->title."</a></td>";
							  
                              echo "<td><button type='button' class='btn btn-danger' onclick=send_paper('".$row->uniqid."')>發送</button></td>";
                              if($row->status==1){
								  echo "<td>開放</td>";
							  }
							  else{
								  echo "<td>關閉</td>";
							  }
                              echo "<td>".$row->current_date."</td>";
                              
							  echo "<td><button type='button' class='btn btn-success' onclick=location.href='/manager/Epaper/edit_epaper_page/".$row->uniqid."'>編輯</button></td>";
							  echo "<td><button type='button' class='btn btn-default' onclick=location.href='/manager/Epaper/delete_epaper/".$row->uniqid."'>刪除</button></td>";
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
<script src="<?php echo AdminPlugins ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo AdminPlugins ?>datatables/dataTables.bootstrap.min.js"></script>
<!-- page script -->
<script language="javascript">
$(function () {
   delete_news=function(id){
	  if(confirm("確定刪除此電子報嗎?")){
		 $.ajax({
			method: "POST",
			url: "/manager/Epaper/delete_epaper/"+id,
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
  
  send_paper=function(id){
	  if(confirm("確定發送電子報嗎?")){
		 $.ajax({
			method: "POST",
			url: "/manager/Epaper/send_epaper/"+id,
			data:{
				id:id
			}
		 }).success(function(msg){
			  console.log(msg);
		 });
	  }
	  else{
		  return false;
	  }
  }
  $("#example1").DataTable();
});
</script>

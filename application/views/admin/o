  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
		<?php include_once ("top_bar.php"); ?>      
      <?php include_once ("left_menu_bar.php"); ?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>權限管理</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">權限</a></li>
            <li class="active">權限管理</li>
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
                    	<button type="button" class="btn btn-success" onClick="location.href='/manager/access/adding_access_page'">建立文章</button>
                    </caption>
                    <thead>
                      <tr>
                        <th>編號</th>
                        <th>標題</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
foreach ($access as $key => $row) {
    echo "<tr>";
    echo "<td>" . $row->pid . "</td>";
    echo "<td>" . $row->m_memberLimit . "</td>";
    echo "<td><button type='button' class='btn btn-success' onclick=location.href='/manager/access/edit_access_page/" .
        $row->pid . "'>編輯</button></td>";
    echo "<td><button type='button' class='btn btn-default' onclick=delete_access(" .
        $row->pid . ")>刪除</button></td>";
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
   delete_access=function(id){
	  if(confirm("確定刪除此權限嗎?")){
		 $.ajax({
			method: "POST",
			url: "/manager/access/delete_access/"+id,
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

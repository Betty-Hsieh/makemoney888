  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
		<?php include_once ("top_bar.php"); ?>      
      <!-- Left side column. contains the logo and sidebar -->
      <?php include_once ("left_menu_bar.php"); ?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>最新消息</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">最新消息</a></li>
            <li class="active">最新消息</li>
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
                    	<button type="button" class="btn btn-success" onClick="location.href='/manager/News/adding_news_page'">建立最新消息</button>
                    </caption>
                    <thead>
                      <tr>
                        <th>編號</th>
                        <th>標題</th>
                        <th>狀態</th>
                        <th>日期</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
foreach ($news as $key => $row) {
    echo "<tr>";
    echo "<td>" . ($key + 1) . "</td>";
    echo "<td>" . $row->title . "</td>";
    if ($row->status == 1) {
        echo "<td>開放</td>";
    } else {
        echo "<td>關閉</td>";
    }
    echo "<td>" . $row->create_time . "</td>";
    echo "<td><button type='button' class='btn btn-sm btn-success' onclick=location.href='/manager/News/news_editing_page/" .
        $row->id . "'>編輯</button></td>";
    echo "<td><button type='button' class='btn btn-sm btn-default' onclick=delete_news(" .$row->id . ")>刪除</button></td>";
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
<script src="<?php echo URL_JS?>/data_table_component.js"></script>
<!-- page script -->
<script language="javascript">
$(function () {
   delete_news=function(id){
	  if(confirm("確定刪除此訊息嗎?")){
		 $.ajax({
			method: "POST",
			url: "/manager/News/delete_news/"+id,
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

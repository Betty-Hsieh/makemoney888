  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
<?php include_once ("top_bar.php"); ?>      
<?php include_once ("left_menu_bar.php"); ?>
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>商店設定</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">產品管理</a></li>
            <li class="active">商店設定</li>
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
                        <!--
                    	<button type="button" class="btn btn-success" onClick="location.href='/manager/Shipping/shipping_add_page'">建立運費管理</button>
                        -->
                    </caption>
                    <thead>
                      <tr>
                        <th>編號</th>
                        <th></th>
                        <th>標題</th>
                        <th>金額</th>
                        <th>狀態</th>
                        <th>日期</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
foreach ($shipping as $key => $row) {
    echo "<tr>";
    echo "<td>".$row->kv."</td>";
    echo "<td>".$row->fkey2."</td>";
    echo "<td>".$row->fvalue."</td>";
    echo "<td>".$row->fvalue2."</td>";
    if($row->status==0){
        echo "<td>關閉</td>";
    }else{
       echo "<td>啟用</td>"; 
    }
    echo "<td>" . $row->create_time . "</td>";
    echo "<td><button type='button' class='btn btn-sm btn-success' onclick=location.href='/manager/Shipping/shipping_editing_page/".$row->kv . "'>編輯</button></td>";
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
	  if(confirm("確定刪除運費設定嗎?")){
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
});
</script>

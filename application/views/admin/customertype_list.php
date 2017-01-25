
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
		<?php include_once("top_bar.php");?>
      <?php include_once("left_menu_bar.php");?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>會員管理</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">會員</a></li>
            <li class="active">會員管理</li>
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
                    	<button type="button" class="btn btn-success" onClick="location.href='/manager/CustomerType/add_customertype_page'">建立會員分類</button>
                    </caption>
                    
                    <thead>
                      <tr>
                        <th>編號</th>
                        <th>分類名稱</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
						  foreach($customertype as $key => $row){ 
							  echo "<tr>";
                              echo "<td>".$row->id."</td>";
							  echo "<td>".$row->title."</td>";
							  echo "<td><button type='button' class='btn btn-success' onclick=location.href='/manager/CustomerType/edit_customertype_page/".$row->id."'>編輯</button></td>";
							  echo "<td><button type='button' class='btn btn-default' onclick=delete_customertype(".$row->id.")>刪除</button></td>";
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
	delete_customertype=function(id){
		if(confirm("確定刪除此分類嗎?")){
		   $.ajax({
			  method: "POST",
			  url: "/manager/CustomerType/delete_customertype/"+id,
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

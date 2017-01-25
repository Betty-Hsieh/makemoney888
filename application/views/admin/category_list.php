
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
		<?php include_once("top_bar.php");?>
      <?php include_once("left_menu_bar.php");?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>分類管理</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">分類</a></li>
            <li class="active">分類管理</li>
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
                  <table class="table table-bordered table-striped ">
                  	<caption>
                    	<button type="button" class="btn btn-success" onClick="location.href='/manager/Category/adding_category_page'">建立分類</button>
                    </caption>
                    <thead>
                      <tr>
                        <th>編號</th>
                        <th>分類名稱</th>
                        <th>排序</th>
                        <th>分類階層</th>
                        <th>編輯</th>
                        <th>刪除</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
						  foreach($category as $key => $row){ 
							  echo "<tr>";
                              /*
                              if($row['parentid']!=""){
                                echo "<td>".$row['parentid']."</td>";
                              }
                              else{
                                echo "<td>".$row['id']."</td>";
                              }
							  */
                              echo "<td>".$row['id']."</td>";
							  echo "<td>".$row['title']."-- 第".$row['layer']." 階層</td>";
                              echo "<td>".$row['sorting']."</td>";
                              $next_layer=(int)$row['layer']+1;
                              if($next_layer<4){
                                echo "<td><button type='button' class='btn btn-sm btn-danger' onclick=location.href='/manager/Category/adding_category_page/".$row['uniqid_id']."'>建立".$next_layer."階分類</button></td>";
							  }
                              else{
                                echo "<td></td>";
                              }
                              echo "<td><button type='button' class='btn btn-sm btn-success' onclick=location.href='/manager/Category/edit_category_page/".$row['uniqid_id']."'>編輯</button></td>";
							  echo "<td><button type='button' class='btn btn-sm btn-default' onclick=delete_category('".$row['uniqid_id']."') >刪除</button></td>";
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
<script src="<?php echo URL_JS?>/data_table_component.js"></script>
<!-- page script -->
<script language="javascript">
$(function(){
	delete_category=function(id){
		if(confirm("確定刪除此分類嗎?")){
		   $.ajax({
			  method: "POST",
			  url: "/manager/category/delete_category/"+id,
			  data:{
				  id:id
			  }
		   }).success(function(msg){
				//console.log(msg);
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

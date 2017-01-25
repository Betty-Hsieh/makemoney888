      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            影音管理
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">影音</a></li>
            <li class="active">影音管理</li>
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
                    	<button type="button" class="btn btn-success" onClick="location.href='/manager/Video/adding_video_page'">建立影音</button>
                    </caption>
                    <thead>
                      <tr>
                        <th>編號</th>
                        <th>影音名稱</th>
                        <th>價格</th>
                        <th>建立時間</th>
                        <th>點擊次數</th>
                        <th>狀態</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
						  foreach($video as $key => $row){ 
							  echo "<tr>";
							  echo "<td>".$row->products_id."</td>";
							  echo "<td>".$row->product_title."</td>";
                              echo "<td>".$row->product_price."</td>";    
							  echo "<td>".$row->create_time."</td>";
							  echo "<td>".$row->read_count."</td>";
							  if($row->status==1){
								  echo "<td>開放</td>";
							  }
							  else{
								  echo "<td>關閉</td>";
							  }
							  
							  echo "<td><button type='button' class='btn btn-success' onclick=location.href='/manager/Video/edit_video_page/".$row->products_id."'>編輯</button></td>";
							  echo "<td><button type='button' class='btn btn-default' onclick=location.href='/manager/Video/delete_video/".$row->products_id."'>刪除</button></td>";
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
			  url: "/manager/Video/delete_video/"+id,
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

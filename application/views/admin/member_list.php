  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
		<?php include_once ("top_bar.php"); ?>
      <?php include_once ("left_menu_bar.php"); ?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>成員管理</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">成員</a></li>
            <li class="active">成員管理</li>
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
                    	<button type="button" class="btn btn-success" onClick="location.href='/manager/Member/adding_member_page'">建立管理員</button>
                    </caption>
                    <thead>
                      <tr>
                        <th>編號</th>
                        <th>姓名</th>
                        <th>信箱</th>
                        <th>狀態</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
foreach ($member as $key => $row) {
    echo "<tr>";
    echo "<td>" . $row->m_id . "</td>";
    echo "<td>" . $row->m_name . "</td>";
    echo "<td>" . $row->m_email . "</td>";
    if ($row->status == 1) {
        echo "<td>開放</td>";
    } else {
        echo "<td>關閉</td>";
    }

    echo "<td><button type='button' class='btn btn-success' onclick=location.href='/manager/Member/member_editing_page/" .
        $row->m_id . "'>編輯</button></td>";
    echo "<td><button type='button' class='btn btn-default' onclick=delete_member(" .
        $row->m_id . ")>刪除</button></td>";
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
<script src="<?php echo AdminPlugins ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo AdminPlugins ?>datatables/dataTables.bootstrap.min.js"></script>
<!-- page script -->
<script language="javascript">
$(function(){
	delete_member=function(id){
		if(confirm("確定刪除此會員嗎?")){
		   $.ajax({
			  method: "POST",
			  url: "/manager/Member/delete_member/"+id,
			  data:{
				  id:id
			  }
		   }).success(function(msg){
				console.log(msg);
				if(msg.code!=""){
				    alert('該會員已刪除');
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

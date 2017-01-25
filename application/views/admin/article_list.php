  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
	  <?php include_once("top_bar.php");?>      
      <?php include_once("left_menu_bar.php");?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>文章管理</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">文章</a></li>
            <li class="active">文章管理</li>
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
                        <form action="/manager/Article" method="post">
                            <button type="button" class="btn btn-primary" onClick="location.href='/manager/Article/adding_article_page'">建立文章</button>
                            &nbsp;&nbsp;&nbsp;
                        發文者&nbsp;:&nbsp;
                        <select class="form-control" name="author">
                          <option value="">請選擇</option>
                          <?php 
						  foreach($author as $key => $row){ 
							  echo "<option value='".$row->m_id."'>".$row->m_name."</option>";
						  }
					 	 ?>
                        </select>
                        &nbsp;&nbsp;&nbsp;
                        文章類別&nbsp;:&nbsp;
                        <select class="form-control" name="article_tag">
                          <option value="">請選擇</option>
                          <?php 
						  		$category_data=unserialize($category->fvalue2);
								foreach($category_data as $key => $data){
							  		echo "<option value='".$key."'>".$data."</option>";
								}
					 	 ?>
                        </select>
                           <button type="submit" class="btn btn-success" >查詢</button>
                        </form>
                    </caption>
                    <thead>
                      <tr>
                        <th>編號</th>
                        <th>標題</th>
                        <th>作者</th>
                        <th>閱讀權限</th>
                        <th>文章狀態</th>
                        <th>閱讀次數</th>
                        <th>日期</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
foreach ($article as $key => $row) {
    echo "<tr>";
    echo "<td>" . ($key + 1) . "</td>";
    echo "<td>" . $row->product_title . "</td>";
    echo "<td>" . $row->m_name . "</td>";
    if ($row->read_status == 1) {
        echo "<td>全站開放</td>";
    } else if($row->read_status ==2) {
        echo "<td>一般學員</td>";
    }
    else if($row->read_status ==3) {
        echo "<td>上課學員</td>";
    }
    
    if ($row->article_status == 1) {
        echo "<td>開放</td>";
    } else {
        echo "<td>關閉</td>";
    }

    echo "<td>" . $row->read_count . "</td>";
    echo "<td>" . $row->create_time . "</td>";
    echo "<td><button type='button' class='btn btn-success' onclick=location.href='/manager/Article/edit_article_page/" .
        $row->uniqid_id . "'>編輯</button></td>";
    echo "<td><button type='button' class='btn btn-default' onclick=delete_article('" .
        $row->uniqid_id . "')>刪除</button></td>";
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
   delete_article=function(id){
	  if(confirm("確定刪除本篇文章嗎?")){
		 $.ajax({
			method: "POST",
			url: "/manager/Article/delete_article/"+id,
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

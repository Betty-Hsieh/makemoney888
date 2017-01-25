  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include_once("top_bar.php");?>
        <?php include_once("left_menu_bar.php");?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>產品管理</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">產品</a></li>
            <li class="active">產品管理</li>
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
                        <form action="/manager/Product" method="post">
                    	<button type="button" class="btn btn-success" onclick="location.href='/manager/Product/adding_product_page'">建立產品</button>
                        
                         <div class="form-group">
                            <div class="col-sm-2">
                                <span class="label label-primary">分類&nbsp;:&nbsp;</span>
                            </div>
                            <div class="col-sm-4">
                                <select class="form-control" name="main_category" id="category" style="width:120px;">
                                  <option value="">請選擇</option>
                                  <?php 
        						  foreach($category as $key => $row){
        							  echo "<option value='".$row->id."'>".$row->title."</option>";
        						  }
        					 	 ?>
                                </select>
                            </div>    
                            <div class="col-sm-2">
                                <section id="sub_category"></section>
                            </div>     
                         </div>     
                        <button type="submit" name="query" class="btn btn-success">查詢</button>
                        </form>
                    </caption>
                    <thead>
                      <tr>
                        <th>編號</th>
                        <th>產品名稱</th>
                        <th>售價</th>
                        <th>會員價格</th>
                        <th>首頁促銷</th>
                        <th>狀態</th>
                        <th>滿額免運</th>
                        <th>適用折扣</th>
                        <th>庫存</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
						  foreach($product as $key => $row){ 
							  echo "<tr>";
							  echo "<td>".$row->products_id."</td>";
							  echo "<td width='250'>".$row->product_title."<img src=".Upload."products/" . $row->picture." width=20% alt=".$row->picture."/></td>";
							  echo "<td>".$row->price."</td>";
                              echo "<td>".$row->member_price."</td>";
                              echo "<td>";
                              
                              if($row->home_promote==1){
								  echo "已加入";
							  }
							  else{
							      echo "未加入";
							  }
							  echo "</td>";
							  
                              echo "<td>";
                              echo "<select class='status' id='".$row->uniqid_id."'>";
                              if($row->status==1){
								  echo "<option value='1' selected>上架中</option>";
                                  echo "<option value='0'>下架</option>";
							  }
							  else{
							      echo "<option value='1'>上架中</option>";
								  echo "<option value='0' selected>下架</option>";
							  }
                              echo "</select>";
							  echo "</td>";
                              
                              echo "<td>";
                              echo "<select class='shipping_discount' id='".$row->uniqid_id."'>";
                              if($row->shipping_discount==1){
								  echo "<option value='1' selected>加入</option>";
                                  echo "<option value='0'>不加入</option>";
							  }
							  else{
							      echo "<option value='1'>加入</option>";
								  echo "<option value='0' selected>不加入</option>";
							  }
                              echo "</select>";
							  echo "</td>";
                              
                              
                              echo "<td>";
                              echo "<select class='discount' id='".$row->uniqid_id."'>";
                              if($row->all_discount==1){
								  echo "<option value='1' selected>適用折扣</option>";
                                  echo "<option value='0'>不適用任何折扣</option>";
							  }
							  else{
							      echo "<option value='1'>適用折扣</option>";
								  echo "<option value='0' selected>不適用任何折扣</option>";
							  }
                              echo "</select>";
							  echo "</td>";
                              echo "<td>".$row->inventory."</td>";
                              echo "<td><button type='button' class='btn btn-sm btn-danger' onclick=copy_product('".$row->uniqid_id."')>複製</button></td>";
							  echo "<td><button type='button' class='btn btn-sm btn-success' onclick=location.href='/manager/product/edit_product_page/".$row->uniqid_id."'>編輯</button></td>";
							  echo "<td><button type='button' class='btn btn-sm btn-default' onclick=delete_product('".$row->uniqid_id."')>刪除</button></td>";
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
<script src="<?php echo AdminPlugins?>datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo AdminPlugins?>datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo URL_JS?>/data_table_component.js"></script>
<!-- page script -->
<script language="javascript">
$(function () {
    
    copy_product=function(id){
        $.ajax({
			method: "POST",
			url: "/manager/Product/duplicate_product/",
			data:{
				id:id
			}
		 }).success(function(msg){
			  console.log(msg);
			  if(msg!=0){
			     alert("複製成功");
                 location.reload();
			  }
		 });
    }
    
   delete_product=function(id){
	  if(confirm("確定刪除此產品嗎?")){
		 $.ajax({
			method: "POST",
			url: "/manager/Product/delete_product/",
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
  
  $('#category').change(function(){
    $.ajax({
		method: "POST",
		url: "/manager/Category/get_category_by_main/",
		data:{
			id:$(this).val()
		}
	 }).success(function(res){
		  console.log(res);
        var box="";  
        var list = jQuery.parseJSON(res);
            box+="<select name='sub_category' class='form-control' style='width:120px;'>";
            box+="<option value=''>全部</option>";
        $.each(list.category, function(idx,val){
			box+="<option value='"+val.id+"'>"+val.title+"</option>";
        });
            box+="<.select>";
        $("#sub_category").html(box);
	 });
  });
  
  $(document.body).on("change",".status",function(){
        var status=$("option:selected", this).val();
        var id=$(this).attr("id");
        $.ajax({
            method: "POST",
            url: "/manager/Product/change_status",
            data:{
            	id:id,
                status:status
            }
        }).success(function(res){
            console.log(res);
        });
  });
  
  $(document.body).on("change",".shipping_discount",function(){
        var status=$("option:selected", this).val();
        var id=$(this).attr("id");
        $.ajax({
            method: "POST",
            url: "/manager/Product/change_shipping_discount",
            data:{
            	id:id,
                shipping_discount:status
            }
        }).success(function(res){
            console.log(res);
        });
  });
  
  $(document.body).on("change",".discount",function(){
        var status=$("option:selected", this).val();
        var id=$(this).attr("id");
        $.ajax({
            method: "POST",
            url: "/manager/Product/change_discount",
            data:{
            	id:id,
                discount:status
            }
        }).success(function(res){
            console.log(res);
        });
  });
  
});
</script>

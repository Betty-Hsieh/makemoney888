      <div class="content-wrapper">
        <section class="content-header">
          <h1>新增產品</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首頁</a></li>
            <li><a href="#">產品管理</a></li>
            <li class="active">新增產品</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body pad">
<form action="/manager/product/adding_product" id="product-form" class="form-horizontal" method="post"  enctype="multipart/form-data">
                	<div class="form-group">
                      <label for="title" class="col-sm-1 control-label">品名</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="product_title" placeholder="品名"/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">分類</label>
                      <div class="col-sm-2">
                        <select class="form-control" name="category" id="category">
                          <option value="">請選擇</option>
                          <?php 
						  foreach($category as $key => $row){
							  echo "<option value='".$row->id."'>".$row->title."</option>";
						  }
					 	 ?>
                        </select>
                      </div>
                      <label for="title" class="col-sm-1 control-label">子分類</label>
                      <div class="col-sm-2" id="sub_category"></div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">子產品</label>
                      <div class="col-sm-2">
                        <button type="button" class="btn btn-success btn-sm" id="add_sub_product">新增</button>
                      </div>
                    </div>
                    
                    <div class="form-group sub_product">
                      <label for="title" class="col-sm-1 control-label">名稱</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control sub_title" name="sub_title[]" placeholder="名稱"/>
                      </div>
                      <label for="title" class="col-sm-1 control-label label_width">售價</label>
                      <div class="col-sm-2">
                        <input type="number" class="form-control price" name="price[]" placeholder="售價"/>
                      </div>
                      <div class="col-sm-2">
                        <input type="number" class="form-control" name="member_price[]" placeholder="會員價"/>
                      </div>
                      
                      <label for="title" class="col-sm-1 control-label label_width">成本</label>
                      <div class="col-sm-1">
                        <input type="number" class="form-control" name="cost[]" placeholder="成本"/>
                      </div>
                      
                      <label for="title" class="col-sm-1 control-label label_width">庫存量</label>
                      <div class="col-sm-1">
                        <input type="number" class="form-control" name="inventory[]" placeholder="庫存量"/>
                      </div>
                      
                      <div class="col-sm-1">
                        <input type="checkbox" class="main_key" name="main_key[]" checked value="1" /> 預設
                      </div>
                    </div>
                    
                    
                    <!--
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">促銷價</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="dis_price"/>
                      </div>
                    </div>
                    -->
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">首頁促銷</label>
                      <div class="col-sm-3">
                        <input type="checkbox" name="home_promote" value="1" />加入-顯示於首頁促銷
                      </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="picture" class="col-sm-1 control-label">圖片</label>
                        <div class="col-sm-6">
                            <input type="file" name="picture" class="form-control" id="picture"/>
                        </div>
                     </div>
                     
                     <div class="form-group">
                        <label for="product_short" class="col-sm-1 control-label">簡要說明</label>
                        <div class="col-sm-10">
                            <textarea id="product_short" name="product_short" rows="10" cols="80"></textarea>
                        </div>
                     </div>
                     
                     <div class="form-group">
                        <label for="product_content" class="col-sm-1 control-label">產品介紹</label>
                        <div class="col-sm-10">
                            <textarea id="product_content" name="product_content" rows="10" cols="80"></textarea>
                        </div>
                     </div>
                    
                    <button type="button" id="save" class="btn btn-primary">建立</button>
                    <button type="button" class="btn btn-default" onclick="location.href='/manager/product'">取消</button>
                  </form>
                </div>
              </div><!-- /.box -->

            </div><!-- /.col-->
          </div><!-- ./row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
<style type="text/css">
.label_width{
    width:60px;
    padding:0px;
}
</style>
<script src="<?php echo CK;?>/ckeditor.js"></script>
<script>
$(function () {
    CKEDITOR.replace('product_short');
    CKEDITOR.replace('product_content');
    
    $('#add_sub_product').click(function(){
         $(".sub_product:first").clone().attr("class","form-group").insertAfter(".sub_product");   
    });
    
    $('#category').change(function(){
        $.ajax({
        	method: "POST",
        	url: "/manager/Category/get_category_by_main/",
        	data:{
        		id:$(this).val()
        	}
         }).success(function(res){
  	        //console.log(res);
            let box="";  
            let list = jQuery.parseJSON(res);
                box+="<select name='sub_category' class='form-control'>";
                box+="<option value=''>全部</option>";
            $.each(list.category, function(idx,val){
        		box+="<option value='"+val.id+"'>"+val.title+"</option>";
            });
                box+="<.select>";
            $("#sub_category").html(box);
         });
    });
    
    $('#save').click(function(){
        let str="";
        let sub_title=$('.sub_title').eq(0).val();
        let price=$('.price').eq(0).val();
        let main_key=0;
        
        $('.main_key').each(function(idx,val){
            if($(this).is(':checked')){
                main_key+=1;
            }
        });
        
        if(sub_title==""){
            str+="請輸入名稱\n";
        }else if(price==""){
            str+="請輸入價格\n";
        }else if(main_key!=1){
            str+="只能選擇一個價格為預設值\n";
        }
        
        if(str!=""){
            alert(str);
            return false;
        }else{
            $('#product-form').submit(); 
        }
        
    });
  
});
</script>

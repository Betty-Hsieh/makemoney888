      <div class="content-wrapper">
        <section class="content-header">
          <h1>編輯產品</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">產品管理</a></li>
            <li class="active">編輯產品</li>
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
			  
<form action="/manager/product/editing_product" id="product-form" class="form-horizontal" method="post" enctype="multipart/form-data">
                	<div class="form-group">
                      <label for="title" class="col-sm-1 control-label">品名</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="product_title" value="<?php echo $product->product_title; ?>">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">分類</label>
                      <div class="col-sm-3">
                        <select class="form-control" name="category" id="category">
                          <option value="">請選擇</option>
                          <?php 
						  foreach($category as $ckey => $ckrow){
						      if($product->category==$ckrow->id){
                                    echo "<option value='".$ckrow->id."' selected>".$ckrow->title."</option>";
                              }
                              else{
                                    echo "<option value='".$ckrow->id."'>".$ckrow->title."</option>";
                              }
						  }
					 	 ?>
                        </select>
                      </div>
                      <input type="hidden" id="sub_category_val" value="<?php echo $product->sub_category;?>"/>
                      <div class="col-sm-3" id="sub_category"></div>
                    </div>
                             
<?php 
foreach($product_detail as $pd => $pdrow){
?>
<div class="form-group">
  <label for="title" class="col-sm-1 control-label">規格名</label>
  <div class="col-sm-2">
    <input type="text" class="form-control sub_title" name="sub_title[]" placeholder="規格名稱" value="<?php echo $pdrow->sub_title;?>"/>
  </div>
  <label for="title" class="col-sm-1 control-label label_width">售價</label>
  <div class="col-sm-2">
    <input type="number" class="form-control price" name="price[]" placeholder="售價" value="<?php echo $pdrow->price;?>"/>
  </div>
  <div class="col-sm-2">
    <input type="number" class="form-control" name="member_price[]" placeholder="會員價" value="<?php echo $pdrow->member_price;?>"/>
  </div>
  
  <label for="title" class="col-sm-1 control-label label_width">成本</label>
  <div class="col-sm-1">
    <input type="number" class="form-control" name="cost[]" placeholder="成本" value="<?php echo $pdrow->cost;?>"/>
  </div>
  
  <label for="title" class="col-sm-1 control-label label_width">庫存量</label>
  <div class="col-sm-1">
    <input type="number" class="form-control" name="inventory[]" placeholder="庫存量" value="<?php echo $pdrow->inventory;?>"/>
    <input type="hidden" class="form-control" name="sid[]" value="<?php echo $pdrow->id;?>"/>
  </div>
  
  <div class="col-sm-1">
    <input type="checkbox" class="main_key" name="main_key[]" value="1" <?php if($pdrow->main_key==1) echo "checked";?> /> 預設
  </div>
</div>
<?php
}
?>

<div class="form-group">
  <label for="title" class="col-sm-1 control-label">子產品</label>
  <div class="col-sm-2">
    <button type="button" class="btn btn-success btn-sm" id="add_sub_product">新增</button>
  </div>
</div>                   
<div class="form-group sub_product">
  <label for="title" class="col-sm-1 control-label">名稱</label>
  <div class="col-sm-2">
    <input type="text" class="form-control" name="sub_title[]" placeholder="名稱"/>
  </div>
  <label for="title" class="col-sm-1 control-label label_width">售價</label>
  <div class="col-sm-2">
    <input type="number" class="form-control" name="price[]" placeholder="售價"/>
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
    <input type="hidden" class="form-control" name="sid[]" value="0"/>
  </div>
  
  <div class="col-sm-1">
    <input type="checkbox" name="main_key[]" value="1" /> 預設
  </div>
</div>
                    <!--
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">促銷價</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="dis_price" value=""/>
                      </div>
                    </div>
                    
                    -->
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">首頁促銷</label>
                      <div class="col-sm-3">
                        <input type="checkbox" name="home_promote" value="1"<?php if($product->home_promote==1) echo "checked"; ?>  />加入-顯示於首頁促銷
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">組合促銷</label>
                      <div class="col-sm-9">
                        <table class="table table-bordered">
                            <caption>
                                <button type="button" onclick="location.href='/manager/SaleStrategery/adding_strategry_page'" class="btn btn-info">新增組合方案</button>
                            </caption>
                            <thead>
                                <tr class="success">
                                    <td>組合名稱</td>
                                    <td>價格</td>
                                </tr>
                            </thead>
                            <tbody>
                             <?php 
                             if($strategery!=0){
        						  foreach($strategery as $sk => $sv){
        						      echo "<tr>";
                                      echo "<td><a href='/manager/SaleStrategery/edit_strategery_page/".$sv->uniqid_id."'>".$sv->title."</a></td>";
                                      echo "<td>".$sv->price."</td>";
                                      echo "</tr>";
        						  }
                              }
    					 	 ?> 
                            </tbody>
                        </table>
                      </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="picture" class="col-sm-1 control-label">產品圖片</label>
                        <div class="col-sm-6">
                            <input type="file" name="picture" class="form-control" id="picture" />
                            <img src="<?php echo Upload . "products/" . $product->picture ?>" width="50%" alt="<?php echo $product->picture; ?>"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">狀態</label>
                       <div class="col-sm-6">
                        <input type="radio" name="status" value="1" <?php if ($product->status == 1) echo 'checked="checked"'; ?>/>開啟
                        <input type="radio" name="status" value="0" <?php if ($product->status == 0) echo 'checked="checked"'; ?>/>關閉
                      </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="product_content" class="col-sm-1 control-label">簡述</label>
                        <div class="col-sm-10">
                            <textarea id="product_short" name="product_short" rows="10" cols="80"><?php echo $product->product_short; ?></textarea>
                        </div>
                     </div>
                                   
                    <div class="form-group">
                        <label for="product_content" class="col-sm-1 control-label">產品詳細介紹</label>
                        <div class="col-sm-10">
                            <textarea id="product_content" name="product_content" rows="10" cols="80"><?php echo $product->product_content; ?></textarea>
                        </div>
                     </div>
                    
                    <input type="hidden" name="id"  value="<?php echo $product->uniqid_id; ?>"/>
                    
                    <button type="button" id="save" class="btn btn-primary">儲存產品</button>
                    <button type="button" class="btn btn-default" onClick="location.href='/manager/product'">取消</button>
                  </form>
                </div>
              </div><!-- /.box -->

            </div><!-- /.col-->
          </div><!-- ./row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
    <!-- CK Editor -->
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
        	  console.log(res);
            var box="";
            var sub_category=$('#sub_category_val').val();
            var list = jQuery.parseJSON(res);
                box+="<select name='sub_category' class='form-control'>";
                box+="<option value=''>全部</option>";
            $.each(list.category, function(idx,val){
                if(sub_category==val.id){
                    box+="<option value='"+val.id+"' selected>"+val.title+"</option>";
                }else{
        		     box+="<option value='"+val.id+"'>"+val.title+"</option>";
                }
            });
                box+="</select>";
            $("#sub_category").html(box);
         });
    }).trigger("change");
    
    
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

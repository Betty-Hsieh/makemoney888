      <div class="content-wrapper">
        <section class="content-header">
          <h1>新增銷售策略</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">銷售策略</a></li>
            <li class="active">新增銷售策略</li>
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
                <form id="strategry" action="/manager/SaleStrategery/adding_strategery" class="form-horizontal" method="post"  enctype="multipart/form-data">
                	<div class="form-group">
                      <label for="title" class="col-sm-1 control-label">組合銷售名稱</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="title" placeholder="組合銷售名稱"/>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">組合方案查詢</label>
                      <div class="col-sm-9">
                        <table class="table table-bordered">
                            <caption>
                               查詢產品:<input type="text" class="query_product" placeholder="輸入完畢請按下Enter"/>
                            </caption>
                            <thead>
                                <td></td>
                                <td>品名</td>
                                <td>價格</td>
                                <td width="200">圖片</td>
                            </thead>
                            <tbody class="product_list"></tbody>
                        </table>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">建立組合</label>
                      <div class="col-sm-9">
                        <table class="table table-bordered">
                            <thead>
                                <td>品名</td>
                                <td>原價</td>
                                <td>組合數量</td>
                            </thead>
                            <tbody class="strategry"></tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">
                                        組合促銷價格&nbsp;:&nbsp;
                                        <input type='text' name='price' value=''/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        狀態&nbsp;:&nbsp;
                                        <input type="radio" name="status" value="1" checked/>開啟
                                        <input type="radio" name="status" value="0"/>關閉
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <button type="button" class="btn btn-primary building">建立組合促銷方案</button>
                                        <button type="button" class="btn btn-default" onClick="location.href='/manager/SaleStrategery'">取消</button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                      </div>
                    </div>
                    
                    
                  </form>
                </div>
              </div><!-- /.box -->

            </div><!-- /.col-->
          </div><!-- ./row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<script>
$(function(){
    var data={
        product:""
    }
    $('.query_product').keypress(function(){
        if( event.which == 13 ) {
           $.ajax({
        	  method: "POST",
        	  url: "/manager/Product/Query_Product/",
        	  data:{
        		  product:$(this).val(),
        	  }
           }).success(function(res){
                var box="";
                var product_list = jQuery.parseJSON(res);
                data.product=product_list.product;
                    $.each(product_list.product, function(idx,val){
                        box+="<tr>";
                        box+="<td><button type='button' class='btn btn-success adding' id='"+val.uniqid_id+"'>加入組合</button></td>";
        				box+="<td>"+val.product_title+"</td>";
        				box+="<td>"+val.product_price+"</td>";
                        box+="<td><img src='/upload/products/"+val.picture+"' width='50%'/></td>";
        				box+="</tr>";
                    });
                $(".product_list").html(box);    
        		//console.log(msg);
           });
       }
    });
    
    $(document.body).on("click",".adding",function(){
        var idx=$(this).index(".adding");
        var id=$(this).attr("id");
        var box="";
        //console.log(data.product);
        $.each(data.product, function(idx,val){
            if(val.uniqid_id==id){
                box+="<tr>";
                box+="<td>"+val.product_title+"<input type='hidden' name='id[]' value='"+val.uniqid_id+"'/></td>";
    			box+="<td class='price'>"+val.product_price+"</td>";
                box+="<td><input type='number' name='amount[]' value='1'/></td>";
    			box+="</tr>";
            }
        });
        $(".strategry").append(box);
        $(this).parent("td").parent("tr").hide();
    });
    
    $(".building").click(function(){
        $('#strategry').submit();
    })
})
</script>

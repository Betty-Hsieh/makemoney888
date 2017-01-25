<script>
$(function(){
    $('.layer').change(function(){
        var layer=$(this).find("option:selected").val();
        //alert(layer);
    });
});
</script>  
      <div class="content-wrapper">
        <section class="content-header">
          <h1>新增分類</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">分類管理</a></li>
            <li class="active">新增分類</li>
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
                <form action="/manager/Category/adding_category" class="form-horizontal" method="post"  enctype="multipart/form-data">
                	<div class="form-group">
                      <label for="title" class="col-sm-1 control-label">分類名稱</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="title" placeholder="分類名稱"/>
                      </div>
                    </div>
                    
                    <?php
                        $layer_id=0;
                        if(!empty($main_category)){
                    ?>
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">主分類</label>
                      <div class="col-sm-2">
                        <?php
						     echo $main_category->title;
                             $layer_id=(int)$main_category->layer+1;
					 	 ?>
                        <input type="hidden" name="parentid" value="<?php echo $main_category->id;?>"/>
                      </div>
                    </div>
                    <?php
                        }
                    ?>
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">類別階層</label>
                      <div class="col-sm-2">
                        <select class="form-control layer" name="layer">
                          
                          <?php
                          /*
						  foreach($layer as $key => $row){
						      $number=(int)$row->layer+1;
						     echo "<option value='".$number."'>第".$number."階</option>";
						  }
                          */
                            if($layer_id!=0){
                                echo "<option value='".$layer_id."'>第".$layer_id."階</option>";
                            }
                            else{
                                echo "<option value=''>請選擇</option>";
                                echo "<option value='1'>第1階</option>";
                            }
					 	 ?>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">排序</label>
                      <div class="col-sm-2">
                        <input type="number" class="form-control" name="sorting" placeholder="排序"/>
                      </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">建立分類</button>
                    <button type="button" class="btn btn-default" onClick="location.href='/manager/Category'">取消</button>
                  </form>
                </div>
              </div><!-- /.box -->

            </div><!-- /.col-->
          </div><!-- ./row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

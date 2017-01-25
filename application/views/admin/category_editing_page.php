<script>
$(function(){
    $('.layer').change(function(){
        var layer=$(this).find("option:selected").val();
        alert(layer);
    })
})
</script>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>編輯分類</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">分類管理</a></li>
            <li class="active">編輯分類</li>
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
                <form action="/manager/Category/editing_category" class="form-horizontal" method="post"  enctype="multipart/form-data">
                	
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">分類名稱</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="title" value="<?php echo $category->title?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">狀態</label>
                      <div class="col-sm-6">
                        <select name="status">
                            <option value="1" <?php if($category->status==1) echo "selected";?>>開啟</option>
                            <option value="0" <?php if($category->status==0) echo "selected";?>>關閉</option>
                        </select>
                      </div>
                    </div>
                    
                    <!--
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">分類類別</label>
                      <div class="col-sm-2">
                        <select class="form-control layer" name="layer">
                          <option value="">請選擇</option>
                          <option value="1">第1階</option>
                          <?php
                          /*
						  foreach($layer as $key => $row){
						      $number=(int)$category->layer+1;
						     echo "<option value='".$number."'>第".$number."階</option>";
						  }
                          */
					 	 ?>
                        </select>
                      </div>
                    </div>
                    -->
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">排序</label>
                      <div class="col-sm-2">
                        <input type="number" class="form-control" name="sorting" value="<?php echo $category->sorting?>"/>
                      </div>
                    </div>
                    <input type="hidden" name="uniqid_id"  value="<?php echo $category->uniqid_id; ?>" />
                    <button type="submit" class="btn btn-primary">編輯分類</button>
                    <button type="button" class="btn btn-default" onClick="location.href='/manager/Category'">取消</button>
                  </form>
                </div>
              </div><!-- /.box -->

            </div><!-- /.col-->
          </div><!-- ./row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

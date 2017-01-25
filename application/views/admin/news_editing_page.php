      <div class="content-wrapper">
        <section class="content-header">
          <h1>編輯消息</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">消息管理</a></li>
            <li class="active">編輯消息</li>
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
<?php
foreach ($news as $key => $row) {
?>			  
                <form action="/manager/News/editing_news" class="form-horizontal" method="post" enctype="multipart/form-data">
                	<div class="form-group">
                      <label for="title" class="col-sm-1 control-label">消息名稱</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="title" value="<?php echo $row->title; ?>"/>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="picture" class="col-sm-1 control-label">狀態</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="status">
                              <option value="1" <?php if($row->status==1) echo "selected"; ?> >刊登中</option>
                              <option value="2" <?php if($row->status==0) echo "selected"; ?>>關閉</option>
                            </select>
                        </div>
                    </div>
                    
                    <textarea id="editor1" name="content" rows="10" cols="80"><?php echo $row->content;?></textarea>
                    <input type="hidden" name="id"  value="<?php echo $row->id; ?>" />
<?php
}
?>
                    <br />
                    <button type="submit" class="btn btn-primary">編輯消息</button>
                    <button type="button" class="btn btn-default" onClick="location.href='/manager/News'">取消</button>
                  </form>
                </div>
              </div><!-- /.box -->

            </div><!-- /.col-->
          </div><!-- ./row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
	
    <!-- CK Editor -->
    <script src="<?php echo CK;?>/ckeditor.js"></script>
    
    <script>
      $(function () {
        CKEDITOR.replace('editor1');
      });
    </script>

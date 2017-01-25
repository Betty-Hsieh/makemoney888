      <div class="content-wrapper">
        <section class="content-header">
          <h1>編輯電子報</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">電子報管理</a></li>
            <li class="active">編輯電子報</li>
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
foreach ($epaper as $key => $row) {
?>			  
                <form action="/manager/Epaper/editing_Epaper" class="form-horizontal" method="post" enctype="multipart/form-data">
                	<div class="form-group">
                      <label for="title" class="col-sm-1 control-label">電子報名稱</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="topic" value="<?php echo $row->title; ?>"/>
                      </div>
                    </div>
                    <textarea id="editor1" name="content" rows="10" cols="80"><?php echo $row->content;?></textarea>
                    <input type="hidden" name="id"  value="<?php echo $row->uniqid; ?>" />
<?php
}
?>
                    <br />
                    <button type="submit" class="btn btn-primary">編輯電子報</button>
                    <button type="button" class="btn btn-default" onClick="location.href='/manager/Epaper'">取消</button>
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

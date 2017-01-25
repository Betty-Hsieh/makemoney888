
      <div class="content-wrapper">
        <section class="content-header">
          <h1>編輯客戶見證</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">客戶見證</a></li>
            <li class="active">編輯客戶見證</li>
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
foreach ($sharing as $key => $row) {
?>			  
                <form action="/manager/Sharing/editing_sharing" class="form-horizontal" method="post" enctype="multipart/form-data">
                	<div class="form-group">
                      <label for="title" class="col-sm-1 control-label">商店設定</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="title" value="<?php echo $row->title; ?>"/>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">狀態</label>
                       <div class="col-sm-6">
                        <input type="radio" name="status" value="1" <?php if ($row->status == 1) echo 'checked="checked"'; ?>>開啟
                        <input type="radio" name="status" value="0" <?php if ($row->status == 0) echo 'checked="checked"'; ?>>關閉
                      </div>
                    </div>
                    
                     <br />                   
                    <textarea id="content" name="content" rows="10" cols="80"><?php echo $row->content; ?></textarea>
                    <input type="hidden" name="uniqid_id"  value="<?php echo $row->uniqid_id; ?>" />
<?php
}
?>
                    <br />
                    <button type="submit" class="btn btn-primary">確認編輯</button>
                    <button type="button" class="btn btn-default" onclick="location.href='/manager/Sharing'">取消</button>
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
        CKEDITOR.replace('content');
      });
    </script>

   
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            新增電子報
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">電子報管理</a></li>
            <li class="active">新增電子報</li>
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
                <form action="/manager/Epaper/adding_epaper" class="form-horizontal" method="post"  enctype="multipart/form-data">
                	<div class="form-group">
                      <label for="title" class="col-sm-1 control-label">電子報標題</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="title" placeholder="電子報標題">
                      </div>
                    </div>
                    
                    <!--
                    <div class="form-group">
                        <label for="picture" class="col-sm-1 control-label">圖片</label>
                        <div class="col-sm-6">
                            <input type="file" name="picture" class="form-control" id="picture" placeholder="200*200" >
                        </div>
                     </div>
                     -->
                     
                     <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">電子報內容</label>
                      <div class="col-sm-10">
                        <textarea id="content" name="content" rows="10" cols="80"></textarea>
                      </div>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary">建立電子報</button>
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
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('content');
      });
    </script>

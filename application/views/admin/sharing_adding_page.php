      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            建立客戶見證
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首頁</a></li>
            <li><a href="#">客戶見證</a></li>
            <li class="active">建立客戶見證</li>
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
                <form action="/manager/Sharing/adding_sharing" class="form-horizontal" method="post"  enctype="multipart/form-data">
                	<div class="form-group">
                      <label for="title" class="col-sm-1 control-label">故事主題</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="title" placeholder="故事主題"/>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="status" class="col-sm-1 control-label">文章權限</label>
                      <div class="col-sm-6">
                        <select class="form-control" name="status">
                          <option value="1">開啟</option>
                          <option value="0">關閉</option>
                        </select>
                      </div>
                    </div>
                     <div class="form-group">
                        <label for="content" class="col-sm-1 control-label">介紹內容</label>
                        <div class="col-sm-10">
                            <textarea id="content" name="content" rows="10" cols="80"></textarea>
                        </div>
                     </div>
                    
                    
                    
                    <button type="submit" class="btn btn-primary">建立</button>
                    <button type="button" class="btn btn-default" onClick="location.href='/manager/Sharing'">取消</button>
                  </form>
                </div>
              </div><!-- /.box -->

            </div><!-- /.col-->
          </div><!-- ./row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo AdminPlugins?>bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script>
      $(function () {
        CKEDITOR.replace('content');
      });
    </script>

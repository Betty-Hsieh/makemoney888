      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            新增廣告
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">廣告管理</a></li>
            <li class="active">新增廣告</li>
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
                
                <form action="/manager/advertising/adding_advertising" class="form-horizontal" method="post" enctype="multipart/form-data">
                	<div class="form-group">
                      <label for="title" class="col-sm-1 control-label">廣告名稱</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="title" placeholder="廣告名稱"/>
                      </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="picture" class="col-sm-1 control-label">照片</label>
                        <div class="col-sm-6">
                            <input type="file" name="picture" class="form-control" id="picture" />
                            ( 1200 * 300 )
                        </div>
                     </div>
                    
                    <textarea id="introduction" name="content" rows="10" cols="80"></textarea>
                    <br />
                    <button type="submit" class="btn btn-primary">建立廣告</button>
                    <button type="button" class="btn btn-default" onClick="location.href='/manager/advertising'">取消</button>
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
        CKEDITOR.replace('introduction');
      });
    </script>

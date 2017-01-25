
      <div class="content-wrapper">
        <section class="content-header">
          <h1>新增關於我們</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">網站管理</a></li>
            <li class="active">關於我們</li>
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
                
                <form action="/manager/about/adding_about" class="form-horizontal" method="post" enctype="multipart/form-data">
                	
                    <textarea id="introduction" name="content" rows="10" cols="80"></textarea>
                    <br />
                    <button type="submit" class="btn btn-primary">確認</button>
                    <button type="button" class="btn btn-default" onClick="location.href='/manager/about'">取消</button>
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

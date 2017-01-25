
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            新增會員
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">會員管理</a></li>
            <li class="active">新增會員</li>
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
                <form action="/manager/Students/adding_Students" class="form-horizontal" method="post">
                	<div class="form-group">
                      <label for="title" class="col-sm-2 control-label">會員姓名</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="title" id="title" placeholder="會員姓名"/>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-2 control-label">電子報接收</label>
                      <div class="col-sm-2">
                        <select class="form-control" name="epaper_status">
                          <option value="1">開啟</option>
                          <option value="0">關閉</option>
                        </select>
                      </div>
                    </div>
                    <textarea id="editor1" name="content" rows="10" cols="80"></textarea>
                    
                    <button type="submit" class="btn btn-primary">建立會員</button>
                    <button type="button" class="btn btn-default" onClick="location.href='/manager/Students'">取消</button>
                  </form>
                </div>
              </div><!-- /.box -->

            </div><!-- /.col-->
          </div><!-- ./row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
	
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <script>
      $(function () {
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>

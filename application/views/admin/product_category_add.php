      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            新增產品
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">產品管理</a></li>
            <li class="active">新增產品</li>
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
                <form action="/manager/product/adding_product" class="form-horizontal" method="post"  enctype="multipart/form-data">
                	<div class="form-group">
                      <label for="title" class="col-sm-1 control-label">產品名稱</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="product_title" placeholder="產品名稱">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">父分類</label>
                      <div class="col-sm-6">
                        <select class="form-control" name="">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                    </div>                   
                    <div class="form-group">
                        <label for="picture" class="col-sm-1 control-label">圖片</label>
                        <div class="col-sm-6">
                            <input type="file" name="picture" class="form-control" id="picture" >
                        </div>
                        
                     </div>
                    <textarea id="editor1" name="product_content" rows="10" cols="80"></textarea>
                    
                    <button type="submit" class="btn btn-primary">建立</button>
                    <button type="button" class="btn btn-default" onClick="location.href='/manager/product'">取消</button>
                  </form>
                </div>
              </div><!-- /.box -->

            </div><!-- /.col-->
          </div><!-- ./row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
	<!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo AdminPlugins?>bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo AdminPlugins?>bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>

      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            編輯聯絡我們
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">網站管理</a></li>
            <li class="active">聯絡我們</li>
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
		  
                <form action="/manager/Contact/editing_contact" class="form-horizontal" method="post" enctype="multipart/form-data">  	            
                    <textarea id="editor1" name="content" rows="10" cols="80"><?php echo $contact->content; ?></textarea>
                    <input type="hidden" name="uniqid_id"  value="<?php echo $contact->uniqid_id; ?>" />

                    <br />
                    <button type="submit" class="btn btn-primary">確認編輯</button>
                    <button type="button" class="btn btn-default" onclick="location.href='/manager/Contact'">取消</button>
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

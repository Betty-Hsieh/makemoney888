      <div class="content-wrapper">
        <section class="content-header">
          <h1>編輯運費</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">運費管理</a></li>
            <li class="active">編輯運費</li>
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
foreach ($shipping as $key => $row) {
?>			  
                <form action="/manager/Shipping/editing_shipping" class="form-horizontal" method="post" enctype="multipart/form-data">
                	<div class="form-group">
                      <label for="title" class="col-sm-1 control-label">運費名稱</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="title" value="<?php echo $row->fvalue; ?>"/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="title" class="col-sm-1 control-label">額度</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="amount" value="<?php echo $row->fvalue2; ?>" placeholder="額度">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="picture" class="col-sm-1 control-label">狀態</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="status">
                              <option value="1" <?php if($row->status==1) echo "selected"; ?>>啟用</option>
                              <option value="0" <?php if($row->status==0) echo "selected"; ?>>關閉</option>
                            </select>
                        </div>
                    </div>
                    
                    <input type="hidden" name="id"  value="<?php echo $row->kv; ?>" />
<?php
}
?>
                    <br />
                    <button type="submit" class="btn btn-primary">編輯運費</button>
                    <button type="button" class="btn btn-default" onClick="location.href='/manager/Shipping'">取消</button>
                  </form>
                </div>
              </div><!-- /.box -->

            </div><!-- /.col-->
          </div><!-- ./row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

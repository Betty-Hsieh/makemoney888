
<section>
	<div class="container">
        <ol class="breadcrumb">
          <li><a href="/index">首頁</a></li>
          <li class="active">會員中心</li>
        </ol>
    </div>
</section>
<section class="main">
	<div class="container">
        <div class="row">
            <div class="col-xs-6 col-md-4">
            
            <?php include_once("member_menu.php");?>
            </div>
            <!--內容-->
            <div class="col-xs-12 col-md-8">
                <h3>編輯個人資料</h3>       
                <div class="editor">
		  
                <form action="/index/edit_member_data" class="form-horizontal" method="post">
                	<div class="form-group">
                      <label for="title" class="col-sm-3 control-label">會員姓名</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="org_name" value="<?php echo $student->org_name;?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="title" class="col-sm-3 control-label">帳號</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="org_email" value="<?php echo $student->org_email;?>">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="title" class="col-sm-3 control-label">密碼</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="org_password" value="<?php echo $student->org_password;?>">
                      </div>
                    </div>
                    <div class="form-group">
                         <label for="title" class="col-sm-3 control-label">連絡電話</label>
                         <div class="col-sm-6">
                                <input class="form-control" type="text" name="phone" value="<?php echo $student->phone;?>"/>
                         </div>
                    </div>
                    <div class="form-group">
                         <label for="title" class="col-sm-3 control-label">手機門號</label>
                         <div class="col-sm-6">
                                <input class="form-control" type="text" name="cellphone" value="<?php echo $student->cellphone;?>"/>
                         </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="" class="col-sm-3 control-label">性別</label>
                       <div class="col-sm-6">
                        <input type="radio" name="gender" value="1" <?php if($student->gender==1) echo 'checked=""';?>/>男性&nbsp;&nbsp;
                        <input type="radio" name="gender"  value="2" <?php if($student->gender==2) echo 'checked=""';?>/>女性
                      </div>
                    </div>
                    
                     <div class="form-group">
                         <label for="title" class="col-sm-3 control-label">住址</label>
                         <div class="col-sm-6">
                                <input class="form-control" type="text" name="address" value="<?php echo $student->address;?>"/>
                         </div>
                    </div>
                    <button type="submit" class="btn btn-primary">確認編輯</button>
                  </form>

                </div>
            </div>
        </div>
	</div>
</section>
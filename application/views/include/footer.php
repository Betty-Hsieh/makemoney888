    <footer>
        <div class="container">
            <div class="row">
            	<div class="col-sm-6">
                	<ul class="list-unstyled list-inline pull-left">
                        <li>地址：桃園市大業路一段342號(竹城新宿社區)</li>
                        <li>電話：03-3562978、0910007380</li>
                    </ul>
                    <ul class="list-unstyled list-inline pull-left">
                        <li>門市營業時間：週一~週五:am09:00~pm19:00</li>
                        <li>週六:am10:00~18:00</li>
                        <li>週日公休</li>
                    </ul>
                	
                </div>
            	<div class="col-sm-6">
                    <ul class="list-unstyled list-inline pull-right">
                        <li><a href="/index/about">品牌介紹</a></li>
                        <li><a href="/index/news_list">最新消息</a></li>
                        <li><a href="/index/product_list">產品一覽</a></li>
                        <li><a href="/index/share_list">客戶見證</a></li>
                        <li><a href="/index/course_list">課程報名</a></li>
                        <li><a href="/index/faq_list">常見問題</a></li>
                        <li><a href="/index/contact">聯絡我們</a></li>
                    </ul>
                    <p class="pull-right">2015 手工亦然肥皂 All Rights Reserved.</p>
                </div>
            </div>
            
        </div>
    </footer>
	
    <div class="scroll-top-btn">
        <span class="scroll-top-inner">
            <i class="fa fa-2x fa-angle-up"></i>
        </span>
    </div>
    
    <div class="modal fade" id="registerpanel" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form class="form-horizontal" id="register-form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="exampleModalLabel">會員註冊</h4>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">
                        <span style="color:red">*</span>姓名
                    </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="user_name" placeholder="姓名"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">
                    <span style="color:red">*</span>性別
                    </label>
                    <div class="col-sm-9">
                      <label class="radio-inline">
                      	<input type="radio" name="gender" id="gender" value="1"/>男
                      </label>
                      <label class="radio-inline">
                      	<input type="radio" name="gender" id="gender" value="2"/>女
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="birthday" class="col-sm-2 control-label">
                    <span style="color:red">*</span>生日</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="birthday" placeholder="生日"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="user_email" class="col-sm-2 control-label">
                    <span style="color:red">*</span>信箱(帳號)</label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="user_email" placeholder="請輸入Email"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="user_password" class="col-sm-2 control-label">
                    <span style="color:red">*</span>密碼</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="user_password" placeholder="請輸入密碼"/>
                    </div>
                  </div>                  
                  <div class="form-group">
                    <label for="tel" class="col-sm-2 control-label">
                    <span style="color:red">*</span>電話</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="tel" placeholder="請輸入電話"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="address" class="col-sm-2 control-label">
                    <span style="color:red">*</span>地址</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="address" placeholder="請輸入地址"/>
                    </div>
                  </div>
                  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary register">註冊</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
              </div>
          </form>
        </div>
      </div>
    </div>
    
    <!---會員登入介面---->
    <div class="modal fade" id="loginpanel" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form>
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="exampleModalLabel">會員登入</h4>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                    <label for="email" class="control-label">帳號</label>
                    <input type="text" class="form-control" id="email"/>
                  </div>
                  <div class="form-group">
                    <label for="password" class="control-label">密碼:</label>
                    <input type="password" class="form-control" id="password"/>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary login">登入</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
              </div>
          </form>
        </div>
      </div>
    </div>
    

  
</body>
</html>

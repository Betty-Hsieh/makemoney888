<body>
        <div class="container">
            <div class="row">
                <div class="col-sm-3  col-xs-12 text-left">
                    <a class="logo" href="/index/"><h1>手工亦然皂</h1></a>
                </div>
                <!--手機-->
                <div class="visible-xs col-xs-2">
                    <a class="navbar-brand logo" href="index.php"><h1></h1></a>
                </div>
                <div class="visible-xs col-xs-12">
<form class="form-inline" method="post" action="/index/query_product">
  <div class="form-group">
    <label for="search">產品查詢</label>
    <input type="text" class="form-control" name="productname" id="search" placeholder="請輸入產品名稱">
  </div>
  <button type="submit" class="btn btn-default btn-sm">查詢</button>
</form>
                </div>
                                                
                <div class="hidden-xs col-sm-4 col-xs-4">
<form class="form-inline" method="post" action="/index/query_product" style="padding-top:25px;">
  <div class="form-group">
    <label for="search">產品查詢</label>
    <input type="text" class="form-control" name="productname" id="search" placeholder="請輸入產品名稱">
  </div>
  <button type="submit" class="btn btn-default btn-sm">查詢</button>
</form>
                </div>
                <div class="col-sm-5 col-xs-5 text-right">
                    <ul class="list-inline link_list">
                        <li class="hidden-xs"><a href="#" data-toggle="modal" data-target="#registerpanel" title="註冊會員">註冊會員</a></li>
                        <?php 
                            if(empty($member_id)){
                        ?>
                        <li class="hidden-xs">
                            <a href="#" class="" data-toggle="modal" data-target="#loginpanel" id="">會員登入</a>
                        </li>
                        <?php 
                        }else{
                        ?>
                        <li class="hidden-xs"><a href="/index/member_center" class="" >
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>會員中心</a></li>
                        <li class="hidden-xs"><a href="/index/logout" class="" >
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>登出</a></li>
                        <?php     
                        }
                        ?>
                        <li>
                            <div class="cart_quick_box hidden-xs">
                            <!--- class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" -->
                                <a  href="<?php echo URL_INDEX;?>index/cart1">購物車 <span class="badge"><?php echo $top_total_items;?></span></a>
                            </div>					
                        </li>
                    </ul>
                </div>
            </div>
        </div>
<header>                
<div class="container">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>
        </div>
    
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav main_menu">
          <!--main_menu text-center-->  
            <li class="dropdown">
                <a href="/index/about">品牌介紹</a>
            </li>
            <li class="dropdown">
                <a href="/index/news_list">最新消息</a>
            </li>
                                    
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">商品一覽 <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/index/product_list">所有商品</a></li>
                <?php 
        		  foreach($category as $ck => $categoryrow){
        		      if($categoryrow['parentid']==0){
        		       echo "<li><a href='/index/product_list/".$categoryrow['id']."'>".$categoryrow['title']."</a></li>";
                      }
                      else{
        		          echo "<li><a href='/index/product_list/".$categoryrow['parentid']."/".$categoryrow['id']."'>".$categoryrow['title']."</a></li>";
                      }
                    }
                ?>
                <li role="separator" class="divider"></li>
              </ul>
            </li>
            <li class="dropdown">
                <a href="/index/share_list">客戶見證</a>
            </li>
            <li class="dropdown">
                <a href="/index/course_list">課程資訊</a>
            </li>
            <li class="dropdown">
                <a href="/index/faq_list">常見問題</a>
            </li>
            <li class="dropdown">
                <a href="/index/contact">聯絡我們</a>
            </li>                
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
</div>
</header>
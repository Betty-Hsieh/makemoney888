<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo AdminDist?>img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $user_name;?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <!--
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
              -->
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">功能選單列</li>
            <!--
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
              </ul>
            </li>
            -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>網站前台</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/" target="_blank"><i class="fa fa-circle-o"></i> 網站前台</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>網站管理</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/manager/Member"><i class="fa fa-circle-o"></i> 管理員</a></li>
                <li><a href="/manager/Access"><i class="fa fa-circle-o"></i> 權限管理</a></li>
                <li><a href="/manager/News"><i class="fa fa-circle-o"></i> 最新消息</a></li>
                <li><a href="/manager/advertising"><i class="fa fa-circle-o"></i> 主要廣告區域</a></li>
                <!--
                <li><a href="/manager/Epaper"><i class="fa fa-circle-o"></i> 電子報</a></li>
                -->
                <li><a href="/manager/Faq"><i class="fa fa-circle-o"></i> FAQ</a></li>
                <li><a href="/manager/About"><i class="fa fa-circle-o"></i> 關於我們</a></li>
                <li><a href="/manager/Contact"><i class="fa fa-circle-o"></i> 聯絡我們</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>課程資訊</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/manager/Course"><i class="fa fa-circle-o"></i> 課程資訊</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>會員管理</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/manager/Students"><i class="fa fa-circle-o"></i> 會員管理</a></li>
                <li><a href="/manager/Sharing"><i class="fa fa-circle-o"></i> 會員分享</a></li>
                <li><a href="/manager/CustomerType"><i class="fa fa-circle-o"></i> 會員分類</a></li>
              </ul>
            </li>
            
            <!---<li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>文章管理</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/manager/Article"><i class="fa fa-circle-o"></i> 文章管理</a></li>
              </ul>
            </li>---->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>產品管理</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/manager/Product"><i class="fa fa-circle-o"></i> 產品管理</a></li>
                <li><a href="/manager/SaleStrategery"><i class="fa fa-circle-o"></i> 銷售組合方案</a></li>
                <!--
                <li><a href="/manager/Product"><i class="fa fa-circle-o"></i> 品牌管理</a></li>
                -->
                <li><a href="/manager/Category"><i class="fa fa-circle-o"></i> 分類管理</a></li>
                <li><a href="/manager/Shipping"><i class="fa fa-circle-o"></i> 運費設定</a></li>
                <li><a href="/manager/Discount"><i class="fa fa-circle-o"></i> 折扣設定</a></li>
                <!--
                <li><a href="/manager/Coupon"><i class="fa fa-circle-o"></i> 折價卷</a></li>
                -->
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>訂單管理</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/manager/Order"><i class="fa fa-circle-o"></i> 訂單管理</a></li>
              </ul>
            </li>
            
            
            <!---
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>影音管理</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/manager/Video"><i class="fa fa-circle-o"></i> 影音中心</a></li>
              </ul>
            </li>--->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>報表系統</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/manager/Performance"><i class="fa fa-circle-o"></i> 銷售報表</a></li>
                <!--
                <li><a href="/manager/Finance"><i class="fa fa-circle-o"></i> 銷售報表</a></li>
                -->
              </ul>
            </li>
            <!--
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>客服管理</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/manager/Service"><i class="fa fa-circle-o"></i> 客服管理</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Layout Options</span>
                <span class="label label-primary pull-right">4</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
              </ul>
            </li>
            <li>
              <a href="../widgets.html">
                <i class="fa fa-th"></i> <span>Widgets</span> <small class="label pull-right bg-green">new</small>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Charts</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>UI Elements</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
                <li><a href="../UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
                <li><a href="../UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
                <li><a href="../UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
                <li><a href="../UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
                <li><a href="../UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Forms</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                <li><a href="../forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                <li><a href="../forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
              </ul>
            </li>
            <li class="treeview active">
              <a href="#">
                <i class="fa fa-table"></i> <span>Tables</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                <li class="active"><a href="data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
              </ul>
            </li>
            <li>
              <a href="../calendar.html">
                <i class="fa fa-calendar"></i> <span>Calendar</span>
                <small class="label pull-right bg-red">3</small>
              </a>
            </li>
            <li>
              <a href="../mailbox/mailbox.html">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <small class="label pull-right bg-yellow">12</small>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Examples</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                <li><a href="../examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                <li><a href="../examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                <li><a href="../examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                <li><a href="../examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                <li><a href="../examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                <li><a href="../examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                <li><a href="../examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Multilevel</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                    <li>
                      <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>

              </ul>
            </li>
            <li><a href="../../documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
            -->
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
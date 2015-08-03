<!doctype html>
<html class="no-js">
  <head>
    
    <meta charset="UTF-8">
    <title>Table</title>

    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="<?php echo URL_CSS;?>main.min.css">

    <!-- metisMenu stylesheet -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/metisMenu/1.1.3/metisMenu.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
      <script src="assets/lib/html5shiv/html5shiv.js"></script>
      <script src="assets/lib/respond/respond.min.js"></script>
      <![endif]-->

    <!--For Development Only. Not required -->
    <script language="javascript">
		  less = {
			env: "development",
			relativeUrls: false,
			rootpath: "../assets/"
		  };
    </script>
    <link rel="stylesheet" type="text/css" href="<?php echo URL_CSS;?>style-switcher.css">
    <link rel="stylesheet/less" type="text/css" href="<?php echo URL_LESS;?>theme.less">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/less.js/2.2.0/less.min.js"></script>

    <!--Modernizr-->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
  </head>
  <body class="  ">
    <div class="bg-dark dk" id="wrap">
      <?php $this->load->view('top_menu');?>
	  <?php $this->load->view('left_menu');?>
      <div id="content">
        <div class="outer">
          <div class="inner bg-light lter">

            <!--Begin Datatables-->
            <div class="row">
              <div class="col-lg-12">
                <div class="box">
                  <header>
                    <div class="icons">
                      <i class="fa fa-table"></i>
                    </div>
                    <h5>Dynamic Table</h5>
                  </header>
                  <div id="collapse4" class="body">
                    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                      <thead>
                        <tr>
                          <th>m_id</th>
                          <th>m_factoryID</th>
                          <th>m_email</th>
                          <th>m_password</th>
                          <th>m_name</th>
                          <th>update</th>
                          <th>delete</th>
                        </tr>
                      </thead>
                      <tbody  class="member_data">
                      	<?php //foreach($member_list as $key => $row){  } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div><!-- /.row -->

            <!--End Datatables-->
            <div class="row">

              <!-- .col-lg-6 -->
              <div class="col-lg-6">
                <div class="box">
                  <header>
                    <h5>Default styles</h5>
                    <div class="toolbar">
                      <div class="btn-group">
                        <a href="#defaultTable" data-toggle="collapse" class="btn btn-sm btn-default minimize-box">
                          <i class="fa fa-angle-up"></i>
                        </a> 
                        <a class="btn btn-danger btn-sm close-box">
                          <i class="fa fa-times"></i>
                        </a> 
                      </div>
                    </div>
                  </header>
                  <div id="defaultTable" class="body collapse in">
                    <table class="table responsive-table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Score</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Jill</td>
                          <td>Smith</td>
                          <td>50</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Eve</td>
                          <td>Jackson</td>
                          <td>94</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>John</td>
                          <td>Doe</td>
                          <td>80</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Adam</td>
                          <td>Johnson</td>
                          <td>67</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div><!-- /.col-lg-6 -->

              <!-- .col-lg-6 -->
              <div class="col-lg-6">
                <div class="box">
                  <header>
                    <h5>Table Striped</h5>
                    <div class="toolbar">
                      <div class="btn-group">
                        <a href="#stripedTable" data-toggle="collapse" class="btn btn-default btn-sm minimize-box">
                          <i class="fa fa-angle-up"></i>
                        </a> 
                        <a class="btn btn-danger btn-sm close-box">
                          <i class="fa fa-times"></i>
                        </a> 
                      </div>
                    </div>
                  </header>
                  <div id="stripedTable" class="body collapse in">
                    <table class="table table-striped responsive-table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Score</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Jill</td>
                          <td>Smith</td>
                          <td>50</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Eve</td>
                          <td>Jackson</td>
                          <td>94</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>John</td>
                          <td>Doe</td>
                          <td>80</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Adam</td>
                          <td>Johnson</td>
                          <td>67</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div><!-- /.col-lg-6 -->
            </div>
            <div class="row">

              <!-- .col-lg-6 -->
              <div class="col-lg-6">
                <div class="box">
                  <header>
                    <h5>Table Bordered</h5>
                    <div class="toolbar">
                      <div class="btn-group">
                        <a href="#borderedTable" data-toggle="collapse" class="btn btn-default btn-sm minimize-box">
                          <i class="fa fa-angle-up"></i>
                        </a> 
                        <a class="btn btn-danger btn-sm close-box">
                          <i class="fa fa-times"></i>
                        </a> 
                      </div>
                    </div>
                  </header>
                  <div id="borderedTable" class="body collapse in">
                    <table class="table table-bordered responsive-table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Score</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Jill</td>
                          <td>Smith</td>
                          <td>50</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Eve</td>
                          <td>Jackson</td>
                          <td>94</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>John</td>
                          <td>Doe</td>
                          <td>80</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Adam</td>
                          <td>Johnson</td>
                          <td>67</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div><!-- /.col-lg-6 -->

              <!-- .col-lg-6 -->
              <div class="col-lg-6">
                <div class="box">
                  <header>
                    <h5>Table Condensed</h5>
                    <div class="toolbar">
                      <div class="btn-group">
                        <a href="#condensedTable" data-toggle="collapse" class="btn btn-default btn-sm minimize-box">
                          <i class="fa fa-angle-up"></i>
                        </a> 
                        <a class="btn btn-danger btn-sm close-box">
                          <i class="fa fa-times"></i>
                        </a> 
                      </div>
                    </div>
                  </header>
                  <div id="condensedTable" class="body collapse in">
                    <table class="table table-condensed responsive-table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Score</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Jill</td>
                          <td>Smith</td>
                          <td>50</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Eve</td>
                          <td>Jackson</td>
                          <td>94</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>John</td>
                          <td>Doe</td>
                          <td>80</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Adam</td>
                          <td>Johnson</td>
                          <td>67</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div><!-- /.col-lg-6 -->
            </div>
            <div class="row">
              <!-- .col-lg-6 -->
              <div class="col-lg-6">
                <div class="box">
                  <header>
                    <h5>Optional row classes</h5>
                    <div class="toolbar">
                      <div class="btn-group">
                        <a href="#optionalTable" data-toggle="collapse" class="btn btn-default btn-sm minimize-box">
                          <i class="fa fa-angle-up"></i>
                        </a> 
                        <a class="btn btn-danger btn-sm close-box">
                          <i class="fa fa-times"></i>
                        </a> 
                      </div>
                    </div>
                  </header>
                  <div id="optionalTable" class="body collapse in">
                    <table class="table responsive-table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Score</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Jill</td>
                          <td>Smith</td>
                          <td>50</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Eve</td>
                          <td>Jackson</td>
                          <td>94</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>John</td>
                          <td>Doe</td>
                          <td>80</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Adam</td>
                          <td>Johnson</td>
                          <td>67</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div><!-- /.col-lg-6 -->

              <!-- .col-lg-6 -->
              <div class="col-lg-6">
                <div class="box">
                  <header>
                    <h5>Sortable Table</h5>
                    <div class="toolbar">
                      <div class="btn-group">
                        <a href="#sortableTable" data-toggle="collapse" class="btn btn-default btn-sm minimize-box">
                          <i class="fa fa-angle-up"></i>
                        </a> 
                        <a class="btn btn-danger btn-sm close-box">
                          <i class="fa fa-times"></i>
                        </a> 
                      </div>
                    </div>
                  </header>
                  <div id="sortableTable" class="body collapse in">
                    <table class="table table-bordered sortableTable responsive-table">
                      <thead>
                        <tr>
                          <th>#
                            <i class="fa sort"></i>
                          </th>
                          <th>First Name
                            <i class="fa sort"></i>
                          </th>
                          <th>Last Name
                            <i class="fa sort"></i>
                          </th>
                          <th>Score
                            <i class="fa sort"></i>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Jill</td>
                          <td>Smith</td>
                          <td>50</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div><!-- /.col-lg-6 -->
            </div>
          </div><!-- /.inner -->
        </div><!-- /.outer -->
      </div><!-- /#content -->
      <div id="right" class="bg-light lter">
        <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Warning!</strong>  Best check yo self, you're not looking too good.
        </div>

        <!-- .well well-small -->
        <div class="well well-small dark">
          <ul class="list-unstyled">
            <li>Visitor <span class="inlinesparkline pull-right">1,4,4,7,5,9,10</span> 
            </li>
            <li>Online Visitor <span class="dynamicsparkline pull-right">Loading..</span> 
            </li>
            <li>Popularity <span class="dynamicbar pull-right">Loading..</span> 
            </li>
            <li>New Users <span class="inlinebar pull-right">1,3,4,5,3,5</span> 
            </li>
          </ul>
        </div><!-- /.well well-small -->

        <!-- .well well-small -->
        <div class="well well-small dark">
          <button class="btn btn-block">Default</button>
          <button class="btn btn-primary btn-block">Primary</button>
          <button class="btn btn-info btn-block">Info</button>
          <button class="btn btn-success btn-block">Success</button>
          <button class="btn btn-danger btn-block">Danger</button>
          <button class="btn btn-warning btn-block">Warning</button>
          <button class="btn btn-inverse btn-block">Inverse</button>
          <button class="btn btn-metis-1 btn-block">btn-metis-1</button>
          <button class="btn btn-metis-2 btn-block">btn-metis-2</button>
          <button class="btn btn-metis-3 btn-block">btn-metis-3</button>
          <button class="btn btn-metis-4 btn-block">btn-metis-4</button>
          <button class="btn btn-metis-5 btn-block">btn-metis-5</button>
          <button class="btn btn-metis-6 btn-block">btn-metis-6</button>
        </div><!-- /.well well-small -->

        <!-- .well well-small -->
        <div class="well well-small dark">
          <span>Default</span> <span class="pull-right"><small>20%</small> </span> 
          <div class="progress xs">
            <div class="progress-bar progress-bar-info" style="width: 20%"></div>
          </div>
          <span>Success</span> <span class="pull-right"><small>40%</small> </span> 
          <div class="progress xs">
            <div class="progress-bar progress-bar-success" style="width: 40%"></div>
          </div>
          <span>warning</span> <span class="pull-right"><small>60%</small> </span> 
          <div class="progress xs">
            <div class="progress-bar progress-bar-warning" style="width: 60%"></div>
          </div>
          <span>Danger</span> <span class="pull-right"><small>80%</small> </span> 
          <div class="progress xs">
            <div class="progress-bar progress-bar-danger" style="width: 80%"></div>
          </div>
        </div>
      </div><!-- /#right -->
    </div><!-- /#wrap -->
    <footer class="Footer bg-dark dker">
      <p>2014 &copy; Metis Bootstrap Admin Template</p>
    </footer><!-- /#footer -->

    <!-- #helpModal -->
    <div id="helpModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Modal title</h4>
          </div>
          <div class="modal-body">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
              in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal --><!-- /#helpModal -->

    <!--jQuery -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.4/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.18.4/js/jquery.tablesorter.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

    <!--Bootstrap -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <!-- MetisMenu -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/metisMenu/1.1.3/metisMenu.min.js"></script>

    <!-- Screenfull -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/screenfull.js/2.0.0/screenfull.min.js"></script>

    <!-- Metis core scripts -->
    <script src="<?php echo URL_JS;?>core.min.js"></script>

    <!-- Metis demo scripts -->
    <script src="<?php echo URL_JS;?>app.js"></script>
    <script>
      $(function() {
		$.get("api/member",function(data, status){
			//var info = jQuery.parseJSON(data);
			console.log(status);
			//console.log(data.member_list[0].m_name);
			//alert("Data: " + data + "\nStatus: " + status);
			var member_data="";
			$.each( data.member_list, function(key, value ) {
			  	console.log( key + ": " + value.m_name );
				member_data+="<tr>";
					member_data+="<td>"+value.m_id+"</td>";
					member_data+="<td>"+value.m_factoryID+"</td>";
					member_data+="<td>"+value.m_email+"</td>";
					member_data+="<td>"+value.m_password+"</td>";
					member_data+="<td>"+value.m_name+"</td>";
					member_data+="<td><button type='button' onclick=location.href='member/update_member_page/"+value.m_id+"'>update</button></td>";
					member_data+="<td><button type='button' onclick=location.href='member/delete_member/"+value.m_id+"'>delete</button></td>";
				member_data+="</tr>";
			});
			$('.member_data:last').append(member_data);
			setTimeout(function(){
			  	Metis.MetisTable();
        		Metis.metisSortable();
			}, 2000);
		});
	})
    </script>
    <script src="<?php echo URL_JS;?>style-switcher.min.js"></script>
  </body>
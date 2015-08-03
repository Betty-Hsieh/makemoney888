<!doctype html>
<html class="no-js">
  <head>
    <meta charset="UTF-8">
    <title>Form validation</title>

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
    <link rel="stylesheet" href="<?php echo URL_LESS;?>inputlimiter/jquery.inputlimiter.css">
    <link rel="stylesheet" href="<?php echo URL_LESS;?>bootstrap-daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/Uniform.js/2.1.2/themes/default/css/uniform.default.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.3/jquery.tagsinput.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.1/css/bootstrap3/bootstrap-switch.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.1/css/datepicker3.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.0.1/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
      <script src="<?php echo URL_LIB;?>html5shiv/html5shiv.js"></script>
      <script src="<?php echo URL_LIB;?>respond/respond.min.js"></script>
      <![endif]-->

    <!--For Development Only. Not required -->
    <script>
      less = {
        env: "development",
        relativeUrls: false,
        rootpath: "../assets/"
      };
    </script>
    <link rel="stylesheet" href="<?php echo URL_CSS;?>style-switcher.css">
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
            <style>
              .form-control.col-lg-6 {
                width: 50% !important;
              }
            </style>
            <div class="row">
              <div class="col-lg-12">
                <div class="box">
                  <header class="dark">
                    <div class="icons">
                      <i class="fa fa-check"></i>
                    </div>
                    <h5>Member</h5>

                    <!-- .toolbar -->
                    <div class="toolbar">
                      <nav style="padding: 8px;">
                        <a href="javascript:;" class="btn btn-default btn-xs collapse-box">
                          <i class="fa fa-minus"></i>
                        </a> 
                        <a href="javascript:;" class="btn btn-default btn-xs full-box">
                          <i class="fa fa-expand"></i>
                        </a> 
                        <a href="javascript:;" class="btn btn-danger btn-xs close-box">
                          <i class="fa fa-times"></i>
                        </a> 
                      </nav>
                    </div><!-- /.toolbar -->
                  </header>
                  <div id="collapse2" class="body">
                    <form class="form-horizontal" action="add_member" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label class="control-label col-lg-4">m_name</label>
                        <div class="col-lg-4">
                          <input type="text" class="validate[required] form-control" name="req" id="req">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">m_factoryID</label>
                        <div class="col-lg-4">
                          <select name="sport" id="sport" class="validate[required] form-control">
                            <option value="">Choose a sport</option>
                            <option value="option1">Tennis</option>
                            <option value="option2">Football</option>
                            <option value="option3">Golf</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">m_email</label>
                        <div class=" col-lg-4">
                          <input class="validate[required,custom[email]] form-control" type="text" name="email1" id="email1" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">m_password</label>
                        <div class=" col-lg-4">
                          <input class="validate[required] form-control" type="password" name="pass1" id="pass1" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">upload</label>
                        <div class=" col-lg-4">
                          <input type="file" name="m_intro_file" accept="image/*">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">personal photo</label>
                        <div class=" col-lg-4">
                          <input type="file" name="personal_photo" class="personal_photo" accept="image/*">
                        </div>
                      </div>
                      <div class="form-actions no-margin-bottom">
                        <input type="submit" value="Validate" class="btn btn-primary">
                      </div>
                    </form>
                  </div>
                </div>
              </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
            <div class="row">
              <div class="col-lg-12">
                <div class="box">
                  <header class="dark">
                    <div class="icons">
                      <i class="fa fa-check"></i>
                    </div>
                    <h5>Popup Validation</h5>

                    <!-- .toolbar -->
                    <div class="toolbar">
                      <nav style="padding: 8px;">
                        <a href="javascript:;" class="btn btn-default btn-xs collapse-box">
                          <i class="fa fa-minus"></i>
                        </a> 
                        <a href="javascript:;" class="btn btn-default btn-xs full-box">
                          <i class="fa fa-expand"></i>
                        </a> 
                        <a href="javascript:;" class="btn btn-danger btn-xs close-box">
                          <i class="fa fa-times"></i>
                        </a> 
                      </nav>
                    </div><!-- /.toolbar -->
                  </header>
                  <div id="collapse2" class="body">
                    <form class="form-horizontal" id="popup-validation">
                      <div class="form-group">
                        <label class="control-label col-lg-4">Required</label>
                        <div class="col-lg-4">
                          <input type="text" class="validate[required] form-control" name="req" id="req">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Select</label>
                        <div class="col-lg-4">
                          <select name="sport" id="sport" class="validate[required] form-control">
                            <option value="">Choose a sport</option>
                            <option value="option1">Tennis</option>
                            <option value="option2">Football</option>
                            <option value="option3">Golf</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Multiple Select</label>
                        <div class="col-lg-4">
                          <select name="sport2" id="sport2" multiple class="validate[required] form-control">
                            <option value="">Choose a sport</option>
                            <option value="option1">Tennis</option>
                            <option value="option2">Football</option>
                            <option value="option3">Golf</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Url</label>
                        <div class=" col-lg-4">
                          <input value="http://" class="validate[required,custom[url]] form-control" type="text" name="url1" id="url1" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">E-mail</label>
                        <div class=" col-lg-4">
                          <input class="validate[required,custom[email]] form-control" type="text" name="email1" id="email1" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Password</label>
                        <div class=" col-lg-4">
                          <input class="validate[required] form-control" type="password" name="pass1" id="pass1" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Confirm Password</label>
                        <div class=" col-lg-4">
                          <input class="validate[required,equals[pass1]] form-control" type="password" name="pass2" id="pass2" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Minimum field size (6)</label>
                        <div class=" col-lg-4">
                          <input value="" class="validate[required,minSize[6]] form-control" type="text" name="minsize1" id="minsize1" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Maximum field size, optional</label>
                        <div class=" col-lg-4">
                          <input value="0123456789" class="validate[optional,maxSize[6]] form-control" type="text" name="maxsize1" id="maxsize1" />
                          <span class="help-block">note that the field is optional - it won't fail if it has no value</span> 
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Number</label>
                        <div class=" col-lg-4">
                          <input value="-33.87a" class="validate[required,custom[number]] form-control" type="text" name="numbe2r" id="number2" />
                          <span class="help-block">a signed floating number, ie: -3849.354, 38.00, 38, .77</span> 
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">IP</label>
                        <div class=" col-lg-4">
                          <input value="192.168.3." class="validate[required,custom[ipv4]] form-control" type="text" name="ip" id="ip" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Date</label>
                        <div class=" col-lg-4">
                          <input value="201-12-01" class="validate[required,custom[date]] form-control" type="text" name="date3" id="date3" />
                          <span class="help-block">ISO 8601 dates only YYYY-mm-dd</span> 
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Date Earlier</label>
                        <div class=" col-lg-4">
                          <input value="2012/12/16" class="validate[custom[date],past[2012/09/13]] form-control" type="text" name="past" id="past" />
                          <span class="help-block">Please enter a date ealier than 2012/09/13</span> 
                        </div>
                      </div>
                      <div class="form-actions no-margin-bottom">
                        <input type="submit" value="Validate" class="btn btn-primary">
                      </div>
                    </form>
                  </div>
                </div>
              </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
            <div class="row">
              <div class="col-lg-12">
                <div class="box">
                  <header>
                    <div class="icons">
                      <i class="fa fa-th-large"></i>
                    </div>
                    <h5>Block Validation</h5>

                    <!-- .toolbar -->
                    <div class="toolbar">
                      <nav style="padding: 8px;">
                        <a href="javascript:;" class="btn btn-default btn-xs collapse-box">
                          <i class="fa fa-minus"></i>
                        </a> 
                        <a href="javascript:;" class="btn btn-default btn-xs full-box">
                          <i class="fa fa-expand"></i>
                        </a> 
                        <a href="javascript:;" class="btn btn-danger btn-xs close-box">
                          <i class="fa fa-times"></i>
                        </a> 
                      </nav>
                    </div><!-- /.toolbar -->
                  </header>
                  <div id="collapseOne" class="body">
                    <form action="#" class="form-horizontal" id="block-validate">
                      <div class="form-group">
                        <label class="control-label col-lg-4">Required</label>
                        <div class="col-lg-4">
                          <input type="text" id="required2" name="required2" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">E-mail</label>
                        <div class="col-lg-4">
                          <input type="email" id="email2" name="email2" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Password</label>
                        <div class="col-lg-4">
                          <input type="password" id="password2" name="password2" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Confirm Password</label>
                        <div class="col-lg-4">
                          <input type="password" id="confirm_password2" name="confirm_password2" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Date</label>
                        <div class="col-lg-4">
                          <input type="date" id="date2" name="date2" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Url</label>
                        <div class="col-lg-4">
                          <input type="url" id="url2" name="url2" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Digits Only</label>
                        <div class="col-lg-4">
                          <input type="text" id="digits" name="digits" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Range [6,16]</label>
                        <div class="col-lg-4">
                          <input type="text" id="range" name="range" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Please agree to our policy</label>
                        <div class="col-lg-4">
                          <input type="checkbox" id="agree2" name="agree2" class="form-control">
                        </div>
                      </div>
                      <div class="form-actions no-margin-bottom">
                        <input type="submit" value="Validate" class="btn btn-primary">
                      </div>
                    </form>
                  </div>
                </div>
              </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
            <div class="row">
              <div class="col-lg-12">
                <div class="box">
                  <header>
                    <div class="icons">
                      <i class="fa fa-ellipsis-h"></i>
                    </div>
                    <h5>Inline Validation</h5>

                    <!-- .toolbar -->
                    <div class="toolbar">
                      <nav style="padding: 8px;">
                        <a href="javascript:;" class="btn btn-default btn-xs collapse-box">
                          <i class="fa fa-minus"></i>
                        </a> 
                        <a href="javascript:;" class="btn btn-default btn-xs full-box">
                          <i class="fa fa-expand"></i>
                        </a> 
                        <a href="javascript:;" class="btn btn-danger btn-xs close-box">
                          <i class="fa fa-times"></i>
                        </a> 
                      </nav>
                    </div><!-- /.toolbar -->
                  </header>
                  <div id="collapse3" class="body">
                    <form action="#" class="form-horizontal" id="inline-validate">
                      <div class="form-group">
                        <label class="control-label col-lg-4">Required</label>
                        <div class="col-lg-8">
                          <input type="text" id="required" name="required" class="form-control col-lg-6">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">E-mail</label>
                        <div class="col-lg-8">
                          <input type="email" id="email" name="email" class="form-control col-lg-6">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Password</label>
                        <div class="col-lg-8">
                          <input type="password" id="password" name="password" class="form-control col-lg-6">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Confirm Password</label>
                        <div class="col-lg-8">
                          <input type="password" id="confirm_password" name="confirm_password" class="form-control col-lg-6">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Date</label>
                        <div class="col-lg-8">
                          <input type="date" id="date" name="date" class="form-control col-lg-6">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Url</label>
                        <div class="col-lg-8">
                          <input type="url" id="url" name="url" class="form-control col-lg-6">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Please agree to our policy</label>
                        <div class="col-lg-8">
                          <input type="checkbox" id="agree" name="agree" class="form-control col-lg-6">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Minimum 3 Chars</label>
                        <div class="col-lg-8">
                          <input type="text" id="minsize" name="minsize" class="form-control col-lg-6">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Maximum 6 Chars</label>
                        <div class="col-lg-8">
                          <input type="text" id="maxsize" name="maxsize" class="form-control col-lg-6">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Minimum 3 </label>
                        <div class="col-lg-8">
                          <input type="text" id="minNum" name="minNum" class="form-control col-lg-6">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Maximum 16 </label>
                        <div class="col-lg-8">
                          <input type="text" id="maxNum" name="maxNum" class="form-control col-lg-6">
                        </div>
                      </div>
                      <div class="form-actions">
                        <input type="submit" value="Validate" class="btn btn-primary">
                      </div>
                    </form>
                  </div>
                </div>
              </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
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
    <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/Uniform.js/2.1.2/jquery.uniform.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.3/jquery.tagsinput.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/autosize.js/1.18.17/jquery.autosize.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.1/js/bootstrap-switch.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.1/js/bootstrap-datepicker.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.0.1/js/bootstrap-colorpicker.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js"></script>

    <!--Bootstrap -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <!-- MetisMenu -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/metisMenu/1.1.3/metisMenu.min.js"></script>

    <!-- Screenfull -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/screenfull.js/2.0.0/screenfull.min.js"></script>
    <script src="<?php echo URL_LIB;?>inputlimiter/jquery.inputlimiter.js"></script>
    <script src="<?php echo URL_LIB;?>validVal/js/jquery.validVal.min.js"></script>
    <script src="<?php echo URL_LIB;?>bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Metis core scripts -->
    <script src="<?php echo URL_JS;?>core.min.js"></script>

    <!-- Metis demo scripts -->
    <script src="<?php echo URL_JS;?>app.js"></script>
    <script>
    $(function() {
        //Metis.formGeneral();
		$('.personal_photo').on("change",function(){
			console.log('123');
			var file_data = $(this).prop('files')[0];
			var file_size=$(this).prop('files')[0].size;
			var file_size_limit=3000000;
			console.log('123');
			if(file_size<file_size_limit){
				console.log('456');
				var fd = new FormData();
					fd.append("personal_photo", file_data);
	
				$.ajax({
					type: "POST",
					url:"upload_personal_photo",
					enctype: 'multipart/form-data',
					data: fd,
					processData: false,
					contentType: false,
					success: function (rep) {
						var info = jQuery.parseJSON(rep);
						console.log(rep);
					}
				});
			}
			else{
				alert("不好意思，您的圖片檔案超過3M，請將在檔案縮小後再進行上傳。");
			}
		});
    });
    </script>
    <script src="<?php echo URL_JS;?>style-switcher.min.js"></script>
  </body>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>首頁</title>

    <!-- core CSS -->
    <link href="<?php echo URL_CSS;?>/main.css" rel="stylesheet">
    <link href="<?php echo URL_CSS;?>/bootstrap.css" rel="stylesheet">
    <link href="<?php echo URL_CSS;?>/bootstrap-theme.css" rel="stylesheet">
    <link href="<?php echo URL_CSS;?>/font-awesome.css" rel="stylesheet">
    <link href="<?php echo URL_CSS;?>/rotate.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URL_CSS;?>/slider.css" type="text/css">
    <link type="text/css" rel="stylesheet" href="<?php echo URL_CSS;?>/liquidcarousel.css" />


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.0.custom.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-tabs-rotate.js"></script>
    <script src="js/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="js/jquery.liquidcarousel.pack.js"></script>
    <script src="js/backtop.js"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            $("#featured").tabs({
                fx: {
                    opacity: "toggle"
                }
            }).tabs("rotate", 5000, true);


            $('.flexslider').flexslider({
                animation: 'fade',
                controlsContainer: '.flexslider'
            });

            //每日推薦影音
            $('#flexslider02').flexslider({
                animation: 'fade',
                controlsContainer: '＃flexslider03'
            });
            //            $('#liquid1').liquidcarousel({
            //                height: 225, //the height of the list
            //                duration: 500, //the duration of the animation
            //                hidearrows: true //hide arrows if all of the list items are visible
            //            });


            $(function () {
                $('.indexcolright-head > div').each(function (i) {
                    var _i = i;

                    // 綁定click事件到頁籤上，若要改為滑鼠移入切換頁籤的話，將click改為mouseenter
                    $(this).click(function () {
                        // 移除其他頁籤的class，並將class新增至目前頁籤
                        $(this).parent().children().removeClass('select').eq(_i).addClass('select');
                        // 隱藏其他頁籤的內容，並顯示目前頁籤的內容
                        $('.indexnews-brief').children('div').hide().eq(_i).show();
                    });
                });
            })


//            $(function () {
//                $('.impiimg').unslider();
//            });

$('.impiimg').unslider({
	speed: 500,               //  The speed to animate each slide (in milliseconds)
	delay: 3000,              //  The delay between slide animations (in milliseconds)
	complete: function() {},  //  A function that gets called after every slide animation
	keys: true,               //  Enable keyboard (left, right) arrow shortcuts
	dots: true,               //  Display dot navigation
	fluid: false              //  Support responsive design. May break non-responsive designs
});
            
        });
    </script>



</head>

<!--/head-->

<body>

    <!-- top sample 
   
    <div class="full-wrapper">
    		<div class="wrapper"></div>
    </div>
    
    -->


    <!-- 版頭區塊開始 －－－－－－－－－－  -->

    <!-- top-header -->

    <div class="outer-header">
        <div class="header">
            <div class="hlogo"><img src="images/logo.png">
            </div>
            <div class="hsscollum">
                <div class="hc-search">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input class="form-control" value="搜尋" type="text">
                            <a class="searchicon" href="#"><img src="images/searchicon.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="hc-share">
                    <a href="#"><img src="images/sharefb.png">
                    </a>
                    <a href="#"><img src="images/sharemail.png">
                    </a>
                    <a href="#"><img src="images/sharerss.png">
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- top menu -->
    <div class="outer-hmenu">
        <div class="hmenu">
            <div class="hmenu-left">
                <ul>
                    <li><a href="index.php">首頁</a>
                    </li>
                    <li><a href="about.html">創辦理念</a>
                    </li>
                    <li><a href="software.html">理財軟體</a>
                    </li>
                    <li>
                        <a href="full-lectural.html">專欄作家</a>
                        <ul class="radiusall shadowall">
                            <li><a href="lectural.html">張老師</a>
                            </li>
                            <li><a href="lectural.html">林老師</a>
                            </li>
                            <li><a href="lectural.html">王老師</a>
                            </li>
                            <li><a href="lectural.html">劉老師</a>
                            </li>
                            <li><a href="lectural.html">陳老師</a>
                            </li>
                            <li><a href="lectural.html">張老師</a>
                            </li>
                            <li><a href="lectural.html">張老師</a>
                            </li>
                            <li><a href="lectural.html">林老師</a>
                            </li>
                            <li><a href="lectural.html">王老師</a>
                            </li>
                            <li><a href="lectural.html">劉老師</a>
                            </li>
                            <li><a href="lectural.html">陳老師</a>
                            </li>
                            <li><a href="lectural.html">張老師</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="finance.html">財經數據</a>
                    </li>
                    <li><a href="market.html">商城</a>
                    </li>
                    <li><a href="course.html">課程</a>
                    </li>
                    <li><a href="video.html">影音</a>
                    </li>
                    <li><a href="contactus.html">客服信箱</a>
                    </li>
                </ul>
            </div>
            <div class="hmenu-right">
                <ul>
                    <li class="mailpart">
                        <a href="member02.html"><img src="images/mailicon.png">
                        </a>
                    </li>
                    <li>
                        <a href="member.html"><img src="images/headlogin.png"> 登入</a>
                    </li>
                    <li><a href="member.html">註冊</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <!-- main-slide -->
    <div class="outer-mainslide">
        <div class="main-slide">



            <div class="flex-containertop">

                <div id="topslide" class="flexslider">
                    <ul class="slides">
                        <li>
                            <a href="#">

                                <p>
                                    第一個banner第一個banner第一個banner
                                </p>
                                <img src="images/bannerimg.jpg">

                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <p>
                                    人氣新品001人氣新品001人氣新品001
                                </p>
                                <img src="images/bannerimg.jpg">
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <p>
                                    人氣新品001人氣新品001人氣新品001
                                </p>
                                <img src="images/bannerimg.jpg">

                            </a>
                        </li>

                    </ul>
                </div>

            </div>


            <div class="impinfo">
                <div class="impiimg">
                   
                    <ul>
                        <li>
                            <a href="#">
                                <div class="playicon"><img src="images/videofloaticon.png">
                                </div>
                                <img src="images/majorvideo.jpg">
                            </a>
                            <div class="impititle">
                                書籍推薦：XXXX好書不推嗎, 病毒行銷全攻略
                            </div>
                        </li>
                        <li>
                            <a href="#">
                                <div class="playicon"><img src="images/videofloaticon.png">
                                </div>
                                <img src="images/majorvideo.jpg">
                            </a>
                            <div class="impititle">
                                書籍推薦：XXXX好書不推嗎, 病毒行銷全攻略
                            </div>
                        </li>
                        <li>
                            <a href="#">
                                <div class="playicon"><img src="images/videofloaticon.png">
                                </div>
                                <img src="images/majorvideo.jpg">
                            </a>
                            <div class="impititle">
                                書籍推薦：XXXX好書不推嗎, 病毒行銷全攻略
                            </div>
                        </li>

                    </ul>

                </div>
                
                <!--            <div class="imparrow" ><a href="#"><</a> <a href="#">></a></div>-->
            </div>
        </div>
    </div>

    <div class="outer-instmeaasge">
        <div class="instmeaasge">
            <div class="instm-left"><span class="title">即時訊息</span> > <a href="#">每日盤前及盤後分析，且不定期刊登投資報告 , 認真閱讀， 認真學習，一同創造美好未來！！</a>
            </div>
            <div class="instm-right"><img src="images/videoicon.png"> 每日推薦影音</div>
        </div>
    </div>


    <div class="fcontainer">
        <div class="section group fmaincontain">
            <div class="fmc-left col span_3_of_4">
                <div class="indexcol shadowall">
                    <div class="indexcol-head">
                        <div class="indexcol-headtitle">最新文章</div>
                        <div class="indexcol-headmore"><a href="#">更多 more</a>
                        </div>
                    </div>
                    <div class="indexcol-type1">
                        <a href="#">
                            <div class="indexcol-type1-img"><img src="images/t01img.jpg">
                            </div>
                            <div class="indexcol-type1-cont">
                                <span class="title">盤前分析（2014-1208）</span>
                                <span class="content">部分台灣品牌正迎頭趕上 面臨來自中國的劇烈競爭，許多傳統製造背景的企業將未銷，大多在東南亞和其他如雨後春筍般出現的製造 ... </span>
                                <div class="others">
                                    <span class="otherblock grayblk-color radiusall">2015-06-13 整理‧撰文 張良姿</span>
                                    <span class="otherblock redcolor">125人看過</span>
                                </div>
                            </div>
                            <div class="lev-member radiusall shadowall">會員</div>
                            <!-- <div class="lev-normal radiusall shadowall">一般</div>-->
                        </a>
                    </div>


                    <div class="indexcol-type1 graybgcolor">
                        <a href="#">
                            <div class="indexcol-type1-img"><img src="images/t01img.jpg">
                            </div>
                            <div class="indexcol-type1-cont">
                                <span class="title">盤前分析（2014-1208）</span>
                                <span class="content">部分台灣品牌正迎頭趕上 面臨來自中國的劇烈競爭，許多傳統製造背景的企業將未銷，大多在東南亞和其他如雨後春筍般出現的製造 ... </span>
                                <div class="others">
                                    <span class="otherblock grayblk-color radiusall">2015-06-13 整理‧撰文 張良姿</span>
                                    <span class="otherblock redcolor">125人看過</span>
                                </div>
                            </div>
                            <div class="lev-member radiusall shadowall">會員</div>
                            <!-- <div class="lev-normal radiusall shadowall">一般</div>-->
                        </a>
                    </div>


                    <div class="indexcol-type1">
                        <a href="#">
                            <div class="indexcol-type1-img"><img src="images/t01img.jpg">
                            </div>
                            <div class="indexcol-type1-cont">
                                <span class="title">盤前分析（2014-1208）</span>
                                <span class="content">部分台灣品牌正迎頭趕上 面臨來自中國的劇烈競爭，許多傳統製造背景的企業將未銷，大多在東南亞和其他如雨後春筍般出現的製造 ... </span>
                                <div class="others">
                                    <span class="otherblock grayblk-color radiusall">2015-06-13 整理‧撰文 張良姿</span>
                                    <span class="otherblock redcolor">125人看過</span>
                                </div>
                            </div>
                            <div class="lev-member radiusall shadowall">會員</div>
                            <!-- <div class="lev-normal radiusall shadowall">一般</div>-->
                        </a>
                    </div>


                    <div class="indexcol-type2">
                        <a href="#">
                            <div class="indexcol-type2-cont">
                                <div class="title">盤前分析部分台灣品牌正迎頭趕上...</div>
                                <div class="date"><span class="grayblk-color radiusall">2015-06-13</span>
                                </div>
                            </div>
                            <div class="lev-member radiusall shadowall">會員</div>
                        </a>
                    </div>



                    <div class="indexcol-type2">
                        <a href="#">
                            <div class="indexcol-type2-cont">
                                <div class="title">盤前分析部分台灣品牌正迎頭趕上...</div>
                                <div class="date"><span class="grayblk-color radiusall">2015-06-13</span>
                                </div>
                            </div>
                            <!-- <div class="lev-member radiusall shadowall">會員</div>-->
                            <div class="lev-normal radiusall shadowall">一般</div>
                        </a>
                    </div>



                    <div class="indexcol-type2">
                        <a href="#">
                            <div class="indexcol-type2-cont">
                                <div class="title">盤前分析部分台灣品牌正迎頭趕上...</div>
                                <div class="date"><span class="grayblk-color radiusall">2015-06-13</span>
                                </div>
                            </div>
                            <!-- <div class="lev-member radiusall shadowall">會員</div>-->
                            <div class="lev-normal radiusall shadowall">一般</div>
                        </a>
                    </div>



                    <div class="indexcol-type2">
                        <a href="#">
                            <div class="indexcol-type2-cont">
                                <div class="title">盤前分析部分台灣品牌正迎頭趕上...</div>
                                <div class="date"><span class="grayblk-color radiusall">2015-06-13</span>
                                </div>
                            </div>
                            <div class="lev-member radiusall shadowall">會員</div>
                        </a>
                    </div>



                    <div class="indexcol-type2">
                        <a href="#">
                            <div class="indexcol-type2-cont">
                                <div class="title">盤前分析部分台灣品牌正迎頭趕上...</div>
                                <div class="date"><span class="grayblk-color radiusall">2015-06-13</span>
                                </div>
                            </div>
                            <!-- <div class="lev-member radiusall shadowall">會員</div>-->
                            <div class="lev-normal radiusall shadowall">一般</div>
                        </a>
                    </div>

                </div>


                <div class="indexcol shadowall">
                    <div class="indexcol-head">
                        <div class="indexcol-headtitle">熱門快訊</div>
                        <div class="indexcol-headmore"><a href="#">更多 more</a>
                        </div>
                    </div>

                    <div class="indexcol-type3">
                        <a href="#">
                            <div class="indexcol-type3-cont">
                                <div class="title"><span class="status1">Top1</span>盤前分析部分台灣品牌正迎頭趕上...</div>
                            </div>
                        </a>
                    </div>

                    <div class="indexcol-type3">
                        <a href="#">
                            <div class="indexcol-type3-cont">
                                <div class="title"><span class="status1">Top2</span>盤前分析部分台灣品牌正迎頭趕上...</div>
                            </div>
                        </a>
                    </div>

                    <div class="indexcol-type3">
                        <a href="#">
                            <div class="indexcol-type3-cont">
                                <div class="title"><span class="status1">Top3</span>盤前分析部分台灣品牌正迎頭趕上...</div>
                            </div>
                        </a>
                    </div>

                    <div class="indexcol-type3">
                        <a href="#">
                            <div class="indexcol-type3-cont">
                                <div class="title"><span class="status2">Top4</span>盤前分析部分台灣盤前分析部分台灣品牌正迎頭趕上品牌正迎頭趕上...</div>
                            </div>
                        </a>
                    </div>

                    <div class="indexcol-type3">
                        <a href="#">
                            <div class="indexcol-type3-cont">
                                <div class="title"><span class="status2">Top5</span>盤前分析部分台灣品牌正迎頭趕上...</div>
                            </div>
                        </a>
                    </div>

                </div>


                <div class="colbox">
                    <img src="images/bannermed.jpg">
                </div>


                <div class="indexcol shadowall">
                    <div class="indexcol-head">
                        <div class="indexcol-headtitle">重點課程</div>
                        <div class="indexcol-headmore"><a href="course.html">更多 more</a>
                        </div>
                    </div>

                    <div class="indexcol-type6">
                        <a href="courseinp.html">
                            <div class="indexcol-type6-cont">
                                <div class="imghead"><img src="images/majorcourseimg.jpg">
                                    <div class="date">2015/08/28</div>
                                </div>
                                <div class="intro">病毒行銷全攻略-公式解病毒行銷病毒行銷病毒行銷 ...</div>
                            </div>
                        </a>

                        <a href="courseinp.html">
                            <div class="indexcol-type6-cont">
                                <div class="imghead "><img src="images/majorcourseimg.jpg">
                                    <div class="date">2015/08/28</div>
                                </div>
                                <div class="intro">病毒行銷全攻略-公式解病毒行銷病毒行銷病毒行銷 ...</div>
                            </div>
                        </a>

                        <a href="courseinp.html">
                            <div class="indexcol-type6-cont">
                                <div class="imghead "><img src="images/majorcourseimg.jpg">
                                    <div class="date">2015/08/28</div>
                                </div>
                                <div class="intro">病毒行銷全攻略-公式解病毒行銷病毒行銷病毒行銷 ...</div>
                            </div>
                        </a>

                        <a href="courseinp.html">
                            <div class="indexcol-type6-cont">
                                <div class="imghead "><img src="images/majorcourseimg.jpg">
                                    <div class="date">2015/08/28</div>
                                </div>
                                <div class="intro">病毒行銷全攻略-公式解病毒行銷病毒行銷病毒行銷 ...</div>
                            </div>
                        </a>

                    </div>
                </div>


                <div class="indexcol shadowall">
                    <div class="indexcol-head">
                        <div class="indexcol-headtitle">重點影音</div>
                        <div class="indexcol-headmore"><a href="video.html">更多 more</a>
                        </div>
                    </div>

                    <div class="indexcol-type7">
                        <a href="videoinp.html">
                            <div class="indexcol-type7-cont">
                                <div class="imghead "><img src="images/majorvideo.jpg">
                                    <div class="play"><img src="images/videofloaticon.png">
                                    </div>
                                </div>
                                <div class="intro">
                                    <span class="title">病毒行銷全攻略-公式解構</span>
                                    <span class="text">病毒行銷全病毒行銷 ...</span>
                                </div>
                            </div>
                        </a>

                        <a href="videoinp.html">
                            <div class="indexcol-type7-cont">
                                <div class="imghead "><img src="images/majorvideo.jpg">
                                    <div class="play"><img src="images/videofloaticon.png">
                                    </div>
                                </div>
                                <div class="intro">
                                    <span class="title">病毒行銷全攻略-公式解構</span>
                                    <span class="text">病毒行銷全攻略-公式解病毒行銷病毒行銷病毒行銷 ...</span>
                                </div>
                            </div>
                        </a>

                        <a href="videoinp.html">
                            <div class="indexcol-type7-cont">
                                <div class="imghead "><img src="images/majorvideo.jpg">
                                    <div class="play"><img src="images/videofloaticon.png">
                                    </div>
                                </div>
                                <div class="intro">
                                    <span class="title">病毒行銷全攻略-公式解構</span>
                                    <span class="text">病毒行銷全攻略-公式解病毒行銷病毒行銷病毒行銷 ...</span>
                                </div>
                            </div>
                        </a>


                    </div>
                </div>



            </div>






            <div class="fmc-right col span_1_of_4">

                <div class="indexcol shadowall">
                    <div class="indexcolright-head">
                        <div class="indexcolright-headtitle"><a href="#">最新消息</a>
                        </div>
                        <div class="indexcolright-headtitle02"><a href="#">說明會</a>
                        </div>
                    </div>

                    <div class="indexnews-brief">
                        <div>
                            <div class="indexcol-type4">
                                <a href="#">
                                    <div class="indexcol-type4-cont">
                                        <div class="title"><span class="status1">Top1</span>盤前分析部品牌正...</div>
                                    </div>
                                </a>
                            </div>

                            <div class="indexcol-type4">
                                <a href="#">
                                    <div class="indexcol-type4-cont">
                                        <div class="title"><span class="status1">Top2</span>盤前台灣品牌正迎...</div>
                                    </div>
                                </a>
                            </div>

                            <div class="indexcol-type4">
                                <a href="#">
                                    <div class="indexcol-type4-cont">
                                        <div class="title"><span class="status1">Top3</span>盤前分析部牌正...</div>
                                    </div>
                                </a>
                            </div>

                            <div class="indexcol-type4">
                                <a href="#">
                                    <div class="indexcol-type4-cont">
                                        <div class="title"><span class="status2">Top4</span>盤前分析部分析部趕上品牌正迎頭</div>
                                    </div>
                                </a>
                            </div>

                            <div class="indexcol-type4">
                                <a href="#">
                                    <div class="indexcol-type4-cont">
                                        <div class="title"><span class="status2">Top5</span>盤前分析部分台灣品牌正迎</div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div>
                            <div class="indexcol-type4">
                                <a href="#">
                                    <div class="indexcol-type4-cont">
                                        <div class="title"><span class="status1">Top1</span>02盤前分析部品牌正...</div>
                                    </div>
                                </a>
                            </div>

                            <div class="indexcol-type4">
                                <a href="#">
                                    <div class="indexcol-type4-cont">
                                        <div class="title"><span class="status1">Top2</span>盤前台灣品牌正迎...</div>
                                    </div>
                                </a>
                            </div>

                            <div class="indexcol-type4">
                                <a href="#">
                                    <div class="indexcol-type4-cont">
                                        <div class="title"><span class="status1">Top3</span>盤前分43434析部牌正...</div>
                                    </div>
                                </a>
                            </div>

                            <div class="indexcol-type4">
                                <a href="#">
                                    <div class="indexcol-type4-cont">
                                        <div class="title"><span class="status2">Top4</span>析部分析部趕上品牌正迎頭</div>
                                    </div>
                                </a>
                            </div>

                            <div class="indexcol-type4">
                                <a href="#">
                                    <div class="indexcol-type4-cont">
                                        <div class="title"><span class="status2">Top5</span>析部分台灣品牌正迎</div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>



                <div class="colbox">
                    <img src="images/fbbb.jpg">
                </div>


                <div class="indexcol shadowall">
                    <div class="indexcol-head">
                        <div class="indexcol-headtitle">專欄作家</div>
                        <div class="indexcol-headmore"><a href="#">更多 more</a>
                        </div>
                    </div>

                    <div class="indexcol-type5">
                        <a href="#">
                            <div class="indexcol-type5-cont">
                                <div class="imghead shadowall"><img src="images/headbio.jpg">
                                </div>
                                <div class="title">劉七七</div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="indexcol-type5-cont">
                                <div class="imghead shadowall"><img src="images/headbio.jpg">
                                </div>
                                <div class="title">劉七七</div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="indexcol-type5-cont">
                                <div class="imghead shadowall"><img src="images/headbio.jpg">
                                </div>
                                <div class="title">劉七七</div>
                            </div>
                        </a>


                        <a href="#">
                            <div class="indexcol-type5-cont">
                                <div class="imghead shadowall"><img src="images/headbio.jpg">
                                </div>
                                <div class="title">劉七七</div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="indexcol-type5-cont">
                                <div class="imghead shadowall"><img src="images/headbio.jpg">
                                </div>
                                <div class="title">劉七七</div>
                            </div>
                        </a>


                        <a href="#">
                            <div class="indexcol-type5-cont">
                                <div class="imghead shadowall"><img src="images/headbio.jpg">
                                </div>
                                <div class="title">劉七七</div>
                            </div>
                        </a>


                    </div>

                </div>


                <div class="colbox">
                    <img src="images/gooads.jpg">
                </div>

                <div class="colbox">
                    <img src="images/gooads.jpg">
                </div>

            </div>

        </div>

        <a href="#0" class="back-top"></a>

    </div>
    <!-- 內容區塊開始 －－－－－－－－－－  -->


    <div class="outer-footer">
        <div class="pfooter section group">

            <div class="copyright col span_5_of_6">
                <p>讀者服務專線：886-2-2662-0332　傳真電話：886-2-2662-6048　 服務時間：週一～週五：9:00~17:30</p>
                <p>本網站資訊 由實戰操盤室所有 若有任何建議或疑問請與我們連繫 Copyright © MakeMoney All Rights Reserved</p>
            </div>

            <div class="share col span_1_of_6">
                <p>追蹤實戰操盤室 +</p>
                <a class="shareablk" href="#"><img src="images/sharerss.png">
                </a>
                <a class="shareablk" href="#"><img src="images/sharemail.png">
                </a>
                <a class="shareablk" href="#"><img src="images/sharefb.png">
                </a>
            </div>

        </div>
    </div>





    <!-- 版頭區塊結束 －－－－－－－－－－  -->







    <!-- 版尾結束 －－－－－－－－－－  -->









</body>

</html>
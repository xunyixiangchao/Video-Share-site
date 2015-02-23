<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="cn" class="app">
<head>  
  <meta charset="utf-8" />
  <title>影视资源分享平台</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="/share/Public/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="/share/Public/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="/share/Public/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="/share/Public/css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="/share/Public/css/font.css" type="text/css" />
  <link rel="stylesheet" href="/share/Public/css/app.css" type="text/css" />  
    <!--[if lt IE 9]>
    <script src="/share/Public/js/ie/html5shiv.js"></script>
    <script src="/share/Public/js/ie/respond.min.js"></script>
    <script src="/share/Public/js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body class="">
  <section class="vbox">

<header class="bg-white-only header header-md navbar navbar-fixed-top-xs">
      <div class="navbar-header aside bg-info nav-xs">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="icon-list"></i>
        </a>
        <a href="/share/home" class="navbar-brand text-lt">
          <i class="icon-grid"></i>
          <img src="/share/Public/images/logo.png" alt="." class="hide">
          <span class="hidden-nav-xs m-l-sm">MV Share</span>
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
          <i class="icon-settings"></i>
        </a>
      </div>      <ul class="nav navbar-nav hidden-xs">
        <li>
          <a href="#nav,.navbar-header" data-toggle="class:nav-xs,nav-xs" class="text-muted">
            <i class="fa fa-indent text"></i>
            <i class="fa fa-dedent text-active"></i>
          </a>
        </li>
      </ul>
      <form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search"  action="/share/home/movie/mlist" method="get">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-sm bg-white btn-icon rounded"><i class="fa fa-search"></i></button>
            </span>
            <input name="name" type="text" class="form-control input-sm no-border rounded" placeholder="搜索影视资源..." value="<?php echo ($searchname); ?>">
          </div>
        </div>
      </form>
      <div class="navbar-right ">
<?php if(($islogin == 1)): ?><ul class="nav navbar-nav m-n hidden-xs nav-user user">
          <li class="hidden-xs">
            <a href="#" class="dropdown-toggle lt" data-toggle="dropdown">
              <i class="icon-bell"></i>
              <?php if(($messagemember != 0)): ?><span class="badge badge-sm up bg-danger count" style="display: inline-block;"><?php echo ($messagemember); ?></span><?php endif; ?>
            </a>
            <section class="dropdown-menu aside-xl animated fadeInUp">
              <section class="panel bg-white">
                <div class="panel-heading b-light bg-light">
                  <strong>你有 <span class="count" style="display: inline;"><?php echo ($messagemember); ?></span> 个提醒</strong>
                </div>
                <div class="list-group list-group-alt">
<?php if(is_array($messagelist)): $i = 0; $__LIST__ = $messagelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mdata): $mod = ($i % 2 );++$i;?><a href="/forum/home.php?mod=space&do=pm&subop=view&plid=<?php echo ($mdata["plid"]); ?>" class="media list-group-item">
                    <span class="pull-left thumb-sm text-center">
                      <i class="fa fa-envelope-o fa-2x text-success"></i>
                    </span>
                    <span class="media-body block m-b-none">
                      <?php echo ($mdata["lastauthor"]); ?>发送消息:<?php echo ($mdata["lastsummary"]); ?><br>
                      <small class="text-muted">
<?php switch($mdata["daterange"]): case "1": ?>今天<?php break;?>
    <?php case "2": ?>昨天<?php break;?>
    <?php case "3": ?>前天<?php break;?>
    <?php case "4": ?>上周<?php break;?>
    <?php case "5": ?>更早<?php break;?>
    <?php default: ?>未知时间<?php endswitch;?>
</small>
                    </span>
                  </a><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="panel-footer text-sm">
                  <a href="/forum/home.php?mod=space&do=pm&subop=setting" class="pull-right"><i class="fa fa-cog"></i></a>
                  <a href="/forum/home.php?mod=space&do=pm">进入短消息中心</a>
                </div>
              </section>
            </section>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle bg clear" data-toggle="dropdown">
              <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                <img src="/ucenter/avatar.php?uid=<?php echo ($uid); ?>&type=virtual&size=middle" alt="...">
              </span>
              <?php echo ($username); ?> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu animated fadeInRight">            
              <li>
                <span class="arrow top"></span>
                <a href="#">设置</a>
              </li>
              <li>
                <a href="/share/home/user/profile/uid/<?php echo ($uid); ?>">主页</a>
              </li>
              <li>
                <a href="/forum/home.php?mod=space&do=pm">
                  <?php if(($messagemember != 0)): ?><span class="badge bg-danger pull-right"><?php echo ($messagemember); ?></span><?php endif; ?>
                  消息
                </a>
              </li>
              <li>
                <a href="docs.html">帮助</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="/share/home/user/logout">注销</a>
              </li>
            </ul>
          </li>
        </ul>
<?php else: ?>
<ul class="nav navbar-nav m-n hidden-xs nav-user user">
          <li class="">
              <a href="#modal-login" data-toggle="modal">登录</a>
          </li>
<li class="">
            <a href="/share/home/user/register">
              注册
            </a>
          </li>
        </ul><?php endif; ?>
      </div>      
    </header>

<section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-black dk aside hidden-print nav-xs" id="nav">          
          <section class="vbox">
            <section class="w-f-md scrollable">
              <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 78px;"><div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railopacity="0.2" style="overflow: hidden; width: auto; height: 78px;">
                


                <!-- nav -->                 
                <nav class="nav-primary hidden-xs">
                  <ul class="nav bg clearfix">
                    <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted">
                      导航
                    </li>
                    <li>
                      <a href="/share/home">
                        <i class="icon-speedometer icon text-success"></i>
                        <span class="font-bold">动态</span>
                      </a>
                    </li>
                    <li>
                      <a href="/share/home/movie/mlist">
                        <i class="icon-film icon text-info"></i>
                        <span class="font-bold">影视</span>
                      </a>
                    </li>
                    <li>
                      <a href="/share/home/movie/wish">
                        <i class="icon-present icon text-primary-lter"></i>
<?php if(!empty($wishnumber)): ?><b class="badge bg-primary pull-right"><?php echo ($wishnumber); ?></b><?php endif; ?>
                        <span class="font-bold">请愿</span>
                      </a>
                    </li>
                    <li>
                      <a href="/share/home/movie/addtitle">
                        <i class="icon-cloud-upload icon  text-info-dker"></i>
                        <span class="font-bold">上传</span>
                      </a>
                    </li>
                    <!--<li>
                      <a href="/forum">
                        <i class="icon-users icon  text-success"></i>
                        <span class="font-bold">论坛</span>
                      </a>
                    </li>-->
                    <!--<li>
                      <a href="video.html" data-target="#content" data-el="#bjax-el" data-replace="true">
                        <i class="icon-social-youtube icon  text-primary"></i>
                        <span class="font-bold">Video</span>
                      </a>
                    </li> -->
                    <li class="m-b hidden-nav-xs"></li>
                  </ul>
                  
                  <ul class="nav text-sm">
                    <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted">
                      <!--<span class="pull-right"><a href="#"><i class="icon-plus i-lg"></i></a></span> -->
                      播放列表
                    </li>
                    <li>
                      <a href="/share/home/movie/myfa">
                        <i class="icon-star icon"></i>
<?php if(!empty($$myfacount)): ?><b class="badge bg-success dker pull-right"><?php echo ($myfacount); ?></b><?php endif; ?>
                        <span>我的收藏</span>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav text-sm">
                    <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted">
                      <!--<span class="pull-right"><a href="#"><i class="icon-plus i-lg"></i></a></span> -->
                      About
                    </li>
                    <li>
                      <a href="#">
                        <i class="icon-notebook icon"></i>
                        <span>服务条款</span>
                      </a>
                    </li>
                    <li>
                      <a href="/share/home/index/about">
                        <i class="icon-paper-plane icon text-success-lter"></i>
                        
                        <span>关于平台</span>
                      </a>
                    </li>
                  </ul>
                </nav>
                <!-- / nav -->
              </div><div class="slimScrollBar" style="width: 10px; position: absolute; top: -416px; opacity: 0.4; display: none; border-top-left-radius: 7px; border-top-right-radius: 7px; border-bottom-right-radius: 7px; border-bottom-left-radius: 7px; z-index: 99; right: 0px; height: 30px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 10px; height: 100%; position: absolute; top: 0px; display: none; border-top-left-radius: 7px; border-top-right-radius: 7px; border-bottom-right-radius: 7px; border-bottom-left-radius: 7px; opacity: 0.2; z-index: 90; right: 0px; background: rgb(51, 51, 51);"></div></div>
            </section>
<?php if($islogin==1): ?><footer class="footer hidden-xs no-padder text-center-nav-xs">
              <div class="bg hidden-xs ">
                  <div class="dropdown dropup wrapper-sm clearfix">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <span class="thumb-sm avatar pull-left m-l-xs">                        
                        <img src="/ucenter/avatar.php?uid=<?php echo ($uid); ?>&type=virtual&size=middle" class="dker" alt="...">
                        <i class="on b-black"></i>
                      </span>
                      <span class="hidden-nav-xs clear">
                        <span class="block m-l">
                          <strong class="font-bold text-lt"><?php echo ($username); ?></strong> 
                          <b class="caret"></b>
                        </span>
                        <span class="text-muted text-xs block m-l"><?php echo ($username); ?></span>
                      </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight aside text-left">                      
                      <li>
                        <span class="arrow bottom hidden-nav-xs"></span>
                        <a href="#">设置</a>
                      </li>
                      <li>
                        <a href="/share/home/user/profile/uid/<?php echo ($uid); ?>">主页</a>
                      </li>
                      <li>
                        <a href="/forum/home.php?mod=space&do=pm">
                          <?php if($messagemember!=0): ?><span class="badge bg-danger pull-right"><?php echo ($messagemember); ?></span><?php endif; ?>
                          消息
                        </a>
                      </li>
                      <li>
                        <a href="docs.html">帮助</a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="/share/home/user/logout" >注销</a>
                      </li>
                    </ul>
                  </div>
                </div>            </footer><?php endif; ?>
          </section>
        </aside>
        <!-- /.aside -->
	<script type="text/javascript" src="/share/Public/js/jquery-2.0.2.js"></script>
    <script type="text/javascript" src="/share/Public/ueditor/ueditor.config.js"></script>    
    <script type="text/javascript" src="/share/Public/ueditor/ueditor.all.min.js"></script>
    <script>
    $(function(){
        var ue = UE.getEditor('container',{
            serverUrl :'<?php echo U('Home/editor/ueditor');?>'
        });
    })
    </script>
<section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <div class="m-b-md">
                <h3 class="m-b-none">影视资源编辑-<?php echo ($movieinfo["name"]); ?></h3>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <section class="panel panel-default">
                    <div class="alert alert-warning alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <h4><i class="fa fa-bell-alt"></i>注意!</h4>
                      <p>内容审核后才会显示</p>
                    </div>
                    <div class="panel-body">
                      <form role="form" class="form-horizontal" method="post" action="/share/home/movie/editcontentdeal/movieid/<?php echo ($movieinfo["id"]); ?>" enctype="multipart/form-data" id="gform">
<div class="form-group">
                      <label class="col-sm-2 control-label">视频信息</label>
                      <div class="col-sm-10">
                        <div class="btn-toolbar m-b-sm btn-editor" data-role="editor-toolbar" data-target="#editor">
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" title="字体大小"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                              <ul class="dropdown-menu">
                              <li><a data-edit="fontSize 5" style="font-size:24px">大</a></li>
                              <li><a data-edit="fontSize 3" style="font-size:18px">中</a></li>
                              <li><a data-edit="fontSize 1" style="font-size:14px">小</a></li>
                              </ul>
                          </div>
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm" data-edit="bold" title="加粗 (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="italic" title="倾斜 (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="strikethrough" title="删除线"><i class="fa fa-strikethrough"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="underline" title="下划线 (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                          </div>
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm" data-edit="insertunorderedlist" title="列表"><i class="fa fa-list-ul"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="insertorderedlist" title="数字列表"><i class="fa fa-list-ol"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="outdent" title="减少缩进 (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="indent" title="缩进 (Tab)"><i class="fa fa-indent"></i></a>
                          </div>
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm" data-edit="justifyleft" title="靠左 (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="justifycenter" title="居中 (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="justifyright" title="靠右 (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="justifyfull" title="正文 (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                          </div>
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" title="超链接"><i class="fa fa-link"></i></a>
                            <div class="dropdown-menu">
                              <div class="input-group m-l-xs m-r-xs">
                                <input class="form-control input-sm" placeholder="URL" type="text" data-edit="createLink"/>
                                <div class="input-group-btn">
                                  <button class="btn btn-default btn-sm" type="button">添加</button>
                                </div>
                              </div>
                            </div>
                            <a class="btn btn-default btn-sm" data-edit="unlink" title="移除链接"><i class="fa fa-cut"></i></a>
                          </div>
                          
                          <div class="btn-group hide">
                            <a class="btn btn-default btn-sm" title="添加图片 (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                            <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
                          </div>
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm" data-edit="undo" title="撤销 (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="redo" title="还原 (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                          </div>
                        </div>
                        <div id="editor" class="form-control" style="overflow:scroll;height:350px;max-height:350px">
<?php echo ((isset($mvcontent["intro"]) && ($mvcontent["intro"] !== ""))?($mvcontent["intro"]):"<p>◎译　　名　<br>◎片　　名　<br>◎年　　代　<br>◎国　　家　<br>◎类　　别　<br>◎语　　言　<br>◎字　　幕　<br>◎IMDB评分 <br>◎文件格式　<br>◎视频尺寸　<br>◎文件大小　<br>◎片　　长　<br>◎导　　演　<br>◎主　　演　<br></p>"); ?>
                        </div>
                      </div>
                    </div>
<input name="intro" type="hidden" id="information"/>
                        <div class="line line-dashed b-b line-lg pull-in"></div>
<div class="form-group">
                      <label class="col-sm-2 control-label">视频简介</label>
                      <div class="col-sm-10">
                        <script id="container" name="content" type="text/plain" style="width:100%;height:400px"><?php echo ($mvcontent["content"]); ?></script>
                      </div>
                    </div>
                        <div class="line line-dashed b-b line-lg pull-in"></div>
                        <div class="form-group">
                          <div class="col-sm-4 col-sm-offset-2">
                            <button type="submit" class="btn btn-primary">完成</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </section>
                </div>
              </div>
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>
      </section>
    </section>
  </section>
<script src="/share/Public/js/jquery.min.js"></script>
  <!-- Bootstrap -->
<script src="/share/Public/js/bootstrap.js"></script>
<script src="/share/Public/js/wysiwyg/jquery.hotkeys.js"></script>
<script src="/share/Public/js/wysiwyg/bootstrap-wysiwyg.js"></script>
<script>
$(function(){
  function initToolbarBootstrapBindings() {
    $('a[title]').tooltip({container:'body'});
  	$('.dropdown-menu input').click(function() {return false;})
	    .change(function () {$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');})
      .keydown('esc', function () {this.value='';$(this).change();});

    $('[data-role=magic-overlay]').each(function () { 
      var overlay = $(this), target = $(overlay.data('target')); 
      overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
    });
    if ("onwebkitspeechchange" in document.createElement("input")) {
      var editorOffset = $('#editor').offset();
    } else {
      $('#voiceBtn').hide();
    }
	};
	function showErrorAlert (reason, detail) {
		var msg='';
		if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
		else {
			console.log("error uploading file", reason, detail);
		}
		$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
		 '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
	};
  initToolbarBootstrapBindings();  
	$('#editor').wysiwyg({ fileUploadError: showErrorAlert} );
});
$('#gform').submit(function() {
  $('#information').val($('#editor').html())
});
</script>
  <!-- App -->
  <script src="/share/Public/js/app.js"></script>  
  <script src="/share/Public/js/slimscroll/jquery.slimscroll.min.js"></script>
<?php if($islogin==0): ?><div class="modal fade" id="modal-login" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body wrapper-lg">
          <div class="row">
            <div class="col-sm-6 b-r">
              <h3 class="m-t-none m-b">登录</h3>
              <p>登录后将可以上传、下载、请愿视频资源</p>
              <form role="form"  action="/share/home/user/login" method="get">
                <div class="form-group">
                  <label>用户名</label>
                  <input name="username" class="form-control" placeholder="请输入用户名">
                </div>
                <div class="form-group">
                  <label>密码</label>
                  <input name="password" type="password" class="form-control" placeholder="请输入密码">
                </div>
                <div class="checkbox m-t-lg">
                  <button type="submit" class="btn btn-sm btn-success pull-right text-uc m-t-n-xs"><strong>登录</strong></button>
                  
                </div>                
              </form>
            </div>
            <div class="col-sm-6">
              <h4>没有账户？</h4>
              <p>点击<a href="/share/home/user/register" class="text-info">这里</a>注册一个帐号</p>
            </div>
          </div>          
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><?php endif; ?>
    <script src="/share/Public/js/app.plugin.js"></script>
    <script src="/share/Public/js/own.js"></script>
<div style="display:none"><!--<script src='http://' language='JavaScript' charset='gb2312'></script> --></div>
</body>
</html>
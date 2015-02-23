<?php if (!defined('THINK_PATH')) exit();?>
<script type='text/javascript' src='/share/Public/js/jquery-ui/external/jquery/jquery.js'></script>
<script type="text/javascript" src="/share/Public/js/jquery-ui/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="/share/Public/js/jquery-ui/jquery-ui.css">
<script type='text/javascript' src="/share/Public/js/plupload.full.min.js"></script>
<script type='text/javascript' src="/share/Public/js/jquery.ui.plupload/jquery.ui.plupload.min.js"></script>
<script src="/share/Public/js/i18n/zh_CN.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="/share/Public/js/jquery.ui.plupload/css/jquery.ui.plupload.css">
<script type='text/javascript'>//<![CDATA[ 

$(document).ready(function() {
	$("#uploader").plupload({
		// General settings
		runtimes: 'html5,flash,silverlight,html4',
		
		// Fake server response here 
		// url : '../upload.php',
		url: "/upload.php",

		// Maximum file size
		max_file_size: '3000mb',

		// User can upload no more then 20 files in one go (sets multiple_queues to false)
		max_file_count: 20,
		
		chunk_size: '1mb',
                container:  'div',
		// Resize images on clientside if we can
		/*resize : {
			width: 200, 
			height: 200, 
			quality: 90,
			crop: true // crop to exact dimensions
		},*/

		// Specify what files to browse for
		filters: [
			{ title: "Video files", extensions:  "flv,mkv,avi,rm,rmvb,mpeg,mpg,mov,wmv,mp4,webm" }
		],

		// Rename files by clicking on their titles
		rename: true,
		unique_names : true,
		// Sort files
		sortable: true,

		// Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)
		dragdrop: true,

		// Views to activate
		views: {
			list: true,
			thumbs: true, // Show thumbs
			active: 'list'
		},

		// Flash settings
		flash_swf_url : '/share/Public/js/Moxie.swf',

		// Silverlight settings
		silverlight_xap_url : '/share/Public/js/Moxie.xap'/*,


		    ready : function(event,args) {
      			  var uploader = $('#uploader').plupload('getUploader');
       			 uploader.bind("UploadComplete", function(up, file) {
       			     //var json = JSON.parse(response.response); // now I have json object
				   for (var i in file) {
        				//alert(file[i].id);      alert(file[i].name);   
   				}
     			   });
   			 }*/




	});



	//$("#uploader").plupload.bind('UploadProgress', 
//function(up, 
//file) 
//{ $('#filelist').innerHTML = '' + file.percent + "%"; });





	// Handle the case when form was submitted before uploading has finished
	$('#form').submit(function(e) {
		// Files in queue upload them first
		if ($('#uploader').plupload('getFiles').length > 0) {

			// When all files are uploaded submit form
			$('#uploader').on('complete', function() {
				/*for (var i in $('#uploader').plupload('getFiles')){
					//alert($('#uploader').plupload('getFiles')[i].id);
					//alert($('#uploader').plupload('getFiles')[i].name);
					var input = document.createElement("input");
					input.type = 'hidden';
					input.name = 'name[]';
					input.value = $('#uploader').plupload('getFiles')[i].name;
					document.getElementById("form").appendChild(input);
					input.name = 'id[]';
					input.value = $('#uploader').plupload('getFiles')[i].id;
					document.getElementById("form").appendChild(input);
				}*/
				$('#form')[0].submit();
			});

			$('#uploader').plupload('start');
		} else {
			alert("请先上传文件");
		}
		return false; // Keep the form from submitting


	});





});

//]]>  

</script>

<form id="form" method="post" action="/share/home/upload/deal/movieid/<?php echo ($movieid); ?>" target="_parent">
	<div id="uploader">
		<p>上传功能加载失败，可能您的浏览器不支持 Flash, Silverlight 或 HTML5，请尝试更换浏览器。</p>
	</div>
	<br />
	<input type="submit" value="完成" />
</form>
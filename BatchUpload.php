<?php
	ini_set("display_errors", "On");
	require_once("DB_class.php");
	require_once("history.php");
	$db = new DB();
	$db->connect_db();
	if (isset($_POST["send"]))
	{
		$leadExcel=$_POST["leadExcel"];
	
		if($leadExcel == "true")
		{

			//獲取上傳的文件名

			$filename = $_FILES['inputExcel']['name'];

			//上傳到服務器上的臨時文件名
			$tmp_name = $_FILES['inputExcel']['tmp_name'];
			$msg = uploadFile($filename,$tmp_name);
		}
	}

	if (isset($_POST["sendZip"]))
	{
	
		$leadZip=$_POST["leadZip"];

		if($leadZip == "300000000")
		{
	  
			//獲取上傳的文件名

			$filename = $_FILES['inputPictureZip']['name'];

			//上傳到服務器上的臨時文件名
			$tmp_name = $_FILES['inputPictureZip']['tmp_name'];
			$msg = uploadZip($filename,$tmp_name);
		}
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="generator"
		content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>TuPort - Batch Upload</title>
	</head>
	<body>
		<form>
			<input type="hidden" id="lan" value="en" /> 
		<!--<link rel="shortcut icon" href="image/favicon2.ico" type="image/x-icon" />--></form>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="short icon" href="templates/images/miad-icon.ico" type="image/x-icon" />
		<link href="mui-0.4.7/css/mui.css" rel="stylesheet" type="text/css" />
		<link href="codepen/css/menu.css" rel="stylesheet" type="text/css" />
		<link href="codepen/css/popup.css" rel="stylesheet" type="text/css" />
		<link href="font-awesome-4.5.0/css/font-awesome.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="templates/css/menuTab.css" type="text/css" />
		<link rel="stylesheet" href="templates/css/pagination.css" type="text/css" />
		<link href="templates/css/style.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="templates/css/bootstrap-table.min.css" />
		<!--<link rel="stylesheet" href="templates/css/bootstrap.min.css">-->
		<!--<link rel="stylesheet" href="templates/css/bootstrap3.css">-->
		<link rel="stylesheet" href="templates/css/kwic.css" />
		<!--test-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
		<script src="http://cdn.tinymce.com/4/tinymce.min.js"></script> 
		<script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script> 
		<!--test--> 
		<!--older version jquery==<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>--> 
		<!-- algolia search<link rel="stylesheet" href="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.css"> <link rel="stylesheet" type="text/css" href="templates/css/algolia.css"> <script src="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.js"></script> <script src="js/algolia.js"></script> <!==end algolia search-->
  
		<script src="mui-0.4.7/js/mui.js"></script> 
		<!--<script src="js/bootstrap.min.js"></script>--> 
		<script src="js/bootstrap-table.min.js"></script> 
		<script src="js/bootstrap-table-locale-all.js"></script>
		<style type="text/css">
			.pull-right {float: right !important;}
		</style>
		<!-- <script src="js/bootstrap-table-zh-TW.js"></script> -->
		<script>

			(function($) 
			{
				var lan =document.getElementById(&quot;lan&quot;).value;
				//alert(lan);
				if(lan == &quot;zh&quot;)
				{
					$.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales[&#39;zh-TW&#39;]);
				}
				else
				{
					$.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales[&#39;en-US&#39;]);
				}
			})(jQuery);




			function formHandler(form) 
			{
				var windowprops = &quot;height=400,width=600,location=no,&quot; +
				&quot;scrollbars=yes,menubars=no,toolbars=no,resizable=no&quot;;
				var URL = form.site.options[form.site.selectedIndex].value;

				popup = window.open(URL,&quot;_self&quot;,windowprops);
			}

			function go_top_u()
			{
				document.getElementById(&quot;soflow_unit&quot;).selectedIndex = &quot;0&quot;;
			}

			function go_top_g()
			{
				document.getElementById(&quot;soflow_group&quot;).selectedIndex = &quot;0&quot;;
			}


			$(window).bind(&#39;scroll&#39;, function () 
			{
				if ($(window).scrollTop() &lt; 300) 
				{
					$(&#39;#gotop&#39;).hide();
				}
				else 
				{
					$(&#39;#gotop&#39;).show();
				}
            });

			function parseData(chtTitle, engTitle, chtContent, engContent, chtLink, engLink)
			{
				document.getElementById(&quot;demo&quot;).innerHTML = &quot;YOU CLICKED ME!&quot;;
			}
			function myFunction() 
			{
				document.getElementById(&quot;demo&quot;).innerHTML = &quot;YOU CLICKED ME!&quot;;
			}

		</script> 
		<script>
			function loadTab(obj,n)
			{
				var layer;
				eval(&#39;layer=\&#39;S&#39;+n+&#39;\&#39;&#39;);

				//將 Tab 標籤樣式設成 Blur 型態
				var tabsF=document.getElementById(&#39;tabsF&#39;).getElementsByTagName(&#39;li&#39;);
				for (var i=0;i&lt;tabsF.length;i++)
				{
					tabsF[i].setAttribute(&#39;id&#39;,null);
					eval(&#39;document.getElementById(\&#39;S&#39;+(i+1)+&#39;\&#39;).style.display=\&#39;none\&#39;&#39;)
				}

				//變更分頁標題樣式
				obj.parentNode.setAttribute(&#39;id&#39;,&#39;current&#39;);
				document.getElementById(layer).style.display=&#39;inline&#39;;

			}
		</script> 
		<script>
			$(document).ready(function()
			{
				$(&quot;div.kwicTable table&quot;).delegate(&#39;tr&#39;, &#39;click&#39;, function() 
				{
                    alert(&quot;You clicked my &lt;td&gt;!&quot; + $(this).html() +
                                                &quot;My TR is:&quot; + $(this).parent(&quot;tr&quot;).html());
                });
            });
		</script> 
		<!--search result --> 
		<script>
			// get toggle elements
			var toggleEls = document.querySelectorAll(&#39;[data-mui-controls^=&quot;pane-events-&quot;]&#39;);

			function logFn(ev) 
			{
				var s = &#39;[&#39; + ev.type + &#39;]&#39;;
				s += &#39; paneId: &#39; + ev.paneId;
				s += &#39; relatedPaneId: &#39; + ev.relatedPaneId;
				console.log(s);
			}

			// attach event handlers
			for (var i=0; i &lt; toggleEls.length; i++) 
			{
				toggleEls[i].addEventListener(&#39;mui.tabs.showstart&#39;, logFn);
				toggleEls[i].addEventListener(&#39;mui.tabs.showend&#39;, logFn);
				toggleEls[i].addEventListener(&#39;mui.tabs.hidestart&#39;, logFn);
				toggleEls[i].addEventListener(&#39;mui.tabs.hideend&#39;, logFn);
			}
		</script>
		<header class="mui-appbar mui--z1">
			<div class="mui-container">
				<table width="100%">
					<tr class="mui--appbar-height">
						<td class="mui--text-title">
							<a href="/~tcus/miad">
								<img src="templates/images/TUPort_logo7.png" class="miad-logo" />
							</a>
						</td>
						<td class="td-right">
							<ul class="mui-list--inline mui--text-body2">
							
								<!--{if isset($user_name)}
									<li><a href="account.php">{$user_name}</a></li>
									{if $user_authority==1}
									<li><a href="manage_all_user.php">{$page_string[102]}</a></li>
									{/if}
									<li><a href="logout.php">{$page_string[29]}</a></li>
									{/if}-->
									<!--一般登入之使用者也能創建單位及聯盟? 暫時不需要的功能
									<li><a href="create.php">{$page_string[58]}</a></li>
									<li><a href="create_group.php">{$page_string[59]}</a></li>
									-->
								
								<!--<li>
									<a href="login.php">Log in</a>
								</li>-->
								<!-- 不開放register，直接從資料庫新增帳號<li><a href="register.php">Register</a></li>-->
								<!--"Directions" 暫不需要<li><a href="#">Directions</a></li>-->
								<!--<li> <div class="mui-dropdown"> <button class="mui-btn mui-btn==small mui-btn==danger" data-mui-toggle="dropdown">English(英文)<span class="mui-caret"></span> </button> <ul class="mui-dropdown__menu mui-dropdown__menu==right"><li><a href="?&select_lan="></a></li><li><a href="?&select_lan=zh">Chinese(中文)</a></li></ul> </div> </li>-->
							</ul>
						</td>
					</tr>
				</table>
			</div>
		</header>
		<div id="content-wrapper" class="mui--text-left">
			<div class="mui-container">
				<div class="mui--appbar-height"></div>
				<div class="sub-header">
					<table>
						<tr>
							<td class="mui--text-headline nation-name">
								<a href="#"></a>
							</td>
						</tr>
						<tr>
							<td class="mui--text-display2 unit-name">Taiwan University Portal</td>
						</tr>
					</table>
				</div>
				<nav id='cssmenu'>
					<div id="head-mobile"></div>
					<div class="button"></div>
					<ul>
						<li class='active'>
							<a href='/~tcus/miad'>
								<i class="fa fa-university fa-lg"></i>
								University List
							</a>
						</li>
						<li>
							<a href='/~tcus/miad/search.html'>
								<i class="fa fa-indent fa-lg"></i>
								Keyword Search
							</a>
						</li>
						<!--<li><a href='/~tcus/miad?item=unit.list'><i class="fa fa-file-text fa-lg"></i>Document Search</a></li>-->
						<!--<li><a href='/~tcus/miad?item=group.list'><i class="fa fa-building fa-lg"></i>Union List</a></li> <!== upload_files-->
					</ul>
				</nav>
				<script src="codepen/js/menu.js"></script>
	  
				<div class="jumbotron">
					<h3 style="font-family:monospace;"><b><u> Batch Upload </b></u></h3><br><br>
					<form name="form2" method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
						<table align="center" width="90%" border="0">
							<tr>
								<td width="50%">
									<h3 style="font-family:monospace;"> Text Excel Upload </h3>
								</td>
								<td width="50%">
									<h3 style="font-family:monospace;"> Picture Zip Upload </h3>
								</td>
							</tr>
							<tr>
								<td valign="top">
									<br>
									<p>Precautions : </p>
									<p>* Please refer to the <span style="color:red;font-weight:bold">"UploadExample.xlsx"</span></p>
									<p>* A total of <b>three worksheets</b> can be filled in to add or update data
									<p>* Asterisk<span style="color:red;font-weight:bold">(*)</span> field is required. Please fill in the form clearly</p>
									<p>* Avoid using the "\" backslash symbol in data</p>
									<b><u><a href="UploadExample.xlsx">Download "UploadExample.xlsx" now !</a></u></b> 
								</td>
								<td>
									<br>
									<p>Precautions :</p>
									<p>* Please Upload <span style="color:red;font-weight:bold">"Zip"</span> file, and the maximum file size is 300 MB</p>
									<p>* For logo, please named the picture this form : <b>[name]_logo</b>
									<br>&nbsp;&nbsp;ex. 國立中正大學 National Chung Cheng University_logo</p>
									<p>* For background, please named the picture this form : <b>[name]_bg</b>
									<br>&nbsp;&nbsp;ex. 國立中正大學 National Chung Cheng University_bg</p>
									<p>* The background image pixel must be larger than 1140px</p>
									<br>
								</td>
							</tr>
							<tr>
								<input type="hidden" name="leadExcel" value="true" />
								<td>
									<input type="file" name="inputExcel" />
									<input type="submit" value="Upload" name="send" />
								</td>
								<input type="hidden" name="leadZip" value="300000000" />
								<td>
									<input type="file" name="inputPictureZip" />
									<input type="submit" value="Upload" name="sendZip" />
								</td>
							</tr>
						</table>
					</form>
	  
				</div>
			</div>
		</div>
		<footer>
			<div class="mui-container mui--text-center">
				© 2016 National Chung Cheng University ALL rights reserved
			</div>
		</footer>
	  
	  
<?php   
    //導入Excel文件
    function uploadFile($file,$filetempname)
    {
        //自己設置的上傳文件存放路徑
        $filePath = 'excel_upload_temp/';
        $str = "";
        
        require_once("Classes/PHPExcel/IOFactory.php");
        
        $filename=explode(".",$file);//把上傳的文件名以「.」好為準做一個數組。
        $time=date("y-m-d-H-i-s");//去當前上傳的時間
        $filename[0]=$time;//取文件名t替換
        $name=implode(".",$filename); //上傳後的文件名
        $uploadfile=$filePath.$name;//上傳後的文件名地址

		//move_uploaded_file() 函數將上傳的文件移動到新位置。若成功，則返回 true，否則返回 false。
        $result=move_uploaded_file($filetempname,$uploadfile);//假如上傳到當前目錄下
        if($result)
        { 
			//如果上傳文件成功，就執行導入excel操作

			PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
			$objPHPExcel = PHPExcel_IOFactory::load($uploadfile);
			
			$wz = 0;
			$uploadtype = explode(".",$uploadfile);
			if ($uploadtype[1] != "xlsx")
			{
				$warning[$wz] = "上傳檔案非xlsx檔";
				$wz++;
				unlink($uploadfile);
			}
			else
			{
            
				/*****************/  
				/*  first sheet  */
				/*****************/
				$sheet = $objPHPExcel->getSheet(0);
				$highestRow = $sheet->getHighestRow(); // 取得總行數

				$Unit_table = Unit();
				$wf = 0;

				//循環讀取excel文件,讀取一條,插入一條
				for($j=5;$j<=$highestRow;$j++)
				{
					for($k='A';$k<='T';$k++)
					{
						$str .= $sheet->getCell("$k$j")->getValue().'\\';
					//讀取單元格
					}

					//explode:函數把字符串分割為數組。
					$strs = explode("\\",$str);
				
					// check if there exists a row that is all NULL
					$null_flag = 1;
					for ($i = 0; $i <= 19; $i++)
					{
						if ($strs[$i] != "")
						{
							$null_flag = 0;
						}
					}
				
					//all NULL then do next row
					if ($null_flag == 1)
					{
						$str = "";
						continue;
					}
		
					$flag = 0;

					//warning
					if ($strs[0] == "")
					{
						$warning_f[$wf] = "學校工作表第 $j 行學校名字未填";
						$flag = 1;
						$wf++;
					}
					if ($strs[1] == "")
					{
						$warning_f[$wf] = "學校工作表第 $j 行學校縮寫未填";
						$flag = 1;
						$wf++;
					}
					if ($strs[2] == "")
					{
						$warning_f[$wf] = "學校工作表第 $j 行國家代碼未填";
						$flag = 1;
						$wf++;
					}
					else
					{
						// check if the country abbreviation is wrong
						$db = new DB();
						$db->connect_db();
						$db->query("SELECT ID FROM country WHERE abbreviation = '$strs[2]'");
						$country_ID = $db->fetch_array();
						$flag_ID = $country_ID['ID'];
						if($flag_ID== "")
						{
							$warning_f[$wf] = "學校工作表第 $j 行國家代碼錯誤";
							$wf++;
							$flag = 1;
						}
					}
					if ($strs[4] == "")
					{
						$warning_f[$wf] = "學校工作表第 $j 行語言代碼未填";
						$flag = 1;
						$wf++;
					}
					else
					{
						// check if the language code is wrong
						$db = new DB();
						$db->connect_db();
						$db->query("SELECT english_name FROM Language WHERE ID = '$strs[4]'");
						$lang_name = $db->fetch_array();
						$ln = $lang_name['english_name'];
						if($ln == "")
						{
							$warning_f[$wf] = "學校工作表第 $j 行語言代碼錯誤";
							$wf++;
							$flag = 1;
						}
					}
				
					// if there exists any wrong then do next row
					if ($flag == 1)
					{
						$str = "";
						continue;
					}
			
					// catch the school id
					$db = new DB();
					$db->connect_db();
					$db->query("SELECT ID FROM Unit WHERE name = '$strs[0]'");
					$result = $db->fetch_array();
				
					// new school
					if ($result['ID'] == "")
					{
						// check if there exists ' .
						for ($i = 0; $i <= 19; $i++)
						{
							$cut = explode("'", $strs[$i]);
							$strs[$i] = implode("\'", $cut);
						}
					
						$db->query("SELECT ID FROM country WHERE abbreviation = '$strs[2]'");
						$country_ID = $db->fetch_array();
						$cID = $country_ID['ID'];
						$db->query("INSERT INTO Unit(ID,name,abbreviation,logo_link,background_link,index_link,country_ID,Uni_code) VALUES(NULL,'$strs[0]','$strs[1]',' ',' ','/~tcus/miad/index.php?country_abbr=$strs[2]&unit_abbr=$strs[1]','$cID','$strs[3]') ");
						$db->query("SELECT `ID` FROM `Unit` WHERE `name` = '$strs[0]'");
						$Unit_ID = $db->fetch_array();
						$ID = $Unit_ID['ID'];
						$db->query("INSERT INTO Unit_navbar(ID,Unit_ID,lang,county,motto,types,established,religion,students,underGra,postGra,campus,ratio,INTL_ratio,website) VALUES(NULL,'$ID','$strs[4]','$strs[5]','$strs[6]','$strs[7]','$strs[8]','$strs[9]','$strs[10]','$strs[11]','$strs[12]','$strs[13]','$strs[14]','$strs[15]','$strs[16]') ");
						$db->query("INSERT INTO Unit_intro(ID,Unit_ID,lang,intro) VALUES(NULL,'$ID','$strs[4]','$strs[17]') ");
						$db->query("INSERT INTO Unit_Application(ID,Unit_ID,lang,App_link) VALUES(NULL,'$ID','$strs[4]','$strs[18]') ");
						$db->query("INSERT INTO Unit_Transport(id,Unit_ID,lang,link) VALUES(NULL,'$ID','$strs[4]','$strs[19]') ");
					}
					else
					{
						$db = new DB();
						$db->connect_db();
					
						////////////////
						/***  Unit  ***/
						////////////////
					
						$ID = $result['ID']; 
					
						$index_link_flag = 0;
					
						//abbreviation or country_ID has new data, let old data insert into history
						if($strs[1] != "" || $strs[2] != "")
						{
							if($strs[1] == "")
							{
								//catch old data
								$db->query("SELECT abbreviation FROM Unit WHERE ID = '$ID'");
								$result_inherit = $db->fetch_array();
								$strs[1] = $result_inherit['abbreviation'];
							}
							else
							{
								// catch old data
								$col = "abbreviation";
								$db->query("SELECT $col FROM  Unit WHERE ID = $ID");
								$old_data = $db->fetch_array();
								$o_data = $old_data[$col];
							
								//new data is different from old data then update
								if ($strs[1] != $o_data)
								{
									// check if there exists ' .
									$cut = explode("'", $strs[1]);
									$strs[1] = implode("\'", $cut);
								
									$table = "Unit";
									updateHistory2($table,$ID,$col);
									$index_link_flag = 1;
								}
							}
							if($strs[2] == "")
							{
								//catch old data
								$db->query("SELECT country_ID FROM Unit WHERE ID = '$ID'");
								$result_inherit = $db->fetch_array();
								$result_inherit = $result_inherit['country_ID'];
								$db->query("SELECT abbreviation FROM country WHERE ID = '$result_inherit'");
								$result_inherit = $db->fetch_array();
								$strs[2] = $result_inherit['abbreviation'];
							}
							else
							{
								// catch old data
								$col = "country_ID";
								$db->query("SELECT $col FROM  Unit WHERE ID = $ID");
								$old_data = $db->fetch_array();
								$o_data = $old_data[$col];
								
								//new data is different from old data then update
								if ($strs[2] != $o_data)
								{
									// check if there exists ' .
									$cut = explode("'", $strs[2]);
									$strs[2] = implode("\'", $cut);
									$table = "Unit";
									updateHistory2($table,$ID,$col);
									$index_link_flag = 1;
								}
							}
							
							//country or abbreviation has been updated then update link
							if ($index_link_flag == 1)
							{
								$table = "Unit";
								$col = "index_link";
								updateHistory2($table,$ID,$col);
								$db->query("UPDATE Unit SET index_link = '/~tcus/miad/index.php?country_abbr=$strs[2]&unit_abbr=$strs[1]' WHERE ID = $ID");
							}
						}
			  
						$db->query("SELECT ID FROM  country WHERE abbreviation = '$strs[2]'");
						$country_ID = $db->fetch_array();
						$cID = $country_ID['ID'];
						$strs[2] = $cID; 
			
						//Uni_code has new data, let old data insert into history
						if($strs[3] != "")
						{
							// catch old data
							$col = "Uni_code";
							$db->query("SELECT $col FROM  Unit WHERE ID = $ID");
							$old_data = $db->fetch_array();
							$o_data = $old_data[$col];
						
							//new data is different from old data then update
							if ($strs[3] != $o_data)
							{
								// check if there exists ' .
								$cut = explode("'", $strs[3]);
								$strs[3] = implode("\'", $cut);
							
								$table = "Unit";
								updateHistory2($table,$ID,$col);
							}
						}
					
						//update new data
						for ($i = 1; $i <= 3; $i++)
						{
							if ($strs[$i] != "")
							{
								// catch old data
								$x = $Unit_table[$i];
								$db->query("SELECT $x FROM  Unit WHERE ID = $ID");
								$old_data = $db->fetch_array();
								$o_data = $old_data[$x];
							
								//new data is different from old data then update
								if ($strs[$i] != $o_data)
								{
									$db->query("UPDATE Unit SET $x = '$strs[$i]' WHERE ID = $ID");
								}
							}
						}
			  
						///////////////////////
						/***  Unit_navbar  ***/
						///////////////////////
			  
						$db->query("SELECT ID FROM Unit_navbar WHERE Unit_ID = '$ID' AND lang = '$strs[4]'");
						$result = $db->fetch_array();
					
						// new navbar
						if ($result['ID'] == NULL)
						{
							// check if there exists ' .
							for ($i = 5; $i <= 16; $i++)
							{
								$cut = explode("'", $strs[$i]);
								$strs[$i] = implode("\'", $cut);
							}
						
							$db->query("INSERT INTO Unit_navbar(ID,Unit_ID,lang,county,motto,types,established,religion,students,underGra,postGra,campus,ratio,INTL_ratio,website) VALUES(NULL,'$ID','$strs[4]','$strs[5]','$strs[6]','$strs[7]','$strs[8]','$strs[9]','$strs[10]','$strs[11]','$strs[12]','$strs[13]','$strs[14]','$strs[15]','$strs[16]') ");
						}
						else
						{
							$nID = $result['ID'];
							for ($i = 5; $i <= 16; $i++)
							{
								if ($strs[$i] != "")
								{
									// catch old data
									$x = $Unit_table[$i];
									$db->query("SELECT $x FROM  Unit_navbar WHERE ID = $nID");
									$old_data = $db->fetch_array();
									$o_data = $old_data[$x];
								
									//new data is different from old data then update
									if ($strs[$i] != $o_data)
									{
										// check if there exists ' .
										$cut = explode("'", $strs[$i]);
										$strs[$i] = implode("\'", $cut);
									
										$table = "Unit_navbar";
										updateHistory2($table,$nID,$x);
										$db->query("UPDATE Unit_navbar SET $x = '$strs[$i]' WHERE ID = $nID");
									}
								}
							}
						}
					
						//////////////////////
						/***  Unit_intro  ***/
						//////////////////////
			  
						$db->query("SELECT ID FROM Unit_intro WHERE Unit_ID = '$ID' AND lang = '$strs[4]'");
						$result = $db->fetch_array();
					
						// new introduction
						if ($result['ID'] == NULL)
						{
							// check if there exists ' .
							$cut = explode("'", $strs[17]);
							$strs[17] = implode("\'", $cut);
						
							$db->query("INSERT INTO Unit_intro(ID,Unit_ID,lang,intro) VALUES(NULL,'$ID','$strs[4]','$strs[17]') ");
						}
						else
						{
							$iID = $result['ID'];
							if ($strs[17] != "")
							{
								// catch old data
								$x = $Unit_table[17];
								$db->query("SELECT $x FROM  Unit_intro WHERE ID = $iID");
								$old_data = $db->fetch_array();
								$o_data = $old_data[$x];
							
								//new data is different from old data then update
								if ($strs[17] != $o_data)
								{
									// check if there exists ' .
									$cut = explode("'", $strs[17]);
									$strs[17] = implode("\'", $cut);
								
									$table = "Unit_intro";
									updateHistory2($table,$iID,$x);
									$db->query("UPDATE Unit_intro SET $x = '$strs[17]' WHERE ID = $iID");
								}
							}
						}
					
						//////////////////////////
						/**  unit_application  **/
						//////////////////////////
			  
						$db->query("SELECT ID FROM Unit_Application WHERE Unit_ID = '$ID' AND lang = '$strs[4]'");
						$result = $db->fetch_array();
					
						// new application
						if ($result['ID'] == NULL)
						{
							// check if there exists ' .
							$cut = explode("'", $strs[18]);
							$strs[18] = implode("\'", $cut);
						
							$db->query("INSERT INTO Unit_Application(ID,Unit_ID,lang,App_link) VALUES(NULL,'$ID','$strs[4]','$strs[18]') ");
						}
						else
						{
							$aID = $result['ID'];
							if ($strs[18] != "")
							{
								// catch old data
								$x = $Unit_table[18];
								$db->query("SELECT $x FROM  Unit_Application WHERE ID = $aID");
								$old_data = $db->fetch_array();
								$o_data = $old_data[$x];
							
								//new data is different from old data then update
								if ($strs[18] != $o_data)
								{
									// check if there exists ' .
									$cut = explode("'", $strs[18]);
									$strs[18] = implode("\'", $cut);
								
									$table = "Unit_Application";
									updateHistory2($table,$aID,$x);
									$db->query("UPDATE Unit_Application SET $x = '$strs[18]' WHERE ID = $aID");
								}
							}
						}

						////////////////////////
						/**  Unit_transport  **/
						////////////////////////
			  
						$db->query("SELECT ID FROM Unit_Transport WHERE Unit_ID = '$ID' AND lang = '$strs[4]'");
						$result = $db->fetch_array();
					
						//new transport
						if ($result['ID'] == NULL)
						{
							// check if there exists ' .
							$cut = explode("'", $strs[19]);
							$strs[19] = implode("\'", $cut);
						
							$db->query("INSERT INTO Unit_Transport(id,Unit_ID,lang,link) VALUES(NULL,'$ID','$strs[4]','$strs[19]' )");
						}
						else
						{
							$tID = $result['ID'];
							if ($strs[19] != "")
							{
								// catch old data
								$x = $Unit_table[19];
								$db->query("SELECT $x FROM  Unit_Transport WHERE ID = $tID");
								$old_data = $db->fetch_array();
								$o_data = $old_data[$x];
							
								//new data is different from old data then update
								if ($strs[19] != $o_data)
								{
									// check if there exists ' .
									$cut = explode("'", $strs[19]);
									$strs[19] = implode("\'", $cut);
								
									$table = "Unit_Transport";
									updateHistory2($table,$tID,$x);
									$db->query("UPDATE Unit_Transport SET $x = '$strs[19]' WHERE ID = $tID");
								}
							}
						}
					}

					$str = "";
				}

				/******************/  
				/*  second sheet  */
				/******************/
			
				$sheet = $objPHPExcel->getSheet(1);
				$highestRow = $sheet->getHighestRow(); // 取得總行數

				$faculty_table = Faculty();

				$ws = 0;
				$wes = 0;

				for($j=5;$j<=$highestRow;$j++)
				{
					for($k='A';$k<='E';$k++)
					{
						$str .= $sheet->getCell("$k$j")->getValue().'\\';
						//讀取單元格
					}
					//explode:函數把字符串分割為數組。
					$strs = explode("\\",$str);
	
					$null_flag = 1;
				
					// check if there exists a row that is all NULL
					for ($i = 0; $i <= 4; $i++)
					{
						if ($strs[$i] != "")
						{
							$null_flag = 0;
						}
					}
				
					//all NULL then do next row
					if ($null_flag == 1)
					{
						$str = "";
						continue;
					}

					$flag = 0;

					//warning
					if ($strs[0] == "")
					{
						$warning_s[$ws] = "學院工作表第 $j 行學校名稱未填";
						$flag = 1;
						$ws++;
					}
					if ($strs[1] == "")
					{
						$warning_s[$ws] = "學院工作表第 $j 行語言代碼未填";
						$flag = 1;
						$ws++;
					}
					else
					{
						// check if the language code is wrong
						$db = new DB();
						$db->connect_db();
						$db->query("SELECT english_name FROM Language WHERE ID = '$strs[1]'");
						$lang_name = $db->fetch_array();
						$ln = $lang_name['english_name'];
						if($ln == "")
						{
							$warning_s[$ws] = "學校工作表第 $j 行語言代碼錯誤";
							$ws++;
							$flag = 1;
						}
					}
					if ($strs[2] == "")
					{
						$warning_s[$ws] = "學院工作表第 $j 行學院名稱未填";
						$flag = 1;
						$ws++;
					}
				
					// if there exists any wrong then do next row
					if ($flag == 1)
					{
						$str = "";
						continue;
					}

					$db = new DB();
					$db->connect_db();
				
					// catch the school id
					$db->query("SELECT ID FROM Unit WHERE name = '$strs[0]'");
					$result = $db->fetch_array();
					$ID = $result['ID'];
				
					// check if the school has been inserted
					if ($ID == "")
					{
						$warning_es[$wes] = "學院工作表第 $j 行學校名稱不存在";
						$str = "";
						$wes++;
						continue;
					}
				
					//////////////////////
					/**  Unit_faculty  **/
					//////////////////////
				
					// catch the faculty id
					$db->query("SELECT ID FROM Unit_faculty WHERE Unit_ID = '$ID' AND lang = '$strs[1]' AND faculty_name = '$strs[2]'");
					$result = $db->fetch_array();

					// new faculty
					if ($result['ID'] == "")
					{
						// check if there exists ' .
						for ($i = 0; $i <= 4; $i++)
						{
							$cut = explode("'", $strs[$i]);
							$strs[$i] = implode("\'", $cut);
						}
					
						$db->query("INSERT INTO Unit_faculty(ID,Unit_ID,lang,faculty_name,faculty_intro,faculty_link) VALUES(NULL,'$ID','$strs[1]','$strs[2]','$strs[3]','$strs[4]') ");
					}
					else
					{
						$fID = $result['ID'];

						for ($i = 3; $i <= 4; $i++)
						{
							if ($strs[$i] != "")
							{
								// catch old data
								$x = $faculty_table[$i];
								$db->query("SELECT $x FROM  Unit_faculty WHERE ID = $fID");
								$old_data = $db->fetch_array();
								$o_data = $old_data[$x];
							
								//new data is different from old data then update
								if ($strs[$i] != $o_data)
								{
									// check if there exists ' .
									$cut = explode("'", $strs[$i]);
									$strs[$i] = implode("\'", $cut);
								
									$table = "Unit_faculty";
									updateHistory2($table,$fID,$x);
									$db->query("UPDATE Unit_faculty SET $x = '$strs[$i]' WHERE ID = $fID");
								}
							}
						}
					}

					$str = "";
				}
			
				/*****************/  
				/*  third sheet  */
				/*****************/

				$sheet = $objPHPExcel->getSheet(2);
				$highestRow = $sheet->getHighestRow(); // 取得總行數
	
				$dep_table = Dep();

				$wt = 0;
				$wet = 0;

				for($j=5;$j<=$highestRow;++$j)
				{
					for($k='A';$k<='M';$k++)
					{ 
						$str .= $sheet->getCell("$k$j")->getValue().'\\';
						//讀取單元格
					}
					//explode:函數把字符串分割為數組。
					$strs = explode("\\",$str);

					$null_flag = 1;
				
					// check if there exists a row that is all NULL
					for ($i = 0; $i <= 12; $i++)
					{
						if ($strs[$i] != "")
						{
							$null_flag = 0;
						}
					}
				
					//all NULL then do next row
					if ($null_flag == 1)
					{
						$str = "";
						continue;
					}

					$flag = 0;

					//warning
					if ($strs[0] == "")
					{
						$warning_t[$wt] = "學系工作表第 $j 行學校名稱未填";
						$flag = 1;
						$wt++;
					}
					if ($strs[1] == "")
					{
						$warning_t[$wt] = "學系工作表第 $j 行語言代碼未填";
						$flag = 1;
						$wt++;
					}
					else
					{
						// check if the language code is wrong
						$db = new DB();
						$db->connect_db();
						$db->query("SELECT english_name FROM Language WHERE ID = '$strs[1]'");
						$lang_name = $db->fetch_array();
						$ln = $lang_name['english_name'];
						if($ln == "")
						{
							$warning_t[$wt] = "學校工作表第 $j 行語言代碼錯誤";
							$wt++;
							$flag = 1;
						}
					}
					if ($strs[2] == "")
					{
						$warning_t[$wt] = "學系工作表第 $j 行學院名稱未填";
						$flag = 1;
						$wt++;
					}
					if ($strs[3] == "")
					{
						$warning_t[$wt] = "學系工作表第 $j 行學系名稱未填";
						$flag = 1;
						$wt++;
					}
				
					// if there exists any wrong then do next row
					if ($flag == 1)
					{
						$str = "";
						continue;
					}
				
					$db = new DB();
					$db->connect_db();
				
					// catch the school id
					$db->query("SELECT ID FROM Unit WHERE name = '$strs[0]'");
					$result = $db->fetch_array();
					$ID = $result['ID'];
				
					// check if the school has been inserted
					if ($ID == "")
					{
						$warning_et[$wet] = "學系工作表第 $j 行學校名稱不存在";
						$str = "";
						$wet++;
						continue;
					}

					// catch the faculty id
					$db->query("SELECT ID FROM Unit_faculty WHERE Unit_ID = '$ID' AND lang = '$strs[1]' AND faculty_name = '$strs[2]'");
					$result = $db->fetch_array();
					$fID = $result['ID'];
				
					// check if the faculty has been inserted
					if ($fID == "")
					{
						$warning_et[$wet] = "學系工作表第 $j 行學院名稱不存在";
						$str = "";
						$wet++;
						continue;
					}
				
					/////////////////////
					/**  faculty_dep  **/
					/////////////////////
				
					// catch the department id
					$db->query("SELECT ID FROM faculty_Dep WHERE Unit_ID = '$ID' AND lang = '$strs[1]' AND faculty_ID = '$fID' AND Dep_name = '$strs[3]'");
					$result = $db->fetch_array();
				
					// new department
					if ($result['ID'] == "")
					{
						// check if there exists ' .
						for ($i = 0; $i <= 12; $i++)
						{
							$cut = explode("'", $strs[$i]);
							$strs[$i] = implode("\'", $cut);
						}
					
						$db->query("INSERT INTO faculty_Dep(ID,Unit_ID,lang,faculty_ID,Dep_name,Dep_intro,Dep_app,Dep_gra,Dep_con,bachelor,admission_term,application_deadline,dep_website,chinese_abbility) VALUES(NULL,'$ID','$strs[1]','$fID','$strs[3]','$strs[4]','$strs[5]','$strs[6]','$strs[7]','$strs[8]','$strs[9]','$strs[10]','$strs[11]','$strs[12]') ");
					}
					else
					{
						$dID = $result['ID'];
					
						for ($i = 4; $i <= 12; $i++)
						{
							if ($strs[$i] != "")
							{
								// catch old data
								$x = $dep_table[$i];
								$db->query("SELECT $x FROM  faculty_Dep WHERE ID = $dID");
								$old_data = $db->fetch_array();
								$o_data = $old_data[$x];
							
								//new data is different from old data then update
								if ($strs[$i] != $o_data)
								{
									// check if there exists ' .
									$cut = explode("'", $strs[$i]);
									$strs[$i] = implode("\'", $cut);
								
									$table = "faculty_Dep";
									updateHistory2($table,$dID,$x);
									$db->query("UPDATE faculty_Dep SET $x = '$strs[$i]' WHERE ID = $dID");
								}
							}
						}
					}

					$str = "";
				}
				unlink($uploadfile); //刪除上傳的excel文件
			}
			$w = $wf + $ws + $wt + $wes + $wet + $wz;
			if($w == 0)
			{
				echo '<script>alert(\'Upload successfully！\');window.location=\'BatchUpload.php\';</script>';
			}
			else
			{
				e_warn($warning_f, $wf, $warning_s, $ws, $warning_t, $wt, $warning_es, $wes, $warning_et, $wet, $warning, $wz);
			}
		}
        else
        {
			echo '<script>alert(\'Import failed！\');window.location=\'BatchUpload.php\';</script>';
        }
    }

    function Unit()
    {
        $Unit_col[0] = "name";
        $Unit_col[1] = "abbreviation";
        $Unit_col[2] = "country_ID";
        $Unit_col[3] = "Uni_code";
        $Unit_col[4] = "lang";
        $Unit_col[5] = "county";
        $Unit_col[6] = "motto";
        $Unit_col[7] = "types";
        $Unit_col[8] = "established";
        $Unit_col[9] = "religion";
        $Unit_col[10] = "students";
        $Unit_col[11] = "underGra";
        $Unit_col[12] = "postGra";
        $Unit_col[13] = "campus";
        $Unit_col[14] = "ratio";
        $Unit_col[15] = "INTL_ratio";
        $Unit_col[16] = "website";
        $Unit_col[17] = "intro";
        $Unit_col[18] = "App_link";
        $Unit_col[19] = "link";
        return $Unit_col;
    }

    function Faculty()
    {
        $Faculty_col[0] = "Unit_ID";
        $Faculty_col[1] = "lang";
        $Faculty_col[2] = "faculty_name";
        $Faculty_col[3] = "faculty_intro";
        $Faculty_col[4] = "faculty_link";
        return $Faculty_col;
    }

    function Dep()
    {
        $Dep_col[0] = "Unit_ID";
        $Dep_col[1] = "lang";
        $Dep_col[2] = "faculty_ID";
        $Dep_col[3] = "Dep_name";
        $Dep_col[4] = "Dep_intro";
        $Dep_col[5] = "Dep_app";
        $Dep_col[6] = "Dep_gra";
        $Dep_col[7] = "Dep_con";
        $Dep_col[8] = "bachelor";
        $Dep_col[9] = "admission_term";
        $Dep_col[10] = "application_deadline";
        $Dep_col[11] = "dep_website";
        $Dep_col[12] = "chinese_abbility";
        return $Dep_col;
    }
	  
	function uploadZip($file,$filetempname)
	{
		$filePath = 'excel_upload_temp/';

		require_once('pclzip-2-8-2/pclzip.lib.php');
        
        $filename=explode(".",$file);//把上傳的文件名以「.」好為準做一個數組。
        $time=date("y-m-d-H-i-s");//去當前上傳的時間
        $filename[0]=$time;//取文件名t替換
        $name=implode(".",$filename); //上傳後的文件名
        $uploadfile=$filePath.$name;//上傳後的文件名地址

		//move_uploaded_file() 函數將上傳的文件移動到新位置。若成功，則返回 true，否則返回 false。
        $result=move_uploaded_file($filetempname,$uploadfile);//假如上傳到當前目錄下
        if($result)
		{
			$wz = 0;
			$uploadtype = explode(".",$uploadfile);
			if ($uploadtype[1] != "zip")
			{
				$warning[$wz] = "上傳檔案非Zip檔";
				$wz++;
				unlink($uploadfile);
			}
			else
			{
				$decompress = new PclZip($uploadfile);
				$decompress->extract(PCLZIP_OPT_PATH, "excel_upload_temp/");
				
				unlink($uploadfile);
				
				$dir = "excel_upload_temp/";

				// 判斷是否為目錄 
				if (is_dir($dir)) 
				{
					if ($dh = opendir($dir)) 
					{
						$db = new DB();
						$db->connect_db();
					
						while (($file = readdir($dh)) !== false) 
						{ 
							if ($file != '.' && $file != '..')
							{
								$filename = explode(".", $file);
								if (count($filename) != 2)
								{
									$warning[$wz] = "$file : 檔名有誤";
									$wz++;
									unlink('excel_upload_temp/' . $file);
									continue;
								}
								$filetype = explode("_", $filename[0]);
								if (count($filetype) != 2)
								{
									$warning[$wz] = "$file : 檔名有誤";
									$wz++;
									unlink('excel_upload_temp/' . $file);
									continue;
								}
	
								$db->query("SELECT ID FROM Unit WHERE name = '$filetype[0]'");
								$result = $db->fetch_array();
								$ID = $result['ID'];
								
								if ($ID != "")
								{
									$newname = $ID. "." . $filename[1];
									if($filetype[1] == "logo"||$filetype[1] == "bg")
									{
										if ($filetype[1] == "logo")
										{
											copy('excel_upload_temp/' . $file, 'picture/unit/logo/' . $newname);
											$path = "picture/unit/logo/" . $newname;
											$db->query("UPDATE Unit SET logo_link = '$path' WHERE ID = $ID");
											unlink('excel_upload_temp/' . $file);
										}
										if ($filetype[1] == "bg")
										{
											copy('excel_upload_temp/' . $file, 'picture/unit/background/' . $newname);
											$path = "picture/unit/background/" . $newname;
											$db->query("UPDATE Unit SET background_link = '$path' WHERE ID = $ID");
											unlink('excel_upload_temp/' . $file);
										}
									}
									else
									{
										$warning[$wz] = "$file : 檔名有誤";
										$wz++;
										unlink('excel_upload_temp/' . $file);
									}
								}
								else
								{
									$warning[$wz] = $file . " : 學校名稱錯誤或不存在";
									$wz++;
									unlink('excel_upload_temp/' . $file);
								}
							}
						}
					closedir($dh);
					}
				}
			}
			
			if($wz == 0)
			{
				echo '<script>alert(\'Picture upload successfully！\');window.location=\'BatchUpload.php\';</script>';
			}
			else
			{
				p_warn($warning, $wz);
			}
		}
		else
		{
			echo '<script>alert(\'Import failed！\');window.location=\'BatchUpload.php\';</script>';
		}
	  }

	function e_warn($warning_f, $wf, $warning_s, $ws, $warning_t, $wt, $warning_es, $wes, $warning_et, $wet)
	{
		echo '<script>';
		echo 'var warn = "Excel upload failed！";';
		echo 'warn += "\n";';
		for ($i = 0; $i < $wf; $i++)
		{
			echo 'warn += "\n";';
			echo 'warn += "'.$warning_f["$i"].'";';
		}
		for ($i = 0; $i < $ws; $i++)
		{
			echo 'warn += "\n";';
			echo 'warn += "'.$warning_s["$i"].'";';
		}
		for ($i = 0; $i < $wes; $i++)
		{
			echo 'warn += "\n";';
			echo 'warn += "'.$warning_es["$i"].'";';
		}
		for ($i = 0; $i < $wt; $i++)
		{
			echo 'warn += "\n";';
			echo 'warn += "'.$warning_t["$i"].'";';
		}
		for ($i = 0; $i < $wet; $i++)
		{
			echo 'warn += "\n";';
			echo 'warn += "'.$warning_et["$i"].'";';
		}
		for ($i = 0; $i < $wz; $i++)
		{
			echo 'warn += "\n";';
			echo 'warn += "'.$warning["$i"].'";';
		}
		echo 'alert(warn);';
		echo 'window.location=\'BatchUpload.php\';';
		echo '</script>';
	}
	  
	function p_warn($warning, $wz)
	{
		echo '<script>';
		echo 'var warn = "Picture upload failed！";';
		echo 'warn += "\n";';
		for ($i = 0; $i < $wz; $i++)
		{
			echo 'warn += "\n";';
			echo 'warn += "'.$warning["$i"].'";';
		}
		echo 'alert(warn);';
		echo 'window.location=\'BatchUpload.php\';';
		echo '</script>';
	}

?>
	  
    </div>
  </div>
  </body>
</html>

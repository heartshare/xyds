<script type="text/javascript">
    var listdictUrl = "<?=Yii::$app->urlManager->createUrl('dict/findall')?>";
    var checkCodeUrl = "<?=Yii::$app->urlManager->createUrl('service-site/check-code')?>";
    var saveUrl = "<?=Yii::$app->urlManager->createUrl('service-site/add-one')?>";
    var indexUrl = "<?=Yii::$app->urlManager->createUrl('service-site/index')?>";
    function pic(){
	    var a;
	    var timeText = $('.pic_text');
	    a = document.myform.attachUrls.value;
	    a = "<img src='"+a+"'  width='60%'>";
	    timeText.html(a);
    }
</script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=4cXNyMR23iSxTmEEzcyNcjdd6GuBvaef"></script>

<div id="allmap" style="height:600px;width:900px;margin: 0 auto;"></div>
<div class="pad-lr-10">
    <form name="myform" action="" method="post" id="myform" target="iframeId">
        <div class="pad_10">
            <div style='overflow-y:auto;overflow-x:hidden' class='scrolltable'>
                <table width="100%" cellspacing="0" class="table_form contentWrap">
                    <tr>
                        <th></th>
                        <th style="font-weight: 900;">点击地图标注，右键可删除</th>
                    </tr>
                    <tr>
                        <th>站点编码：</th>
                        <td><input type="text" style="width:250px;height: 30px;" name="code" id="code"  class="input-text"/></td>
                    </tr>
                    <tr>
                        <th>站点名称：</th>
                        <td><input type="text" style="width:250px;height: 30px;" name="name" id="name"  class="input-text"/></td>
                    </tr>
                    <tr>
                        <th>站点类型：</th>
                        <td><select id="type" name="type" style="width:200px;height: 30px;"></select></td>
                    </tr>
                    <tr>
                        <th>负责人：</th>
                        <td><input type="text" style="width:250px;height: 30px;" name="chargeName" id="chargeName" class="input-text"/></td>
                    </tr>
	                <tr>
		                <th>联系电话：</th>
		                <td><input type="text" style="width:250px;height: 30px;" name="chargeMobile" id="chargeMobile" class="input-text"/></td>
	                </tr>
	                <tr>
		                <th>地址：</th>
		                <td><input type="text" style="width:400px;height: 30px;" name="address" id="address" class="input-text"/></td>
	                </tr>
	                <tr onmouseout="pic()">
		                <th>站点照片：</th>
		                <td><input type="text" style="display:none;" name="attachUrls" id="attachUrls" class="input-text"/>
			                <input type="text" style="display:none;" name="attachNames" id="attachNames" class="input-text"/>
			                <iframe frameborder="0" width="100%" height="20px" scrolling="no" src="<?=Yii::$app->urlManager->createUrl('service-site/upload')?>"></iframe>
		                </td>
	                </tr>
	                <tr>
		                <th>图片预览：</th>
		                <td class="pic_text"></td>
	                </tr>
                </table>
            </div>
            <div class="bk10"></div>
        </div>
    </form>
    <div class="table-list">
        <div class="rightbtn">
            <input type="button" id="addInfo" class="buttonsave" value="增加" name="dosubmit" onclick="add()" />
            <input type="button" class="buttonclose" value="关闭" name="dosubmit"  onclick="window.top.$.dialog.get('site_add').close();"/>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/admin/service-site/add.js"></script>


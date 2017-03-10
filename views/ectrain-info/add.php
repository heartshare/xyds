<?php
$this->title = '添加培训详情';
?>

<script type="text/javascript">
    var listallUrl = "<?=yii::$app->urlManager->createUrl('ectrain-info/find-by-attri')?>";
    var insertUrl = "<?=yii::$app->urlManager->createUrl('ectrain-info/add-one')?>";
</script>
<script type="text/javascript" src="js/admin/ectrain-info/add.js"></script>


<div class="pad-lr-10">
    <form name="myform" action="" method="post" id="myform" target="iframeId">
        <div class="pad_10">
            <div style='overflow-y:auto;overflow-x:hidden' class='scrolltable'>
                <table width="100%" cellspacing="0" class="table_form contentWrap">
                    <tr>
                        <th >培训ID：</th>
                        <td><input type="text" style="width:250px;" name="trainId" id="trainId"  class="input-text"/></td>
                    </tr>
                    <tr>
                        <th >中央财政资金支持总金额：</th>
                        <td><input type="text" style="width:250px;" name="centralSupport" id="centralSupport"  class="input-text"/>万元</td>
                    </tr>
                    <tr>
                        <th>中央财政资金已拨付金额：</th>
                        <td><input type="text" style="width:250px;" name="centralPaid" id="centralPaid"  class="input-text"/>万元</td>
                    </tr>
                    <tr>
                        <th>地方财政配套资金总金额：</th>
                        <td><input type="text" style="width:250px;" name="localSupport" id="localSupport"  class="input-text"/>万元</td>
                    </tr>
                    <tr>
                        <th>企业投入资金总金额：</th>
                        <td><input type="text" style="width:250px;" name="companyPaid" id="companyPaid"  class="input-text"/>万元</td>
                    </tr>
                    <tr>
                        <th>项目承办单位：</th>
                        <td><input type="text" style="width:250px;" name="organizer" id="organizer"  class="input-text"/></td>
                    </tr>
                    <tr>
                        <th>承办单位负责人：</th>
                        <td><input type="text" style="width:250px;" name="chargeName" id="chargeName"  class="input-text"/></td>
                    </tr>
                    <tr>
                        <th>负责人联系电话：</th>
                        <td><input type="text" style="width:250px;" onkeyup="this.value=this.value.replace(/[^0-9-]+/,'');" name="chargeMobile" id="chargeMobile"  class="input-text"/></td>
                    </tr>
                    <tr>
                        <th>中央财政资金支持此项目的政府决策单位：</th>
                        <td><input type="text" style="width:250px;" name="centralDecisionUnit" id="centralDecisionUnit"  class="input-text"/></td>
                    </tr>
                    <tr>
                        <th>决策文件：</th>
                        <td>
                            <input type="text" style="display:none;" name="attachUrls" id="attachUrls" class="input-text"/>
                            <input type="text" style="display:none;" name="attachNames" id="attachNames" class="input-text"/>
                            <iframe frameborder=0 width="100%" height=20px scrolling=no src="<?=yii::$app->urlManager->createUrl('ectrain-info/upload')?>"></iframe>
                        </td>
                    </tr>
                    <tr>
                        <th>信息公开网址链接：</th>
                        <td><input type="text" style="width:250px;" name="publicInfoUrl" id="publicInfoUrl"  class="input-text"/></td>
                    </tr>
                    <tr>
                        <th>培训人员签到表：</th>
                        <td>
                            <input type="text" style="display:none;" name="signSheetUrl" id="signSheetUrl" class="input-text"/>
                            <input type="text" style="display:none;" name="attachNames" id="attachNames" class="input-text"/>
                            <iframe frameborder=0 width="100%" height=20px scrolling=no src="<?=yii::$app->urlManager->createUrl('ectrain-info/uploads')?>"></iframe>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="bk10"></div>
        </div>
    </form>
    <div class="table-list">
        <div class="rightbtn">
            <input type="button" class="buttonsave" value="增加" name="dosubmit" onclick="add()" />
            <input type="button" class="buttonclose" value="关闭" name="dosubmit"  onclick="window.top.$.dialog.get('info_add').close();"/>
        </div>
    </div>
</div>



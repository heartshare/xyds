<?php
$this->title = '培训详情';
?>

<div class="pad-lr-10">
    <form id="myform" action="" method="post">
        <div class="pad_10">
            <div style='overflow-y:auto;overflow-x:hidden' class='scrolltable'>
                <table width="100%" cellspacing="0" class="table_form contentWrap">
                    <tr>
                        <th align="right" width="150px">培训ID：</th>
                        <td id="trainId"><?=$ectrainInfo->trainId?></td>
                    </tr>
                    <tr>
                        <th align="right">中央财政资金支持总金额：</th>
                        <td id="centralSupport"><?=$ectrainInfo->centralSupport?>万元</td>
                    </tr>
                    <tr>
                        <th align="right">中央财政资金已拨付金额：</th>
                        <td id="centralPaid"><?=$ectrainInfo->centralPaid?>万元</td>
                    </tr>
                    <tr>
                        <th align="right">地方财政配套资金总金额：</th>
                        <td id="localSupport"><?=$ectrainInfo->localSupport?>万元</td>
                    </tr>
                    <tr>
                        <th align="right">企业投入资金总金额：</th>
                        <td id="companyPaid"><?=$ectrainInfo->companyPaid?>万元</td>
                    </tr>
                    <tr>
                        <th align="right">企业网商总数：</th>
                        <td id="companyNum"><?=$ectrainInfo->companyNum?>万元</td>
                    </tr>
                    <tr>
                        <th align="right">当月新孵化企业网商：</th>
                        <td id="newCompanyThisM"><?=$ectrainInfo->newCompanyThisM?>万元</td>
                    </tr>
                    <tr>
                        <th align="right">个人网商总数：</th>
                        <td id="singleNum"><?=$ectrainInfo->singleNum?>万元</td>
                    </tr>
                    <tr>
                        <th align="right">当月新孵化个人网商：</th>
                        <td id="newSingleThisM"><?=$ectrainInfo->newSingleThisM?>万元</td>
                    </tr>
                    <tr>
                        <th align="right">项目承办单位：</th>
                        <td id="organizer"><?=$ectrainInfo->organizer?></td>
                    </tr>
                    <tr>
                        <th align="right">承办单位负责人：</th>
                        <td id="chargeName"><?=$ectrainInfo->chargeName?></td>
                    </tr>
                    <tr>
                        <th align="right">负责人联系电话：</th>
                        <td id="chargeMobile"> <?=$ectrainInfo->chargeMobile?></td>
                    </tr>
                    <tr>
                        <th align="right">中央财政资金支持此项目的政府决策单位：</th>
                        <td id="centralDecisionUnit"><?=$ectrainInfo->centralSupport?></td>
                    </tr>
                    <tr>
                        <th align="right">信息公开网址链接：</th>
                        <td id="publicInfoUrl"><?=$ectrainInfo->publicInfoUrl?></td>
                    </tr>
                    <tr>
                        <th align="right">培训时间：</th>
                        <td id="published"><?=$ectrainInfo->published?></td>
                    </tr>
                    <tr>
                        <th align="right">决策文件名称：</th>
                        <td id="decisionFileName"><?=$ectrainInfo->decisionFileName?></td>
                    </tr>
                    <tr>
                        <th align="right">签到文件名称：</th>
                        <td id="signSheetName"><?=$ectrainInfo->signSheetName?></td>
                    </tr>
                </table>
            </div>
            <div class="bk10"></div>

            <div class="table-list">

                <div class="rightbtn">
                    <input type="button" class="buttonclose" name="dosubmit" value="关闭" onclick="window.top.$.dialog.get('info_detail').close();" />
                </div>
            </div>
    </form>
</div>

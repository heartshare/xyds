<?php
$this->title = '产品详情';
?>
<div class="pad-lr-10">
    <form id="myform" action="" method="post">
        <div class="pad_10">
            <div style='overflow-y:auto;overflow-x:hidden' class='scrolltable'>
                <table width="100%" cellspacing="0" class="table_form contentWrap">
                    <tr>
                        <th width="100px"  align="right">产品名称</th>
                        <td id="name"><?=$companyProduct->name?></td>
                    </tr>
                    <tr>
                        <th  align="right">产品介绍</th>
                        <td id="introduction"><?=$companyProduct->introduction?></td>
                    </tr>
                    <tr>
                        <th align="right">产品价格</th>
                        <td id="price"><?=$companyProduct->price?></td>
                    </tr>
                    <tr>
                        <th align="right">产品折扣</th>
                        <td id="discount"><?=$companyProduct->discount?></td>
                    </tr>
                    <tr>
                        <th align="right">产品状态</th>
                        <td id="state"><?=$companyProduct->state?></td>
                    </tr>
                    <tr>
                        <th align="right">产品大图</th>
                        <td id="thumbnailUrl"> <img src="<?=$companyProduct->thumbnailUrl?>"></td>
                    </tr>
                </table>
            </div>
            <div class="bk10"></div>

            <div class="table-list">

                <div class="rightbtn">
                    <input type="button" class="buttonclose" name="dosubmit" value="关闭" onclick="window.top.$.dialog.get('product_detail').close();" />
                </div>
            </div>
    </form>
</div>
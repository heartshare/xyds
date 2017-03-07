<?php
$this->title = '新闻详情';
?>

</head>
<body>
<div class="pad-lr-10">
    <form id="myform" action="" method="post">
        <div class="pad_10">
            <div style='overflow-y:auto;overflow-x:hidden' class='scrolltable'>
                <table width="100%" cellspacing="0" class="table_form contentWrap">
                    <tr>
                        <th width="100">企业ID</th>
                        <td id="companyId"><?=$companyNews->companyId?></td>
                    </tr>
                    <tr>
                        <th width="100">新闻标题</th>
                        <td id="title"><?=$companyNews->title?></td>
                    </tr>
                    <tr>
                        <th width="100">新闻内容</th>
                        <td id="content"><?=$companyNews->content?></td>
                    </tr>
                    <tr>
                        <th width="100">关键词</th>
                        <td id="keyword"><?=$companyNews->keyword?></td>
                    </tr>
                </table>
            </div>
            <div class="bk10"></div>

            <div class="table-list">

                <div class="rightbtn">
                    <input type="button" class="buttonclose" name="dosubmit" value="关闭" onclick="window.top.$.dialog.get('news_detail').close();" />
                </div>
            </div>
    </form>
</div>
</body>
</html>
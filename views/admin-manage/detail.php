<div class="pad-lr-10">
<form id="myform" action="" method="post">
    <div class="pad_10">
        <div style='overflow-y:auto;overflow-x:hidden' class='scrolltable'>
            <table width="100%" cellspacing="0" class="table_form contentWrap">
                <tr>
                    <th width="100">用户名</th>
                    <td id="username"><?=$user->username?></td>
                </tr>
                <tr>
                    <th width="100">真实姓名</th>
                    <td id="truename"><?=$user->truename?></td>
                </tr>
                <tr>
                    <th width="100">电话号码</th>
                    <td id="mobilephone"><?=$user->telephone?></td>
                </tr>
                <tr>
                    <th>状态</th>
                    <td id="userState"><?=$user->state?></td>
                </tr>
            </table>
        </div>
        <div class="bk10"></div>

        <div class="table-list">

           <div class="rightbtn">
               <input type="button" class="buttonclose" name="dosubmit" value="关闭" onclick="window.top.$.dialog.get('admin_detail').close();" />
            </div>
        </div>
</form>
</div>
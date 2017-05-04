// 加载字典信息
$(document).ready(function(){
	generateDict('DICT_CATEGORY','category','信息类别');
})
//打开添加页面
function openadd(){
	$.dialog({id:'info_add'}).close();
	$.dialog.open(addUrl, {
		title: '添加信息',
		width: 800,
		height:600,
		lock: true,
		border: false,
		id: 'info_add',
		drag:true
	});
}

//查询功能
function search(){
	if(str_is_null($('#title').val())&&str_is_null($('#author').val())&&str_is_null($('#category').val())) {

		window.top.art.dialog({
			content: '至少有一个查询条件不为空！',
			lock: true,
			width: 250,
			height: 100,
			border: false,
			time: 2
		});
		return ;
	}
	var paraStr = "&title="+$('#title').val()+"&author="+$('#author').val()+"&category="+$('#category').val();
	$('#iframeId').attr('src',listallUrl+paraStr);
}

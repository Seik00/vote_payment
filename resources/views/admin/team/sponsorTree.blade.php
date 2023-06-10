@extends('admin.layouts.header')

<link rel="stylesheet" type="text/css" href="/assets/jstree/dist/themes/default/style.min.css"/>	
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action='{{  Request::url() }}' method='GET'>
					<div class="row">
						<div class="col-6 mb-2">
						{{ __('site.Username') }}
							<input class="form-control" type="text" name="username" value="{{ request('username') }}" />
						</div>

					</div>
					<div>
						<div class="col-12 text-right">
							<button  type='submit' class="btn btn-gradient-primary btn-sm px-3">{{ __('site.SEARCH') }}</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-body">
			<h4 class="mt-0 header-title"></h4>
				<div id="tree_4" class="tree-demo"></div>
			</div>
		</div>
	</div>
</div>
@stop
@section('script')
<script src="/assets/jstree/dist/jstree.min.js"></script>

<script src="/assets/jconfirm/jquery.alerts.js" type="text/javascript"></script> 
<link href="/assets/jconfirm/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" /> 

<script type="text/javascript">
var lan="{$lan}";
$("#tree_4").bind('select_node.jstree', function (e, data)
	{
		var text = data.instance.get_node(data.selected).text;
		var id = data.instance.get_node(data.selected).id;
		if(text == '注册' || text == 'Register')
		{
			//alert(data.instance.get_node(data.selected).id);
		}
		else
		{
			$("#mo").click();
			$.getJSON("/Manage/Check/get_info/id/"+id, function(json)
			{
				var bold = "<b>";
				var cbold = "</b>";
				if(lan=="cn")
				{
					var title = "代理商详情";
					var username = bold+"代理商账号"+cbold;
					var packagename = bold+"配套名称"+cbold;
					var regtime = bold+"注册日期"+cbold;
					var emailt = bold+"邮箱地址"+cbold;
				}
				else
				{
					var title = "Member Information";
					var username = bold+"Member Name"+cbold;
					var packagename = bold+"Package Name"+cbold;
					var regtime = bold+"Register Date"+cbold;
					var emailt = bold+"E-mail"+cbold;
				}
				var lid = json.lid;
				var gname = json.gname;
				var days = json.days;
				var add_time = json.add_time;
				var email = json.email;
				document.getElementById("info-title").innerHTML=title;
				document.getElementById("info-username").innerHTML=username;
				document.getElementById("info-packagename").innerHTML=packagename;
				document.getElementById("info-regtime").innerHTML=regtime;
				document.getElementById("info-emailt").innerHTML=emailt;
				document.getElementById("info-lid").innerHTML=lid;
				document.getElementById("info-gname").innerHTML=gname;
				document.getElementById("info-add_time").innerHTML=add_time;
				document.getElementById("info-email").innerHTML=email;
			});
		}
	})
	.jstree
	({
		"core" : {
			"themes" : {
				"responsive": false
			}, 
			// so that create works
			"check_callback" : false,
			'data' :
			{
				'url' : function (node)
				{
					return '/admin/team/jstree_ajax_data?uid={{$uid}}';
				},
				'data' : function (node)
				{
					
					return {'parent':node.id};
				}
			}
		},
		"types" :
		{
			"default" :
			{
				"icon" : "fa fa-folder icon-state-warning icon-lg"
			},
			"file" :
			{
				"icon" : "fa fa-file icon-state-warning icon-lg"
			}
		},
		"state" : { "key" : "demo3" },
		"plugins" : ["dnd","types","themes","html_data","ui"]
	});
	
</script>

@stop
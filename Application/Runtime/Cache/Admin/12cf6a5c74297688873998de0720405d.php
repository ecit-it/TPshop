<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>管理中心 - 商品列表 </title>
<meta name="robots" c>
<meta http-equiv="Content-Type" c />
<link href="/Public/Admin/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/styles/main.css" rel="stylesheet" type="text/css" />
<style>
    a.num{
      border: 1px solid red;
      margin: 3px;
      padding: 3px;
    }
    span.current{
      background: red;
      padding: 4px;
    }
  </style>

</head>
<body>

<h1>
<span class="action-span"><a href="<?php echo U('add');?>">添加新商品</a></span>
<span class="action-span1"><a href="javascript:;">管理中心</a> </span><span id="search_id" class="action-span1"> - 商品列表 </span>
<div style="clear:both"></div>
</h1>

<div class="form-div">

  <form action="<?php echo U('lst','', false);?>" method="GET"  name='search'>
    <p>
    
      按商品价格搜索：从<input type="text" name="sp" value="<?php echo I('get.sp');?>" id="" /> 到
      <input type="text" name="ep" value="<?php echo I('get.ep');?>"  id="" />
    </p>
    <p>
       按商品名称搜索：&nbsp;&nbsp;&nbsp;<input type="text" name="gn" value="<?php echo I('get.gn');?>"  id=""/>
    </p>
    
    <p>
      <input type="radio" name="ob" value='id' <?php if(!I('get.ob') || I('get.ob') == 'id') echo "checked='checked' " ;?>   id="" />按ID排序
      <input type="radio" name="ob" value='goods_price'   <?php if(I('get.ob') == 'shop_price') echo "checked='checked' "; ?> id="" />按本店价排序
    </p>
    <p>
      <input type="radio" name="ow" value="desc"  <?php if(!I('get.ow') || I('get.ow') == 'desc') echo "checked='checked' " ;?>  id=""/>降序
      <input type="radio" name="ow" value='asc'  <?php if(!I('get.ow') || I('get.ow') == 'asc') echo "checked='checked' " ;?>  id="" />升序
    </p>  

    <p>
      <input type="submit" value="搜索" />
    </p>
    
  </form>
</div>

<div class="list-div" id="listDiv">
<table cellpadding="3" cellspacing="1">
  <tr align="center">
    <th><a href="JavaScript:;">商品名称</a></th>
    <th><a href="JavaScript:;">商品价格</a></th>
    <th><a href="JavaScript:;">上架</a></th>
    <th><a href="JavaScript:;">精品</a></th>
    <th><a href="JavaScript:;">新品</a></th>

    <th><a href="JavaScript:;">热销</a></th>
    <th><a href="JavaScript:;">库存</a></th>
    <th>操作</th>
  </tr>


  <?php foreach ($goodsData as $k => $v): ?>

  <tr align="center">
    <td class="first-cell" style=""><span ><?php echo $v['goods_name'];?></span></td>
    <td align="center"><span ><?php echo $v['goods_price'];?>
    </span></td>
    <td align="center"><img src="/Public/Admin/images/<?php echo $v['is_sale'] ? 'yes' : 'no' ;?>.gif"  /></td>
    <td align="center"><img src="/Public/Admin/images/<?php echo $v['is_best'] ? 'yes' : 'no' ;?>.gif"  /></td>
    <td align="center"><img src="/Public/Admin/images/<?php echo $v['is_new'] ? 'yes' : 'no' ;?>.gif"  /></td>
    <td align="center"><img src="/Public/Admin/images/<?php echo $v['is_hot'] ? 'yes' : 'no' ;?>.gif"  /></td>

    <td align="center"><span ><?php echo $v['goods_number'];?></span></td>
     <td align="center">
     <a href="<?php echo U('det', array('id'=>$v['id'],'p'=>I('get.p', 1)), false);?>" title="查看"><img src="/Public/Admin/images/book_open.gif" width="16" height="16" border="0" /></a>

      <a href="<?php echo U('edt', array('id'=>$v['id'],'p'=>I('get.p', 1)), false);?>" title="编辑"><img src="/Public/Admin/images/icon_edit.gif" width="16" height="16" border="0" /></a>
      <a onclick="return confirm('是否放入回收站？')"   href="<?php echo U('del', array('id'=>$v['id']), false);?>"  title="回收站"><img src="/Public/Admin/images/icon_trash.gif" width="16" height="16" border="0" /></a>
      
           </td>
  </tr>    
  <?php endforeach ?>

 </table>

<table id="page-table" cellspacing="0">
  <tr align="center">
    <td align="right" nowrap="true">
          <?php echo $page;?>
    </td>
  </tr>
</table>

</div>

<div id="footer">
共执行 7 个查询，用时 0.112141 秒，Gzip 已禁用，内存占用 3.085 MB<br />
版权所有 &copy; 2005-2010 上海商派网络科技有限公司，并保留所有权利。
</div>
</body>
<script type="text/javascript" src="/Public/Js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">

  // 表单搜索默认提交行为
  $("form[name=search]").click(function(event) {
    
    var _target = $(event.target);// 当前被点击的对象

    var _type = _target.attr('type'); // 当前被点击对象的类型 （text radio）

    if(_type == 'text'){
      var _This = this;
      // 如果是文本框失去焦点则触发提交
      _target.blur(function(event) {

        $(_This).submit();

      });

    }else if(_type == 'radio'){
      // 如果是单选框则触发提交
      $(this).submit();
    }
  });
</script>

</html>
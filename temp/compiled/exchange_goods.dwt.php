<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>



<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<link href="themes/xiaomi/goods.css" rel="stylesheet" type="text/css" />

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js')); ?>
<script type="text/javascript">
function $id(element)
{
  return document.getElementById(element);
}
//切屏--是按钮，_v是内容平台，_h是内容库
function reg(str)
{
  var bt=$id(str+"_b").getElementsByTagName("h2");

  for(var i=0;i<bt.length;i++)
  {
    bt[i].subj=str;
    bt[i].pai=i;
    bt[i].style.cursor="pointer";

    bt[i].onclick=function()
    {
      $id(this.subj+"_v").innerHTML=$id(this.subj+"_h").getElementsByTagName("blockquote")[this.pai].innerHTML;

      for(var j=0;j<$id(this.subj+"_b").getElementsByTagName("h2").length;j++)
      {
        var _bt=$id(this.subj+"_b").getElementsByTagName("h2")[j];
        var ison=j==this.pai;
        _bt.className=(ison?"":"h2bg");
      }
    }
  }

  $id(str+"_h").className="none";
  $id(str+"_v").innerHTML=$id(str+"_h").getElementsByTagName("blockquote")[0].innerHTML;
}
</script>
</head>
<body>
<?php echo $this->fetch('library/page_header.lbi'); ?><?php echo $this->smarty_insert_scripts(array('files'=>'magiczoomplus.js,easydialog.min.js,xiaomi_goods.js')); ?>
<?php echo $this->fetch('library/ur_here_goods.lbi'); ?> 
<div class="goods-detail">
  <div class="goods-detail-info  clearfix J_goodsDetail"> 
  	<div class="container">
    	<div class="row">
        	<div class="span13  J_mi_goodsPic_block goods-detail-left-info">
               
              <?php echo $this->fetch('library/goods_gallery.lbi'); ?>
   			</div>
            <div class="span7 goods-info-rightbox">
              <form action="exchange.php?act=buy" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY" >
              
              <div class="item-info" id="item-info">
                  <dl class="loaded">
                  	<dt class="goods-info-head">
                    	<dl>
                        
                          
                          <dt class="goods-name"><?php echo $this->_var['goods']['goods_style_name']; ?></dt>
                          <dd class="goods-phone-type"></dd>
                          <?php if ($this->_var['cfg']['show_marketprice']): ?>
                          <del class="desc"><?php echo $this->_var['lang']['market_price']; ?>：<?php echo $this->_var['goods']['market_price']; ?></del>
                          <?php endif; ?>
                          
                          <dd class="goods-info-head-price clearfix">
                              <span><?php echo $this->_var['lang']['exchange_integral']; ?> </span> <span class="unit"> <b class="nala_price red"><?php echo $this->_var['goods']['exchange_integral']; ?></b></span>
                          </dd>
                          
                            <ul>
                              <?php if ($this->_var['cfg']['show_goodssn']): ?>
                              <li> <span class="lbl"><?php echo $this->_var['lang']['goods_sn']; ?></span> <em><?php echo $this->_var['goods']['goods_sn']; ?></em> </li>
                              <?php endif; ?>
                              <?php if ($this->_var['cfg']['show_goodsweight']): ?>
                              <li> <span class="lbl"><?php echo $this->_var['lang']['goods_weight']; ?></span> <em><?php echo $this->_var['goods']['goods_weight']; ?></em> </li>
                              <?php endif; ?>
                            </ul>
                          
                          <dd class="goods-info-choose">
                          	<div id="choose" class="spec_list_box">
                                <ul>
                                     
                                    <?php $_from = $this->_var['specification']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('spec_key', 'spec');if (count($_from)):
    foreach ($_from AS $this->_var['spec_key'] => $this->_var['spec']):
?> 
                                    <?php if ($this->_var['spec']['attr_type'] == 1): ?> 
                                        <?php if ($this->_var['spec']['is_show_img'] == 1): ?>
                                        <li class="GeneralAttrImg">
                                            <div class="dt"><?php echo $this->_var['spec']['name']; ?>：</div>
                                            <div class="dd"> 
                                                <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
                                                <div class="item<?php if ($this->_var['key'] == 0): ?> selected<?php endif; ?>">
                                                    <b></b>
                                                    <a href="<?php echo $this->_var['value']['img_original']; ?>" title="<?php echo $this->_var['value']['label']; ?>" rel="zoom-id: Zoomer" rev="<?php echo $this->_var['value']['img_original']; ?>">
                                                    <img src="<?php echo $this->_var['value']['thumb_url']; ?>" width="30" height="30" /><span><?php echo $this->_var['value']['label']; ?></span>
                                                    </a>
                                                    <input id="spec_value_<?php echo $this->_var['value']['id']; ?>" style="display:none;" type="radio" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" <?php if ($this->_var['key'] == 0): ?>checked<?php endif; ?> />
                                                </div>
                                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                            </div>
                                        </li>
                                        <?php else: ?>
                                        <li>
                                            <div class="dt"><?php echo $this->_var['spec']['name']; ?>：</div>
                                            <div class="dd"> 
                                                <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
                                                <div class="item<?php if ($this->_var['key'] == 0): ?> selected<?php endif; ?>">
                                                    <b></b>
                                                    <a href="#none" title="<?php echo $this->_var['value']['label']; ?>"><?php echo $this->_var['value']['label']; ?></a>
                                                    <input id="spec_value_<?php echo $this->_var['value']['id']; ?>" style="display:none;" type="radio" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" <?php if ($this->_var['key'] == 0): ?>checked<?php endif; ?> />
                                                </div>
                                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                                            </div>
                                        </li>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <li>
                                            <div class="dt"><?php echo $this->_var['spec']['name']; ?>：</div>
                                            <div class="dd">
                                                <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
                                                <div class="check_item">
                                                    <label for="spec_value_<?php echo $this->_var['value']['id']; ?>">
                                                        <input type="checkbox" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" id="spec_value_<?php echo $this->_var['value']['id']; ?>" onclick="changePrice()" />
                                                        <?php echo $this->_var['value']['label']; ?> [<?php if ($this->_var['value']['price'] > 0): ?><?php echo $this->_var['lang']['plus']; ?><?php elseif ($this->_var['value']['price'] < 0): ?><?php echo $this->_var['lang']['minus']; ?><?php endif; ?> <?php echo $this->_var['value']['format_price']; ?>]
                                                    </label>
                                                </div>
                                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                                <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
                                            </div>
                                        </li>
                                    <?php endif; ?>
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                                    
                                </ul>
                            </div>
                            <style>
							#choose{margin:0;}
							#choose li{overflow:hidden; padding-bottom:20px;}
							#choose .dt{width:72px; text-align:left; float:left; padding:6px 0 0;}
							#choose .dd{overflow:hidden;}
							#choose .dd .item{float:left; margin:2px 8px 2px 0; position:relative;}
							#choose .dd .item a{border:1px solid #ccc; padding:4px 6px; float:left;}
							#choose .dd .item a span{padding:0 3px; line-height:30px;}
							#choose .dd .item a img{width:30px; height:30px;}
							#choose .dd .item b{width:12px; height:12px; background:url(themes/xiaomi/images/gou.png) no-repeat; position:absolute; bottom:1px; right:1px; overflow:hidden; display:none;}
							#choose .dd .item.selected a{border-width:2px; border-color:#e4393c; padding:3px 5px;}
							#choose .dd .item.selected b{display:block;}
							#choose li.GeneralAttrImg .dt{padding-top:10px;}
							#choose li.GeneralAttrImg .dd .item a{padding:1px;}
							#choose li.GeneralAttrImg .dd .item a img{margin:1px;}
							#choose li.GeneralAttrImg .dd .item.selected a{padding:0;}
							</style>
							
							<script>
							$(".spec_list_box .item a").click(function(){
								$(this).parents(".dd").find(".item").removeClass("selected");
								$(this).parent().addClass("selected");
								$(this).parents(".dd").find("input:radio").prop("checked",false);
								$(this).parent().find("input:radio").prop("checked",true);
								changePrice();
							})
							</script>
                          </dd>
                          <dd class="goods-info-head-cart">
                          	  
                              <a href="javascript:$('#ECS_FORMBUY').submit();" class="btn  btn-primary goods-add-cart-btn" id="buy_btn"><i class="iconfont"></i> <?php echo $this->_var['lang']['exchange_goods']; ?></a> 
                              <input type="hidden" name="goods_id" value="<?php echo $this->_var['goods']['goods_id']; ?>" />
                          </dd>
                          <dd class="goods-info-head-userfaq clearfix">
                            <ul>
                                <li class=""><i class="iconfont"></i> 销量 <b><?php echo $this->_var['goods']['sales_volume']; ?></b></li>
                                <li class="J_scrollcomment mid"><i class="iconfont"></i> 评价 <b><?php echo $this->_var['goods']['comments_number']; ?></b></li>
                                <li class="J_scrollcomment"><i class="iconfont"></i> 满意度 <b><?php echo $this->_var['comment_percent']['haoping_percent']; ?>%</b></li>
                            </ul>
                          </dd>
                      	</dl>
                      </dt>
                  </dl>
              </div>
              </form>
              <?php echo $this->fetch('library/history.lbi'); ?>
  			</div>
  		</div>
 	</div>
  </div>
  <div class="full-screen-border"></div>
  <div class="goods-detail-main">
  
        <div class="goods-detail-nav" id="goodsDetail">
          <div class="container">
            <ul class="detail-list">
              <li class="on"> <a class="J_scrollHref" rel="nofollow" href="javascript:void(0);">详情描述</a> </li>
              <li><a class="J_scrollHref" href="javascript:void(0);" rel="nofollow">规格参数</a></li>
              <li><a class="J_scrollHref" href="javascript:void(0);" rel="nofollow">评价晒单(<em><?php echo $this->_var['goods']['comments_number']; ?></em>)</a></li>
            </ul>
          </div>
        </div>
        
        <div class="product_tabs">
            
            <div class="goods-detail-desc goods_con_item">
                <div class="container">
                    <div class="shape-container">
                        <?php if ($this->_var['goods']['goods_desc']): ?>
                        <?php echo $this->_var['goods']['goods_desc']; ?>
                        <?php else: ?>
                        <p class="empty">暂无详情描述</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <div  class="goods-detail-nav-name-block goods_con_item">
                <div class="container main-block">
                    <div class="border-line"></div>
                    <h2 class="nav-name">规格参数</h2>
                </div>
            </div>
            <div class="goods-detail-param">
                <div class="container">
                    <ul class="param-list">
                        <li class="goods-img"><img src="<?php if ($this->_var['picture']['thumb_url']): ?><?php echo $this->_var['picture']['thumb_url']; ?><?php else: ?><?php echo $this->_var['picture']['img_url']; ?><?php endif; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" /></li>
                        <li class="goods-tech-spec">
                            <ul>
                                <li>产品名称：<?php echo $this->_var['goods']['goods_name']; ?></li>
                                <?php if ($this->_var['goods']['goods_brand'] != "" && $this->_var['cfg']['show_brand']): ?>
                                <li>产品品牌：<?php echo $this->_var['goods']['goods_name']; ?></li>
                                <?php endif; ?> 
                                <?php $_from = $this->_var['properties']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'property_group');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['property_group']):
?>
                                <?php $_from = $this->_var['property_group']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'property');if (count($_from)):
    foreach ($_from AS $this->_var['property']):
?>
                                <li><?php echo htmlspecialchars($this->_var['property']['name']); ?>：<?php echo $this->_var['property']['value']; ?></li>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="goods-detail-nav-name-block goods_con_item">
                <div class="container main-block">
                    <div class="border-line"></div>
                    <h2 class="nav-name">评价晒单</h2>
                </div>
            </div>
            <div class="goods-detail-comment hasContent z-com-box-head">
                <div id="ECS_COMMENT">
                <?php echo $this->fetch('library/comments.lbi'); ?>
                </div>
            </div>
        </div>
        
  </div>
</div>  
</div>



<div class="goods-sub-bar" id="goodsSubBar">
	<div class="container">
    	<ul class="detail-list">
          <li class="on"> <a class="J_scrollHref" rel="nofollow" href="javascript:void(0);">详情描述</a> </li>
          <li class=""> <a class="J_scrollHref" rel="nofollow" href="javascript:void(0);">规格参数</a> </li>
          <li class=""><a class="J_scrollHref" href="javascript:void(0);" name="pjxqitem" rel="nofollow">评价晒单(<em><?php echo $this->_var['goods']['comments_number']; ?></em>)</a></li>
          <li class="tab-buy" id="tab-buy" style="display:none;"><a href="javascript:$('#ECS_FORMBUY').submit();" class="btn  btn-primary goods-add-cart-btn" id="buy_btn"><i class="iconfont"></i> <?php echo $this->_var['lang']['exchange_goods']; ?></a></li>
        </ul>
        <dl class="goods-sub-bar-info clearfix">
        	<dt><img src="<?php if ($this->_var['picture']['thumb_url']): ?><?php echo $this->_var['picture']['thumb_url']; ?><?php else: ?><?php echo $this->_var['picture']['img_url']; ?><?php endif; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" /></dt>
            <dd>
            	<strong><?php echo $this->_var['goods']['goods_style_name']; ?></strong>
                <p><em><?php echo $this->_var['goods']['goods_brief']; ?></em></p>
            </dd>
        </dl>
        <a href="javascript:$('#ECS_FORMBUY').submit();" class="btn  btn-primary goods-add-cart-btn" id="buy_btn"><i class="iconfont"></i> <?php echo $this->_var['lang']['exchange_goods']; ?></a>>
    </div>
</div>


<div class="add_ok" id="cart_show">
    <div class="tip">
        <i class="iconfont"> </i>商品已成功加入购物车
    </div>
    <div class="go">
        <a href="javascript:easyDialog.close();" class="back">&lt;&lt;继续购物</a>
        <a href="flow.php" class="btn">去结算</a>
    </div>
</div>


<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body>
<script type="text/javascript">

onload = function()
{
  fixpng();
}

</script>
</html>

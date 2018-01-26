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
<link href="themes/xiaomi/category.css" rel="stylesheet" type="text/css" />

<?php echo $this->smarty_insert_scripts(array('files'=>'jquery-1.9.1.min.js,jquery.json.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'utils.js,common.js,global.js,compare.js')); ?>
</head>
<body>
<?php echo $this->fetch('library/page_header.lbi'); ?> <?php echo $this->smarty_insert_scripts(array('files'=>'xiaomi_category.js')); ?>
<div class="content"> 
   
  <?php echo $this->fetch('library/ur_here.lbi'); ?>
  <div class="container">   
       <?php if ($this->_var['goods_list']): ?>
       
        
        <h2 class="hide">
        <?php if ($this->_var['intromode'] == 'best'): ?>
        <span><?php echo $this->_var['lang']['best_goods']; ?></span>
        <?php elseif ($this->_var['intromode'] == 'new'): ?>
        <span><?php echo $this->_var['lang']['new_goods']; ?></span>
        <?php elseif ($this->_var['intromode'] == 'hot'): ?>
        <span><?php echo $this->_var['lang']['hot_goods']; ?></span>
        <?php elseif ($this->_var['intromode'] == 'promotion'): ?>
        <span><?php echo $this->_var['lang']['promotion_goods']; ?></span>
        <?php else: ?>
        <span><?php echo $this->_var['lang']['search_result']; ?></span>
        <?php endif; ?>
        </h2>
        
        <div class="order-list-box clearfix">
        
        <?php if ($this->_var['goods_list']): ?>
        <form action="search.php" method="post" class="sort" name="listform" id="form">
        <ul class="type-list">
            <li><?php echo $this->_var['lang']['btn_display']; ?>：</li>
            <li><a href="javascript:;" onClick="javascript:display_mode('list')"><img src="themes/xiaomi/images/display_mode_list<?php if ($this->_var['pager']['display'] == 'list'): ?>_act<?php endif; ?>.gif" alt="<?php echo $this->_var['lang']['display']['list']; ?>"></a></li>
            <li><a href="javascript:;" onClick="javascript:display_mode('grid')"><img src="themes/xiaomi/images/display_mode_grid<?php if ($this->_var['pager']['display'] == 'grid'): ?>_act<?php endif; ?>.gif" alt="<?php echo $this->_var['lang']['display']['grid']; ?>"></a></li>
            <li><a href="javascript:;" onClick="javascript:display_mode('text')"><img src="themes/xiaomi/images/display_mode_text<?php if ($this->_var['pager']['display'] == 'text'): ?>_act<?php endif; ?>.gif" alt="<?php echo $this->_var['lang']['display']['text']; ?>"></a></li>
        </ul>
        <div class="order-list">
            <select name="sort">
            <?php echo $this->html_options(array('options'=>$this->_var['lang']['sort'],'selected'=>$this->_var['pager']['search']['sort'])); ?>
            </select>&nbsp;&nbsp;
            <select name="order">
            <?php echo $this->html_options(array('options'=>$this->_var['lang']['order'],'selected'=>$this->_var['pager']['search']['order'])); ?>
            </select>&nbsp;&nbsp;
            <input type="image" name="imageField" style="vertical-align: -6px;" src="themes/xiaomi/images/bnt_go.gif" alt="go"/>
            <input type="hidden" name="page" value="<?php echo $this->_var['pager']['page']; ?>" />
            <input type="hidden" name="display" value="<?php echo $this->_var['pager']['display']; ?>" id="display" />
        </div>
        <?php $_from = $this->_var['pager']['search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
        <?php if ($this->_var['key'] != "sort" && $this->_var['key'] != "order"): ?>
        <?php if ($this->_var['key'] == 'keywords'): ?>
        <input type="hidden" name="<?php echo $this->_var['key']; ?>" value="<?php echo urldecode($this->_var['item']); ?>" />
        <?php else: ?>
        <input type="hidden" name="<?php echo $this->_var['key']; ?>" value="<?php echo $this->_var['item']; ?>" />
        <?php endif; ?>
        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </form>
        <?php endif; ?>
        </div>
         
           <?php if ($this->_var['goods_list']): ?>

          <form action="compare.php" method="post" name="compareForm" id="compareForm" onsubmit="return compareGoods(this);">
          <?php if ($this->_var['pager']['display'] == 'list'): ?>
              <div class="goods-list-list">
                <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goods_list']['iteration']++;
?>
                <ul class="goods-item clearfix">
                <li class="thumb"><a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" /></a></li>
                <li class="goodsName">
                <a href="<?php echo $this->_var['goods']['url']; ?>" class="f6">
                    <?php if ($this->_var['goods']['goods_style_name']): ?>
                    <?php echo $this->_var['goods']['goods_style_name']; ?><br />
                    <?php else: ?>
                    <?php echo $this->_var['goods']['goods_name']; ?><br />
                    <?php endif; ?>
                  </a>
                 <?php if ($this->_var['goods']['goods_brief']): ?>
                <?php echo $this->_var['lang']['goods_brief']; ?><?php echo $this->_var['goods']['goods_brief']; ?><br />
                <?php endif; ?>
                </li>
                <li class="goodsPrice">
                <?php if ($this->_var['goods']['promote_price'] != ""): ?>
                <span class="shop"><?php echo $this->_var['lang']['promote_price']; ?><b><?php echo $this->_var['goods']['promote_price']; ?></b></span><br />
                <?php else: ?>
                <span class="shop"><?php echo $this->_var['lang']['shop_price']; ?><b><?php echo $this->_var['goods']['shop_price']; ?></b></span><br />
                <?php endif; ?>
                <?php if ($this->_var['show_marketprice']): ?>
                <del><?php echo $this->_var['lang']['market_price']; ?><?php echo $this->_var['goods']['market_price']; ?></del><br />
                <?php endif; ?>
                </li>
                <li class="action">
                <a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" class="btn  btn-primary goods-add-cart-btn" id="buy_btn"><i class="iconfont"></i> 加入购物车</a>
                <a href="javascript:collect(<?php echo $this->_var['goods']['goods_id']; ?>);" class="collect"><i class="iconfont"></i> <?php echo $this->_var['lang']['btn_collect']; ?></a>
                </li>
                </ul>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </div>
             <?php elseif ($this->_var['pager']['display'] == 'grid'): ?>
              <div class="goods-list-box">
                        <div class="goods-list clearfix">
                <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                <?php if ($this->_var['goods']['goods_id']): ?>
                <div class="goods-item">
                      <div class="figure figure-img">
                       <a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" class="goodsimg" /></a>
                       </div>
                       <p class="desc"><?php echo $this->_var['goods']['goods_brief']; ?></p>
                      <h2 class="title"><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo $this->_var['goods']['goods_name']; ?></a></h2>
                       <p class="price">
                        <?php if ($this->_var['goods']['promote_price'] != ""): ?>
                        <?php echo $this->_var['lang']['promote_price']; ?><font class="shop_s"><?php echo $this->_var['goods']['promote_price']; ?></font>
                        <?php else: ?>
                        <?php echo $this->_var['lang']['shop_prices']; ?><font class="shop_s"><?php echo $this->_var['goods']['shop_price']; ?></font>
                        <?php endif; ?>
                        <?php if ($this->_var['show_marketprice']): ?>
                        <del><?php echo $this->_var['lang']['market_prices']; ?><font class="market_s"><?php echo $this->_var['goods']['market_price']; ?></font></del>
                        <?php endif; ?>
                        </p>
                        <div class="thumbs">
                            <ul class="thumb-list clearfix">
                                <li class="active" data-config='{figure:"<?php echo $this->_var['goods']['goods_thumb']; ?>"}'>
                                    <a><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" width="34" height="34"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="actions clearfix">
                            <a href="javascript:collect(<?php echo $this->_var['goods']['goods_id']; ?>);" class="btn-like J_likeGoods"><i class="iconfont"></i> <span><?php echo $this->_var['lang']['btn_collect']; ?></span></a> 
                            <a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" class="btn-buy J_buyGoods"><span><?php echo $this->_var['lang']['btn_buy']; ?></span> <i class="iconfont"></i></a>
                       </div>
                       <div class="flags">
                                
                        <?php if ($this->_var['goods']['zhekou']): ?>
                          <div class="flag flag-saleoff"><?php echo $this->_var['goods']['zhekou']; ?>折促销</div>
                      <?php endif; ?>
                        
                      </div>
                    </div>
                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </div>
                </div>
             <?php elseif ($this->_var['pager']['display'] == 'text'): ?>
              <div class="goods-list-list goods-list-text">
                <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goods_list']['iteration']++;
?>
                <ul class="goods-item clearfix">
                <li class="goodsName">
                <a href="<?php echo $this->_var['goods']['url']; ?>" class="f6">
                    <?php if ($this->_var['goods']['goods_style_name']): ?>
                    <?php echo $this->_var['goods']['goods_style_name']; ?><br />
                    <?php else: ?>
                    <?php echo $this->_var['goods']['goods_name']; ?><br />
                    <?php endif; ?>
                  </a>
                 <?php if ($this->_var['goods']['goods_brief']): ?>
                <?php echo $this->_var['lang']['goods_brief']; ?><?php echo $this->_var['goods']['goods_brief']; ?><br />
                <?php endif; ?>
                </li>
                <li class="goodsPrice">
                <?php if ($this->_var['goods']['promote_price'] != ""): ?>
                <span class="shop"><?php echo $this->_var['lang']['promote_price']; ?><b><?php echo $this->_var['goods']['promote_price']; ?></b></span><br />
                <?php else: ?>
                <span class="shop"><?php echo $this->_var['lang']['shop_price']; ?><b><?php echo $this->_var['goods']['shop_price']; ?></b></span><br />
                <?php endif; ?>
                <?php if ($this->_var['show_marketprice']): ?>
                <del><?php echo $this->_var['lang']['market_price']; ?><?php echo $this->_var['goods']['market_price']; ?></del><br />
                <?php endif; ?>
                </li>
                <li class="action">
                <a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" class="btn  btn-primary goods-add-cart-btn" id="buy_btn"><i class="iconfont"></i> 加入购物车</a>
                <a href="javascript:collect(<?php echo $this->_var['goods']['goods_id']; ?>);" class="collect"><i class="iconfont"></i> <?php echo $this->_var['lang']['btn_collect']; ?></a>
                </li>
                </ul>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </div>
             <?php endif; ?>
          </form>
          <script type="text/javascript">
        <?php $_from = $this->_var['lang']['compare_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
        var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

                                <?php $_from = $this->_var['lang']['compare_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
        <?php if ($this->_var['key'] != 'button_compare'): ?>
        var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
        <?php else: ?>
        var button_compare = '';
        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>


        var compare_no_goods = "<?php echo $this->_var['lang']['compare_no_goods']; ?>";
        window.onload = function()
        {
          Compare.init();
          fixpng();
        }
        var btn_buy = "<?php echo $this->_var['lang']['btn_buy']; ?>";
        var is_cancel = "<?php echo $this->_var['lang']['is_cancel']; ?>";
        var select_spe = "<?php echo $this->_var['lang']['select_spe']; ?>";
        </script>
        <?php else: ?>
        <div style="padding:20px 0px; text-align:center" class="f5" ><?php echo $this->_var['lang']['no_search_result']; ?></div>
        <?php endif; ?>
        <?php echo $this->fetch('library/pages.lbi'); ?> 
  </div>

      
        <script type="text/javascript">
        <?php $_from = $this->_var['lang']['compare_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
        var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

        <?php $_from = $this->_var['lang']['compare_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
        <?php if ($this->_var['key'] != 'button_compare'): ?>
        var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
        <?php else: ?>
        var button_compare = '';
        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>


        var compare_no_goods = "<?php echo $this->_var['lang']['compare_no_goods']; ?>";
        window.onload = function()
        {
          Compare.init();
          fixpng();
        }
        var btn_buy = "<?php echo $this->_var['lang']['btn_buy']; ?>";
        var is_cancel = "<?php echo $this->_var['lang']['is_cancel']; ?>";
        var select_spe = "<?php echo $this->_var['lang']['select_spe']; ?>";
        </script>
        <?php else: ?>
        <p class="empty"><?php echo $this->_var['lang']['no_search_result']; ?></div>
        <?php endif; ?>
       </div>
  </div>
   
  
</div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body>
</html>

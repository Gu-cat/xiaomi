
	
    <div class="order-list-box clearfix">
      <form method="GET" class="sort" name="listform">
      	<ul class="type-list">
        	<li><?php echo $this->_var['lang']['btn_display']; ?>：</li>
        	<li><a href="javascript:;" onClick="javascript:display_mode('list')"><img src="themes/xiaomi/images/display_mode_list<?php if ($this->_var['pager']['display'] == 'list'): ?>_act<?php endif; ?>.gif" alt="<?php echo $this->_var['lang']['display']['list']; ?>"></a></li>
        	<li><a href="javascript:;" onClick="javascript:display_mode('grid')"><img src="themes/xiaomi/images/display_mode_grid<?php if ($this->_var['pager']['display'] == 'grid'): ?>_act<?php endif; ?>.gif" alt="<?php echo $this->_var['lang']['display']['grid']; ?>"></a></li>
        	<li><a href="javascript:;" onClick="javascript:display_mode('text')"><img src="themes/xiaomi/images/display_mode_text<?php if ($this->_var['pager']['display'] == 'text'): ?>_act<?php endif; ?>.gif" alt="<?php echo $this->_var['lang']['display']['text']; ?>"></a></li>
        </ul>
        
        <div class="order-list">
        <select name="sort" style="border:1px solid #ccc;">
        <?php echo $this->html_options(array('options'=>$this->_var['lang']['exchange_sort'],'selected'=>$this->_var['pager']['sort'])); ?>
        </select>&nbsp;&nbsp;
        <select name="order" style="border:1px solid #ccc;">
        <?php echo $this->html_options(array('options'=>$this->_var['lang']['order'],'selected'=>$this->_var['pager']['order'])); ?>
        </select>&nbsp;&nbsp;
        <input type="image" style="vertical-align: -6px;" name="imageField" src="themes/xiaomi/images/bnt_go.gif" alt="go"/>
        <input type="hidden" name="category" value="<?php echo $this->_var['category']; ?>" />
        <input type="hidden" name="display" value="<?php echo $this->_var['pager']['display']; ?>" id="display" />
        <input type="hidden" name="integral_min" value="<?php echo $this->_var['integral_min']; ?>" />
        <input type="hidden" name="integral_max" value="<?php echo $this->_var['integral_max']; ?>" />
        <input type="hidden" name="page" value="<?php echo $this->_var['pager']['page']; ?>" />
        </div>
      </form>
    </div>
    
    
	<?php if (! $this->_var['goods_list']): ?><p class="empty">对不起，对应商品分类或筛选组合下没有商品</p><?php endif; ?>
    <form name="compareForm" method="post">
    <?php if ($this->_var['pager']['display'] == 'list'): ?>
      <div class="goods-list-list">
      <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goods_list']['iteration']++;
?>
        <ul class="goods-item clearfix"<?php if (($this->_foreach['goods_list']['iteration'] - 1) % 2 == 0): ?>id=""<?php else: ?>id="bgcolor"<?php endif; ?>>
          <li class="thumb"><a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" /></a></li>
          <li class="goodsName">
            <a href="<?php echo $this->_var['goods']['url']; ?>">
            <?php if ($this->_var['goods']['goods_style_name']): ?>
              <?php echo $this->_var['goods']['goods_style_name']; ?><br />
            <?php else: ?>
              <?php echo $this->_var['goods']['goods_name']; ?><br />
            <?php endif; ?>
            </a>
            <?php if ($this->_var['goods']['goods_brief']): ?>
              <?php echo $this->_var['lang']['goods_brief']; ?><?php echo $this->_var['goods']['goods_brief']; ?>
            <?php endif; ?>
          </li>
          <li class="goodsPrice">
            <span class="shop"><?php echo $this->_var['lang']['exchange_integral']; ?><b><?php echo $this->_var['goods']['exchange_integral']; ?></b></span>
          </li>
   		  <li class="action">
          	<a href="<?php echo $this->_var['goods']['url']; ?>" class="btn  btn-primary goods-add-cart-btn"><i class="iconfont"></i><?php echo $this->_var['lang']['exchange_goods']; ?></a>
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
              <div class="figure figure-img"><a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" class="goodsimg" /></a></div>
              <p class="desc"><?php echo $this->_var['goods']['goods_brief']; ?></p>
              <h2 class="title"><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo $this->_var['goods']['goods_name']; ?></a></h2>
              <p class="price"><?php echo $this->_var['lang']['exchange_integral']; ?><font class="shop_s"><?php echo $this->_var['goods']['exchange_integral']; ?></font></p>
              <div class="thumbs">
                <ul class="thumb-list clearfix">
                    <li class="active" data-config='{figure:"<?php echo $this->_var['goods']['goods_thumb']; ?>"}'>
                        <a><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" width="34" height="34"></a>
                    </li>
                </ul>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </div>
      </div>

    <?php elseif ($this->_var['pager']['display'] == 'text'): ?>
      <div class="goods-list-list goods-list-text">
      <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
        <ul class="goods-item clearfix" <?php if (($this->_foreach['goods_list']['iteration'] - 1) % 2 == 0): ?>id=""<?php else: ?>id="bgcolor"<?php endif; ?>>
          <li class="goodsName">
            <a href="<?php echo $this->_var['goods']['url']; ?>">
            <?php if ($this->_var['goods']['goods_style_name']): ?>
              <?php echo $this->_var['goods']['goods_style_name']; ?><br />
            <?php else: ?>
              <?php echo $this->_var['goods']['goods_name']; ?><br />
            <?php endif; ?>
            </a>
            <?php if ($this->_var['goods']['goods_brief']): ?>
              <?php echo $this->_var['lang']['goods_brief']; ?><?php echo $this->_var['goods']['goods_brief']; ?>
            <?php endif; ?>
          </li>
          <li class="goodsPrice">
            <span class="shop"><?php echo $this->_var['lang']['exchange_integral']; ?><b><?php echo $this->_var['goods']['exchange_integral']; ?></b></span>
          </li>
   		  <li class="action">
          	<a href="<?php echo $this->_var['goods']['url']; ?>" class="btn  btn-primary goods-add-cart-btn"><i class="iconfont"></i><?php echo $this->_var['lang']['exchange_goods']; ?></a>
          </li>
        </ul>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </div>
    <?php endif; ?>
    </form>
<script type="text/javascript">
  window.onload = function()
  {
    Compare.init();
    fixpng();
  }
  var button_compare = '';
</script>
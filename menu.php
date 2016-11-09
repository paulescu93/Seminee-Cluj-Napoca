<?php
	// check if is selected a categ from left menu or a child
$parent_rewrite = null;
if(isset($breadcrumb[0])){
	$parent_rewrite = $breadcrumb[0]->rewrite_url;
}
?>

<menu class="left-menu mobile non_mobile mobile">

	<?php $menu = get_block_data('menu'); ?>
	<?php //dev_print_d($menu); ?>
	<ul class="parent-ul">
		<?php foreach ($menu as $value): ?>
			<li id="parent" <?php echo ($parent_rewrite == $value->rewrite_url || $this->uri->segment(1)==$value->rewrite_url) ? 'class="active"' : '' ; ?>>
				<a href="<?php echo site_url($value->rewrite_url); ?>"><?php echo $value->title; ?></a>
			</li>
		<?php endforeach; ?>
	</ul>

</menu>
<nav id="mobile-nav">
	<?php $menu = get_block_data('menu'); ?>
	<ul>


		<li <?php echo ($this->uri->segment(1)=='produse.html') ? 'class="active "' : '' ; ?>>
			<a class="prod" href="<?php echo base_url(); ?>">Despre noi</a>
		</li>
		<li <?php echo ($this->uri->segment(1)=='produse.html') ? 'class="active "' : '' ; ?>>
			<a class="prod" href="<?php echo site_url('promotii.html'); ?>">Promotii</a>
		</li>
		<li <?php echo ($this->uri->segment(1)=='contact.html') ? 'class="active "' : '' ; ?>>
			<a class="cont "href="<?php echo site_url('contact.html'); ?>">Contact</a>
		</li>

		<li class="mmenu-separator"><span></span></li>

		<li class="titlu-categ-menu">
			Categorii <i class="fa fa-caret-down down"></i>
		</li>

		<?php foreach ($menu as $value): ?>
			<li <?php echo ($parent_rewrite == $value->rewrite_url || $this->uri->segment(1)==$value->rewrite_url) ? 'class="active"' : '' ; ?>>
				<a href="<?php echo site_url($value->rewrite_url); ?>"><?php echo $value->title; ?></a>
			</li>
		<?php endforeach; ?>
	</ul>

</nav>

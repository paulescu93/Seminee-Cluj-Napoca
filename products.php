<div id="pagina-produs">

<!-- bredadcrumb -->
<div class="breadcrumb" id="bread-prod">

		<?php if (isset($breadcrumb) && is_array($breadcrumb)): ?>
			<?php foreach ($breadcrumb as $b_categ): ?>
				<a href="<?php echo site_url($b_categ->rewrite_url); ?>"><?php echo $b_categ->title; ?></a>
				<span class="breadcrumb-separator"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
			<?php endforeach; ?>
		<?php endif; ?>
		<?php if (isset($produs[0]->title)): ?>
			<span class="current-breadcrumb"><?php echo $produs[0]->title; ?></span>
		<?php elseif (isset($categ[0]->title)): ?>
			<span class="current-breadcrumb"><?php echo $categ[0]->title; ?></span>
		<?php endif; ?>
</div>
<!-- bredadcrumb end -->

<?php $produs = $produs[0]; ?>
<?php $categ = $categ[0]; ?>


<div class="product-description"><?php echo $produs->short_description ?></div>
<div id="product-wrapper col-md-12 col-lg-12 col-xs-12">
<?php //dev_print_d($produs); ?>
	<div class="prod-detail">
		<div class="images-wrapper col-xs-6 col-md-5 col-lg-5">
		<div class="image-wrapper">
			<div class="product-img-wrapper">
					<a href="<?php echo $pictures[0]['full_url']; ?>"  data-lightbox="all_image" >
						<img src="<?php echo $pictures[0]['full_url']; ?>">
					</a>
					<?php if(isset($pictures)): ?>
						<?php foreach ($pictures as $key => $value): ?>
								<?php  if($key != 0):?>
									<a class="image"  data-lightbox="all_image" href="<?php echo $value['full_url']; ?>">
									</a>
								<?php endif; ?>
						<?php endforeach; ?>
					<?php endif; ?>
			</div>
		</div>
			<div class="col-md-12 product-thumbnails">
			<?php if(isset($pictures)): ?>
				<div id="carousel" <?php echo count($pictures) > 3 ? 'class="active"' : ''; ?>>
					<a class="buttons prev" href="#">
						<i class="fa fa-chevron-left"></i>
					</a>
					<div class="viewport">
						<ul class="overview">
							<?php foreach ($pictures as $key => $value): ?>
								<li>
									<div class="thumb-item" id="draggable">
										<a class="image"  data-lightbox="prod_image2" id="image_<?php echo $key; ?>" href="<?php echo $value['full_url']; ?>">
											<img class="image" src="<?php echo $value['thumb_url']; ?>">
										</a>
									</div>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<a class="buttons next" href="#">
						<i class="fa fa-chevron-right"></i>
					</a>
				</div>
			<?php endif; ?>
		</div>


		</div>
		<div class="product-price-action col-xs-6 col-md-7 col-lg-7">
		<?php if($produs->pret !==0): ?>
			<h1 class="menu-title cos col-md-12 col-xs-12"><?php echo $template['title']; ?></h1>
			<div class="action-line chenar-pret-produs">
			<input type="hidden" value="<?php echo $produs->product_id ?>" id="item_id" >

				<?php if ($produs->promotion): ?>
					<?php $pret=explode('.', $produs->pret_promotion); ?>
				<?php else: ?>
					<?php $pret=explode('.', $produs->pret); ?>
				<?php endif; ?>
				<?php if($pret[0] != 0 && $produs->active == 1 && isset($categ->active) && $categ->active == 1 && $produs->product_id != 185  && $pret[0] !== '228677'): ?>
					<div class="pret-product">
						<div  class='pret-label' id= "sticla-pret">

							<?php if ($produs->promotion): ?>
								<span class="pret-vechi"><?php echo $produs->pret; ?> lei</span>
							<?php else: ?>
								<span class="pret"></span>
							<?php endif; ?>
						</div>
						<?php if ($produs->promotion): ?>
						<div class='pret-value<?php echo $produs->promotion==1 ? ' pret-promo' : '';?>'>
							<span class='pret-value-int'><?php echo $pret[0]; ?>,</span>
							<span class='pret-value-zecimala'><?php echo isset($pret[1]) ? $pret[1] : '00'; ?></span>
							<span class='pret-value-valuta'> Lei</span>
						</div>
						<?php else: ?>
							<div class='pret-value pret-normal'>
							<span class='pret-value-int'><?php echo $pret[0]; ?>,</span>
							<span class='pret-value-zecimala'><?php echo isset($pret[1]) ? $pret[1] : '00'; ?></span>
							<span class='pret-value-valuta'> Lei</span>
						</div>
						<?php endif; ?>
					</div>

					<?php elseif ( $produs->product_id == 185 ): ?>
						<div class="pret-product sticla-price">
							Introdu dimensiuni
						</div>
							<?php if($produs->product_id == 185 ): ?>
								<div class="calculator-sticla-wrapper">
									<div class="calculator-sticla">
										<h2 align="center">Calculeaza pret sticla termorezistenta</h2>
										<div class="input-wrapper">
											<div class="input-calculator">
												<div class="cell">
													INALTIME<div class="maxi"></div>
												</div>
												<div class="cell calculator_field inaltime">
													<input type="text" class="field numeric" name="inaltime" id="inaltime" value="" maxlength="4">
													<span>mm</span>
												</div>
												<div class="cell">
													LUNGIME<div class="maxl"></div>
												</div>
												<div class="cell calculator_field lungime">
													<input type="text"  class="field numeric" name="lungime" id="lungime" value="" maxlength="4">
													<span>mm</span>
												</div>
											</div>
											<div class="explicatie">
												<span>Dimensiunile se dau in mm! 1cm = 10mm</span>
											</div>
											<div class="rezultat">
												Pret sticla termorezistenta 4mm: <span id="rezultat">0 lei</span>
												<input type="hidden" name="total" id="total" value="" maxlength="10" >
											</div>
										</div>
										<div id="sticla">
											<div id="inaltime_sticla" class="text_is"></div>
											<div id="lungime_sticla" class="text_ls"></div>
										</div>
									</div>
								</div>
							<?php endif; ?>
						<?php echo form_open('adauga-in-cos'); ?>
							<input type="submit" name="add_one_item" value="Cumpara" class="cumpara" disabled id="prod-to-cart">
							<input type="hidden" name="item_id" value="<?php echo $produs->product_id ?>" id="sticla-add-cart">
							<input type="hidden" name="name" value="<?php echo $produs->title; ?>" id='prod-name'>
							<input type="hidden" name="price" value="0" id="prod-price">
							<input type="hidden" name="quantity" value="1" >
							<?php echo ""; ?>
							<?php echo form_close('') ?>
							<div class="descriere-sticla col-md-12 col-lg-12 col-xs-12 ">
								<?php echo "$produs->content"; ?>
							</div>
					<?php elseif (($produs->active == 0) || (isset($categ->active) && $categ->active == 0) || (!isset($categ->active))): ?>
						<div class="pret-product no-pret expired">
							Produsul nu se mai afla in oferta noastra!
						</div>
						<?php elseif($pret[0] == '228677'): ?>
						<div class="pret-product" id="cere-oferta">
							GRATUIT!
						</div>
					<?php else: ?>
							<div class="pret-product" id="cere-oferta">
								<a href="#" class="big-link" data-reveal-id="myModal">
								Cere oferta!
								</a>
							</div>
					<?php endif; ?>
			</div>
			<?php else: ?>
			<div class="action-line" style="width:100%;">
			<input type="hidden" value="<?php echo $produs->product_id ?>" id="item_id" >

				<?php if ($produs->promotion): ?>
					<?php $pret=explode('.', $produs->pret_promotion); ?>
				<?php else: ?>
					<?php $pret=explode('.', $produs->pret); ?>
				<?php endif; ?>
				<?php if($pret[0] != 0 && $produs->active == 1 && isset($categ->active) && $categ->active == 1 && $produs->product_id != 185  && $pret[0] !== '228677'): ?>
					<div class="pret-product">
						<div  class='pret-label' id= "sticla-pret">

							<?php if ($produs->promotion): ?>
								<span class="pret-vechi"><?php echo $produs->pret; ?> lei</span>
							<?php else: ?>
								<span class="pret"></span>
							<?php endif; ?>
						</div>
						<?php if ($produs->promotion): ?>
						<div class='pret-value<?php echo $produs->promotion==1 ? ' pret-promo' : '';?>'>
							<span class='pret-value-int'><?php echo $pret[0]; ?>,</span>
							<span class='pret-value-zecimala'><?php echo isset($pret[1]) ? $pret[1] : '00'; ?></span>
							<span class='pret-value-valuta'> Lei</span>
						</div>
						<?php else: ?>
							<div class='pret-value pret-normal'>
							<span class='pret-value-int'><?php echo $pret[0]; ?>,</span>
							<span class='pret-value-zecimala'><?php echo isset($pret[1]) ? $pret[1] : '00'; ?></span>
							<span class='pret-value-valuta'> Lei</span>
						</div>
						<?php endif; ?>
					</div>

					<?php elseif ( $produs->product_id == 185 ): ?>
						<div class="pret-product sticla-price">
							Introdu dimensiuni
						</div>
							<?php if($produs->product_id == 185 ): ?>
								<div class="calculator-sticla-wrapper">
									<div class="calculator-sticla">
										<h2 align="center">Calculeaza pret sticla termorezistenta</h2>
										<div class="input-wrapper">
											<div class="input-calculator">
												<div class="cell">
													INALTIME<div class="maxi"></div>
												</div>
												<div class="cell calculator_field inaltime">
													<input type="text" class="field numeric" name="inaltime" id="inaltime" value="" maxlength="4">
													<span>mm</span>
												</div>
												<div class="cell">
													LUNGIME<div class="maxl"></div>
												</div>
												<div class="cell calculator_field lungime">
													<input type="text"  class="field numeric" name="lungime" id="lungime" value="" maxlength="4">
													<span>mm</span>
												</div>
											</div>
											<div class="explicatie">
												<span>Dimensiunile se dau in mm! 1cm = 10mm</span>
											</div>
											<div class="rezultat">
												Pret sticla termorezistenta 4mm: <span id="rezultat">0 lei</span>
												<input type="hidden" name="total" id="total" value="" maxlength="10" >
											</div>
										</div>
										<div id="sticla">
											<div id="inaltime_sticla" class="text_is"></div>
											<div id="lungime_sticla" class="text_ls"></div>
										</div>
									</div>
								</div>
							<?php endif; ?>
						<?php echo form_open('adauga-in-cos'); ?>
							<input type="submit" name="add_one_item" value="Cumpara" class="cumpara" disabled id="prod-to-cart">
							<input type="hidden" name="item_id" value="<?php echo $produs->product_id ?>" id="sticla-add-cart">
							<input type="hidden" name="name" value="<?php echo $produs->title; ?>" id='prod-name'>
							<input type="hidden" name="price" value="0" id="prod-price">
							<input type="hidden" name="quantity" value="1" >
							<?php echo ""; ?>
							<?php echo form_close('') ?>
							<!-- <div class="descriere-sticla col-md-12 col-lg-12 col-xs-12 ">
								<?php //echo "$produs->content"; ?>
							</div> -->
					<?php elseif (($produs->active == 0) || (isset($categ->active) && $categ->active == 0) || (!isset($categ->active))): ?>
						<div class="pret-product no-pret expired">
							Produsul nu se mai afla in oferta noastra!
						</div>
						<?php elseif($pret[0] == '228677'): ?>
						<div class="pret-product" id="cere-oferta">
							GRATUIT!
						</div>
					<?php else: ?>
							<div class="pret-product" id="cere-oferta">
								<a href="#" class="big-link" data-reveal-id="myModal">
								Cere oferta!
								</a>
							</div>
					<?php endif; ?>
			</div>
		<?php endif; ?>
			<?php if($pret[0] != 0 && $produs->active == 1 && isset($categ->active) && $categ->active == 1 && $produs->product_id != 185 && $pret[0] != '228677' ): ?>
			<div class="action-line chenar-cos-cumparaturi">
				<div class="cos-cumparaturi comanda add-cos">
					<a href="/adauga-in-cos/<?php echo clean_string($produs->title).'_'.$produs->product_id; ?>">Adauga in cos</a>
				</div>
				<div class="product-val">
					<?php echo isset($produs->product) ? $produs->product->catalog_code : ''; ?>
				</div>
				<?php if($this->flexi_auth->is_logged_in()): ?>
					<button type="button" class="btn btn-default">
					<a href="<?php echo site_url('/admin/edit-produs/'.$produs->product_id); ?> "><i class="fa fa-pencil"></i> Edit</a>
					</button>
				<?php endif; ?>
			</div>
						<div class="description-wrapper">
					<div class="description-table">
					<?php

					// afisare detali produse din filtru``
			    if(is_array($filter)){
			      foreach ($filter as $key => $value) {
			       	$col_name=$value->col_name;
			        if($value->filter_type=='where' && $value->active==1){
			        	if($produs->product->$col_name!='' && $produs->product->$col_name!=false){?>
									<div class='item-description'>
										<label><?php echo $value->show_name; ?> :</label>
										<div class="value">
											<?php
											if($value->values!=0){
											 foreach ($value->filtervalues as $v_key => $v_value) {
													if($v_value->value==$produs->product->$col_name){
														echo $v_value->name.' '.$value->after_value;
													}
												}
											}else{
												echo $produs->product->$col_name.' '.$value->after_value;
											}
											?>
										</div>
									</div>
			          <?php }
			        }
			      }
			    }?>
			  </div>
		  </div>
		<?php endif; ?>
		</div>
			  <div class="prod-descript"><?php echo stripslashes($produs->content); ?></div>
	</div>
	</div>


<?php $message = $this->session->flashdata('message'); ?>
<div class="contact-message<?php echo $message!='' ? ' bg-success' : '' ?>">
</div>

</div>

<?php $this->load->view('blocks/ajax_add_to_cart'); ?>
<?php $this->load->view('blocks/comanda_rapida_reval'); ?>

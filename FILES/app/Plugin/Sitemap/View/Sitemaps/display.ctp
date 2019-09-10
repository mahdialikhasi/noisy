<?php foreach($sitemapData as $model => $modelSitemap): ?>
	<h2><?php echo $model; ?></h2>
	<?php foreach($modelSitemap as $singleSitemap): ?>
		<dl>
			<dt><?php echo __('آدرس'); ?>: </dt>
			<dd style="direction:ltr;text-align:left"><?php echo $this->Html->link(Router::url($singleSitemap['loc'], TRUE)); ?></dd>

			<?php if(!empty($singleSitemap['lastmod'])): ?>
				<dt><?php echo __('آخرین به روز رسانی مطلب'); ?>: </dt>
				<dd><?php echo $this->Time->toAtom($singleSitemap['lastmod']); ?></dd>
			<?php endif; ?>

			<?php if(!empty($singleSitemap['priority'])): ?>
				<dt><?php echo __('اولویت'); ?>: </dt>
				<dd><?php echo $singleSitemap['priority']; ?></dd>
			<?php endif; ?>

			<?php if(!empty($singleSitemap['changefreq'])): ?>
				<dt><?php echo __('به روزرسانی لیست'); ?>:</dt>
				<dd><?php echo $singleSitemap['changefreq']; ?></dd>
			<?php endif; ?>

		</dl>
	<?php endforeach; ?>
<hr>
<?php endforeach; ?>
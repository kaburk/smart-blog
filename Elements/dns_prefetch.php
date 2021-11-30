<?php /* DNS preconnect dns-prefetch */ ?>
<?php
$dnsPrefetch = explode(PHP_EOL, $this->SmartBlog->getConfig('dns_prefetch'));
if (!empty($dnsPrefetch)) :
	foreach ($dnsPrefetch as $domain) :
		$domain = trim($domain);
		if (empty($domain)) continue;
?>
		<link rel="preconnect dns-prefetch" href="//<?php echo $domain ?>">
<?php
	endforeach;
endif;
?>

<?php

/**
 * ウィジェットエリア
 *
 * BcBaserHelper::widgetArea() で呼び出す
 * <?php $this->BcBaser->widgetArea() ?>
 * @var BcAppView $this
 * @var int $no ウィジェットエリアID
 **/
if (Configure::read('BcRequest.isMaintenance') || empty($no)) {
	return;
}
if (!isset($subDir)) {
	$subDir = true;
}
?>

<div class="bs-widget-area bs-widget-area-<?php echo $no ?>">
	<?php $this->BcWidgetArea->show($no, ['subDir' => $subDir]) ?>
</div>

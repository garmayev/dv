<?php

/** @var yii\web\View $this */
/** @var array $data */
?>
<p>Оформление заявки на ремонт</p>
<p>&nbsp;</p>
<p>Имя Клиента:  <?= $data['FIO'] ?></p>
<p>Email Клиента:  <?= $data['EMAIL'] ?></p>
<p>Номер телефона: <?= $data['PHONE'] ?></p>
<p>Серийный номер: <?= $data['SERIAL_NUM'] ?></p>
<p>Описание проблемы: <?= $data['DESCRIPTION'] ?></p>
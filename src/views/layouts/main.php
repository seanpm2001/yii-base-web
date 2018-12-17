<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\app\widgets\Alert;
use yii\app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Yii;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= $this->getApp()->language ?>">
<head>
    <meta charset="<?= $this->getApp()->encoding ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>
        ul.navbar-nav li, ul.breadcrumb li {
            display: inline-block;
        }
        ul.breadcrumb li:not(:last-child):after {
            content: " > ";
        }
        .float-left {
            float: left;
        }
        .float-right {
            float: right;
        }
    </style>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?= Html::a($this->getApp()->name,$this->getApp()->homeUrl); ?>
    <?= Menu::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => $this->app->t('yii', 'Home'), 'url' => ['/site/index']],
            ['label' => $this->app->t('yii-base-web', 'About'), 'url' => ['/site/about']],
            ['label' => $this->app->t('yii-base-web', 'Contact'), 'url' => ['/site/contact']],
           true /* TODO: This should be $this->getApp()->user->isGuest */ ? (
                ['label' => $this->app->t('yii-base-web', 'Login'), 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . '$this->getApp()->user->identity->username' . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => $this->params['breadcrumbs'] ?? [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="float-left">&copy; My Company <?= date('Y') ?></p>
        <p class="float-right">
            <?= Yii::t('yii', 'Powered by {yii}', [
                'yii' => '<a href="http://www.yiiframework.com/" rel="external">' . Yii::t('yii', 'Yii Framework') . '</a>',
            ]) ?>
        </p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

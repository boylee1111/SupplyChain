<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

use kartik\nav\NavX;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'Maitrox',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
                [
                    'label' => 'Procurement',
                    'items' => [
                        ['label' => 'Supplier Management', 'items' => [
                                ['label' => 'Suppliers', 'url' => ['/supplier']],
                                ['label' => 'Supplier Types', 'url' => ['/supplier-type']],
                            ],
                        ],
                        ['label' => 'Product Management', 'items' => [
                                ['label' => 'Products', 'url' => ['/product']],
                                ['label' => 'Product Types', 'url' => ['/product-type']],
                            ],
                        ],
                        '<li class="divider"></li>',
                        '<li class="dropdown-header">Purchasing</li>',
                        ['label' => 'Purchasing Order', 'url' => ['/purchasing-order']],
                        ['label' => 'Purchasing Apply', 'url' => ['/purchasing-order/apply']],
                        ['label' => 'Purchasing Approval', 'url' => ['/purchasing-order/approve-list']],
                        ['label' => 'Purchasing Confirmation', 'url' => ['/purchasing-order/confirmation-list']],
                        ['label' => 'Warehousing Confirmation', 'url' => ['/purchasing-order/warehousing-list']],
                        '<li class="divider"></li>',
                        '<li class="dropdown-header">Returning</li>',
                        ['label' => 'Returning Orders', 'url' => ['/returning-order']],
                        ['label' => 'Returning Apply', 'url' => ['/returning-order/apply-list']],
                        ['label' => 'Returning Approval', 'url' => ['/returning-order/approve-list']],
                        ['label' => 'Returning Confirmation', 'url' => ['/returning-order/confirmation-list']],
                    ],
                ],
                [
                    'label' => 'Transportation',
                    'items' => [
                        ['label' => 'Factory Management', 'items' => [
                                ['label' => 'Factories', 'url' => ['/factory']],
                                ['label' => 'Factory Types', 'url' => ['/factory-type']],
                            ],
                        ],
                        ['label' => 'Station Management', 'items' => [
                                ['label' => 'Stations', 'url' => ['/station']],
                                ['label' => 'Station Types', 'url' => ['/station-type']],
                            ],
                        ],
                        ['label' => 'Transit Point Management', 'items' => [
                                ['label' => 'Transit Points', 'url' => ['/transit-point']],
                                ['label' => 'Transit Point Types', 'url' => ['/transit-point-type']],
                            ],
                        ],
                        ['label' => 'Warehouse Management', 'items' => [
                                ['label' => 'Warehouses', 'url' => ['/warehouse']],
                                ['label' => 'Warehouse Types', 'url' => ['/warehouse-type']],
                            ],
                        ],
                        ['label' => 'Road Section Management', 'items' => [
                                ['label' => 'Road Sections', 'url' => ['/road-section']],
                                ['label' => 'Road Section Types', 'url' => ['/road-section-type']],
                            ],
                        ],
                        '<li class="divider"></li>',
                        '<li class="dropdown-header">Shipping & Receiving</li>',
                        ['label' => 'Shipping Orders', 'url' => ['/shipping-order']],
                        ['label' => 'Shipping Apply', 'url' => ['/shipping-order/apply']],
                        ['label' => 'Shipping Approval', 'url' => ['/shipping-order/approve-list']],
                        ['label' => 'Shipping Confirmation', 'url' => ['/shipping-order/confirmation-list']],
                        ['label' => 'Receiving Confirmation', 'url' => ['/shipping-order/receiving-list']],
                        '<li class="divider"></li>',
                        '<li class="dropdown-header">Transportation Planning</li>',
                        ['label' => 'Requirements', 'url' => ['/requirement']],
                        ['label' => 'Requirement Create', 'url' => ['/requirement/create']],
                    ],
                ],
                [
                    'label' => 'Market',
                    'items' => [
                        ['label' => 'Client Management', 'items' => [
                                ['label' => 'Clients', 'url' => ['/client']],
                                ['label' => 'Client Types', 'url' => ['/client-type']],
                            ],
                        ],
                        ['label' => 'Product Management', 'items' => [
                                ['label' => 'Products', 'url' => ['/product']],
                                ['label' => 'Product Types', 'url' => ['/product-type']],
                            ],
                        ],
                        ['label' => 'Vendor Management', 'items' => [
                                ['label' => 'Vendors', 'url' => ['/vendor']],
                                ['label' => 'Vendor Types', 'url' => ['/vendor-type']],
                            ],
                        ],
                    ],
                ],
                [
                    'label' => 'User',
                    'items' => [
                        ['label' => 'Users', 'url' => '#'],
                        ['label' => 'New User', 'url' => ['/site/signup']],
                    ],
                ],
                [
                    'label' => 'Help',
                    'items' => [
                        ['label' => 'Contact', 'url' => ['/site/contact']],
                        ['label' => 'About', 'url' => ['/site/about']],
                    ],
                ],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems = [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'Login', 'url' => ['/site/login']],
                ];
            } else {
                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            echo NavX::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; Maitrox <?= date('Y') ?></p>
        <p class="pull-right"></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

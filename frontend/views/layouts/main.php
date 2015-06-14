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
            ];

            // Procurement Menu
            $procurementItems = array();
            if (Yii::$app->user->can('supplierManagement')) {
                $procurementItems[] = [
                    'label' => 'Supplier Management',
                    'items' => [
                        ['label' => 'Suppliers', 'url' => ['/supplier']],
                        ['label' => 'Supplier Types', 'url' => ['/supplier-type']],
                    ],
                ];
            }
            if (Yii::$app->user->can('productManagement')) {
                $procurementItems[] = [
                    'label' => 'Product Management', 
                    'items' => [
                        ['label' => 'Products', 'url' => ['/product']],
                        ['label' => 'Product Types', 'url' => ['/product-type']],
                    ],
                ];
            }
            if (Yii::$app->user->can('purchasingOrderManagement') || Yii::$app->user->can('reviewOrder')) {
                $procurementItems[] = '<li class="divider"></li>';
                $procurementItems[] = '<li class="dropdown-header">Purchasing</li>';
                $procurementItems[] = ['label' => 'Purchasing Order', 'url' => ['/purchasing-order']];
                if (Yii::$app->user->can('purchasingOrderManagement')) {
                    $procurementItems[] = ['label' => 'Purchasing Apply', 'url' => ['/purchasing-order/apply']];
                    $procurementItems[] = ['label' => 'Purchasing Confirmation', 'url' => ['/purchasing-order/confirmation-list']];
                    $procurementItems[] = ['label' => 'Warehousing Confirmation', 'url' => ['/purchasing-order/warehousing-list']];
                }
                if (Yii::$app->user->can('reviewOrder')) {
                    $procurementItems[] = ['label' => 'Purchasing Approval', 'url' => ['/purchasing-order/approve-list']];
                }
            }
            if (Yii::$app->user->can('returningOrderManagement') || Yii::$app->user->can('reviewOrder')) {
                $procurementItems[] = '<li class="divider"></li>';
                $procurementItems[] = '<li class="dropdown-header">Returning</li>';
                $procurementItems[] = ['label' => 'Returning Orders', 'url' => ['/returning-order']];
                if (Yii::$app->user->can('returningOrderManagement')) {
                    $procurementItems[] = ['label' => 'Returning Apply', 'url' => ['/returning-order/apply-list']];
                    $procurementItems[] = ['label' => 'Returning Confirmation', 'url' => ['/returning-order/confirmation-list']];
                }
                if (Yii::$app->user->can('reviewOrder')) {
                    $procurementItems[] = ['label' => 'Returning Approval', 'url' => ['/returning-order/approve-list']];
                }
            }
            if (sizeof($procurementItems) != 0) {
                $menuItems[] = [
                    'label' => 'Procurement',
                    'items' => $procurementItems,
                ];
            }

            // Transportation Menu
            $transportationItems = array();
            if (Yii::$app->user->can('depotManagement')) {
                $transportationItems = array_merge($transportationItems, [
                    [
                        'label' => 'Factory Management',
                        'items' => [
                            ['label' => 'Factories', 'url' => ['/factory']],
                            ['label' => 'Factory Types', 'url' => ['/factory-type']],
                        ],
                    ],
                    [
                        'label' => 'Station Management',
                        'items' => [
                            ['label' => 'Stations', 'url' => ['/station']],
                            ['label' => 'Station Types', 'url' => ['/station-type']],
                        ],
                    ],
                    [
                        'label' => 'Transit Point Management',
                        'items' => [
                            ['label' => 'Transit Points', 'url' => ['/transit-point']],
                            ['label' => 'Transit Point Types', 'url' => ['/transit-point-type']],
                        ],
                    ],
                    [
                        'label' => 'Warehouse Management',
                        'items' => [
                            ['label' => 'Warehouses', 'url' => ['/warehouse']],
                            ['label' => 'Warehouse Types', 'url' => ['/warehouse-type']],
                        ],
                    ]
                ]);
            }
            if (Yii::$app->user->can('roadSectionManagement')) {
                $transportationItems[] = [
                    'label' => 'Road Section Management',
                    'items' => [
                        ['label' => 'Road Sections', 'url' => ['/road-section']],
                        ['label' => 'Road Section Types', 'url' => ['/road-section-type']],
                    ],
                ];
            }
            if (Yii::$app->user->can('shippingOrderManagement') || Yii::$app->user->can('reviewOrder')) {
                $transportationItems[] = '<li class="divider"></li>';
                $transportationItems[] = '<li class="dropdown-header">Shipping & Receiving</li>';
                $transportationItems[] = ['label' => 'Shipping Orders', 'url' => ['/shipping-order']];
                if (Yii::$app->user->can('shippingOrderManagement')) {
                    $transportationItems[] = ['label' => 'Shipping Apply', 'url' => ['/shipping-order/apply']];
                    $transportationItems[] = ['label' => 'Shipping Confirmation', 'url' => ['/shipping-order/confirmation-list']];
                    $transportationItems[] = ['label' => 'Receiving Confirmation', 'url' => ['/shipping-order/receiving-list']];
                }
                if (Yii::$app->user->can('reviewOrder')) {
                    $transportationItems[] = ['label' => 'Shipping Approval', 'url' => ['/shipping-order/approve-list']];
                }
            }
            if (Yii::$app->user->can('requirementManagement')) {
                $transportationItems = array_merge($transportationItems, [
                    '<li class="divider"></li>',
                    '<li class="dropdown-header">Transportation Planning</li>',
                    ['label' => 'Requirements', 'url' => ['/requirement']],
                    ['label' => 'Requirement Create', 'url' => ['/requirement/create']],
                ]);
            }
            if (sizeof($transportationItems) != 0) {
                $menuItems[] = [
                    'label' => 'Transportation',
                    'items' => $transportationItems,
                ];
            }

            // Marketing Menu
            $marketingItems = array();
            if (Yii::$app->user->can('clientManagement')) {
                $marketingItems[] = [
                    'label' => 'Client Management',
                    'items' => [
                        ['label' => 'Clients', 'url' => ['/client']],
                        ['label' => 'Client Types', 'url' => ['/client-type']],
                    ],
                ];
            }
            if (Yii::$app->user->can('productManagement')) {
                $marketingItems[] = [
                    'label' => 'Product Management',
                    'items' => [
                        ['label' => 'Products', 'url' => ['/product']],
                        ['label' => 'Product Types', 'url' => ['/product-type']],
                    ],
                ];
            }
            if (Yii::$app->user->can('vendorManagement')) {
                $marketingItems[] = [
                    'label' => 'Vendor Management',
                    'items' => [
                        ['label' => 'Vendors', 'url' => ['/vendor']],
                        ['label' => 'Vendor Types', 'url' => ['/vendor-type']],
                    ],
                ];
            }
            if (sizeof($marketingItems) != 0) {
                $menuItems[] = [
                    'label' => 'Market',
                    'items' => $marketingItems,
                ];
            }

            if (Yii::$app->user->can('userManagement')) {
                $menuItems[] = [
                    'label' => 'User',
                    'items' => [
                        ['label' => 'Users', 'url' => '/user'],
                        ['label' => 'New User', 'url' => ['/site/signup']],
                    ],
                ];
            }
            $menuItems[] = [
                'label' => 'Help',
                'items' => [
                    ['label' => 'Contact', 'url' => ['/site/contact']],
                    ['label' => 'About', 'url' => ['/site/about']],
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

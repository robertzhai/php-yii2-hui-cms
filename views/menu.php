<?php
use yii\helpers\Html;
$viewData = $this->params['data'];
?>
<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl"><a class="logo navbar-logo f-l mr-10 hidden-xs" href="/app/index">xxxv1.0</a>
            <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                <ul class="cl">
                    <li><?= Html::encode($viewData['admin']['rolename']) ?></li>
                    <li class="dropDown dropDown_hover"><a href="#" class="dropDown_A"><?= Html::encode($viewData['admin']['username']) ?> <i class="Hui-iconfont">
                                &#xe6d5;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="#">个人信息</a></li>
                            <li><a href="/login/index">切换账户</a></li>
                            <li><a href="/logout/index">退出</a></li>
                        </ul>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</header>
<aside class="Hui-aside">
    <input runat="server" id="divScrollValue" type="hidden" value=""/>
    <div class="menu_dropdown bk_2">
        <dl id="menu-article">
            <dt><i class="Hui-iconfont">&#xe616;</i>公众号管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="/health/index" data-title="健康百科" href="javascript:void(0)">健康百科</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-admin">
            <dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="/role/index" data-title="角色管理" href="javascript:void(0)">角色管理</a></li>
                </ul>
            </dd>
        </dl>

    </div>
</aside>
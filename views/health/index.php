<?php
use yii\helpers\Html;
$list = $this->params['data']['list'];
?>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 公众号管理
    <span class="c-gray en">&gt;</span> 健康百科
<!--    <span class="c-gray en">&gt;</span> 用户管理-->
    <a class="btn btn-success radius r"
                                                  style="line-height:1.6em;margin-top:3px"
                                                  href="javascript:location.replace(location.href);" title="刷新"><i
                class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th width="80">ID</th>
                <th width="100">菜单名</th>
                <th width="40">url</th>
                <th width="100">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $item):?>
            <tr class="text-c">
                <td><?=$item['id']?></td>
                <td><?=$item['name']?></td>
                <td class="text-l"><?=$item['url']?></td>
                <td class="td-manage">
                     <a
                            title="编辑" href="/health/edit?id=<?=$item['id']?>"
                            class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> </td>
            </tr>
            <?php endforeach;?>
            </tbody>

        </table>
    </div>
</div>
<?php
use yii\helpers\Html;
$list_item = $this->params['data']['list_item'];
?>
<article class="page-container">
    <form action="" method="post" class="form form-horizontal" >
        <input type="hidden" name="_csrf" id="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>"/>
        <input type="hidden" id="pid" value="<?=$list_item['id']?>"/>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" id="role_name" class="input-text"  placeholder="角色名称" value="<?=$list_item['name']?>" >
            </div>
        </div>

        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" id="modify_button" type="button" value="&nbsp;&nbsp;修改&nbsp;&nbsp;">
                <input class="btn btn-default radius " onclick="javascript:history.go(-1);" type="button" value="&nbsp;&nbsp;返回&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>
<script type="text/javascript" src="/js/role.js"></script>
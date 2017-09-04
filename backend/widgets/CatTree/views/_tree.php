<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>

<table class="table table-hover  table-bordered "><thead>
    <tr>
        <th><a href="/backend/web/index.php?r=category%2Findex&amp;sort=id" data-sort="id">ID</a></th>
        <th><a href="/backend/web/index.php?r=category%2Findex&amp;sort=name" data-sort="name">分类名称</a></th>
        <th><a href="/backend/web/index.php?r=category%2Findex&amp;sort=parent_id" data-sort="parent_id">文章数</a></th>
        <th class="action-column">&nbsp;</th>
    </tr>
</thead>
    <tbody>
    <?php    foreach($tree as $key=>$v) {?>
        <tr data-key="<?=$key?>">
            <td><?=$v['id']?></td>
            <td ><?=str_repeat('|___',$v['lev']),$v['name']?></td>
            <td><?=$v['count']?></td>
            <td>
                <a href="/backend/web/index.php?r=category/view&id=<?=$v['id']?>" title="查看" aria-label="查看" data-pjax="0">
                    <span class="glyphicon glyphicon-eye-open"></span>
                </a>
                <a href="/backend/web/index.php?r=category/update&id=<?=$v['id']?>" title="更新" aria-label="更新" data-pjax="0">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
                <a href="/backend/web/index.php?r=category/delete&id=<?=$v['id']?>" title="删除" aria-label="删除" data-pjax="0" data-confirm="您确定要删除此项吗？" data-method="post">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td>
        </tr>




   <?php  }?>



    </tbody></table>



<?php

require MODX_BASE_PATH.'assets/snippets/desire/class.desire.php';

$active = isset($active)?$active:'active';   //клас елемента который находиться в списке желаный
$desireSelector = isset($desireSelector)?$desireSelector:'.to-desire'; // селектор елементов для списка желаный
$desireCount = isset($desireCount)?$desireCount:'#desire-count'; // блок с количеством елементов в желания
$storage = isset($storage)?$storage:'cookie';
$js = isset($js)?$js:1;

$e = $modx->event;
switch ($e->name) {
    case 'OnWebPageInit':

        $desire = new desire($modx,$storage);
        $desire->setPlaceholder();

        $modx->regClientScript('<script>
            var desire_config = {

                active:"'.$active.'",
                desireSelector:"'.$desireSelector.'",
                desireCount:"'.$desireCount.'"
                
            };
</script>');

        if($js){
            $modx->regClientScript('/assets/snippets/desire/html/desire.js');
        }
        break;

    case 'OnPageNotFound':

        $desire = new desire($modx,$storage);

        switch ($_REQUEST['q']){
            case 'desire-list':
                echo $desire->getList();
                die();
                break;
            case 'add-to-desire':
                $id = intval($_GET['id']);
                $desire->addToDesire($id);
                die();
                break;
            case 'delete-from-desire':
                $id = intval($_GET['id']);
                $desire->deleteFromDesire($id);
                die();
                break;
        }
        break;
}
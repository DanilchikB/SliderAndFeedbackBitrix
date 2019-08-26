<?php 
function isPost(){
    $request = Bitrix\Main\Application::getInstance()->getContext()->getRequest();
    return $request->isPost();
}
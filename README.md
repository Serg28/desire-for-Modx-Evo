### Плагин для добавление товаров в список желаный работает так же как и compare

Пример: В списке товаров 

    <a class="to-desire" data-id="5">Добавить в список желаный</a>

Вывод на странице товаров в списке  

    [[if? &is=`[+desire-list+]!empty` &then=`  
        [[DocLister?  
            &idType=`documents`  
            &documents=`[+desire-list+]`  
        ]]  
    ` &else=`  
     ничего нет здесь  
    `]]
   

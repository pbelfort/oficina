(function (win,doc){
    'use strict';

    function confirmDel(event){
        event.preventDefault();
        let token = doc.getElementsByName("_token")[0].value;
        if(confirm("Deseja excluir o registro?")){
            let ajax = new XMLHttpRequest();
            ajax.open("DELETE",event.target.href);
            ajax.setRequestHeader('X-CSRF-TOKEN',token);
            ajax.onreadystatechange = function (){
                if(ajax.readyState === 4 && ajax.status === 200){
                    win.location.href="orcamentos";
                }
            }
            ajax.send();
        }else {
            return false;
        }
    }

    if(doc.querySelector('.js-del')){
        let btn = doc.querySelectorAll('.js-del');
        for (let i = 0; i < btn.length; i++){
            btn[i].addEventListener('click',confirmDel,false);
        }

    }

})(window,document);

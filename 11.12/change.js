$(function () {
    let id=location.search.split('=')[1];
    api({url: './api/change.php',data:{id}}).then(res=>{
        initForm(res.data);
        console.log(res);
    }).catch(error=>{
        console.log(error);
    })
    //表单初始化
    function initForm(data) {
        console.log(data);
        let formController=$('input');
        console.log(formController);
        //对每一个表单控件进行赋值
        //找到input的name属性 => data[name]=>赋值
        // input.value/$(val).val()
        formController.each(function (index,ele) {
            let {type,name,value}=ele;
            if(type==='radio'){
                (value === data[name])&&(ele.checkbox=true);
            }else {
                ele.value=data[name];

            }

        })
    }


    //完成修改
    // let form=$('form');
    // form.on('click','.btn.btn-info',function (e) {
    //     e.preventDefault();
    //
    //     api({url:'./api/change.php',data})
    // })


    //封装
    function api({url, data = {}, dataType = 'json', type = 'GET'}={}){
        return new Promise((resolve,reject)=>{
            $.ajax({
                url,
                data,
                type,
                dataType,
                success:function(res){
                    let {code,msg}=res;
                    if(code){
                        resolve(res);
                    }else {
                        reject(res);
                    }
                }
            })
        })
    }


})
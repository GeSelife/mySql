$( async function () {
    //解决异步的方式---转为同步方式
    // let a=await myAjax({url:'./api/query.php'})
    // console.log(a);

    //Stringserialize AJAX序列化表单
    let tbody=$('tbody');
    let thead=$('thead');
    getTeacher();

    let form = $('form');


    //封装AJAX
    /*
    ajax 参数数量太多==>对象形式==>大量参数初始化==>解构默认值
     */
    // function myAjax(obj){
    //     let url = obj.url;
    //     let type = obj.type ? obj.type:'get';
    //     let data = obj.data ? obj.data:{};
    //     let dataType = obj.dataType ? obj.dataType:'json';
    //     $.ajax({
    //         url,
    //         dataType,
    //         type,
    //         data,
    //         success:(res)=>{
    //             console.log(res);
    //             getTeacher();
    //         }
    //     })
    // }
    //解构赋值 -- 用数组或对象对变量进行快速赋值 -- 数组左右结构相同且一一对应、对象不用 -- 解构赋值时可以添加默认值 -- 数组在解构时先声明再赋值****对象按照属性进行解构、与顺序无关 -- 结构失败undefined
    //解构+默认值
    function myAjax({url,type='get',data={},dataType='json'}){

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


    //删除按钮
    tbody.on('click','.btn.btn-danger',function () {
        //this指的是目标事件对象---删除按钮
        let _this=$(this);
       // console.log( _this.parents('tr').attr('id'));

        //closest---最近的
       let id = _this.closest('tr').attr('id');
       // let id = _this.closest('tr').data('id');
       //data-XXX  h5的标准属性  用于绑定一些信息  获取信息:元素.dataset.id

        // $.ajax({
        //     url:"./api/del.php",
        //     dataType:'json',
        //     type:'post',
        //     data:{id},
        //     success:(res)=>{
        //         console.log(res);
        //         getTeacher();
        //     }
        // })

        myAjax({url:'./api/del.php',dataType:'json',type:'post',data:{id}}).then(function (res) {
                if(res.code==1){
                    console.log(res);
                    getTeacher();
                }else {
                    console.log(res);
                }
        });
    })

    //修改
    tbody.on('click','.btn.btn-info',function () {
        let _this=$(this);

        let id = _this.closest('tr').attr('id');

        $.ajax({
            url:"./api/change.php",
            dataType:'json',
            type:'post',
            data:{id},
            success:(res)=>{
                console.log(1);
                // changeTeacher();
            }
        })

    })


    //添加
    thead.on('click','.add',function () {
        form.parent('nav')[0].style.display='block';
        $('body,html').top=0;
    })
    form.submit(function (e) {
        e.preventDefault();
        let data = $(this).serialize();
        myAjax({url:'./api/add.php',dataType:'json',type:'post',data}).then(function (res) {
            form.parent('nav')[0].style.display='none';
            getTeacher();
        },function (rej) {
            console.log(rej);
        });


        //阻止浏览器默认行为
        return false;
    })



/*
getTeacher
 */
    function getTeacher() {
        myAjax({url:'./api/query.php',dataType:'json',type:'get'}).then(function (res) {
            renderTable(res.data);
        });
        // $.ajax({
        //     url:"./api/query.php",
        //     dataType:'json',
        //     success:(res)=>{
        //         if(res.code===1){
        //             renderTable(res.data);
        //         }
        //     }
        // })
    }

    //渲染表格
    function renderTable(data) {
        let html='';
        data.forEach((ele,index)=>{
            html += `
                        <tr id="${ele.id}">
                            <td>${index+1}</td>
                            <td>${ele.names}</td>
                            <td>${ele.age}</td>
                            <td>${ele.sex}</td>
                            <td>${ele.job}</td>
                            <td><input type="button" value="删除" class="btn btn-danger"></td>
                            <td>
                            <a href="./change.html?id=${ele.id}"  class="btn btn-info">修改</a>
                            </td>
                        </tr>
                        `;
        })
        tbody.html(html);
    }
})
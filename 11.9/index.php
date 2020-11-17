<?php
//var_dump() 会返回变量的数据类型和值
//echo "hello php";
//
//#定义变量
//# 双引号里面可以识别变量
//$color = 'pink';
////拼接符 .
//echo '</br> My car is' . '&nbsp' . $color;
//
//$a=5;
//$b=3;
//$c=$a+$b;
//echo '</br>' . $c;
//echo '</br>' . $c = $a * $b;
//
////global 用于在局部环境中访问全局变量
//function myText(){
//    global $a,$b;
//    echo '</br>' . $z=$a%$b;
//    //访问所有的全局变量
//    echo '</br>' . $GLOBALS['b'];
//
//    //静态变量  运行完不会被释放掉
//    static $d=1;
//    echo '</br>' . $d;
//    $d++;
//}
//myText();
//myText();
//
///*
// * echo 和 print 区别
// * 都是语言结构,有无括号均可使用
// * echo  1.能够输出一个以上的字符串
// *       2.
// *
// * print  1.只能输出一个字符串，并始终返回1
// *
// * */
//
////echo
//echo "</br><h2>PHP is fun</h2>";
//$arr = array('hj','ds','th');
//echo "</br>" . $arr[0];
//echo "</br>" . "My car is a {$arr[0]}";
//
////print
//print "</br><h2>My cat is pretty!</h2></br>";

/*
 * 数据类型
 *  字符串
 *  整数
 *  浮点数
 *  逻辑
 *  数组
 *  对象
 *  NULL
 *
 * */
//字符串：可以是引号内任何文本
//双引号和单引号没有区别
//$x = "hello world";
//echo $x . '<br>';
//$x = "php";
//echo $x;
//
////整数：没有小数的数字
///*
// * 规则:
// *      必须至少有一个数字(0-9)
// *      不能包含逗号或空格
// *      不能有小数点
// *      正负均可
// *      可以用三种格式规定整数：十进制  十六进制--0x开头  八进制---0开头
// *
// * */
////var_dump()  返回数据的类型和值
//var_dump($x);//D:\Wamp\www\php\index.php:79:string 'php' (length=3)
//$_num=-123;
//$num=123;
//$num16=0x80;
//$num8=045;
//var_dump($_num);  //int -123
//var_dump($num16); //int 128   转为十进制后的结果
//
////浮点数：有小数点或指数形式的数字
//$float=10.32;
//var_dump($float);//float 10.32
//$float1=2e3;
//var_dump($float1);  //float 2000
//$float2=8E-2;
//var_dump($float2);  //float 0.08
//
////逻辑  用于条件测试
//$t=true;
//$f=false;
//
////数组：一个变量中存储多个数值
//$colors=array("white","black","yellow");
//var_dump($colors);//array (size=3)
//                  //0 => string 'white' (length=5)
//                  //1 => string 'black' (length=5)
//                  //2 => string 'yellow' (length=6)
//$size=[123,321,456,6546];
//var_dump($size);//array (size=4)
//                //  0 => int 123
//                //  1 => int 321
//                //  2 => int 456
//                //  3 => int 6546
//
////对象：存储数据和有关如何处理数据的信息
////必须明确声明对象  class
////class类 包含属性和方法的结构
//class Color{  //???????????????????????????????????
//    var $col;
//    function Color($col="pink"){
//        $this->color = $col; // 更改this下的color属性的值
//    }
//    function what_color($color){
//        return $this->color; //获取this下的color值
//    }
//}

//继承
//class 继承子元素名字 extends 父元素{
//    public function __construct()
//    {
//        //继承父元素的属性和方法
//        parent::__constrouct();
//    }
//}
//
////NULL  表示变量无值  是NULL唯一可能的值
//$n="hello";
//$n=null;
//var_dump($n);//null


/*
 * 字符串函数
 *      strlen() 返回字符串的长度 --- 常用于循环和其他函数，确定字符串何时结束
 *      str_word_count()  函数对字符串中的单词进行计数
 *      strrev() 函数反转字符串
 *      strpos('被检测的字符串','检测的内容') 函数用于检索字符串内制定的字符或文本 --- 找到返回开始的下标，找不到返回FALSE
 *      str_replace('旧的字符串','新的字符串',替换的字符串)  函数一些字符串替换字符串中的另一些字符
 *
 *
 * */
//$str = 'ge yi miao';
//echo strlen($str);//10
//echo '<br>';
//
//echo str_word_count($str);//3
//echo '<br>';
//
//
//echo strrev($str);//oaim iy eg
//echo '<br>';
//
//echo strpos($str,'e');//1
//echo "<br>";
//echo strpos($str,'k');//没有返回值
//echo "<br>";
//
//echo str_replace('ge','aa',$str);//aa yi miao


//常量定义 define  const
/*
 * 常量：类似变量，但是常量一旦被定义就无法更改或撤销定义,必须在定义的同时就赋值
 *      是单个值的标识符(名称)---在脚本中无法改变该值
 *      是全局的，可以贯穿整个脚本使用
 * 有效的常量名：以字符或下划线开头 --- 常量名前面没有$符号
 *
 *  贯穿贯穿整个脚本---是自动全局
 *
 * */
//define("定义常量的名称---通常是全字符大写","定义常量的值","是否对大小写不敏感<默认值:false敏感>")
//define("CON","WELCOME");
//echo CON;
//echo "<br>";
////不敏感 true
//define("NoCon","NO-WELCOME",true);
//echo nocon;
//echo "<br>";
//
//function myTest(){
//    echo CON;
//}
//myTest();

/*
 * 运算符：
 * 真返回1  假返回空
 *      算术运算符  + - * / %
 *      赋值运算符  =  +=  -=  *=  /=  %=
 *      字符串运算符  .拼接  .=
 *      递增、递减运算符 ++$x  $x++ --$x  $x--
 *      比较运算符  == === != <>不等于  ！==  >  <  >=  <=
 *      逻辑运算符  and 与  or 或  xor 异或  && 与  || 或  ! 非
 *      数组运算符：用于比较数组  +合并,不覆盖重复的键  ==  ===  !=  !==  <>
 *
 *
 * */

//逻辑运算符
//$a=0;$b=3;
////都为true
//echo $b and $a; //1
//echo "<br>";
////至少有一个为true 就是true
//echo $b or $a; //1
//echo "<br>";
////有且只有一个为true 才为true
//echo $b xor $a;
//
////数组运算符
//$x = array('a'=>'apple','b'=>'banana');
//$y = ['c'=>'orange','b'=>'peach'];
//$z = $x + $y;
//var_dump($z);//array (size=3)
//            //  'a' => string 'apple' (length=5)
//            //  'b' => string 'banana' (length=6)
//            //  'c' => string 'orange' (length=6)


/*
 * 条件语句
 *      if...else
 *  switch()
 *
 *
 *
 * */

$a = 10;
$d = date("H"); //获取当前的时间--小时
if($a<'20'){
    echo "hahahah";
}
if ($d < '19'){
    echo 'jjjjj';
}

/*
 * switch语句
 *      对表达式（通常是变量）进行一次计算
        把表达式的值与结构中 case 的值进行比较
        如果存在匹配，则执行与 case 关联的代码
        代码执行后，break 语句阻止代码跳入下一个 case 中继续执行
        如果没有 case 为真，则使用 default 语句
 */

/*
 * 循环语句
 *      while - 只要指定条件为真，则循环代码块
        do...while - 先执行一次代码块，然后只要指定条件为真则重复循环
        for - 循环代码块指定次数
        foreach - 遍历数组中的每个元素并循环代码块
 *
 */
/*
 * 数组 类型：索引数组--带有数字索引的数组  $arr=('pgj','dsd','fd')
 *          关联数组--带有指定键的数组    $arr=array('vf'=>'12','fgr'=>'45')
 *          多维数组--包含一个或多个数组的数组
 *
 * 获取数组长度  count(变量名)
 *
 * 遍历索引数组  for
 * 遍历关联数组  foreach
 *
 */

//__FILE__   __DIR__  


//关联数组 $a=[
//  'a'=>'sd',
//  ] ---- foreach遍历

/*
 * 数组方法 js中
 *  push 在末尾添加元素 返回新数组的长度
 *  unshift  在前面添加元素  返回新数组的长度
 *  pop   删除一个末尾的元素  返回新数组
 *  shift
 *  splice(下标,个数,追加的元素)  返回删掉元素之后的数组。没有删除返回空
 *  join(连字符)  数组转字符串     字符串:split()  字符串转数组
 *  slice
 *  indexOf()  查找某个元素首次出现的位置
 *  some
 *  every
 *  map  映射 对应关系 一对一进行映射
 *  filter
 *  forEach
 *
 * */

/*
 *php 数组排序函数
 *
 *
 */

/*
 * foreach($数组名 $key=>$value){}
 *
 * */

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>



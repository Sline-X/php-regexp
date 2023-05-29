<?php

// $p = strrpos($inFile, '.');
// if ($p) $outFile = substr($inFile, 0, $p);
// else $outFile = $inFile;
// $outFile .= ".out";

// $slash1 = strrpos($fullPath, '/');
// $slash2 = strrpos($fullPath, '\\');
// $slash = max($slash1, $slash2);
// $dirName = substr($fullPath, 0, $slash);
// $fileName = substr($fullPath, $slash + 1, 10000);

##Модель скрипта, принимающего текст от пользователя
// if (@$_REQUEST['text']) {
//     echo htmlspecialchars($_REQUEST['text']) . "<hr />";
// }
//
/*<!--<form action="--><?php //=$_SERVER['SCRIPT_NAME']?><!--" method="POST">-->*/
// <!--    <textarea name="text" cols="60" rows="10">-->
// <!--        --><?php //=@htmlspecialchars($_REQUEST['text'])
// <!--    </textarea>-->
// <!--</form>-->

// PCRE - регулярное выражение языка perl
// POSIX - RegEx(p)
//preg_match
// Проверить, что в строке есть число (одна цифра или более)
preg_match('/(\d+)/s', "article_123.html", $matches[1]);
//совпадение (подвыражение в скобках) окажется в matches[1]
// var_export($matches[1]);

//найти в тексте адрес E-mail. \S означает "не пробел", а [a-z0-9.]+ - "любое число букв, цифр или точек".
//Модификатор 'i' после '/' заставляет PHP не учитывать регистр букв при поиске совпадений.
//Модификатор 's', стоящий рядом с 'i', говорит, что мы работаем в "однострочном режиме"
preg_match('/(\S+)@([a-z0-9.]+)/is', "Привет от somebody@mail.ru!", $m);
//имя хоста будет в $m[2], а имя ящика (до @) - в $m[1].
// echo "В тексте найдено: ящик - $m[1], хост - $m[2]";

//В тексте найдено: ящик - somebody, хост - mail.ru

##преобразование e-mail в HTML-ссылку
$text = "Привет от somebody@mail.ru, а также от other@mail.ru!";
$html = preg_replace(
    '/(\S+)@([a-z0-9]+)/is', //найти все E-mail
    '<a href="mailto:$0">$0</a>', //заменить их по шаблону
    $text
);

// echo $html;

//if (preg_match('/path\\/to\\/file/i', "path/to/file"))
// отражающие символы, если мы ищем стркоу a*b, тогда нам нужно выражение a\*b 'a\\*b'

echo preg_replace('/at/', 'AT', "What is the Perl Compatible Regex?");

// точка (.) - один любой символ
// /a.b/s совпадение для строк azb, aqb, но не сработает для aqwb
// \s соответствует пробельному символу: пробелу (" "), знаку табуляции (\t), переносу строки (\n) или возврату каретки (\r)
// \S - любой символ, кроме пробельного
// \w - любая буква или цифра
// \W - не буква и не цифра
// \d - цифра от 0 до 9
// \D - всё что угодно, но только не цифра

//один из нескольких указанных символов /a[xXyY]c/ соответствует строкам, в которых есть подстроки из трех символов, начинающиеся с a, затем одна из букв x, X, y, Y и
// наконец буква c

// /[a-z]/, /[a-zA-Z0-9]/ - любая буква в нижнем регистре и любой алфавитно-цифровой символ


//специальные выражения
// [:alpha:] - буква
// [:digit:] - цифра
// [:alnum:] - буква или цифра
// [:space:] - пробельный символ
// [:blank:] - пробельный символ или символы с кодом 0 и 255
// [:cnrtl:] - управляющий символ
// [:graph:] - символ псевдографики
// [:lower:] - символ нижнего регистра
// [:upper:] - символ верхнего регистра
// [:print:] - печатный символ
// [:punct:] - знак пунктуации
// [:xdigit:] - цифра или буква от A до F

//'/abc[[:alnum:]]+/' # abc, затем одна или более буква или цифра
//'/abc[[:alpha:][:punct:]0]/' # abc, далее буква, знак пунктуации или 0

//'/abc[\w.]/' - Оно ищет подстроку "abc", после которой идет любая буква, цифра или точка.
// простейший способ удаления тегов /<[^>]+>/ - echo preg_replace('/<[^>]+>/', '', $text)

//квантификаторы повторений
//ноль или более совпадений (*) /a-*-/  - есть буква a , затем — ноль или более минусов и, наконец, завершающий минус.
//одно или более совпадений (+) /a-+/ - a и один или более минусов. Есть ли в строке анлгийское слово, написанное через дефис /[a-zA-Z]+-[a-zA-Z]+/
//ноль или одно совпадение (?) - предыдущий символ может быть повторен ноль или один (но не более!) раз. /[a-zA-Z]+\r?\n/ - определяет строки, в которых последнее слово прижато к правому краю строки
//заданное число совпадений ({}):
//                  - X{n,m} - указывает, что символ x может быть повторен от n до m раз
//                  - X{n} - указывает, что символ x должен быть повторен ровно n раз
//                  - X{n, } - указывает, что символ x может быть повторен n или более раз

//Мнимые символы - участок строки между соседними символами, удовлетворяющий некоторым свойствам. Мнимый символ - некая позиция в строке.

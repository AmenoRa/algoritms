<?php
// 1. Проверить баланс скобок в выражении, игнорируя любые внуренние символы. В решении по возможности испольщовать SplStack.
// Примеры:
// "Это тестовый вариант проверки (задачи со скобками). И вот еще скобки: {[][()]}" - true
// ((a + b)/ c) - 2 - true
// "([ошибка)" - false
// "(") - false

$stack = new SplStack();
$singleQuote = 0; // маркер открывающей одинаковой кавычки
$doubleQuote = 0; // маркер открывающей двойной кавычки
$str = '"Это тестовый вариант проверки (задачи со скобками). И вот еще скобки: {[][()]}"';
$sym = mb_str_split($str);

foreach ($sym as $symbol) {
    //игнорируем все символы, кроме искомых
    if (
        $symbol != '[' &&
        $symbol != ']' &&
        $symbol != '{' &&
        $symbol != '}' &&
        $symbol != '(' &&
        $symbol != ')' &&
        $symbol != '"' &&
        $symbol != '\''
    ) {
        continue;
    }

    if (($symbol == '[') || ($symbol == '{') || ($symbol == '(')) {
        $stack->push($symbol);
        continue;
    }
    if ($symbol == '"' && $doubleQuote == 0) {
        $stack->push($symbol);
        $doubleQuote = 1;
        continue;
    }
    if ($symbol == '\'' && $singleQuote == 0) {
        $stack->push($symbol);
        $singleQuote = 1;
        continue;
    }

    $top = $stack->top();
    if (
        ($symbol == ']' && $top == '[') ||
        ($symbol == '}' && $top == '{') ||
        ($symbol == ')' && $top == '(') ||
        ($symbol == '"' && $top == '"' && $doubleQuote == 1) ||
        ($symbol == '\'' && $top == '\'' && $singleQuote == 1)
    ) {
        $stack->pop();
        continue;
    } elseif ($symbol == '"' && $top == '"' && $doubleQuote == 1) {
        $doubleQuote = 0;
        $stack->pop();
        continue;
    } elseif ($symbol == '\'' && $top == '\'' && $singleQuote == 1) {
        $singleQuote = 0;
        $stack->pop();
        continue;
    } else {
        echo "false - есть внеочередной символ ". $symbol ." после ". $top . PHP_EOL;
        break;
    }
}

if ($stack->count() > 0) {
    echo "размещение скобок и кавычек не валидно";
} else {
    echo "true - размещение скобок и кавычек валидно";
}
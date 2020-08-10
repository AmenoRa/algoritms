<?php
//3. Написать аналог «Проводника» в Windows для директорий на сервере при помощи итераторов.

$dir = new DirectoryIterator("..");

function showDirectory($dir)
{
    foreach ($dir as $item) {
        if ($dir->isDir()) {
            if ($item == ".") {
                continue;
            }
            $href = $item->getPathname();
            echo '<a href="' . $item . '">' . $item . "</a><br>";
        } else {
            echo $item . "<br>";
        }
    }
}

showDirectory($dir);




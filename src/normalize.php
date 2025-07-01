<?php
/**
 * Нормалізувати шлях відповідно до сепаратора директорій для поточної операційної системи.
 * Використовуйте `/` або `\` для розділення директорій, а ця функція замінить всі роздільники, що не відповідають поточній ОС, на відповідний.
 * Потрібно використовувати для обробки всіх файлових шляхів (окрім URL) щоб дозволити безпечне перенесення коду між пристроями з різними ОС.
 *
 * @return string шлях з дійсним роздільником директорій для поточної ОС
 * (наприклад: `path\to\file.php` -> `path/to/file.php`)
 */
function pathNormalize(string $path): string {
    return str_replace(DS === '/' ? '\\' : '/', DS, $path);
}

/**
 * Аналогічно до `pathNormalize()`, але додано підтримку альтернативного зворотного ходу по директоріям.
 *
 * Повертає коректний шлях замінивши всі:
 * - сепаратори директорій згідно константи DS (може бути `/` або `\`) - на справжній сепаратор директорій для поточної операційної системи,
 * - роздільники зворотної вкладеності згідно константи BNS (може бути `<` або `^`) - на `../` або `..\` в залежності від DS.
 *
 * @return string шлях з дійсним роздільником директорій для поточної ОС
 * (наприклад: `<path\to\file.php` -> `../path/to/file.php`)
 */
function pathNormalizePlus(string $path): string {
    return str_replace(BNS, '..' . DS, pathNormalize($path));
}



/**
 * Перетворити файловий шлях для поточної ОС на шлях вкладеності.
 *
 * @param string $path файловий шлях для перетворення (додатково обробляється функцією `pathNormalize()`,
 * а тому роздільник каталогів може бути `/` або `\` не залежно від ОС)
 * @param string|null $ns роздільник вкладеності, на випадок, якщо потрібно щоб він відрізнявся від константи NS (може бути `>` або `.`)
 * @return string шлях вкладеності з роздільником вкладеності згідно $ns або NS замість роздільника директорій для поточної ОС
 * (наприклад: `path/to/file.php` -> `path>to>file.php`)
 */
function pathToNesting(string $path, ?string $ns = null): string {
    return str_replace(DS, $ns ?? NS, pathNormalize($path));
}

/**
 * Перетворити шлях вкладеності на файловий шлях для поточної ОС.
 *
 * @param string $nesting шлях вкладеності для перетворення
 * @param string|null $ns роздільник вкладеності, на випадок, якщо потрібно щоб він відрізнявся від константи NS (може бути `>` або `.`)
 * @return string файловий шлях з дійсним роздільником директорій для поточної ОС замість роздільника вкладеності
 * (наприклад: `path>to>file.php` -> `path/to/file.php`)
 */
function nestingToPath(string $nesting, ?string $ns = null): string {
    return str_replace($ns ?? NS, DS, $nesting);
}



/**
 * Розібрати файловий шлях на масив окремих елементів.
 *
 * @param string $path файловий шлях для перетворення (додатково обробляється функцією `pathNormalize()`,
 * а тому роздільник каталогів може бути `/` або `\` не залежно від ОС)
 * @param int $limit максимальна кількість елементів, що буде повернуто
 * @return array масив елементів, що виникли в результаті розбиття файлового шляху константою DS
 * (наприклад: `path/to/file.php` -> `['path', 'to', 'file.php']`)
 */
function parsePath(string $path, int $limit = PHP_INT_MAX): array {
    return explode(DS, pathNormalize($path), $limit);
}

/**
 * Розібрати шлях вкладеності на масив окремих елементів.
 *
 * @param string $nesting шлях вкладеності
 * @param string|null $ns роздільник вкладеності, на випадок, якщо в цій вкладеності він відрізняється від константи NS (може бути `>` або `.`)
 * @param int $limit максимальна кількість елементів, що буде повернуто
 * @return array масив елементів, що виникли в результаті розбиття шляху вкладеності знаком $ns або NS
 * (наприклад: `path>to>file.php` -> `['path', 'to', 'file.php']`)
 */
function parseNesting(string $nesting, ?string $ns = null, int $limit = PHP_INT_MAX): array {
    return explode($ns ?? NS, $nesting, $limit);
}



/**
 * Перетворити масив на файловий шлях.
 *
 * @param array $arrayPath масив з елементів у послідовності шляху
 * @return string файловий шлях
 */
function arrayToPath(array $arrayPath): string {
    return implode(DS, $arrayPath);
}

/**
 * Перетворити масив на шлях вкладеності.
 *
 * @param array $arrayNesting масив з елементів у послідовності вкладеності
 * @param string|null $ns роздільник вкладеності, на випадок, якщо потрібно щоб він відрізнявся від константи NS (може бути `>` або `.`)
 * @return string шлях вкладеності 
 */
function arrayToNesting(array $arrayNesting, ?string $ns = null): string {
    return implode($ns ?? NS, $arrayNesting);
}
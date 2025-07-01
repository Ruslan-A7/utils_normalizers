<?php
if (!defined('DS')) {
    /**
     * DS - скорочений варіант DIRECTORY_SEPARATOR (стандартний роздільник каталогів для поточної операційної системи).
     *
     * Використовувати при побудові шляхів до файлу для забезпечення функціонування коду на різних ОС.
     *
     * ВАЖЛИВО! Щоб встановити власне значення для цієї константи - потрібно визначити її ДО підключення файлу vendor/autoload.php що містить автозавантажувач від Composer.
     */
    define('DS', DIRECTORY_SEPARATOR);
} elseif (DS !== '/' && DS !== '\\') {
    exit('Invalid DS! This message came from package "ra7/utils_normalizers" in file "src/separators.php"');
}



if (!defined('NESTING_SEPARATOR')) {
    /**
     * NESTING_SEPARATOR - роздільник вкладеності, що використовується при побудові вкладеності масивів та інших структур, що мають вкладеність.
     *
     * Допускається використовувати знак більше '>' (стандартно для RA7\Framework) або крапку '.' (як в інших фреймворках).
     *
     * ВАЖЛИВО! Щоб встановити власне значення для цієї константи - потрібно визначити її ДО підключення файлу vendor/autoload.php що містить автозавантажувач від Composer.
     */
    define('NESTING_SEPARATOR', '>');
} elseif (NESTING_SEPARATOR !== '>' && NESTING_SEPARATOR !== '.') {
    exit('Invalid NESTING_SEPARATOR! This message came from package "ra7/utils_normalizers" in file "src/separators.php"');
}

if (!defined('NS')) {
    /**
     * NS - скорочений варіант NESTING_SEPARATOR (роздільник вкладеності).
     * Обов'язково має відповідати NESTING_SEPARATOR!
     */
    define('NS', NESTING_SEPARATOR);
} elseif (NS !== NESTING_SEPARATOR) {
    exit('Invalid NS! This message came from package "ra7/utils_normalizers" in file "src/separators.php"');
}



if (!defined('BACKWARD_NESTING_SEPARATOR')) {
    /**
     * BACKWARD_NESTING_SEPARATOR - роздільник вкладеності (для зворотного порядку - тобто для підйому на попередній/батьківський рівень),
     * що використовується при побудові шляхів, масивів та інших структур що мають вкладеність.
     *
     * Допускається використовувати знак менше '<' або стрілочку вверх '^' (карет).
     *
     * ВАЖЛИВО! Щоб встановити власне значення для цієї константи - потрібно визначити її ДО підключення файлу vendor/autoload.php що містить автозавантажувач від Composer.
     */
    define('BACKWARD_NESTING_SEPARATOR', '<');
} elseif (BACKWARD_NESTING_SEPARATOR !== '<' && BACKWARD_NESTING_SEPARATOR !== '^') {
    exit('Invalid BACKWARD_NESTING_SEPARATOR! This message came from package "ra7/utils_normalizers" in file "src/separators.php"');
}

if (!defined('BNS')) {
    /**
     * BNS - скорочений варіант BACKWARD_NESTING_SEPARATOR (роздільник вкладеності для зворотного порядку - тобто для підйому на попередній/батьківський рівень).
     * Обов'язково має відповідати BACKWARD_NESTING_SEPARATOR!
     */
    define('BNS', BACKWARD_NESTING_SEPARATOR);
} elseif (BNS !== BACKWARD_NESTING_SEPARATOR) {
    exit('Invalid BNS! This message came from package "ra7/utils_normalizers" in file "src/separators.php"');
}
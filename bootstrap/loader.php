<?php
declare(strict_types = 1);

spl_autoload_register(
    new class
    {
        public function __invoke(string $class, string $infix = null): void
        {
            $fname = sprintf('src/%s%s.php', str_replace('\\', '/', $class), $infix);

            if (is_readable($fname)) {
                require $fname;
            } elseif (null == $infix) {
                $this($class, '.trait');
            }
        }
    }
);

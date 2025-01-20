<?php

it('ensures no debug functions are used in src directory', function () {
    $debugFunctions = ['die', 'exit', 'print_r', 'var_dump', 'echo', 'dd'];
    foreach (glob('src/**/*.php') as $file) {
        $content = file_get_contents($file);
        echo $file . "... \n";
        foreach ($debugFunctions as $function) {
            expect(strpos($content, $function . '('))->toBeFalse();
            expect(strpos($content, $function . ' ('))->toBeFalse();
        }
        // make sure Echo without () is not in the code
        expect(strpos($content, "echo '"))->toBeFalse();
        expect(strpos($content, 'echo "'))->toBeFalse();
    }
});

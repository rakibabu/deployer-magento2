<?php

namespace Deployer;

// Run styles
desc('Compile styles');
task('compile:styles', function () {
    if (! get('compile_theme')) {
        write("No compilation theme found.");
        return;
    }

    run('cd {{release_path}}/vendor/justbetter/magento2mix && chmod +x scripts/install.sh && bash mix.sh -i');
    run('cd {{release_path}} && bash mix.sh -a');
    run('cd {{release_path}} && bash mix.sh -ma');
});

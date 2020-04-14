<?php

namespace Deployer;

$noDev = get('is_production') ? ' --no-dev' : '';

desc('Composer Install');
task('composer:install', function () {
    run("cd {{release_path}}{{magento_dir}} && {{composer}} install --no-progress --no-interaction --optimize-autoloader".$noDev." {{verbose}}");
});

desc('Composer Update');
task('composer:update', function () {
    run("cd {{release_path}}{{magento_dir}} && {{composer}} update --prefer-dist".$noDev." --optimize-autoloader {{verbose}}");
});

desc('Composer Clear Cache');
task('composer:clearcache', function () {
    run("cd {{release_path}}{{magento_dir}} && {{composer}} clearcache");
    run("cd {{release_path}}{{magento_dir}} && rm -rf var/composer_home/cache/");
});

<?php

namespace Deployer;

// OPCache and Redis

desc('Redis cache flush');
task('redis:flush', function () {
     $socketConnect = '';

    if (get('redis_sock')) {
        $socketConnect = ' -s {{redis_server}}';
    }

    $options = get('redis_dbs');

    foreach ($options as $option) {
        run("redis-cli".$socketConnect." -n ".$option." flushdb;");
    }
});

desc('OPCache cache flush');
task('opcache:flush', function () {
    run("{{php}} -r 'opcache_reset();'");
});

desc('Update the code via Git');
task('git:update_code', function () {
    run("cd {{release_path}}{{magento_dir}} && \
        git reset --hard origin/{{branch}} && \
        git checkout {{branch}} && \
        git pull origin {{branch}}");
});

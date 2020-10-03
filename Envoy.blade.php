@include('console/bootstrap.php')

@setup
    $servers = [
        'staging' => $_ENV['STAGE_SERVER'],
        'production' => $_ENV['PRODUCTION_SERVER'],
    ];
@endsetup

@servers($servers)

@task('live:deploy', ['on' => 'production', 'confirm' => true])
    cd {{ $_ENV['PRODUCTION_STORAGE_DIR'] }}/content
    git pull origin master
@endtask

@task('stage:deploy', ['on' => 'staging', 'confirm' => false])
    cd {{ $_ENV['STAGE_STORAGE_DIR'] }}/content
    git pull origin master
@endtask

@task('stage:reset', ['on' => 'staging', 'confirm' => false])
    cd {{ $_ENV['STAGE_STORAGE_DIR'] }}/content
    git reset --hard origin/master
    git branch | grep -ve " master$" | xargs git branch -D
    git pull
@endtask

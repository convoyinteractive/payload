@include('console/bootstrap.php')

@setup
    $servers = [
        'staging' => $_ENV['STAGE_SERVER'],
        'production' => $_ENV['PRODUCTION_SERVER'],
    ];
@endsetup

@servers($servers)

@task('deploy', ['on' => 'production', 'confirm' => true])
    cd {{ $_ENV['PRODUCTION_STORAGE_DIR'] }}/content
    git pull origin master
@endtask

@task('reset', ['on' => 'staging'])
    cd {{ $_ENV['STAGE_STORAGE_DIR'] }}/content
    git checkout master
    git branch | grep -ve " master$" | xargs git branch -D
    git pull
@endtask

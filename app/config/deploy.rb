# config valid only for current version of Capistrano
lock '3.4.0'

set :application, 'kunstimkinderzimmer.com'
set :repo_url, 'ssh://git@bitbucket-external.xq-web.de:7999/cms/kunstimkinderzimmer.com.git'
set :deploy_to, '/www/htdocs/w0170a4d/htdocs/kunstimkinderzimmer.com'
set :linked_files, fetch(:linked_files, []).push('app/config/parameters.yml')
set :linked_dirs, fetch(:linked_dirs, []).push('app/media')
set :keep_releases, 5
set :file_permissions_chmod_mode, "0775"
set :file_permissions_paths, ["app/logs", "app/cache", "app/media"]
set :file_permissions_groups, ["www-data"]
set :symfony_directory_structure, 2
set :sensio_distribution_version, 4
set :use_sudo, false

SSHKit.config.command_map[:composer] = "php #{shared_path.join("composer.phar")}"

namespace :deploy do
  after :starting, 'composer:install_executable'
end

#before "deploy:publishing", "deploy:set_permissions:chmod"
#before "deploy:publishing", "deploy:set_permissions:chgrp"
#before "deploy:publishing", "deploy:set_permissions:chgrp"
#after "deploy:publishing", "deploy:set_permissions:chgrp"

namespace :deploy do
  task :migrate do
    symfony_console('doctrine:migrations:migrate', '--no-interaction')
  end
end
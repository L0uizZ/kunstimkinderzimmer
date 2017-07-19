set :deploy_config_path, 'app/config/deploy.rb'
set :stage_config_path, 'app/config/deploy'
require 'capistrano/setup'
require 'capistrano/deploy'
require 'capistrano/symfony'
require 'capistrano/file-permissions'
Dir.glob('app/capistrano/tasks/*.rake').each { |r| import r }
set :application, "polmedia"
set :domain,      "uirapu.ru"
set :deploy_to,   "/var/www/polmedia.pl"
set :app_path,    "app"

set :repository,  "https://github.com/uirapuru/polmedia.pl.git"
set :scm,         :git

set :model_manager, "doctrine"

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain, :primary => true       # This may be the same as your `Web` server

set   :use_sudo,      false
set  :keep_releases,  3

set :shared_files,      ["app/config/parameters.yml"]
set :shared_children,     [app_path + "/logs", web_path + "/uploads", "vendor"]
set :use_composer, true
# set :update_vendors, true

set :writable_dirs,       ["app/cache", "app/logs"]
set :user,                "uirapuru"
set :webserver_user,      "www-data"
set :permission_method,   :acl
set :use_set_permissions, true


# Be more verbose by uncommenting the following line
# logger.level = Logger::MAX_LEVEL

namespace :deploy do
  desc "building assetic"
  task :assetic_dump, :roles => :app do
    run "cd #{latest_release} && #{php_bin} app/console assetic:dump"
  end
end

after 'deploy:update_code', 'deploy:assetic_dump'
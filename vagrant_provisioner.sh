
mysql -uroot -e "CREATE SCHEMA legacy_app"
mysql -uroot --database=legacy_app -e "SOURCE /vagrant/db_dump_for_legacy_app.sql"

cd /vagrant

sh ./install_composer_programmatically.sh

php composer.phar require cilex/cilex
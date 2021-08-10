all: build

build: composer-install

composer-install:
	composer install

composer-update:
	composer update

server:
	php -S 0.0.0.0:8888 -t public

deploy:
	php vendor/deployer/deployer/bin/dep dep

clean-twig-cache:
	rm -rf tmp/*

tests: clean-twig-cache
	php vendor/bin/phpunit --color test

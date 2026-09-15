.PHONY: dev ci ci-setup setup release clean

dev: setup

ci: ci-setup

ci-setup:
	composer install --no-dev --no-interaction --optimize-autoloader

setup:
	composer install

release: ci
	mkdir -p release
	zip release/jcore-dummy.zip -r * -x@.zipexclude

clean:
	rm -rf vendor
	rm -rf release

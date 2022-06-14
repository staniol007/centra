# Centra - recruitment assignment

**Author:** marcin.stanik@gmail.com

**Doc since:** 06.2022

**Used technologies:**
- PHP 8.1
- Git
- Composer
- Docker
- PHPUnit
- Heroku

## INSTALLATION

### ZIP
- unzip archive file

or

### GIT

```shell
git clone git@github.com:staniol007/centra.git centra-assignment
```

```shell
cd centra-assignment
```

### Composer only if Docker is not used
```shell
composer install
```

### Docker
```shell
docker-compose up -d --build
```

## CONFIGURATION
```shell
touch .env.local
echo 'APP_ENV=dev' >> .env.local
echo 'GH_TOKEN=YourSecretGithubToken' >> .env.local
echo 'GGH_ACCOUNT=YourGithubAccount' >> .env.local
echo 'GH_REPOSITORIES=YourRepositoriesSeparatedBy|' >> .env.local
```

### Tests - PHPUnit
```shell
php bin/phpunit
```

## DOCKER URL
```
http://localhost:31080
```

## HEROKU URL
```
https://centra-recruitment-assignment.herokuapp.com
```




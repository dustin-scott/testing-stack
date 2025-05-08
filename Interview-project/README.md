# Automation Demo

## Docker
Drop into the docker container
```shell
docker compose exec java bash
```

## Maven
### Install dependencies
```shell
mvn install -DskipTests=true
```
### Run All Tests
```shell
mvn test
```
### Run Specific Tests
```shell
mvn test -Dsurefire.suiteXmlFiles="./TestNGScripts/DMS_37533.xml"
```

# Automation POM

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
cd automation-pom/
mvn test -Dsurefire.suiteXmlFiles="./TestNGScripts/DMS_37533.xml"
```

### Docker
Add the `automation` value to the `~/dev-environment/.env` file for the `COMPOSE_PROFILES` variables.

For example:
```shell
COMPOSE_PROFILES=portal,local,automation
```

CHANGELOG

Version 2.0.1 [2018-07-28]:

 - Deprecating entity like value objects 
 - Stop linting files on CI
 
Version 2.0 [2018-07-20]:

 - in ExternalServices, switch StatusContext to StatusCheckContext
 - removing Status VOs (StatusState should be left)
 - Deprecating __toString() in favour of asString()

Version 1.2.0 [2018-07-16]:

 - add phpstan/phpstan-strict-rules
 - fix violations reported by phpstan/phpstan-strict-rules
 - add ExternalServiceFactory (DEV-12)
 - Create StatusCheck (DEV-11)
 - Deprecate Status\* towards using StatusCheck's (DEV-11)

Version 1.1.0 [2018-06-25]:
 - Ugpgrading phpstan (0.10) & infection (0.9dev)
 - Upgrade devboard/lib-git, min is now 1.1 
 - PHPStan: Ignore json decode expectations
 - DateTime objects need to check if creating from time was done properly

Version 1.0: Up to this point, there is no documentation on given code but we do hope to fix that soon :)


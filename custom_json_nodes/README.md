CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Requirements
 * Installation
 * Configuration


INTRODUCTION
------------
This module provides a URL that responds with a JSON representation of
a given node with the content type "page" only if the API Key and a
node id (nid) of an appropriate node are present, otherwise it will 
respond with "access denied".

This module is currently available for Drupal 8.7.x. above and 9.x.x.


REQUIREMENTS
------------

This module requires serialization module of Drupal core.


INSTALLATION
------------

Install this module as you would normally install a contributed
Drupal module. Visit https://www.drupal.org/node/1897420 for further
information.


CONFIGURATION
-------------

Go to Administration > Configuration > System > Basic site settings

Configurable parameters:
 * Site API Key - API key for validation

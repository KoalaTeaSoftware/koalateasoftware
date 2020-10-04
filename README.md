# Koala Tea Software Site
## Friendly URLs
* Index.php will check to see that there are a suitable
  * Chapter
  * Section
  * Subsection
* It determines 'suitability' in the following way(s)
  * Chapter
    * Must have a directory with a matching name (lower case)
    * Must contain a file called contents.php
  * Section
    * There has to be a directory (with a name matching the request) within the requested chapter
    * Not (currently) demanding there be a file called contents.php in the section directory
    
## Auto Creation of the main menu
* This depends on the directory structure, too
* A main-nav item will be created for each of the directories (under the root) that
    * contain a contents.php
    * are not called 'home', or named with an initial '_' 

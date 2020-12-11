# Test Plan
## Overview
The web site [http://swordsandclapboards.com](SwordsAndClapboards.com) is a moderately simple site that lays out the
activities of the company Swords And Clapboards Ltd.. In itself, it does not support any e-commerce (as yet). PHP forms
its backbone, and Bootstrap is used to provide responsive capabilities. A little JavaScript provides for client-side
interactivity (especially on the Contact page).
## Risks
* The 'friendly URL' feature is handled by a combination of .htaccess, PHP, and the directory structure. If this fails, it is likely to result in partial-paint of pages, or even 404s. It is a low-level risk as this mechanism is in wide use with other sites developed by Koala Tea Software.
* Some pages are built from data (by PHP) (especially the On Release page). The builder code, or the data could contain errors, in which case, partial-paint of pages is possible.
* The Contact page makes moderate use of JavaScript validation. Failure (or circumvention) of this may result in a lack of feedback to the user, but not in any major embarrassment. For the Contact feature, server-side verification of submitted data lessens the possibility of problems.
## Scope
* In
  * Automated
    * Functional Test
    * Standards Compliance
    * Accessibility Compliance - where it can be automated (to do)</li>
  * Manual
    * 'look and feel' (i.e. an experimental approach, concentrating on the user's experience of the site in different device sizes and the like)
    * Chrome Lighthouse feedback
* Out
    * Performance - Unless ad. hoc. use / testing shows any problems - None of the site is particularly demanding in terms of processing, or bandwidth.
    * Security - Not <em>tested</em> (but best practice is to be followed when mitigating the risks noted above).
    * UAT - Performed by the client
    * Cross-browser appearance
    
## Tools
Automated testing is provided using Cucumber / Java on a Win10 device. Features, and scenarios are added / updated as required. Each upgrade to the suite triggers a re-run of the test suite. Execution of the suite is manually triggered on the developer's machine, giving direct Quality Control feedback to the deployment process.

Once a release has (sufficiently) passed the automated test, it is manually tested (see above).

## Environments
Development and testing happens on a Win10 device.

Code is deployed to a staging environment where the automated, and manual testing occurs (including UAT).

Only once it has proved acceptable, is it deployed the live site, where the tests are run again.</p>

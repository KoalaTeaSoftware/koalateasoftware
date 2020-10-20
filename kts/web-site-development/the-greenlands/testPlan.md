# The Greenlands
## Overview
[the-greenlands.com](http://the-greenlands.com/) forms the basis of a trans-media environment for the company Swords And Clapboards.

## Risks
* The 'friendly URL' feature is handled by a combination of .htaccess, PHP, and the directory structure. If this fails, it is likely to result in partial-paint of pages, or even 404s
* Some pages are built from data (by PHP). The builder code, or the data could contain errors, in which case, partial-paint of pages is possible.
* There are some JavaScript-based features. Failure of these may result in minor features not functioning, but not in any major embarrassment.
* Malevolent use of the contact facility (client-side and server-side) - spam, scripts
* The MailChimp database is written to:
  * This could result in unwanted entries in the mailing list</li>
  * This requires that a security token be 'known' by the software. It is important that this token should remain unexposed.
          
## Scope
* In Scope
  * Standards Compliance
  * Functional Test
  * Performance test
    * This informal and part of the development process. Results are not recorded.
    * The opinion of the Chrome Lighthouse tool (which also provides some other non-functional testing)
* Out Of Scope
  * Security - Not <em>tested</em>>, but best practice is followed when mitigating the risks noted above.
  * UAT - performed by client - faults feed back via YoutTack, unless they are urgent
  * Cross-browser functionality and appearance - beyond such as the UAT that is performed on an iPad, and review using Chrome on a phone.
 
 ## Tools
 * Automated testing is provided using Cucumber / Java in a Win10 device. Features, and scenarios are added / updated as required. Each upgrade to the suite triggers a re-run of the test suite. Execution of the suite is manually triggered on the developer's machine, giving direct Quality Control feedback to the deployment process.
* IDE - ItelliJ Idea-based 
* VCS - GitHub
* Fault tracking - YouTrack
      
## Environments
* Development and testing happens on a Win10 device
* Code is deployed to a staging environment where the automated, and manual testing occurs (including some UAT). This staging environment connects to the live Mailchimp facility.

## Roadmap
* SUT
  * sandbox for the MailChimp integration tests
  * improve performance of most pages (TTFB is slow)

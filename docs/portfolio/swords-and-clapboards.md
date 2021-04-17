---
title: Swords and Clapboards
description: This is a more-simple portfolio site.
author: Mark Goldthorp
type: article
category: portfolio
---
# {{$frontmatter.title}}

This web-site is for an independent film production company. It uses much of the URL path handling code that is central to the other sites, is based on PHP, Bootstrap and all the usual suspects. It is quite simple really.

## Road Map (To Do)

- [ ] The Contact form does not handle query parameters
   
## Quality Management

Automated Function Quality Measurement is principally achieved using the in-house Cucumber/Java framework. This is plumped-up with Gherkin to verify: 
  * Business requirements (**BDD**)
  * Other requirements, such as
    * A desire to ensure that the HTML and CSS syntax standards are met
    * Risks inferred by considering the construction of the site (**White Box**, **TDD** & **regression** are nice buzzwords to have  here)
  
The automated suite is used whenever pages are added / updated. Google's Lighthouse also finds it way into the test effort, as well as the good old manual **experimental testing** techniques. 
  
GitHub is used for VCS and CI/CD. Check-ins to the repo's master trigger a workflow that does thr following:
* checks the SUT's code out into a **Staging area**
* checks he test-ware out into the current environment
* runs the **CI test suite** (Cucumber tags)
* Irrespective of the result of the tst-run (pass, or fail), an HTML report is FTP'd to KTS's server.
* If the test succeeds, the new files are FTP'd to **Live**
* If it fails, GitHub sends me emails

Selection of candidates for inclusion in the CI takes into account a balance between fragility (e.g. HTML syntax) and necessity (e.g. business requirement). Therefore, the CI suite is there to 'prevent embarrassing releases', rather than to give a 'good feeling' about a release candidate.

Here is the window report of the  <a href="https://koalatea-software.com/web-site-development/swords-and-clapboards/cucumber-html-reports/overview-features.html" target="_blank">latest CI Acceptance Run</a>:

<iframe src="https://koalatea-software.com/web-site-development/swords-and-clapboards/cucumber-html-reports/overview-features.html" title="Latest run of the CI Acceptance Test Suite" style="width: 200%;
height: 100rem;
-ms-zoom: 0.75;
-moz-transform: scale(0.5);
-moz-transform-origin: 0 0;
-o-transform: scale(0.5);
-o-transform-origin: 0 0;
-webkit-transform: scale(0.5);
-webkit-transform-origin: 0 0;"></iframe>

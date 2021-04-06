---
title: The Greenlands
description: This is a transmedia site, so needs to be quite dynamic - content - other platforms
author: Mark Goldthorp
type: article
category: portfolio
---
# {{$frontmatter.title}}

This web-site is for an up-and-coming movie director. It is themed around 'The Greenlands' (a fantasy world) and has various chapters, and 'embeddings'.

It was originally constructed using PHP, with hooks in to various RSS content-suppliers (content supplied by the client).

## Road Map (To Do)

- [ ] Make it faster
   * This is an ongoing task, Vue.JS appears a lot faster, and the VuePress engine may be useful - clearly, the challenge with that is the look of the site (substantial customisation)
  * Think of using Firebase to serve blog content
  
## Current State

* It used PHP / .htaccess to provide a single-page-app (in operation, if not in feel). This means that the global look is defined in one place
* Integrations
  * Mailchimp - gathering newsletter subscribers
  * PodBean - Podbean provides an XML feed, which has to be munged a little (the Vue.JS skeleton for the page) to present the data in he required manner.
  * WordPress - Similarly XML feeds are read am munged, this time by PHP) to present lists of articles, separated by category, for different 'chapters'. 
    * The aim was to be able to provide the users with a simple data-entry front end, but this has proved unsatisfactory becuae
      * The flexibility of the WP post-editing front-end allows the user(s) to enter posts that do not conform with the expectectations placed at the web-site end (resulting in failures from malformed, through to completely failing pages)
          * This could be mitigated through more extensive user-training, but this is not something to be proud of here.
      * Very poor performance (time to draw page)
          * This may be mitigated through 'better' hosting, or rearranging the page-draw logic to draw the skeleton, then fill it in, but an entirely different approach would seem to be called for.
  
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

Here is the window report of the  <a href="https://koalatea-software.com/web-site-development/the-greenlands/cucumber-html-reports/overview-features.html" target="_blank">latest CI Acceptance Run</a>:

<iframe src="https://koalatea-software.com/web-site-development/the-greenlands/cucumber-html-reports/overview-features.html" title="Latest run of the CI Acceptance Test Suite" style="width: 200%;
height: 100rem;
-ms-zoom: 0.75;
-moz-transform: scale(0.5);
-moz-transform-origin: 0 0;
-o-transform: scale(0.5);
-o-transform-origin: 0 0;
-webkit-transform: scale(0.5);
-webkit-transform-origin: 0 0;"></iframe>

# Web Site Development

Koala Tea Software also develops web sites. Use the nav-bar above to see more details for specific web sites.

The sections of this chapter provide samples demonstrating the quality control that is applied to these sites. Clearly,
these test suites are incomplete.

## Dev. Stack

* HTML
* JavaScript (raw and / JQuery)
* CSS (from SCSS and compressed)
* PHP

Integrations with:

* Mailchimp (using the API to subscribe people)
* WordPress
  * Allowing the administrators a (fairly) friendly way of adding data
  * providing this dynamic content to the font end via XML feeds
* Instagram (through a WP plugin)

## Quality Management

Development takes a test driven approach (tempered by pragmatic considerations), in that Gherkin example-based tests are
written before changes to the sites are effected.

YouTrack is used to keep track of lower-priority problems ('blockers' have to be dealt with immediately, and the TDD
approach has to be intelligently aplied).

### Development Phase

During the development phase, manual inspection of the look of pages, is augmented by the running of the in-house Java /
Cucumber test suite.

As part of the manual testing, Chrome's Lighthouse provides great benefits.

### The Java / Cucumber Test Suite

This is an in-house developed test framework. It is construced such that the framework of the suite is easily separable
form the part of the suite that tests a specific system.

The framework offers features like the following:

* Various simple abstractions, so that steps do not have to replicate code
  * Browser:
    * waiting for title - very useful when the test clicks a link that opens a slow page, but you don't want to actually
      define a page object
    * switching tabs ...
  * HtmlPage Object:
    * The intention is that this should be extended when specific page objects are created. As most of the sites that I
      have are based on the use of a Front Controller, my strategy ahs been to extend the this to a 'common 'page' for
      the site. This is then extended for specific pages.
    * This simplifies things like waiting for the page to actually be complete (important when you have a slow page),
      and other very common activities.

### CI / CD

This is a rather grand term for this, in these circumatances, but Quality Control as it applies to integration and
deployment is based on the Cucumber / Java test framework, and GitHub Actions.

In general, the actions are:

* Triggered by checking to master
* Extracting from master into a stage area, and running the tests
* FTPing the results to this web site
* On success, FTPing the code to Live

The results of the most recent run of the test are displayed on this site.

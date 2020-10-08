# Test Plan For Koala Tea Software

## Overview

[Koala Tea Software's website](http://koalateasoftware.com) acts as a simple portfolio for Koala Tea Software Ltd. (KTS). It has simple pages that are drawn in response clicks on nav-bars. These pages are not dynamic.  

## Risks

There are few risks that are peculiar to this website. The following risk assessments are 'white box' in nature.
* The main structure uses a PHP-based front-controller. This is achieved by collaboration between the .htaccess file, and the Front Controller (in this case called index.php). This uses code that is used in most of KTS's web sites. It differs from them, however, in that it is the primary domain on a shared host. So the risk of this is that pages could be inaccessible, and secondary assets (e.g. .css files, or images) are not correctly retrieved.
* All (nearly) the code is 'hand built', so there are the usual chances of typos in text, and code.
* A 3rd party tool for converting MarkDown into HTML is used to present some content (e.g. this test plan).
* Display of test results depends on the running of test code, and the placing of those results in the correct location within the directory tree.
* Performance is unlikely to be a risk (because of the simplicity and audience-size of the site).

## Scope

* Automated testing of the website:
  * Standards compliance (syntax rule verification and the like)
  * Other measures of 'successful' painting of the pages
* Manual testing:
  * Chrome Lighthouse's opinions of the pages. Very similar pages, such as the `web site creation > specific web site` pages are not likely to receive complete individual coverage. Sample page coverage is likely to be sufficient. This covers risks such as:
    * Performance
    * Conformance to best practices.
 * Look and feel, including:
    * Different browsers / devices
    * Actual correctness of the content

## Tools

* The IDE (PHPStorm) provides a 'code inspection' tool.
* Chrome (the browser) provides the Lighthouse tool.
* The automated test suite (Cucumber) is provided by Koala Tea Software Ltd.
* Version control is provided by Github (mostly by PHPStorm' integration, but also via the Bash CLI and the Git GUI).
* Deployment management is provided by the IDE
* Fault recording and management (faults and other tasks) is provided by YouTrack

## Environments
* Work is on a Windows 10 device (for convenience)
* Hosting is on a shared Apache server
  * After formal release a staging environment will be slotted into the overall release process, with the pre-release testing aimed primarily at that

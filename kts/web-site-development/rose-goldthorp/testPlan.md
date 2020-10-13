# Test Plan
## Overview
The web site [RoseGoldthorp.com](https://rosegoldthorp.com) is a
    moderately
    simple site that acts as a portfolio for Rose Goldthorp. In itself, it does not support any e-commerce (as yet).
    PHP forms its backbone, and Bootstrap is used to provide responsive capabilities. A little JavaScript provides for
    client-side interactivity.

## Risks
* If the 'friendly URL' feature fails, it is likely to result in partial-paint of pages, or even 404s. The
        risks is not high, as this code is based on that used in similar sites. This feature is based on a combination of
        .htaccess, PHP, and the directory structure.
* Some pages are built from data, by PHP. The builder code, or the data, could contain errors, in which case,
        partial-paint of pages is the likely result.
* There are some JavaScript-based features. Failure of these code elements may result in minor, cosmetic failures, but not in any major embarrassment.
* Malevolent use of the contact facility (client-side and server-side) is countered by client-side and
        server-side checking.
* The MailChimp database is written-to:
  * This could result in unwanted entries in the mailing list</li>
  * This requires that a security token be 'known' by the software. It is important that this token remain invisible.

## Scope
* In scope
  * Automated Test:
        * Functional Test
        * Standards Compliance
        * Accessibility Compliance - where it can be automated (to do)
  * Manual: 'look and feel' (i.e. an experimental approach, concentrating on the user's experience of the site in different device sizes and the like)
* Out of scope
  * Performance - Unless ad. hoc. use / testing shows any problems - None of the site is particularly demanding in terms of processing, or bandwidth.
  * Security - Not <em>tested</em>, but best practice is to be followed when mitigating the risks noted above. Chrome lightouse is used to review all pages.
  * UAT - Performed by the client
  * Genuine cross-browser appearance and function
  
## Tools
Automated testing is provided using Cucumber / Java in a Win10 device. Features, and scenarios are added /
    updated as required. Each upgrade to the suite triggers a re-run of the test suite. Execution of the suite is manually effected on the developer's machine, giving direct Quality Control feedback to the deployment
    process.



Once a release has (sufficiently) passed the automated test, it is manually tested.

## Environments

Development and testing happens on a Win10 device.

Code is deployed to a staging environment where the automated, and manual testing occurs (including UAT). This
    staging environment connects to the live Mailchimp facility (ToDo: use a sandbox for the MailChimp integration
    tests).

Only once it has proved acceptable, is it deployed the live site.

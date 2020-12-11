# My Cucumber Frame

This is a Java / Cucumber frame that I use to test the web sites that I have developed, and manage.

The overall philosophy of this framework is to that it should balance simplicity with best OO practices. After all, you
don't want testing of the test framework to be a big task. Secondarily, I have not allowed simple test mechanisms to
accept exception specifications (e.g. the link checker). This does tow things, keeps it simple, provides some occasional
messages that help give confidence that the absence of evidence is evidence of absence.

## Features

Not in any particular order, this frame illustrates:

* Written in **Java**
* **Maven** provides the dependency management and the running of the test suite.
    * The POM is as focused as possible, leaving the tool to determine dependencies of dependencies. Many examples that
      you see on the internet result in loops, and not a clean tree.
    * Additionally, the report pretty printer.
    * Additionally, **TestNG** - mostly used for its Soft Asserts.
* Separation between the _test framework_, and the _test suites_ (tests that exercise the SUT).
* The _framework_ offers a WebPageObject that can be extended to cater for the pages that have to be tested.
    * Constructors:
        * Constructor that takes only the driver. This waits for the JavaScript to be completed, and the BODY tag to
          be **present**
        * Constructor that is also given a locator. This one wait for the **presence** of the object thus specified.
    * In most of my web sites, I have a common page structure, and I have extended the framework's WebPageObject so that
      the common page object waits for an element that I know is drawn very near the end of all of the pages on that
      site. Specific pages then extend this common page.
    * Note that trying to use the **Selenium Page Factory** in anything other than the furthest child in such a
      hierarchy is going to end in frustration.
* Wrapping the web drivers (or whatever) in a **facade** (of sorts) called an **Actor**, so that the steps do not have
  to worry about the details of that sort of stuff.
    * A **Factory** makes creating the correct type of Actor easy.
* A default Actor
    * Hooks start a new Actor for each scenario
    * Actors use **lazy instantiation** for services (where applicable), and drivers
* A default SUT (scheme and URL)
    * The combination of these two defaults means that feature files do not need to specify this information repeatedly,
      and it is, therefore, easy (for example) to swap from staging to live environments.
* A **Test Context** that provides a central point for all the config (SUT and framework) data, and any info. that
  absolutely has to be shared across steps in a scenario.
    * Hooks use the underlying test framework ensure that these data are as fresh as they need to be.
* Whilst the framework provide little of this, separation between locator-specification and action-specification is
  encouraged:
    * This is the idea behind the **Page Object Model**.
    * In the test as it is applied to The Greenlands, you can see this principle used, and extended to extract **
      widgets** (in this case the secondary nav-bar).
* The framework allows easy use of the W3C's various on-line syntax, and other checking tools
    * The accessibility checking is less subject to the binary interpretation of results, and has not yet been
      incorporated.
* Pretty Printed (but simple) reports


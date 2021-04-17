---
title: ISEB/ISTQB/WKW
description: Alphabet soup, or food for thought?
author: Mark Goldthorp
type: article
category: concepts
---
# {{$frontmatter.title}}

::: tip ISTQB
[International Software Testing Qualifications Board](https://www.istqb.org/about-us.html)
:::

::: tip ISEB
_Information Systems Examinations Board_ a something that was subsumed / morphed into the [British Computer Society](https://www.bcs.org/get-qualified/certifications-for-professionals/)  
:::

::: tip WKW
Answers on a postcard, please ...
:::

You can spend hours chasing down who is friends with whom and who started what, but, basically, the ISTQB is the happening name (how 60's is that terminology?), and the [Professional Certification portfolio previously know as ISEB](https://www.istqb.org/about-us/relationship-with-iseb.html) still hangs on. 

It is going to be more use to most people to understand what it is about.

[[toc]]

## Some Definitions

Understanding the difference between the following two concepts can be a great help in the various different areas of Quality Management.

_Take a moment to consider the difference between these two terms, and what is behind them._

::: warning Validation
Determining whether that which is being developed is a **valid solution** to the problem that you wish to solve, or help with. 
A valid solution is the sort of thing that you hope the PO, or other business-level stakeholder, will be pivotal in defining.
:::

::: warning Verification
Determining whether the stuff that you are inspecting (could be documents, or code) will result in some code that will do what you think it should do.
This is what Quality Control (AKA testing) tries to do.
:::

The following may seem a little pedantic, but getting a grip on them can be of help too. The age-old [division of labour](https://en.wikipedia.org/wiki/Division_of_labour) ideas can be relevant here. For example, in UAT, it is probably going to be enough for the person with their hands on the SUT to describe the _failure_ (along with how they detected it - _expected .vs. actual_ and _steps to repeat_), whereas, it is going to be likely that developers (or architects) will be able to detect the _error_, and prevent recurrence of the _failure_ (probably by fixing the _fault_).

::: tip Error / Mistake
What goes on in a person's head. For example, they could fail to understand a business requirement, or they could fail to get a good grip on dependencies in the code that they are writing, or who knows what?.
:::

::: tip Defect / Fault
What the person makes (probably types) as a result of the _error_ that they made (write a false description of a business requirement / refer to the wrong variable).
:::

::: tip Failure
What the thing that you are all trying to make does as a result of the _defect_. Note that there is not a 1:1 relationship between defects and failures.
:::


## The Prime Directive

> **Reduce embarrassment when the product is released**

People are fallible (and don't imagine that AI's will not be), so mistakes will be made. Embarrassment come from having your customer detect failures. You can only _reduce_ the chance of embarrassment, because it is not practical to exhaustively test.

As a Quality Architect, it is going to be your job to determine where the risk of embarrassment will be 'greatest' (a complicated product of the _likelihood of any particular failure_, and the _consequences of that failure_), and to focus your efforts in getting confidence that these risks are not likely to eventuate.

## Takeaways

* People make mistakes, so products _will_ occasionally fail to do what is expected of them, so quality control is (really) needed for finding mistakes before the product is put in front of the customer.
* Testing (quality control) will find faults wherever you have thought to look (and in other places if you are lucky), so a green dashboard tells you that you have not found any faults, not that the UST is free of faults (absence of evidence is not ...).


## So, Is It Worthwhile?

Emphatically **YES**, it is worth getting the concepts listed in the  [foundation sylabus](https://www.istqb.org/certification-path-root/foundation-level-2018.html#syllabus) on your chem.

Is it worth coughing-up all that money to be certified? Only you can know whether you need others to push info into your head, or your employer / clients need to check boxes.  

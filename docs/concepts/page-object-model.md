---
title: Is the Page Object Model all that it is cracked up to be?
description: My take on the Page Object Model as used in automated testing (principally Selenium, and its friends)
author: Mark Goldthorp
type: article
category: concepts
---
# {{$frontmatter.title}}

## What and Why

The Page Object Model is, fundamentally, an application of time-honoured OOP principles to the art of writing software-to-test-software (testware). The main one being: 

> Separation Of Concerns

The main 'concerns' are:

1. Specific details of how you get at the element of the page (or whatever) that you are going to deal with. This actually can be subdivided into to more 'concerns':
   1. Location - i.e. how to get a handle on the items that you will be having something to do with
   1. Manipulation - i.e. encapsulation of actions such as writing-to, and reading from the things that you have located
1. Verifying the contents / behaviour of that _whatever_

The main thing is that the decisions about the contents / behaviour (assertions) should not appear in part 1, Location details should be hidden from part 1ii, or part 2.

The basic driver is that the look of the page can change without affecting the operation of the page, and the look and operation of the page can change without changes in some of the business requirements. If you separate concerns in this way, it is easier to maintain you testware in the face of the daily pressures of the SDLC.

## Use Your Brains

You are always going to benefit by separating out the location details (e.g. is it the ID, or an XPath?). 

If you have simple elements, and simple interaction, it may not be worth adding code to define about the manipulations (remember more code gives more fragility). `.value`, or `.SendKeys` could be perfectly adequate level of abstraction.  

> DRY (don't repeat yourself)

Do not slavishly adopt the idea that 'one SUT page' => 'one testware object'. If you have a complicated element, specially if (like a date-entry field) it appears all over the UI, it is going to pay you back handsomely to make that into a separate object (Widget Object?). Such an object could take in the data that your test-logic want to think about, do all the waits while the code in the widget decides how it is going to 'help', and so on, It would also always present the displayed data to you in a simple, compact block. If your testware framework supports objects inside objects, you get to save hours of repeating yourself

So, in summary, my opinions is that the Page Object Model is definitely worth getting your head around, but remember, it is not a religious rule, but a way of thinking.

> BTW: Don't confound the Page Object Model with Selenium's Page Factory 

---
title: This Website
description: A learning exercise with VuePress and WebDriverIO
author: Mark
type: article
category: portfolio
---
# {{$frontmatter.title}}

This website is going to do a few things for me. I have already tried basing a website on WordPress, and PHP, using WP as simply a CMS and found that the result offers 2 big obstacles to customer satisfaction:
1. You end up spending many hours trying to get something approaching the look that you want
1. You get an embarrassingly slow website. I suspect bloat, the legacy-software-problem, and the fact that my hosting supplier want me to pay for 'better' hosting.

I could get good at selecting, manipulating & writing WP customisation and plugins, I suppose, but to what end? I would still probably have to pay for faster hosting, and I would not be able to compete selling these skills.

I discovered Vue.JS recently, and, even more recently, VuePress, and I really like them. They hide away a lot of the clunks that I hve found that I need to wade through using PHP, and they will serve pages rapidly.

For various reasons, I have **Gone Over To The Dark Side** with this site. I have decided to host the site on Google's Firebase. You get very simple server-side stuff (although they are trying to sell it as 'no server'), so that is a big plus. For the time being, you get speed.

## Road Map (To Do)

- [ ] make the category filter use some kind of _contains_, rather than _===_
- [ ] use Firebase storage as the location of the blog articles. Currently, it is necessary to build and deploy when an article is written. It will mean
   * Writing a Vue object (the appropriate properties) to capture an article
  * Make the article listing component look into the Firebase storage, rather then the deployed list of files.
  * Think about how this affects (probably breaks) the search in the navbar

## Current State

* It can produce categorised lists of blogs. This uses a Posts.vue component has a property called "category". 
  * Currently, I have them placed in different folders, but the component gets a list of _all_ of the files.
  * The FrontMatter type attribute is _the key_
  * You can add attributes to the FrontMatter, this is what I did to add some simple categorisation
    

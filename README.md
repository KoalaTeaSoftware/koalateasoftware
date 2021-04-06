# KTS Portfolio Based on VuePress

VuePress is really quite enjoyable to use. It is based on Vue.JS, but turns handles for you. The guts of articles and pages are writted using MarkDown, and can handle 'embedded' HTML (see the iframes that contain illustrate the HTML reports from the Cucumber tests). 

## Current State

It is deployed to the **Dark Side** (Firebase), and contains a few pages to get started

## ToDo:

- [ ] see about writing a few interesting pages
- [ ] See about munging it so that articles can be updated / written on the fly (instead of needing to be _Deployed_).
    - [ ] Firebase Auth - Use our own login (not Google), because 'anyone can log in' is not appropriate
    - [ ] Copy existing articles into Firestore
      * Probably use different collections in place of different folders
    - [ ] Build mechanism for pulling them out of Firestore
    - [ ] Form-based article creation mechanism
        * Add articles to existing blog-rolls
        * maybe adding a new blog-roll,  but that is probably too much work for not enough benefit
- [x] See about deploying it (either to Firebase, where the domain name currently points, or to BlueHost)

## Useful Links:

* https://blog.logrocket.com/how-create-portfolio-blog-using-vuepress-markdown/
* https://vuepress.vuejs.org/guide/deploy.html#google-firebase

## Useful Facts:

VuePress will generate a static site, so, in its native state, the system has you create pages, build the final site, then deploy that to the web server.

* Static images go in /doc/.vuepress/public
* You _must_ have a ReadMe.md in the root directory (which is defined when you start up the simulator, or whatever - see below)
* You have to set up the nav-bar using the /doc/.vuepress/config.js
* You don't have to use the name 'docs', you specify the source when you `vuepress dev [docs]`, or whatever

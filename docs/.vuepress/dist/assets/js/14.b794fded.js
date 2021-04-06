(window.webpackJsonp=window.webpackJsonp||[]).push([[14],{374:function(e,t,a){"use strict";a.r(t);var s=a(45),r=Object(s.a)({},(function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("ContentSlotsDistributor",{attrs:{"slot-key":e.$parent.slotKey}},[a("h1",{attrs:{id:"frontmatter-title"}},[a("a",{staticClass:"header-anchor",attrs:{href:"#frontmatter-title"}},[e._v("#")]),e._v(" "+e._s(e.$frontmatter.title))]),e._v(" "),a("p",[e._v("This web-site is for an up-and-coming movie director. It is themed around 'The Greenlands' (a fantasy world) and has various chapters, and 'embeddings'.")]),e._v(" "),a("p",[e._v("It was originally constructed using PHP, with hooks in to various RSS content-suppliers (content supplied by the client).")]),e._v(" "),a("h2",{attrs:{id:"road-map-to-do"}},[a("a",{staticClass:"header-anchor",attrs:{href:"#road-map-to-do"}},[e._v("#")]),e._v(" Road Map (To Do)")]),e._v(" "),a("ul",[a("li",[e._v("[ ] Make it faster\n"),a("ul",[a("li",[e._v("This is an ongoing task, Vue.JS appears a lot faster, and the VuePress engine may be useful - clearly, the challenge with that is the look of the site (substantial customisation)")]),e._v(" "),a("li",[e._v("Think of using Firebase to serve blog content")])])])]),e._v(" "),a("h2",{attrs:{id:"current-state"}},[a("a",{staticClass:"header-anchor",attrs:{href:"#current-state"}},[e._v("#")]),e._v(" Current State")]),e._v(" "),a("ul",[a("li",[e._v("It used PHP / .htaccess to provide a single-page-app (in operation, if not in feel). This means that the global look is defined in one place")]),e._v(" "),a("li",[e._v("Integrations\n"),a("ul",[a("li",[e._v("Mailchimp - gathering newsletter subscribers")]),e._v(" "),a("li",[e._v("PodBean - Podbean provides an XML feed, which has to be munged a little (the Vue.JS skeleton for the page) to present the data in he required manner.")]),e._v(" "),a("li",[e._v("WordPress - Similarly XML feeds are read am munged, this time by PHP) to present lists of articles, separated by category, for different 'chapters'.\n"),a("ul",[a("li",[e._v("The aim was to be able to provide the users with a simple data-entry front end, but this has proved unsatisfactory becuae\n"),a("ul",[a("li",[e._v("The flexibility of the WP post-editing front-end allows the user(s) to enter posts that do not conform with the expectectations placed at the web-site end (resulting in failures from malformed, through to completely failing pages)\n"),a("ul",[a("li",[e._v("This could be mitigated through more extensive user-training, but this is not something to be proud of here.")])])]),e._v(" "),a("li",[e._v("Very poor performance (time to draw page)\n"),a("ul",[a("li",[e._v("This may be mitigated through 'better' hosting, or rearranging the page-draw logic to draw the skeleton, then fill it in, but an entirely different approach would seem to be called for.")])])])])])])])])])]),e._v(" "),a("h2",{attrs:{id:"quality-management"}},[a("a",{staticClass:"header-anchor",attrs:{href:"#quality-management"}},[e._v("#")]),e._v(" Quality Management")]),e._v(" "),a("p",[e._v("Automated Function Quality Measurement is principally achieved using the in-house Cucumber/Java framework. This is plumped-up with Gherkin to verify:")]),e._v(" "),a("ul",[a("li",[e._v("Business requirements ("),a("strong",[e._v("BDD")]),e._v(")")]),e._v(" "),a("li",[e._v("Other requirements, such as\n"),a("ul",[a("li",[e._v("A desire to ensure that the HTML and CSS syntax standards are met")]),e._v(" "),a("li",[e._v("Risks inferred by considering the construction of the site ("),a("strong",[e._v("White Box")]),e._v(", "),a("strong",[e._v("TDD")]),e._v(" & "),a("strong",[e._v("regression")]),e._v(" are nice buzzwords to have  here)")])])])]),e._v(" "),a("p",[e._v("The automated suite is used whenever pages are added / updated. Google's Lighthouse also finds it way into the test effort, as well as the good old manual "),a("strong",[e._v("experimental testing")]),e._v(" techniques.")]),e._v(" "),a("p",[e._v("GitHub is used for VCS and CI/CD. Check-ins to the repo's master trigger a workflow that does thr following:")]),e._v(" "),a("ul",[a("li",[e._v("checks the SUT's code out into a "),a("strong",[e._v("Staging area")])]),e._v(" "),a("li",[e._v("checks he test-ware out into the current environment")]),e._v(" "),a("li",[e._v("runs the "),a("strong",[e._v("CI test suite")]),e._v(" (Cucumber tags)")]),e._v(" "),a("li",[e._v("Irrespective of the result of the tst-run (pass, or fail), an HTML report is FTP'd to KTS's server.")]),e._v(" "),a("li",[e._v("If the test succeeds, the new files are FTP'd to "),a("strong",[e._v("Live")])]),e._v(" "),a("li",[e._v("If it fails, GitHub sends me emails")])]),e._v(" "),a("p",[e._v("Selection of candidates for inclusion in the CI takes into account a balance between fragility (e.g. HTML syntax) and necessity (e.g. business requirement). Therefore, the CI suite is there to 'prevent embarrassing releases', rather than to give a 'good feeling' about a release candidate.")]),e._v(" "),a("p",[e._v("Here is the window report of the  "),a("a",{attrs:{href:"https://koalatea-software.com/web-site-development/the-greenlands/cucumber-html-reports/overview-features.html",target:"_blank"}},[e._v("latest CI Acceptance Run")]),e._v(":")]),e._v(" "),a("iframe",{staticStyle:{width:"200%",height:"100rem","-ms-zoom":"0.75","-moz-transform":"scale(0.5)","-moz-transform-origin":"0 0","-o-transform":"scale(0.5)","-o-transform-origin":"0 0","-webkit-transform":"scale(0.5)","-webkit-transform-origin":"0 0"},attrs:{src:"https://koalatea-software.com/web-site-development/the-greenlands/cucumber-html-reports/overview-features.html",title:"Latest run of the CI Acceptance Test Suite"}})])}),[],!1,null,null,null);t.default=r.exports}}]);
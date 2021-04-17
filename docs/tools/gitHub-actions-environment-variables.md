---
title: GitHub Actions - Environment Variables
description: To get info out of one 'run' and into another
author: Mark Goldthorp
type: article
category: tools
---
# {{$frontmatter.title}}

Within steps, you can get and store useful info like this:

```
    steps:
        - name: Store the the commit message from this repo (before getting the tests framework out)
          run: |
            echo "last_commit_msg=$(git log -1  --pretty="format:%s" | sed "s/\// /g")" >> $GITHUB_ENV
```

You can then use the data, in another step, by doing something like this:

```apacheconf
      - name: update the version information in the report
        run: |
          cd src/test/configuration
          sed -i  "s/^buildNumber=.*/buildNumber=""${{ env.last_commit_msg }}""/" reporting.properties
          cat  reporting.properties
          echo "-----------------------------"
```

See https://docs.github.com/en/actions/reference/workflow-commands-for-github-actions#environment-files

This illustration gets the last commit message from the SUT's repo (checked-out in previous step), and then uses later on to munge data in a file checked-out (subsequently) from the test-ware repo. _this seems easier than trying to tell `git log` which repo to read._

# PHPCI-istanbul

### Istanbul reporter for [PHPCI](https://www.phptesting.org/)


Add this to `composer.json`:

```
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/sergiu-paraschiv/PHPCI-istanbul"
    }
],

"require": {
    ...

    "sergiu-paraschiv/PHPCI-mocha": "~1.2"
},
```

Then the task to `phpci.yml`:
```
\SergiuParaschiv\PHPCI\Plugin\Istanbul:
    directory: "frontend"
    command: "npm run -s coverage:ci"
    outputDirectory: "../../../../public/coverage/frontend"
```

Npm should run with the `-s` flag.

`coverage:ci` in `package.json` should be `"istanbul cover --dir $DIR --root app  _mocha -- --recursive app/test"`

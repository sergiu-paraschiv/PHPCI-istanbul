# PHPCI-istanbul

### Istanbul reporter for [PHPCI](https://www.phptesting.org/)


Add this to `composer.json`:

```
https://github.com/sergiu-paraschiv/phpci-istanbul
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

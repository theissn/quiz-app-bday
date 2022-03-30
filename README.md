# Simple Quiz App for a birth-day

Needs a `questions.json` file in `storage/app/questions.json`

With the following format

```
[
  {
    "q": "What year did Biden get elected",
    "a": [
      "2012",
      "2016",
      "2020"
    ],
    "c": 2
  },
  ...
]
```

Where

`q` is the question
`a` is the options
`c` is the correct answer

The route `/dashboard` will show everyone on a leaderboard and requires a password to be set using the `APP_PASSWORD` env variable
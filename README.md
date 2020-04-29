# dynuxtify

> Nuxt js + Vuetify admin dashboard boilerplate design inspired by Google&#39;s Firebase.

## Utilities

$notifier.execute({ message, type })

message String
type: [success, error, info]
```
this.$notifier.execute({
  message: 'Your message here',
  type: 'info'
})
```

## API: Packages

- https://github.com/spatie/laravel-cors
- https://github.com/404labfr/laravel-impersonate
- https://github.com/spatie/activitylog (does not support Laravel 6+)
- https://github.com/spatie/laravel-activitylog
- https://github.com/spatie/laravel-permission
- https://github.com/spatie/image-optimizer (to be added)
- https://github.com/spatie/laravel-database-mail-templates (to be added)
- https://github.com/spatie/laravel-medialibrary
- https://github.com/spatie/laravel-query-builder (to be added; REST API query)
- https://github.com/spatie/laravel-searchable (to be added; Fuzzy Searching)
- https://github.com/spatie/laravel-web-tinker (dev)
- https://github.com/spatie/period (to be added; DATE PERIOD comparison)
- https://github.com/spatie/regex (to be added) 
- https://github.com/joshrainwater/active-users 

## API: Dev Tools
- /tinker for the web-tinker
- /telescope for the activity logging including Job Queues, etc

## Build Setup

```bash
# install dependencies
$ npm install

# serve with hot reload at localhost:3000
$ npm run dev

# build for production and launch server
$ npm run build
$ npm run start

# generate static project
$ npm run generate
```

For detailed explanation on how things work, check out [Nuxt.js docs](https://nuxtjs.org).

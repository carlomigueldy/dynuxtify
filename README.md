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

## Packages/Libraries Used

- https://github.com/spatie/laravel-cors
- https://github.com/404labfr/laravel-impersonate
- https://github.com/spatie/activitylog
- https://github.com/spatie/laravel-permission
- https://github.com/spatie/image-optimizer (to be added)
- https://github.com/spatie/laravel-database-mail-templates (to be added)

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

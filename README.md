# dynuxtify

> Nuxt js + Vuetify admin dashboard boilerplate design inspired by Google&#39;s Firebase.

## Guides

Deployment Guide
https://gist.github.com/carlomigueldy/0e15c38952e55c6e5f1f5dc62fa836aa

Self-Signed Certificate
https://gist.github.com/carlomigueldy/eea8952368a2aedfc8b2453caafd729a

Let'sEncrypt SSL Cert
https://www.digitalocean.com/community/tutorials/how-to-secure-nginx-with-let-s-encrypt-on-ubuntu-18-04

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
- https://github.com/Askedio/laravel-soft-cascade 
- https://github.com/mpociot/laravel-apidoc-generator (API doc generator)
- https://laravel-apidoc-generator.readthedocs.io/en/latest/documenting.html

## Nuxt: Packages
- https://www.npmjs.com/package/export-to-csv (to be added)
- https://www.npmjs.com/package/pdfkit 

## API: Dev Tools
- /tinker for the web-tinker
- /telescope for the activity logging including Job Queues, etc

## API: Polymorphic Relationships

Inserting into a polymorphic relationship
Reference: https://laracasts.com/discuss/channels/eloquent/inserting-polymorphic-relations

```
$address = new Address([
  'address_line_1' => 'Maigo, Lanao del Norte',
  'street_address' => 'Purok 2',
  'postal_code' => '9206',
  'country' => 'PH',
]);
  
$user = User::first();

$query = $user->addresses()->save($address);
```

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

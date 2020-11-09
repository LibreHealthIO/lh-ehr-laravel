This file describes some common pitfalls and how to solve them. Please always refer to this before opening an issue.

 #### Missing Translations
 This usually occurs when you have included new translations found in the `resources/lang` folder and yet
 they don't reflect within the site. Ensure after every translation you make, you run the command
 
 `php artisan vue-i18n:generate`
 
 This will generate a new set of translations and populate the `resources/js/locales/translations.js`


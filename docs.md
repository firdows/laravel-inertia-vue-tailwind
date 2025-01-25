# 38. IMPORTANT! Solving Laravel Tinker Issues!
php artisan tinker

composer dumpautoload

php artisan tinker
> Listing::all()


# 42. Resource Controller and Route Model Binding
php artisan make:controller --resource ListingController
php artisan route:list


# 51. Laravel Route Names in Vue
composer require tightenco/ziggy

# 53. Installing and Setting Up Tailwind CSS
npm install -D tailwindcss
npx tailwindcss init

npm install -D @tailwindcss/forms
tailwind.config.js
plugins: [
        require('@tailwindcss/forms'),
],



# 58. Custom Price Formatting Component
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Number/toLocaleString#specifications


# 87. Creating a One-to-Many Database Relationship
php artisan make:migration AddByUserIdToListingsTable
     $table->foreignIdFor(
        \App\Models\User::class,
        'by_user_id'
     )->constrained('users');
php artisan migrate:refresh --seed
            

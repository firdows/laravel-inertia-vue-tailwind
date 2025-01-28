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
        ```
        $table->foreignIdFor(
                \App\Models\User::class,
                'by_user_id'
        )->constrained('users');
        ```
php artisan migrate:refresh --seed
            


# 91-92. Model Policies - Theoretical
php artisan make:policy ListingPolicy --model=Listing


# 95. Admin Users - Overriding Policy Implementation
php artisan make:migration AddIsAdminColumnToUsersTable

# 96. Reading the Related Data (Using Database Relationship)
$user = User::find(2)
$user->listings()->where('beds',">=",2)->get()

# 112. The Debounce Function - Handling the Events Flood
npm i --save lodash

# 121. File Data Model
php artisan make:model ListingImage -m
php artisan migrate:status
php artisan migrate:rollback --batch=2
php artisan migrate

# 122. Laravel Filesystem Abstraction Explained
php artisan storage:link

# 127. File Upload Progress Indicator
npm install nprogress

# 131. Validating Uploaded Files (Make Sure It is an Image!)
https://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types

# Install Breadcrumbs
https://github.com/diglactic/laravel-breadcrumbs

# 142. Accepting Offers (Single Action Controller & Loading Nested Relations)
php artisan make:controller RealtorListingAcceptOfferController --invokable


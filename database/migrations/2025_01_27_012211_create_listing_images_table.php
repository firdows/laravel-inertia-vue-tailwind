<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('listing_images', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(
                \App\Models\Listing::class
            )->constrained("listings");
            
            $table->string('filename');
          

            $table->bigInteger("created_by")->unsigned();
            $table->foreign("created_by")->references("id")->on("users")->onDelete("cascade");
            $table->bigInteger("updated_by")->unsigned();
            $table->foreign("updated_by")->references("id")->on("users")->onDelete("cascade");
            $table->timestamps();
        });

        /*
        php artisan migrate:status
        php artisan migrate:rollback --batch=2
        php artisan migrate
        */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listing_images');
    }
};

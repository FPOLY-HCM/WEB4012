<?php

declare(strict_types=1);

use App\Enums\PostStatus;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class)->nullable()->constrained();
            $table->foreignIdFor(User::class, 'author_id')->constrained('users');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content')->nullable();
            $table->integer('views')->default(0);
            $table->string('thumbnail')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->string('status')->default(PostStatus::Draft->value);
            $table->integer('likes')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

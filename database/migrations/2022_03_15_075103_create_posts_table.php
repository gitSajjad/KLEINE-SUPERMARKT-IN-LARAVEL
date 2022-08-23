<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('body');
            $table->text('summary');
            $table->unsignedBigInteger('view')->default(0);
            $table->text('image');
            $table->text('video')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('selected')->default(0);
            $table->tinyInteger('breaking_news')->default(0);
            $table->timestamp('published_at')->useCurrent();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('cat_id')->constrained('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

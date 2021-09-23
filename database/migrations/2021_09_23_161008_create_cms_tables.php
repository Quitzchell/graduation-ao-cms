<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managed_content', function (Blueprint $table) {
            $table->id();
            $table->integer('order');
            $table->string('uri')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('linkable_id')->nullable();
            $table->string('linkable_type')->nullable();
            $table->boolean('locked')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('template_name');
            $table->string('tag')->nullable();
            $table->boolean('locked')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('cms_loader', function (Blueprint $table) {
            $table->string('owner_type');
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('content_id');

            $table->index(['owner_type', 'owner_id']);
            $table->index(['content_id']);
        });

        Schema::create('cms_content', function (Blueprint $table) {
            $table->id();
            $table->integer('order')->default(0);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('tag', 55);
            // Language filter
            $table->string('language', 20)->nullable();
            // Loading group that are loaded separate from the owner such a page titles etc
            $table->string('group', 55)->nullable();

            $table->index('parent_id');
        });

        Schema::create('cms_content_string', function (Blueprint $table) {
            $table->unsignedBigInteger('content_id');
            $table->string('value');

            $table->index('content_id');
        });

        Schema::create('cms_content_text', function (Blueprint $table) {
            $table->unsignedBigInteger('content_id');
            $table->text('value');

            $table->index('content_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('managed_content');
        Schema::drop('pages');
        Schema::drop('cms_loader');
        Schema::drop('cms_content');
        Schema::drop('cms_content_string');
        Schema::drop('cms_content_text');
    }
}

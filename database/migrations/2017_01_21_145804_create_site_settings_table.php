<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('body')->nullable();
            $table->boolean('isText')->default(0);
            $table->string('text_label')->nullable();
            $table->string('text')->nullable();
            $table->boolean('isParagraph')->default(0);
            $table->string('paragraph_label')->nullable();
            $table->string('paragraph')->nullable();
            $table->boolean('isMenu')->default(0);
            $table->string('menu_label')->nullable();
            $table->string('menu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_settings');
    }
}

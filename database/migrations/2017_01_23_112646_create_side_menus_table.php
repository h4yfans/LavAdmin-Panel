<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSideMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('side_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('element_id')->unsigned()->index()->nullable();
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

        Schema::table('side_menus', function (Blueprint $table) {
            $table->foreign('element_id')->references('id')->on('elements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('side_menus');
    }
}

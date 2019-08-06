<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WarehouseWebController extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Kho giao diện
         */
        Schema::create('cate_web',function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });
        Schema::create('web',function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('image');
            $table->string('link');
            $table->string('code');
            $table->bigInteger('cate_id')->unsigned();
            $table->foreign('cate_id')
                ->references('id')
                ->on('cate_web')
                ->onDelete('cascade');
            $table->integer('status');
            $table->timestamps();
        });
        Schema::create('users',function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('password');
            $table->integer('status');
            $table->timestamps();
        });
        Schema::create('web_users',function (Blueprint $table)
        {
            $table->bigInteger('users_id')->unsigned();
            $table->foreign('users_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->bigInteger('web_id')->unsigned();
            $table->foreign('web_id')
                ->references('id')
                ->on('web')
                ->onDelete('cascade');
        });
    /**
     * Dịch vụ - Thiết kế - Seo
     */
        Schema::create('cate_service', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('service', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('image');
            $table->text('summary');
            $table->text('content');
            $table->integer('focus');
            $table->integer('view')->default(0);
            $table->bigInteger('cate_id')->unsigned();
            $table->foreign('cate_id')
                ->references('id')
                ->on('cate_service')
                ->onDelete('cascade');
            $table->timestamps();
            $table->integer('status');
        });
        Schema::create('service_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('service_id')->unsigned();
            $table->foreign('service_id')
                ->references('id')
                ->on('service')
                ->onDelete('cascade');
            $table->timestamps();
            $table->integer('searchs');
        });
        Schema::create('cate_design', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('design', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('image');
            $table->text('summary');
            $table->text('content');
            $table->integer('focus');
            $table->integer('view')->default(0);
            $table->bigInteger('cate_id')->unsigned();
            $table->foreign('cate_id')
                ->references('id')
                ->on('cate_design')
                ->onDelete('cascade');
            $table->timestamps();
            $table->integer('status');
        });
        Schema::create('design_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('design_id')->unsigned();
            $table->foreign('design_id')
                ->references('id')
                ->on('design')
                ->onDelete('cascade');
            $table->timestamps();
            $table->integer('searchs');
        });
        Schema::create('cate_seo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('seo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('image');
            $table->text('summary');
            $table->text('content');
            $table->integer('focus');
            $table->integer('view')->default(0);
            $table->bigInteger('cate_id')->unsigned();
            $table->foreign('cate_id')
                ->references('id')
                ->on('cate_seo')
                ->onDelete('cascade');
            $table->timestamps();
            $table->integer('status');
        });
        Schema::create('seo_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('seo_id')->unsigned();
            $table->foreign('seo_id')
                ->references('id')
                ->on('seo')
                ->onDelete('cascade');
            $table->timestamps();
            $table->integer('searchs');
        });
        /**
         * Đối tác
         */
        Schema::create('partner',function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('logo');
            $table->string('link');
            $table->integer('status');
            $table->timestamps();
        });
        /**
         * Admin
         */
        Schema::create('role',function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('name');
        });
        Schema::create('admin',function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('phone');
            $table->bigInteger('level')->unsigned();
            $table
                ->foreign('level')
                ->references('id')
                ->on('role')
                ->onDelete('cascade');
            $table->integer('status');
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
        //
    }
}

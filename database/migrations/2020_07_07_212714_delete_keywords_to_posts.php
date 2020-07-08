<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteKeywordsToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('keywords');
            $table->text('description')->nullable()->after('blogger_id');
            $table->text('title')->nullable()->after('blogger_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->text('keywords')->nullable()->after('picture');
            $table->dropColumn('description');
            $table->dropColumn('title');
        });
    }
}

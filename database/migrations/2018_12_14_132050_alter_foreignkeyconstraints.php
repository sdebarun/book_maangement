<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterForeignkeyconstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books_to_author', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('author');
        });
        Schema::table('books_to_author', function (Blueprint $table) {
            $table->foreign('book_id')->references('id')->on('books');
        });
        Schema::table('books', function (Blueprint $table) {
            $table->foreign('publisher_id')->references('id')->on('publishers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books_to_author', function(Blueprint $table) {
			$table->dropForeign('books_to_author_author_id_foreign');
        });
        Schema::table('books_to_author', function(Blueprint $table) {
			$table->dropForeign('books_to_author_book_id_foreign');
        });
        Schema::table('books', function(Blueprint $table) {
			$table->dropForeign('books_publisher_id_foreign');
		});
    }
}

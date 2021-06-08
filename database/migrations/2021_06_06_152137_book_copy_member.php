<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BookCopyMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_copy_member', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_copy_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignId('member_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->timestamp('given_date');
            $table->timestamp('return_date')
                ->nullable();
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

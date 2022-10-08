<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
/**
* Run the migrations.
*
* @return void
*/
public function up()
{
    Schema::create('user_profiles', function (Blueprint $table) {
        $table->increments('id');
        $table->foreignId('user_id')
        ->constrained()
        ->onUpdate('cascade')
        ->onDelete('cascade');
        $table->string('account_number');
        $table->decimal('outstanding_amount', 8, 2);
        
    });
}

/**
* Reverse the migrations.
*
* @return void
*/
public function down()
{
    Schema::dropIfExists('user_profiles', function (Blueprint $table) {
        $table->dropForeign('user_profiles_user_id_foreign');   
    });
}
};
